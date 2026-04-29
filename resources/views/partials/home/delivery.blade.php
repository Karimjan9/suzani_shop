@php
    $delivery = __('home.delivery');
@endphp

<section id="delivery" class="section delivery-section delivery-reference">
    <div class="container">
        <div class="delivery-shell">
            <div class="delivery-head">
                <span class="delivery-ornament delivery-rosette" aria-hidden="true"></span>
                <div>
                    <h2 class="section-title">{{ $delivery['title'] }}</h2>
                    <p>{{ $delivery['subtitle'] }}</p>
                </div>
                <span class="delivery-ornament delivery-rosette delivery-head-end" aria-hidden="true"></span>
            </div>

            <div class="delivery-stack">
                <article class="delivery-group delivery-group-local">
                    <div class="delivery-group-head">
                        <span class="delivery-ornament delivery-rosette delivery-ornament-small" aria-hidden="true"></span>
                        <div>
                            <h3>{{ $delivery['local']['title'] }}</h3>
                            <p>{{ $delivery['local']['scope'] }}</p>
                        </div>
                    </div>

                    <div class="delivery-service delivery-service-wide">
                        <span class="delivery-arch delivery-arch-left" aria-hidden="true"></span>
                        <span class="delivery-arch delivery-arch-right" aria-hidden="true"></span>
                        <div class="delivery-visual delivery-visual-truck" aria-hidden="true">
                            <div class="delivery-truck">
                                <div class="delivery-truck-box">
                                    <img src="{{ asset('images/home/delivery/bts-logo.png') }}" alt="">
                                </div>
                                <div class="delivery-truck-cab"></div>
                                <span class="delivery-wheel delivery-wheel-left"></span>
                                <span class="delivery-wheel delivery-wheel-right"></span>
                            </div>
                        </div>
                        <div class="delivery-service-copy">
                            <span class="delivery-service-name">BTS Express</span>
                            <p>{{ $delivery['local']['description'] }}</p>
                            <dl>
                                <div>
                                    <dt>{{ $delivery['labels']['duration'] }}</dt>
                                    <dd>{{ $delivery['local']['duration'] }}</dd>
                                </div>
                                <div>
                                    <dt>{{ $delivery['labels']['coverage'] }}</dt>
                                    <dd>{{ $delivery['local']['coverage'] }}</dd>
                                </div>
                            </dl>
                        </div>
                        <span class="delivery-round-arrow" aria-hidden="true">›</span>
                    </div>
                </article>

                <article class="delivery-group">
                    <div class="delivery-group-head">
                        <span class="delivery-ornament delivery-rosette delivery-ornament-small" aria-hidden="true"></span>
                        <div>
                            <h3>{{ $delivery['foreign']['title'] }}</h3>
                            <p>{{ $delivery['foreign']['scope'] }}</p>
                        </div>
                    </div>

                    <div class="delivery-service-grid">
                        @foreach ($delivery['foreign']['services'] as $service)
                            <div class="delivery-service">
                                <span class="delivery-map-line" aria-hidden="true"></span>
                                <div class="delivery-brand delivery-brand-{{ $service['key'] }}">
                                    @if ($service['key'] === 'dhl')
                                        <img src="{{ asset('images/home/delivery/dhl-express-logo.svg') }}" alt="DHL Express">
                                    @else
                                        <img src="{{ asset('images/home/delivery/uzpost-logo.jpg') }}" alt="" aria-hidden="true">
                                        <span>UZPOST</span>
                                    @endif
                                </div>
                                <p>{{ $service['description'] }}</p>
                                <div class="delivery-service-bottom">
                                    <dl>
                                        <div>
                                            <dt>{{ $delivery['labels']['duration'] }}</dt>
                                            <dd>{{ $service['duration'] }}</dd>
                                        </div>
                                    </dl>
                                    <div class="delivery-visual delivery-visual-{{ $service['key'] }}" aria-hidden="true">
                                        @if ($service['key'] === 'dhl')
                                            <span class="delivery-plane"></span>
                                        @else
                                            <span class="delivery-box"></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>

                <article class="delivery-note">
                    <span class="delivery-note-icon" aria-hidden="true">i</span>
                    <div>
                        <h3>{{ $delivery['payment']['title'] }}</h3>
                        <p>{{ $delivery['payment']['text'] }}</p>
                    </div>
                    <div class="delivery-note-badges">
                        @foreach ($delivery['payment']['badges'] as $badge)
                            <span><i aria-hidden="true"></i>{{ $badge }}</span>
                        @endforeach
                    </div>
                </article>

                <article class="delivery-address">
                    <span class="delivery-pin" aria-hidden="true"></span>
                    <span class="delivery-arch delivery-arch-address" aria-hidden="true"></span>
                    <div>
                        <h3>{{ $delivery['address']['title'] }}</h3>
                        <p>{{ $delivery['address']['text'] }}</p>
                    </div>
                </article>

                <div class="delivery-guarantees" aria-label="{{ $delivery['guarantee_label'] }}">
                    @foreach ($delivery['guarantees'] as $guarantee)
                        <span><i aria-hidden="true"></i>{{ $guarantee }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
