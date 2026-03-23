@extends('admin.layouts.app')

@php
    $pageMap = $resource['page_map'] ?? [];
    $editorTip = $resource['editor_tip'] ?? null;
    $formColumns = (int) ($resource['form_columns'] ?? 2);
@endphp

@section('content')
    <section class="space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('admin.resources.index', $resource['key']) }}" class="btn btn-ghost rounded-full text-stone-300">Orqaga</a>
            <p class="text-sm text-stone-400">
                {{ $record ? 'ID: '.$record->getKey() : 'Yangi yozuv' }}
            </p>
        </div>

        @if ($editorTip || filled($pageMap))
            <article class="admin-surface p-6">
                <div class="admin-guide-head">
                    <div>
                        <p class="admin-label">Qayerda Ko'rinadi</p>
                        <h2 class="font-serif text-3xl text-amber-50">Shu o'zgarish qayerga ta'sir qiladi?</h2>
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

        <form
            method="POST"
            action="{{ $record ? route('admin.resources.update', [$resource['key'], $record->getKey()]) : route('admin.resources.store', $resource['key']) }}"
            class="space-y-6"
            enctype="multipart/form-data"
        >
            @csrf
            @if ($record)
                @method('PUT')
            @endif

            @foreach ($resource['sections'] as $section)
                <article class="admin-surface p-6">
                    <div class="mb-6 flex flex-col gap-2 border-b border-white/10 pb-5">
                        <h2 class="font-serif text-3xl text-amber-50">{{ $section['title'] }}</h2>
                        @if (!empty($section['description']))
                            <p class="text-sm text-stone-300">{{ $section['description'] }}</p>
                        @endif
                    </div>

                <div class="{{ $formColumns === 1 ? 'grid gap-5' : 'grid gap-5 md:grid-cols-2' }}">
                        @foreach ($section['fields'] as $field)
                            @php
                                $name = $field['name'];
                                $type = $field['type'] ?? 'text';
                                $options = \App\Admin\Support\AdminResourceRegistry::options($field);
                                $storedValue = $formData[$name] ?? null;
                                $value = in_array($type, ['image', 'images'], true) ? $storedValue : old($name, $storedValue);
                                $spanClass = $formColumns === 1
                                    ? ''
                                    : (($field['column_span'] ?? 1) === 2 ? 'md:col-span-2' : '');
                                $currentImages = $type === 'images'
                                    ? collect(\Illuminate\Support\Arr::wrap($storedValue))->filter()->values()->all()
                                    : [];
                                $currentImage = $type === 'image' ? \App\Support\UploadedMedia::url($storedValue) : null;
                            @endphp

                            @if ($type === 'hidden')
                                <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                                @continue
                            @endif

                            <div class="{{ $spanClass }}">
                                <label for="{{ $name }}" class="admin-label">{{ $field['label'] }}</label>

                                @if (in_array($type, ['text', 'email', 'password'], true))
                                    <input
                                        id="{{ $name }}"
                                        name="{{ $name }}"
                                        type="{{ $type }}"
                                        value="{{ $type === 'password' ? '' : $value }}"
                                        class="admin-input"
                                        @if(!empty($field['placeholder'])) placeholder="{{ $field['placeholder'] }}" @endif
                                    >
                                @elseif ($type === 'number')
                                    <input
                                        id="{{ $name }}"
                                        name="{{ $name }}"
                                        type="number"
                                        value="{{ $value }}"
                                        class="admin-input"
                                        step="{{ $field['step'] ?? '1' }}"
                                    >
                                @elseif ($type === 'select')
                                    <select id="{{ $name }}" name="{{ $name }}" class="admin-select">
                                        <option value="">Tanlang</option>
                                        @foreach ($options as $optionValue => $optionLabel)
                                            <option value="{{ $optionValue }}" @selected((string) $value === (string) $optionValue)>{{ $optionLabel }}</option>
                                        @endforeach
                                    </select>
                                @elseif ($type === 'textarea' || $type === 'json' || $type === 'array_lines')
                                    <textarea
                                        id="{{ $name }}"
                                        name="{{ $name }}"
                                        rows="{{ $field['rows'] ?? 5 }}"
                                        class="admin-textarea"
                                    >{{ $value }}</textarea>
                                @elseif ($type === 'checkbox')
                                    <label class="mt-3 flex items-center gap-3 rounded-[1.25rem] border border-white/10 bg-white/5 px-4 py-4 text-sm text-stone-200">
                                        <input id="{{ $name }}" name="{{ $name }}" type="checkbox" value="1" class="admin-checkbox" @checked((bool) $value)>
                                        <span>{{ $field['label'] }}</span>
                                    </label>
                                @elseif ($type === 'image')
                                    <div class="admin-upload-shell">
                                        <input
                                            id="{{ $name }}"
                                            name="{{ $name }}"
                                            type="file"
                                            accept="image/*"
                                            class="admin-file-input"
                                        >

                                        @if ($currentImage)
                                            <div class="admin-upload-grid">
                                                <article class="admin-upload-card">
                                                    <img src="{{ $currentImage }}" alt="{{ $field['label'] }}" class="admin-upload-image">
                                                    <div class="admin-upload-meta">
                                                        <strong>Hozirgi rasm</strong>
                                                        <span>{{ basename((string) $storedValue) }}</span>
                                                    </div>
                                                </article>
                                            </div>

                                            <label class="admin-upload-clear">
                                                <input name="clear_{{ $name }}" type="checkbox" value="1" class="admin-checkbox">
                                                <span>Joriy rasmni olib tashlash</span>
                                            </label>
                                        @endif
                                    </div>
                                @elseif ($type === 'images')
                                    <div class="admin-upload-shell">
                                        <input
                                            id="{{ $name }}"
                                            name="{{ $name }}[]"
                                            type="file"
                                            accept="image/*"
                                            multiple
                                            class="admin-file-input"
                                        >

                                        @if ($currentImages !== [])
                                            <div class="admin-upload-grid">
                                                @foreach ($currentImages as $imagePath)
                                                    @php
                                                        $imageUrl = \App\Support\UploadedMedia::url($imagePath);
                                                    @endphp
                                                    @if ($imageUrl)
                                                        <article class="admin-upload-card">
                                                            <img src="{{ $imageUrl }}" alt="{{ $field['label'].' '.$loop->iteration }}" class="admin-upload-image">
                                                            <div class="admin-upload-meta">
                                                                <strong>Rasm {{ $loop->iteration }}</strong>
                                                                <span>{{ basename((string) $imagePath) }}</span>
                                                            </div>
                                                        </article>
                                                    @endif
                                                @endforeach
                                            </div>

                                            <label class="admin-upload-clear">
                                                <input name="clear_{{ $name }}" type="checkbox" value="1" class="admin-checkbox">
                                                <span>Joriy galereyani olib tashlash</span>
                                            </label>
                                        @endif
                                    </div>
                                @elseif ($type === 'datetime-local')
                                    <input id="{{ $name }}" name="{{ $name }}" type="datetime-local" value="{{ $value }}" class="admin-input">
                                @endif

                                @if (!empty($field['help']))
                                    <p class="mt-2 text-xs uppercase tracking-[0.2em] text-stone-500">{{ $field['help'] }}</p>
                                @endif

                                @error($name)
                                    <p class="admin-error">{{ $message }}</p>
                                @enderror

                                @foreach ($errors->get($name.'.*') as $messages)
                                    <p class="admin-error">{{ $messages[0] }}</p>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </article>
            @endforeach

            <div class="flex justify-end">
                <button type="submit" class="admin-button min-w-44">
                    Saqlash
                </button>
            </div>
        </form>
    </section>
@endsection
