@php
    $delivery = __('home.delivery');
    $deliveryIcons = [
        'time' => asset('images/home/delivery/provided/icon-time.png'),
        'location' => asset('images/home/delivery/provided/icon-location.png'),
        'package' => asset('images/home/delivery/provided/icon-package.png'),
        'security' => asset('images/home/delivery/provided/icon-security.png'),
        'price' => asset('images/home/delivery/provided/icon-price.png'),
        'info' => asset('images/home/delivery/icons/info.svg'),
    ];
    $paymentBadgeIcons = ['price', 'time'];
    $guaranteeIcons = ['security', 'price', 'time'];
@endphp

<section id="delivery" class="section delivery-section delivery-reference delivery-showcase-section">
    <div class="delivery-showcase-shell">
        <article class="delivery-board">
            <div class="delivery-board-head">
                <span class="delivery-board-mark" aria-hidden="true"></span>
                <div>
                    <h2>{{ $delivery['title'] }}</h2>
                    <p>{{ $delivery['subtitle'] }}</p>
                </div>
            </div>

            <div class="delivery-board-stack">
                <section class="delivery-panel">
                    <div class="delivery-panel-head">
                        <span class="delivery-mini-mark" aria-hidden="true"></span>
                        <h3>{{ $delivery['local']['title'] }}</h3>
                        <p>{{ $delivery['local']['scope'] }}</p>
                    </div>

                    <div class="delivery-route-card delivery-route-card-local">
                        <span class="delivery-architecture delivery-architecture-left" aria-hidden="true"></span>
                        <span class="delivery-architecture delivery-architecture-right" aria-hidden="true"></span>

                        <div class="delivery-route-media delivery-route-media-truck">
                            <div class="delivery-truck-frame">
                                <img
                                    src="{{ asset('images/home/delivery/provided/bts-truck-light.png') }}"
                                    alt="BTS Express"
                                    class="delivery-truck-asset delivery-truck-asset-light"
                                    loading="lazy"
                                    decoding="async"
                                >
                                <img
                                    src="{{ asset('images/home/delivery/provided/bts-truck-light.png') }}"
                                    alt=""
                                    class="delivery-truck-asset delivery-truck-asset-dark"
                                    loading="lazy"
                                    decoding="async"
                                    aria-hidden="true"
                                >
                            </div>
                        </div>

                        <div class="delivery-route-copy">
                            <strong>BTS Express</strong>
                            <p>{{ $delivery['local']['description'] }}</p>
                            <dl>
                                <div>
                                    <dt>
                                        <span class="delivery-ui-icon" style="--delivery-icon: url('{{ $deliveryIcons['time'] }}')" aria-hidden="true"></span>
                                        {{ $delivery['labels']['duration'] }}
                                    </dt>
                                    <dd>{{ $delivery['local']['duration'] }}</dd>
                                </div>
                                <div>
                                    <dt>
                                        <span class="delivery-ui-icon" style="--delivery-icon: url('{{ $deliveryIcons['location'] }}')" aria-hidden="true"></span>
                                        {{ $delivery['labels']['coverage'] }}
                                    </dt>
                                    <dd>{{ $delivery['local']['coverage'] }}</dd>
                                </div>
                            </dl>
                        </div>

                        <span class="delivery-card-arrow" aria-hidden="true">&#8250;</span>
                    </div>
                </section>

                <section class="delivery-panel">
                    <div class="delivery-panel-head">
                        <span class="delivery-mini-mark" aria-hidden="true"></span>
                        <h3>{{ $delivery['foreign']['title'] }}</h3>
                        <p>{{ $delivery['foreign']['scope'] }}</p>
                    </div>

                    <div class="delivery-foreign-grid">
                        @foreach ($delivery['foreign']['services'] as $service)
                            <div class="delivery-route-card delivery-route-card-{{ $service['key'] }}">
                                <span class="delivery-world-map" aria-hidden="true"></span>
                                @if ($service['key'] === 'uzpost')
                                    <span class="delivery-card-icon delivery-card-icon-package" aria-hidden="true">
                                        <span class="delivery-ui-icon" style="--delivery-icon: url('{{ $deliveryIcons['package'] }}')"></span>
                                    </span>
                                @endif

                                <div class="delivery-brand delivery-brand-{{ $service['key'] }}">
                                    @if ($service['key'] === 'dhl')
                                        <img src="{{ asset('images/home/delivery/dhl-express-logo.svg') }}" alt="DHL Express">
                                    @else
                                        <img src="{{ asset('images/home/delivery/uzpost-logo.jpg') }}" alt="" aria-hidden="true">
                                        <span>UZPOST</span>
                                    @endif
                                </div>

                                <p>{{ $service['description'] }}</p>

                                <div class="delivery-service-foot">
                                    <dl>
                                        <div>
                                            <dt>
                                                <span class="delivery-ui-icon" style="--delivery-icon: url('{{ $deliveryIcons['time'] }}')" aria-hidden="true"></span>
                                                {{ $delivery['labels']['duration'] }}
                                            </dt>
                                            <dd>{{ $service['duration'] }}</dd>
                                        </div>
                                    </dl>

                                    @if ($service['key'] === 'dhl')
                                        <img
                                            src="{{ asset('images/home/delivery/provided/dhl-plane.png') }}"
                                            alt=""
                                            class="delivery-service-asset delivery-service-asset-plane"
                                            loading="lazy"
                                            decoding="async"
                                            aria-hidden="true"
                                        >
                                    @else
                                        <img
                                            src="{{ asset('images/home/delivery/provided/uzpost-box.png') }}"
                                            alt=""
                                            class="delivery-service-asset delivery-service-asset-box"
                                            loading="lazy"
                                            decoding="async"
                                            aria-hidden="true"
                                        >
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="delivery-info-row delivery-payment-row">
                    <span class="delivery-info-icon delivery-info-icon-i" aria-hidden="true">
                        <span class="delivery-ui-icon" style="--delivery-icon: url('{{ $deliveryIcons['info'] }}')"></span>
                    </span>
                    <div>
                        <h3>{{ $delivery['payment']['title'] }}</h3>
                        <p>{{ $delivery['payment']['text'] }}</p>
                    </div>
                    <div class="delivery-chip-list">
                        @foreach ($delivery['payment']['badges'] as $badgeIndex => $badge)
                            @php($badgeIcon = $paymentBadgeIcons[$badgeIndex] ?? 'price')
                            <span>
                                <span class="delivery-ui-icon" style="--delivery-icon: url('{{ $deliveryIcons[$badgeIcon] }}')" aria-hidden="true"></span>
                                {{ $badge }}
                            </span>
                        @endforeach
                    </div>
                </section>

                <section class="delivery-info-row delivery-address-row">
                    <span class="delivery-info-icon delivery-info-icon-pin" aria-hidden="true">
                        <span class="delivery-ui-icon" style="--delivery-icon: url('{{ $deliveryIcons['location'] }}')"></span>
                    </span>
                    <span class="delivery-architecture delivery-architecture-address" aria-hidden="true"></span>
                    <div>
                        <h3>{{ $delivery['address']['title'] }}</h3>
                        <p>{{ $delivery['address']['text'] }}</p>
                    </div>
                </section>

                <div class="delivery-guarantee-strip" aria-label="{{ $delivery['guarantee_label'] }}">
                    @foreach ($delivery['guarantees'] as $guaranteeIndex => $guarantee)
                        @php($guaranteeIcon = $guaranteeIcons[$guaranteeIndex] ?? 'security')
                        <span>
                            <span class="delivery-ui-icon" style="--delivery-icon: url('{{ $deliveryIcons[$guaranteeIcon] }}')" aria-hidden="true"></span>
                            {{ $guarantee }}
                        </span>
                    @endforeach
                </div>
            </div>
        </article>
    </div>
</section>
