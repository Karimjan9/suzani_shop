<footer class="site-footer footer-canvas">
    <div class="container footer-canvas-container">
        <div class="footer-banner">
            <div class="footer-banner-copy">
                <span class="footer-kicker">{{ $footer['banner']['kicker'] }}</span>
                <h2>{{ $footer['banner']['title'] }}</h2>
                <p>{{ $footer['banner']['copy'] }}</p>
                <div class="footer-banner-points">
                    @foreach ($footer['banner']['points'] as $point)
                        <span>{{ $point }}</span>
                    @endforeach
                </div>
            </div>

            <div class="footer-banner-side">
                <div class="footer-banner-stats">
                    @foreach ($footer['banner']['stats'] as $stat)
                        <div class="footer-banner-stat">
                            <strong>{{ $stat['value'] }}</strong>
                            <span>{{ $stat['label'] }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="footer-banner-actions">
                    <a href="{{ $footer['banner']['primary_action']['href'] }}" class="footer-action-button footer-action-button-primary">
                        <x-home.icon :name="$footer['banner']['primary_action']['icon']" />
                        <span>{{ $footer['banner']['primary_action']['label'] }}</span>
                    </a>

                    @if (filled($footer['banner']['secondary_action']['href'] ?? null))
                        <a
                            href="{{ $footer['banner']['secondary_action']['href'] }}"
                            class="footer-action-button footer-action-button-secondary"
                            @if ($footer['banner']['secondary_action']['external'] ?? false) target="_blank" rel="noreferrer" @endif
                        >
                            <x-home.icon :name="$footer['banner']['secondary_action']['icon']" />
                            <span>{{ $footer['banner']['secondary_action']['label'] }}</span>
                        </a>
                    @endif

                    <a href="{{ $footer['banner']['ghost_action']['href'] }}" class="footer-action-button footer-action-button-ghost">
                        <x-home.icon :name="$footer['banner']['ghost_action']['icon']" />
                        <span>{{ $footer['banner']['ghost_action']['label'] }}</span>
                    </a>
                </div>
            </div>
        </div>

        @php
            $menuTones = ['is-amber', 'is-sapphire'];
            $menuOrnaments = ['medallion', 'vine'];
        @endphp

        <div class="footer-surface">
            <div class="footer-grid-immersive">
                <div class="footer-brand-card footer-decor-card is-ember">
                    <div class="footer-card-ornament footer-card-ornament-brand" aria-hidden="true">
                        <x-home.footer-ornament variant="loom" />
                    </div>
                    <span class="footer-card-kicker">{{ $footer['brand']['kicker'] }}</span>
                    <a href="{{ url('/') }}" class="footer-brand-mark">
                        <span class="footer-brand-mark-icon" aria-hidden="true">
                            <x-home.icon name="craft" />
                        </span>
                        <span class="footer-brand-mark-copy">
                            <strong>{{ $footer['brand']['title'] }}</strong>
                            <small>{{ $footer['brand']['subtitle'] }}</small>
                        </span>
                    </a>
                    <p>{{ $footer['brand']['copy'] }}</p>
                    <div class="footer-pill-row">
                        @foreach ($footer['brand']['pills'] as $pill)
                            <span class="footer-pill">{{ $pill }}</span>
                        @endforeach
                    </div>

                    @if ($footer['brand']['social_links'] !== [])
                        <div class="footer-social-row">
                            @foreach ($footer['brand']['social_links'] as $link)
                                <x-home.social-icon-button
                                    :href="$link['href']"
                                    :label="$link['label']"
                                    :icon="$link['icon']"
                                    :external="$link['external']"
                                />
                            @endforeach
                        </div>
                    @endif
                </div>

                @foreach ($footer['menu_groups'] as $group)
                    @php
                        $menuTone = $menuTones[$loop->index % count($menuTones)];
                        $menuOrnament = $menuOrnaments[$loop->index % count($menuOrnaments)];
                    @endphp

                    <nav class="footer-menu-card footer-decor-card {{ $menuTone }}" aria-label="{{ $group['title'] }}">
                        <div class="footer-card-ornament" aria-hidden="true">
                            <x-home.footer-ornament :variant="$menuOrnament" />
                        </div>
                        <span class="footer-card-kicker">{{ $group['kicker'] }}</span>
                        <h3>{{ $group['title'] }}</h3>
                        <div class="footer-menu-list">
                            @foreach ($group['items'] as $item)
                                <a href="{{ $item['href'] }}">
                                    <strong>{{ $item['title'] }}</strong>
                                    <span>{{ $item['text'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </nav>
                @endforeach

                <div class="footer-contact-card footer-decor-card is-rose">
                    <div class="footer-card-ornament footer-card-ornament-contact" aria-hidden="true">
                        <x-home.footer-ornament variant="seal" />
                    </div>
                    <span class="footer-card-kicker">{{ __('home.ui.footer_ui.contact') }}</span>
                    <h3>{{ __('home.ui.footer_ui.contact_title') }}</h3>
                    <div class="footer-contact-stack">
                        @foreach ($footer['contact_rows'] as $row)
                            <x-home.footer-contact-row
                                :label="$row['label']"
                                :value="$row['value']"
                                :icon="$row['icon']"
                                :href="$row['href']"
                                :external="$row['external']"
                            />
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ now()->year }} Suzani Shop. {{ $footer['bottom']['copy'] }}</p>
                <div class="footer-bottom-pills">
                    @foreach ($footer['bottom']['pills'] as $pill)
                        <span>{{ $pill }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
