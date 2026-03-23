@extends('admin.layouts.app')

@php
    $searchValue = request('search');
    $pageMap = $resource['page_map'] ?? [];
    $editorTip = $resource['editor_tip'] ?? null;
@endphp

@section('content')
    <section class="space-y-6">
        @if ($editorTip || filled($pageMap))
            <article class="admin-surface p-6">
                <div class="admin-guide-head">
                    <div>
                        <p class="admin-label">Qayerda Ko'rinadi</p>
                        <h2 class="font-serif text-3xl text-amber-50">Bu bo'lim nimani boshqaradi?</h2>
                    </div>
                    @if ($editorTip)
                        <p class="admin-guide-copy">{{ $editorTip }}</p>
                    @endif
                </div>

                @if (filled($pageMap))
                    <div class="admin-page-map-grid">
                        @foreach ($pageMap as $mapItem)
                            <a
                                href="{{ $mapItem['path'] ?? '#' }}"
                                class="admin-page-map-card {{ ($mapItem['state'] ?? 'draft') === 'live' ? 'is-live' : 'is-draft' }}"
                            >
                                <span class="admin-page-map-pill">
                                    {{ ($mapItem['state'] ?? 'draft') === 'live' ? 'Live bo‘lim' : 'Draft bo‘lim' }}
                                </span>
                                <strong>{{ $mapItem['title'] }}</strong>
                                <p>{{ $mapItem['description'] }}</p>
                                @if (!empty($mapItem['path']))
                                    <span class="admin-page-map-link">Asosiy sahifada ko'rish</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </article>
        @endif

        <article class="admin-surface p-6">
            <div class="flex flex-col gap-4 xl:flex-row xl:items-end xl:justify-between">
                <form method="GET" class="grid flex-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
                    <label class="xl:col-span-2">
                        <span class="admin-label">Qidiruv</span>
                        <input type="text" name="search" value="{{ $searchValue }}" class="admin-input" placeholder="{{ $resource['singular'] }} bo‘yicha qidiring">
                    </label>

                    @foreach ($resource['filters'] as $filter)
                        @php
                            $options = \App\Admin\Support\AdminResourceRegistry::options($filter);
                        @endphp
                        <label>
                            <span class="admin-label">{{ $filter['label'] }}</span>
                            @if (($filter['type'] ?? 'text') === 'select')
                                <select name="{{ $filter['name'] }}" class="admin-select">
                                    <option value="">Barchasi</option>
                                    @foreach ($options as $optionValue => $optionLabel)
                                        <option value="{{ $optionValue }}" @selected((string) request($filter['name']) === (string) $optionValue)>{{ $optionLabel }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" name="{{ $filter['name'] }}" value="{{ request($filter['name']) }}" class="admin-input">
                            @endif
                        </label>
                    @endforeach

                    <div class="flex items-end gap-3">
                        <button type="submit" class="admin-button">Filtrlash</button>
                        <a href="{{ route('admin.resources.index', $resource['key']) }}" class="btn btn-ghost rounded-full text-stone-300">Tozalash</a>
                    </div>
                </form>

                @if ($resource['create'])
                    <a href="{{ route('admin.resources.create', $resource['key']) }}" class="admin-button whitespace-nowrap">Yangi {{ mb_strtolower($resource['singular']) }}</a>
                @endif
            </div>
        </article>

        <article class="admin-surface overflow-hidden p-0">
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            @foreach ($resource['columns'] as $column)
                                <th>{{ $column['label'] }}</th>
                            @endforeach
                            <th class="text-right">Harakatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($records as $record)
                            <tr>
                                @foreach ($resource['columns'] as $column)
                                    @php
                                        $raw = data_get($record, $column['key']);
                                        $type = $column['type'] ?? 'text';
                                        $options = \App\Admin\Support\AdminResourceRegistry::options($column);
                                    @endphp
                                    <td>
                                        @if ($type === 'money')
                                            {{ number_format((float) $raw, 0, '.', ' ') }} so‘m
                                        @elseif ($type === 'boolean')
                                            <span class="admin-badge {{ $raw ? 'is-success' : 'is-muted' }}">{{ $raw ? 'Ha' : 'Yo‘q' }}</span>
                                        @elseif ($type === 'badge')
                                            <span class="admin-badge">{{ $options[$raw] ?? $raw }}</span>
                                        @elseif ($type === 'datetime')
                                            {{ $raw ? \Illuminate\Support\Carbon::parse($raw)->format('d.m.Y H:i') : '—' }}
                                        @elseif ($type === 'date')
                                            {{ $raw ? \Illuminate\Support\Carbon::parse($raw)->format('d.m.Y') : '—' }}
                                        @else
                                            {{ filled($raw) ? $raw : '—' }}
                                        @endif
                                    </td>
                                @endforeach
                                <td>
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.resources.edit', [$resource['key'], $record->getKey()]) }}" class="btn btn-ghost btn-sm rounded-full text-amber-100">Tahrirlash</a>
                                        @if ($resource['delete'])
                                            <form method="POST" action="{{ route('admin.resources.destroy', [$resource['key'], $record->getKey()]) }}" onsubmit="return confirm('Rostdan ham o‘chirasizmi?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-ghost btn-sm rounded-full text-rose-200">O‘chirish</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($resource['columns']) + 1 }}">
                                    <div class="px-6 py-14 text-center">
                                        <p class="font-serif text-3xl text-amber-50">Hozircha yozuv topilmadi</p>
                                        <p class="mt-3 text-sm text-stone-300">Filtrlarni tozalab ko‘ring yoki yangi yozuv yarating.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-white/10 px-6 py-4">
                {{ $records->links() }}
            </div>
        </article>
    </section>
@endsection
