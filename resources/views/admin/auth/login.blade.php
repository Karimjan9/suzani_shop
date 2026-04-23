<!DOCTYPE html>
<html lang="uz" data-theme="atelier">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Suzani Shop</title>
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
</head>
<body class="admin-auth-page min-h-screen text-stone-100">
    <div class="admin-backdrop"></div>

    <main class="relative isolate flex min-h-screen items-center justify-center overflow-hidden px-4 py-8 sm:px-6 lg:px-10">
        <div class="admin-auth-orb admin-auth-orb-left"></div>
        <div class="admin-auth-orb admin-auth-orb-right"></div>

        <div class="admin-auth-shell relative grid w-full max-w-6xl overflow-hidden rounded-[2rem] border border-white/10 shadow-[0_45px_120px_rgba(0,0,0,0.46)] lg:grid-cols-[0.95fr_1.05fr]">
            <section class="admin-auth-stage relative overflow-hidden p-7 sm:p-10 lg:p-12">
                <div class="admin-auth-stage-pattern"></div>

                <div class="relative z-10 flex h-full flex-col justify-between">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="admin-auth-brand-pill inline-flex items-center gap-3 rounded-full border border-amber-200/20 bg-white/5 px-4 py-2 backdrop-blur-sm">
                            <span class="flex h-9 w-9 items-center justify-center overflow-hidden rounded-full border border-amber-200/20 bg-amber-200/10 p-1 shadow-[0_10px_24px_rgba(0,0,0,0.2)]">
                                <img
                                    src="{{ asset('images/logo/image.png') }}"
                                    alt="Suzani Shop logo"
                                    class="h-full w-full rounded-full object-cover"
                                >
                            </span>
                            <div>
                                <p class="text-[10px] uppercase tracking-[0.34em] text-amber-100/55">Atelier</p>
                                <p class="text-sm font-semibold tracking-[0.18em] text-amber-50">SUZANI SHOP</p>
                            </div>
                        </div>

                        <div class="admin-auth-access-pill rounded-full border border-emerald-200/15 bg-emerald-300/10 px-4 py-2 text-[11px] uppercase tracking-[0.32em] text-emerald-100/80">
                            Admin access
                        </div>

                        <button
                            type="button"
                            class="admin-theme-toggle admin-theme-toggle-compact"
                            data-admin-theme-toggle
                            data-active-theme="atelier"
                            aria-label="Admin rang rejimini almashtirish"
                            aria-pressed="false"
                        >
                            <span class="admin-theme-toggle-label admin-theme-toggle-label-light">Atelier</span>
                            <span class="admin-theme-toggle-label admin-theme-toggle-label-dark">Nocturne</span>
                        </button>
                    </div>

                    <div class="mt-10 max-w-xl">
                        <p class="text-xs uppercase tracking-[0.38em] text-amber-100/50">Crafted workspace</p>
                        <h1 class="mt-5 font-serif text-4xl leading-[0.95] text-amber-50 sm:text-5xl xl:text-6xl">
                            Hunarmand boshqaruvi uchun nafis kirish
                        </h1>
                        <p class="mt-5 max-w-lg text-base leading-8 text-stone-300">
                            Buyurtmalar, mahsulotlar va kontent oqimini bitta professional panelda boshqaring. Dizayn sokin, form esa tez va aniq ishlash uchun moslangan.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <article class="admin-auth-metric">
                            <p class="admin-auth-metric-label">Savdo va katalog</p>
                            <p class="admin-auth-metric-copy">Yangi buyurtmalar, mahsulotlar va mijoz oqimi bitta ish ritmida boshqariladi.</p>
                        </article>

                        <article class="admin-auth-metric">
                            <p class="admin-auth-metric-label">Kontent va sozlama</p>
                            <p class="admin-auth-metric-copy">Bannerlar, feedback va tizim yozuvlari toza custom interfeysda yuradi.</p>
                        </article>
                    </div>

                    <div class="mt-10">
                        <div class="admin-auth-quote">
                            <div class="admin-auth-quote-line"></div>
                            <div>
                                <p class="text-xs uppercase tracking-[0.3em] text-amber-100/45">Showroom mood</p>
                                <p class="mt-3 max-w-md font-serif text-2xl leading-tight text-amber-50">
                                    Atlas issiqligi va zamonaviy admin aniqligi bir kompozitsiyada.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="admin-auth-panel p-5 sm:p-8 lg:p-10" x-data="{ showPassword: false }">
                <div class="admin-auth-panel-inner admin-auth-panel-surface mx-auto flex min-h-full w-full max-w-md flex-col justify-center rounded-[1.75rem] border border-[#e4d4c4] bg-[rgba(255,251,246,0.92)] p-6 shadow-[0_24px_70px_rgba(77,48,34,0.18)] sm:p-8">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs uppercase tracking-[0.34em] text-[#8e6654]">Suzani shop</p>
                            <h2 class="mt-3 font-serif text-4xl leading-none text-[#2b1913]">Kirish</h2>
                        </div>

                        <div class="admin-auth-seal">
                            <span></span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('login.attempt', [], false) }}" class="mt-8 space-y-5">
                        @csrf

                        <div class="admin-auth-field">
                            <label for="login" class="admin-auth-field-label">Login</label>
                            <div class="admin-auth-input-shell">
                                <input
                                    id="login"
                                    name="login"
                                    type="text"
                                    value="{{ old('login') }}"
                                    required
                                    autofocus
                                    class="admin-input admin-auth-input"
                                    placeholder="admin"
                                >
                            </div>
                            @error('login')
                                <p class="admin-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="admin-auth-field">
                            <label for="password" class="admin-auth-field-label">Parol</label>
                            <div class="admin-auth-input-shell">
                                <input
                                    id="password"
                                    name="password"
                                    x-bind:type="showPassword ? 'text' : 'password'"
                                    required
                                    class="admin-input admin-auth-input pr-20"
                                    placeholder="********"
                                >
                                <button
                                    type="button"
                                    class="admin-auth-toggle"
                                    @click="showPassword = !showPassword"
                                >
                                    <span x-text="showPassword ? 'Hide' : 'Show'"></span>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <label class="flex items-center gap-3 text-sm text-[#63483b]">
                                <input type="checkbox" name="remember" value="1" class="admin-checkbox">
                                <span>Meni eslab qol</span>
                            </label>

                            <div class="text-[11px] uppercase tracking-[0.28em] text-[#9f7764]">
                                Protected
                            </div>
                        </div>

                        <button type="submit" class="admin-button admin-auth-submit w-full">
                            Kirish
                        </button>

                        <a href="/" class="admin-auth-home-link w-full">
                            Asosiy sahifaga o'tish
                        </a>
                    </form>

                </div>
            </section>
        </div>
    </main>
</body>
</html>
