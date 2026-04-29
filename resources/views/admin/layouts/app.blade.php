<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="atelier">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ($pageTitle ?? 'Admin') . ' | Suzani Shop' }}</title>
    <meta name="theme-color" content="#1f120e">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/image.png') }}">
    <script>
        (() => {
            const storageKey = 'suzani-shop-theme';
            let theme = 'atelier';

            try {
                if (window.localStorage.getItem(storageKey) === 'nocturne') {
                    theme = 'nocturne';
                }
            } catch {}

            document.documentElement.setAttribute('data-theme', theme);
            document.documentElement.style.colorScheme = 'dark';
        })();
    </script>
    @vite(['resources/js/admin.js'])
    @livewireStyles
</head>
<body class="admin-app min-h-screen text-stone-100">
    @php
        $navigation = \App\Admin\Support\AdminResourceRegistry::grouped();
        $activeKey = $currentPage ?? null;
    @endphp

    <div class="admin-backdrop"></div>

    <div class="admin-shell relative flex min-h-screen" x-data="{ sidebarOpen: false }">
        <aside
            class="admin-sidebar fixed inset-y-0 left-0 z-40 w-80 -translate-x-full border-r border-white/10 bg-[#1f120e]/90 p-5 backdrop-blur-xl transition-transform duration-300 lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : ''"
        >
            <div class="admin-sidebar-inner">
                <span class="admin-sidebar-orb admin-sidebar-orb-top" aria-hidden="true"></span>
                <span class="admin-sidebar-orb admin-sidebar-orb-bottom" aria-hidden="true"></span>

                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.dashboard', [], false) }}" class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-2xl border border-amber-300/30 bg-amber-200/10 p-1.5 shadow-[0_10px_24px_rgba(0,0,0,0.22)]">
                            <img
                                src="{{ asset('images/logo/image.png') }}"
                                alt="Suzani Shop logo"
                                class="h-full w-full rounded-[1rem] object-cover"
                            >
                        </span>
                        <div>
                            <p class="text-xs uppercase tracking-[0.35em] text-amber-200/70">Suzani Atelier</p>
                            <p class="font-serif text-2xl text-amber-50">Admin House</p>
                        </div>
                    </a>
                    <button type="button" class="btn btn-ghost btn-sm text-stone-100 lg:hidden" @click="sidebarOpen = false">Yopish</button>
                </div>

                <nav class="mt-8 admin-sidebar-scroll">
                    <a
                        href="{{ route('admin.dashboard', [], false) }}"
                        class="admin-nav-link admin-nav-link-dashboard {{ $activeKey === 'dashboard' ? 'is-active' : '' }}"
                    >
                        <span class="admin-nav-link-glow" aria-hidden="true"></span>
                        <span class="admin-nav-link-knot" aria-hidden="true">
                            <x-admin.nav-icon name="dashboard" />
                        </span>
                        <span class="admin-nav-link-copy">
                            <span class="admin-nav-link-title">Boshqaruv paneli</span>
                        </span>
                        <span class="admin-nav-link-meta">Panel</span>
                    </a>

                    @foreach ($navigation as $group => $items)
                        @php
                            $groupSlug = \Illuminate\Support\Str::slug($group, '-');
                            $isGroupOpen = collect($items)->contains(fn (array $item): bool => $activeKey === $item['key']);
                        @endphp

                        <section class="admin-nav-group" x-data="{ open: @js($isGroupOpen) }">
                            <button
                                type="button"
                                class="admin-nav-group-head"
                                :class="{ 'is-open': open }"
                                @click="open = ! open"
                                :aria-expanded="open.toString()"
                                aria-controls="nav-group-{{ $groupSlug }}"
                            >
                                <span class="admin-nav-group-title">
                                    <span class="admin-nav-group-label">{{ $group }}</span>
                                    <span class="admin-nav-group-count">{{ count($items) }}</span>
                                </span>
                                <span class="admin-nav-group-chevron" :class="{ 'is-open': open }" aria-hidden="true">
                                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m5 7.5 5 5 5-5" />
                                    </svg>
                                </span>
                            </button>

                            <div
                                id="nav-group-{{ $groupSlug }}"
                                class="admin-nav-stack"
                                x-show="open"
                                x-transition.opacity.duration.180ms
                                x-cloak
                            >
                                @foreach ($items as $item)
                                    <a
                                        href="{{ route('admin.resources.index', ['resource' => $item['key']], false) }}"
                                        class="admin-nav-link {{ $activeKey === $item['key'] ? 'is-active' : '' }}"
                                    >
                                        <span class="admin-nav-link-glow" aria-hidden="true"></span>
                                        <span class="admin-nav-link-knot" aria-hidden="true">
                                            <x-admin.nav-icon :name="$item['key']" />
                                        </span>
                                        <span class="admin-nav-link-copy">
                                            <span class="admin-nav-link-title">{{ $item['label'] }}</span>
                                        </span>
                                        <span class="admin-nav-link-meta">{{ $item['nav_meta'] ?? $item['singular'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    @endforeach
                </nav>
            </div>
        </aside>

        <div class="admin-shell-main flex min-h-screen flex-1 flex-col">
            <header class="admin-shell-header sticky top-0 z-30 border-b border-white/10 bg-[#2b1913]/70 px-4 py-4 backdrop-blur-xl sm:px-6 lg:px-10">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <button type="button" class="btn btn-ghost btn-sm text-stone-100 lg:hidden" @click="sidebarOpen = true">
                            Menyu
                        </button>
                        <div>
                            <p class="text-xs uppercase tracking-[0.32em] text-amber-200/60">Admin workspace</p>
                            <h1 class="font-serif text-3xl leading-none text-amber-50">{{ $pageTitle ?? 'Admin' }}</h1>
                            @if (!empty($pageDescription))
                                <p class="mt-2 text-sm text-stone-300">{{ $pageDescription }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button
                            type="button"
                            class="admin-theme-toggle hidden sm:inline-grid"
                            data-admin-theme-toggle
                            data-active-theme="atelier"
                            aria-label="Admin rang rejimini almashtirish"
                            aria-pressed="false"
                        >
                            <span class="admin-theme-toggle-label admin-theme-toggle-label-light">Atelier</span>
                            <span class="admin-theme-toggle-label admin-theme-toggle-label-dark">Nocturne</span>
                        </button>

                        <div class="admin-date-chip hidden rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-stone-300 sm:block">
                            {{ now()->format('d M Y, H:i') }}
                        </div>

                        <button
                            id="admin-user-button"
                            data-dropdown-toggle="admin-user-menu"
                            data-dropdown-placement="bottom-end"
                            class="admin-user-trigger flex items-center gap-3 rounded-full border border-white/10 bg-white/5 px-3 py-2 text-left"
                            type="button"
                        >
                            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-amber-100 text-sm font-semibold text-[#2b1913]">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                            <span class="hidden sm:block">
                                <span class="block text-sm font-medium text-amber-50">{{ auth()->user()->name }}</span>
                                <span class="block text-xs uppercase tracking-[0.28em] text-amber-200/50">Administrator</span>
                            </span>
                        </button>

                        <div id="admin-user-menu" class="admin-user-menu z-50 hidden w-56 divide-y divide-white/10 rounded-3xl border border-white/10 bg-[#221410]/95 shadow-2xl">
                            <div class="px-5 py-4">
                                <p class="text-sm font-medium text-amber-50">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-stone-400">{{ auth()->user()->login }}</p>
                            </div>
                            <div class="p-2">
                                <form method="POST" action="{{ route('admin.logout', [], false) }}">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center justify-between rounded-2xl px-4 py-3 text-sm text-stone-200 transition hover:bg-white/5 hover:text-amber-50">
                                        <span>Tizimdan chiqish</span>
                                        <span class="text-xs uppercase tracking-[0.28em] text-amber-200/40">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-4 py-6 sm:px-6 lg:px-10 lg:py-8">
                @if (session('status'))
                    <div class="alert mb-6 border border-emerald-300/20 bg-emerald-400/10 text-emerald-100">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>
