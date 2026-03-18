@extends('admin.layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('admin.resources.index', $resource['key']) }}" class="btn btn-ghost rounded-full text-stone-300">Orqaga</a>
            <p class="text-sm text-stone-400">
                {{ $record ? 'ID: '.$record->getKey() : 'Yangi yozuv' }}
            </p>
        </div>

        <form
            method="POST"
            action="{{ $record ? route('admin.resources.update', [$resource['key'], $record->getKey()]) : route('admin.resources.store', $resource['key']) }}"
            class="space-y-6"
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

                    <div class="grid gap-5 md:grid-cols-2">
                        @foreach ($section['fields'] as $field)
                            @php
                                $name = $field['name'];
                                $type = $field['type'] ?? 'text';
                                $options = \App\Admin\Support\AdminResourceRegistry::options($field);
                                $value = old($name, $formData[$name] ?? null);
                                $spanClass = ($field['column_span'] ?? 1) === 2 ? 'md:col-span-2' : '';
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
                                @elseif ($type === 'datetime-local')
                                    <input id="{{ $name }}" name="{{ $name }}" type="datetime-local" value="{{ $value }}" class="admin-input">
                                @endif

                                @if (!empty($field['help']))
                                    <p class="mt-2 text-xs uppercase tracking-[0.2em] text-stone-500">{{ $field['help'] }}</p>
                                @endif

                                @error($name)
                                    <p class="admin-error">{{ $message }}</p>
                                @enderror
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
