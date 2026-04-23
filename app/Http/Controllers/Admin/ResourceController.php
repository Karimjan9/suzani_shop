<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Support\AdminResourceRegistry;
use App\Support\UploadedMedia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ResourceController extends Controller
{
    public function index(Request $request, string $resource): View
    {
        $resource = AdminResourceRegistry::find($resource);
        $modelClass = $resource['model'];
        $query = $modelClass::query();

        foreach ($resource['with'] as $relation) {
            $query->with($relation);
        }

        if (isset($resource['scope']) && is_callable($resource['scope'])) {
            $query = $this->invokeCallback($resource['scope'], [$query, $request]) ?? $query;
        }

        $this->applySearch($query, $resource, $request->string('search')->toString());
        $this->applyFilters($query, $resource, $request);

        if (isset($resource['default_sort'])) {
            $query->orderBy(
                $resource['default_sort']['column'],
                $resource['default_sort']['direction'] ?? 'asc',
            );
        }

        return view('admin.resources.index', [
            'resource' => $resource,
            'records' => $query->paginate(12)->withQueryString(),
            'pageTitle' => $resource['label'],
            'pageDescription' => $resource['description'],
            'currentPage' => $resource['key'],
        ]);
    }

    public function create(string $resource): View
    {
        $resource = AdminResourceRegistry::find($resource);
        abort_unless($resource['create'], 404);

        return view('admin.resources.form', [
            'resource' => $resource,
            'record' => null,
            'formData' => $this->formData($resource, null),
            'pageTitle' => $resource['singular'].' yaratish',
            'pageDescription' => $resource['description'],
            'currentPage' => $resource['key'],
        ]);
    }

    public function store(Request $request, string $resource): RedirectResponse
    {
        $resource = AdminResourceRegistry::find($resource);
        abort_unless($resource['create'], 404);

        $modelClass = $resource['model'];
        $record = new $modelClass();

        return $this->persist($request, $resource, $record, true);
    }

    public function edit(string $resource, int|string $record): View
    {
        $resource = AdminResourceRegistry::find($resource);
        $record = $this->resolveRecord($resource, $record);

        return view('admin.resources.form', [
            'resource' => $resource,
            'record' => $record,
            'formData' => $this->formData($resource, $record),
            'pageTitle' => $resource['singular'].' tahrirlash',
            'pageDescription' => $resource['description'],
            'currentPage' => $resource['key'],
        ]);
    }

    public function update(Request $request, string $resource, int|string $record): RedirectResponse
    {
        $resource = AdminResourceRegistry::find($resource);
        $record = $this->resolveRecord($resource, $record);

        return $this->persist($request, $resource, $record, false);
    }

    public function destroy(string $resource, int|string $record): RedirectResponse
    {
        $resource = AdminResourceRegistry::find($resource);
        abort_unless($resource['delete'], 404);

        $record = $this->resolveRecord($resource, $record);
        $record->delete();

        return redirect()
            ->to(route('admin.resources.index', ['resource' => $resource['key']], false))
            ->with('status', $resource['singular'].' o‘chirildi.');
    }

    private function persist(Request $request, array $resource, Model $record, bool $creating): RedirectResponse
    {
        $payload = $this->validatedPayload($request, $resource, $record->exists ? $record : null);

        $fillableNames = collect(AdminResourceRegistry::fieldNames($resource))
            ->reject(fn (string $field): bool => in_array($field, ['role'], true))
            ->values()
            ->all();

        $record->fill(Arr::only($payload, $fillableNames));
        $record->save();

        if (isset($resource['after_save']) && is_callable($resource['after_save'])) {
            $this->invokeCallback($resource['after_save'], [$record, $payload, $request]);
        }

        return redirect()
            ->to(route('admin.resources.edit', ['resource' => $resource['key'], 'record' => $record->getKey()], false))
            ->with('status', $creating ? $resource['singular'].' yaratildi.' : $resource['singular'].' saqlandi.');
    }

    private function resolveRecord(array $resource, int|string $id): Model
    {
        $modelClass = $resource['model'];
        $query = $modelClass::query();

        foreach ($resource['with'] as $relation) {
            $query->with($relation);
        }

        if (isset($resource['scope']) && is_callable($resource['scope'])) {
            $query = $this->invokeCallback($resource['scope'], [$query]) ?? $query;
        }

        return $query->findOrFail($id);
    }

    private function formData(array $resource, ?Model $record): array
    {
        $data = $resource['defaults'];

        foreach (AdminResourceRegistry::fields($resource) as $field) {
            $name = $field['name'] ?? null;

            if (! $name) {
                continue;
            }

            $value = $record?->{$name} ?? $data[$name] ?? null;

            if ($field['type'] === 'json' && is_array($value)) {
                $value = json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }

            if ($field['type'] === 'array_lines') {
                $value = is_array($value) ? implode(PHP_EOL, $value) : $value;
            }

            if ($field['type'] === 'images') {
                $value = Arr::wrap($value);
            }

            if ($field['type'] === 'datetime-local' && filled($value)) {
                $value = Carbon::parse($value)->format('Y-m-d\TH:i');
            }

            $data[$name] = $value;
        }

        if (isset($resource['prepare_form_data']) && is_callable($resource['prepare_form_data'])) {
            $data = $this->invokeCallback($resource['prepare_form_data'], [$record, $data]);
        }

        return $data;
    }

    private function validatedPayload(Request $request, array $resource, ?Model $record): array
    {
        $rules = [];

        foreach (AdminResourceRegistry::fields($resource) as $field) {
            $name = $field['name'] ?? null;

            if (! $name) {
                continue;
            }

            $fieldRules = $field['rules'] ?? ['nullable'];

            if (is_callable($fieldRules)) {
                $fieldRules = $this->invokeCallback($fieldRules, [$record, $resource, $request]);
            }

            $rules[$name] = $fieldRules;

            if (($field['type'] ?? 'text') === 'images') {
                $rules[$name.'.*'] = $field['file_rules'] ?? ['image', 'max:5120'];
            }
        }

        $data = $request->validate($rules);

        foreach (AdminResourceRegistry::fields($resource) as $field) {
            $name = $field['name'] ?? null;

            if (! $name) {
                continue;
            }

            $data[$name] = match ($field['type']) {
                'checkbox' => $request->boolean($name),
                'image' => $this->storeUploadedImage($request, $record, $name),
                'images' => $this->storeUploadedImages($request, $record, $name),
                'json' => blank($data[$name] ?? null) ? [] : json_decode($data[$name], true, 512, JSON_THROW_ON_ERROR),
                'array_lines' => collect(preg_split('/\r\n|\r|\n/', (string) ($data[$name] ?? '')))
                    ->map(fn (string $item): string => trim($item))
                    ->filter()
                    ->values()
                    ->all(),
                'datetime-local' => blank($data[$name] ?? null) ? null : Carbon::parse($data[$name]),
                'password' => blank($data[$name] ?? null) && $record ? null : ($data[$name] ?? null),
                default => $data[$name] ?? null,
            };

            if ($field['type'] === 'password' && $data[$name] === null) {
                unset($data[$name]);
            }
        }

        if (isset($resource['mutate_before_save']) && is_callable($resource['mutate_before_save'])) {
            $data = $this->invokeCallback($resource['mutate_before_save'], [$data, $record, $request]);
        }

        return $data;
    }

    private function applySearch(Builder $query, array $resource, string $search): void
    {
        if ($search === '' || empty($resource['search'])) {
            return;
        }

        $query->where(function (Builder $builder) use ($resource, $search): void {
            foreach ($resource['search'] as $column) {
                if (str_contains($column, '.')) {
                    [$relation, $nestedColumn] = explode('.', $column, 2);

                    $builder->orWhereHas($relation, function (Builder $relationQuery) use ($nestedColumn, $search): void {
                        $relationQuery->where($nestedColumn, 'like', '%'.$search.'%');
                    });

                    continue;
                }

                $builder->orWhere($column, 'like', '%'.$search.'%');
            }
        });
    }

    private function applyFilters(Builder $query, array $resource, Request $request): void
    {
        foreach ($resource['filters'] as $filter) {
            $value = $request->input($filter['name']);

            if ($value === null || $value === '') {
                continue;
            }

            if (($filter['type'] ?? 'text') === 'text') {
                $query->where($filter['name'], 'like', '%'.$value.'%');
                continue;
            }

            $query->where($filter['name'], $value);
        }
    }

    private function invokeCallback(callable $callback, array $arguments): mixed
    {
        $reflection = new \ReflectionFunction(\Closure::fromCallable($callback));

        return $callback(...array_slice($arguments, 0, $reflection->getNumberOfParameters()));
    }

    private function storeUploadedImage(Request $request, ?Model $record, string $name): ?string
    {
        $currentValue = $this->currentFieldValue($record, $name);

        if ($request->hasFile($name)) {
            $newPath = $this->storeImageFile($request->file($name), $name);
            $this->deleteManagedMedia($currentValue);

            return $newPath;
        }

        if ($request->boolean($this->clearFieldName($name))) {
            $this->deleteManagedMedia($currentValue);

            return null;
        }

        return $currentValue;
    }

    private function storeUploadedImages(Request $request, ?Model $record, string $name): array
    {
        $existing = collect(Arr::wrap($record?->{$name}))
            ->filter(fn (mixed $path): bool => filled($path))
            ->values()
            ->all();

        if ($request->hasFile($name)) {
            foreach ($existing as $path) {
                $this->deleteManagedMedia($path);
            }

            return collect(Arr::wrap($request->file($name)))
                ->filter(fn (mixed $file): bool => $file instanceof UploadedFile)
                ->map(fn (UploadedFile $file): string => $this->storeImageFile($file, $name))
                ->values()
                ->all();
        }

        if ($request->boolean($this->clearFieldName($name))) {
            foreach ($existing as $path) {
                $this->deleteManagedMedia($path);
            }

            return [];
        }

        return $existing;
    }

    private function storeImageFile(UploadedFile $file, string $name): string
    {
        return $file->store('admin-uploads/'.$name, 'public');
    }

    private function deleteManagedMedia(mixed $path): void
    {
        if (! is_string($path) || ! UploadedMedia::isManaged($path)) {
            return;
        }

        Storage::disk('public')->delete($path);
    }

    private function clearFieldName(string $name): string
    {
        return 'clear_'.$name;
    }

    private function currentFieldValue(?Model $record, string $name): mixed
    {
        if (! $record) {
            return null;
        }

        $attributeValue = $record->getAttribute($name);

        if ($attributeValue !== null) {
            return $attributeValue;
        }

        $meta = Arr::wrap($record->getAttribute('meta'));

        return $meta[$name] ?? null;
    }
}
