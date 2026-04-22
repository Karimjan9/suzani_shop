<section id="contact" class="section section-soft">
    <div class="container contact-grid">
        <div>
            <p class="section-label">{{ $contact['section_label'] }}</p>
            <h2 class="section-title">{{ $contact['section_title'] }}</h2>
            <p class="contact-copy">{{ $contact['section_copy'] }}</p>

            <div class="contact-methods">
                <article class="contact-method-card">
                    <span>{{ $contact['phone']['label'] }}</span>
                    @if (filled($contact['phone']['href']))
                        <a href="{{ $contact['phone']['href'] }}">{{ $contact['phone']['value'] }}</a>
                    @else
                        <p>{{ $contact['phone']['value'] }}</p>
                    @endif
                </article>
                <article class="contact-method-card">
                    <span>{{ $contact['telegram']['label'] }}</span>
                    @if (filled($contact['telegram']['href']))
                        <a href="{{ $contact['telegram']['href'] }}" target="_blank" rel="noreferrer">{{ $contact['telegram']['value'] }}</a>
                    @else
                        <p>{{ $contact['telegram']['value'] }}</p>
                    @endif
                </article>
                <article class="contact-method-card">
                    <span>{{ $contact['instagram']['label'] }}</span>
                    @if (filled($contact['instagram']['href']))
                        <a href="{{ $contact['instagram']['href'] }}" target="_blank" rel="noreferrer">{{ $contact['instagram']['value'] }}</a>
                    @else
                        <p>{{ $contact['instagram']['value'] }}</p>
                    @endif
                </article>
            </div>

            <div class="contact-card contact-address-card">
                <div>
                    <span>{{ $contact['address']['label'] }}</span>
                    <p>{{ $contact['address']['value'] }}</p>
                </div>
                <div>
                    <span>{{ $contact['hours']['label'] }}</span>
                    <p>{{ $contact['hours']['value'] }}</p>
                </div>
            </div>
        </div>

        <div class="contact-layout">
            <div class="contact-card contact-map-card">
                <div class="contact-card-head">
                    <div>
                        <span>{{ $contact['map']['label'] }}</span>
                        <p>{{ $contact['map']['title'] }}</p>
                    </div>
                </div>
                <div class="contact-map-frame">
                    <div class="contact-map-surface" aria-label="{{ $contact['map']['title'] }}">
                        <iframe
                            src="{{ $contact['map']['embed_url'] }}"
                            title="{{ $contact['map']['title'] }}"
                            class="contact-map-embed"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                        <span class="contact-map-pin" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="contact-map-details">
                    <span class="contact-map-chip">Google Maps</span>
                    <strong>{{ $contact['address']['value'] }}</strong>
                    <p>{{ $contact['map']['hint'] }}</p>
                    <div class="contact-map-actions">
                        <div class="contact-map-meta">
                            <span>Koordinata</span>
                            <span>{{ $contact['map']['coordinates'] }}</span>
                        </div>
                        <a href="{{ $contact['map']['link'] }}" target="_blank" rel="noreferrer" class="contact-map-link">
                            Katta xaritada ochish
                        </a>
                    </div>
                </div>
            </div>

            <form class="contact-card contact-form-card" data-contact-form>
                <div class="contact-card-head">
                    <div>
                        <span>{{ $contact['form']['label'] }}</span>
                        <p>{{ $contact['form']['title'] }}</p>
                    </div>
                </div>

                <div class="contact-form-grid">
                    <div class="contact-form-stack">
                        <label class="contact-field">
                            <span>{{ $contact['form']['name_label'] }}</span>
                            <input type="text" name="name" placeholder="{{ $contact['form']['name_placeholder'] }}">
                        </label>
                        <label class="contact-field">
                            <span>{{ $contact['form']['phone_label'] }}</span>
                            <input type="tel" name="phone" placeholder="{{ $contact['form']['phone_placeholder'] }}">
                        </label>
                        <label class="contact-field">
                            <span>{{ $contact['form']['social_label'] }}</span>
                            <input type="text" name="social" placeholder="{{ $contact['form']['social_placeholder'] }}">
                        </label>
                    </div>

                    <div class="contact-form-stack contact-form-stack-message">
                        <label class="contact-field contact-field-message">
                            <span>{{ $contact['form']['message_label'] }}</span>
                            <textarea name="message" rows="5" placeholder="{{ $contact['form']['message_placeholder'] }}"></textarea>
                        </label>

                        <div class="contact-form-actions">
                            <button type="submit" class="button button-primary">So'rov yuborish</button>
                            <p class="contact-form-note is-hidden" data-contact-note>{{ $contact['form']['success_note'] }}</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
