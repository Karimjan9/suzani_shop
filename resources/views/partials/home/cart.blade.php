<section id="cart" class="section section-soft">
    <div class="container">
        <div class="cart-shell">
            <div class="section-head cart-section-head">
                <div class="cart-section-copy">
                    <div class="cart-section-kicker">
                        <p class="section-label">{{ __('home.ui.cart.section_label') }}</p>
                        <span class="cart-section-chip">{{ __('home.ui.cart.section_chip') }}</span>
                    </div>
                    <h2 class="section-title">{{ __('home.ui.cart.title') }}</h2>
                    <p class="cart-section-text">
                        {{ __('home.ui.cart.copy') }}
                    </p>
                    <div class="cart-section-highlights">
                        <div class="cart-section-highlight">
                            <strong>{{ __('home.ui.cart.highlight_one_title') }}</strong>
                            <span>{{ __('home.ui.cart.highlight_one_text') }}</span>
                        </div>
                        <div class="cart-section-highlight">
                            <strong>{{ __('home.ui.cart.highlight_two_title') }}</strong>
                            <span>{{ __('home.ui.cart.highlight_two_text') }}</span>
                        </div>
                        <div class="cart-section-highlight">
                            <strong>{{ __('home.ui.cart.highlight_three_title') }}</strong>
                            <span>{{ __('home.ui.cart.highlight_three_text') }}</span>
                        </div>
                    </div>
                </div>
                <div class="cart-head-note">
                    <span class="cart-note-chip">{{ __('home.ui.cart.note_chip') }}</span>
                    <strong>{{ __('home.ui.cart.note_title') }}</strong>
                    <p>{{ __('home.ui.cart.note_text') }}</p>
                    <div class="cart-note-points">
                        <span>{{ __('home.ui.cart.note_point_one') }}</span>
                        <span>{{ __('home.ui.cart.note_point_two') }}</span>
                        <span>{{ __('home.ui.cart.note_point_three') }}</span>
                    </div>
                </div>
            </div>

            <div class="cart-layout">
                <article class="cart-card">
                    <div class="cart-card-head">
                        <div>
                            <p class="section-label">{{ __('home.ui.cart.cart_label') }}</p>
                            <h3>{{ __('home.ui.cart.selected_products') }}</h3>
                        </div>
                        <a href="#catalog" class="text-link">{{ __('home.ui.cart.add_more') }}</a>
                    </div>

                    <p class="cart-empty" data-cart-empty>
                        {{ __('home.ui.cart.empty') }}
                    </p>

                    <div class="cart-items" data-cart-items></div>

                    <div class="cart-summary">
                        <div>
                            <span>{{ __('home.ui.cart.total_quantity') }}</span>
                            <strong data-cart-total-qty>{{ __('home.ui.cart.quantity_value', ['count' => 0]) }}</strong>
                        </div>
                        <div>
                            <span>{{ __('home.ui.cart.total_price') }}</span>
                            <strong data-cart-total-price>0 {{ __('home.ui.money.currency') }}</strong>
                        </div>
                    </div>
                </article>

                <form
                    class="cart-card order-form-card"
                    action="{{ $cart['order_action'] }}"
                    method="POST"
                    data-order-form
                >
                    @csrf
                    <div class="cart-card-head order-form-card-head">
                        <div>
                            <p class="section-label">{{ __('home.ui.cart.order_label') }}</p>
                            <h3>{{ __('home.ui.cart.order_title') }}</h3>
                            <p class="order-form-intro">
                                {{ __('home.ui.cart.order_intro') }}
                            </p>
                        </div>
                    </div>

                    <div class="contact-form-grid">
                        <label class="contact-field">
                            <span>{{ __('home.ui.cart.name') }}</span>
                            <input type="text" name="customer_name" placeholder="{{ __('home.ui.cart.name_placeholder') }}" required>
                        </label>
                        <label class="contact-field">
                            <span>{{ __('home.ui.cart.phone') }}</span>
                            <input type="tel" name="phone" placeholder="91 310 32 98" required>
                        </label>
                        <label class="contact-field">
                            <span>Telegram</span>
                            <input type="text" name="telegram" placeholder="@username">
                        </label>
                        <label class="contact-field">
                            <span>Instagram</span>
                            <input type="text" name="instagram" placeholder="@profil">
                        </label>
                        <label class="contact-field contact-field-full">
                            <span>{{ __('home.ui.cart.address') }}</span>
                            <input type="text" name="address" placeholder="{{ __('home.ui.cart.address_placeholder') }}">
                        </label>
                        <label class="contact-field contact-field-full">
                            <span>{{ __('home.ui.cart.notes') }}</span>
                            <textarea name="notes" rows="5" placeholder="{{ __('home.ui.cart.notes_placeholder') }}"></textarea>
                        </label>
                    </div>

                    <div class="order-form-actions">
                        <button type="submit" class="button button-primary" data-order-submit disabled>
                            {{ __('home.ui.cart.submit') }}
                        </button>

                        <p class="form-note form-note-muted">
                            {{ __('home.ui.cart.form_note') }}
                        </p>
                        <p class="form-note form-note-error is-hidden" data-order-error></p>
                        <p class="form-note form-note-success is-hidden" data-order-success></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="section section-deep">
    <div class="container">
        <div class="section-head split-light">
            <div>
                <p class="section-label light">{{ __('home.ui.cart.process_label') }}</p>
                <h2 class="section-title light">{{ __('home.ui.cart.process_title') }}</h2>
            </div>
        </div>

        <div class="steps-grid">
            @foreach ($cart['steps'] as $step)
                <article class="step-card">
                    <span>{{ $step['number'] }}</span>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
