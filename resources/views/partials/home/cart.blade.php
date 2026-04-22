<section id="cart" class="section section-soft">
    <div class="container">
        <div class="cart-shell">
            <div class="section-head cart-section-head">
                <div class="cart-section-copy">
                    <div class="cart-section-kicker">
                        <p class="section-label">Savatcha va buyurtma</p>
                        <span class="cart-section-chip">Bir joyda va qulay</span>
                    </div>
                    <h2 class="section-title">Bir nechta mahsulotni qo'shib, bitta umumiy buyurtma yuboring</h2>
                    <p class="cart-section-text">
                        Katalogdan tanlagan mahsulotlaringiz shu yerda tartibli jamlanadi. Savatcha va aloqa formasi bir joyda
                        bo'lgani uchun buyurtmani ortiqcha bosqichsiz yakunlaysiz.
                    </p>
                    <div class="cart-section-highlights">
                        <div class="cart-section-highlight">
                            <strong>Bir joyda</strong>
                            <span>Savatcha, summa va aloqa ma'lumotlari bitta blokda jamlanadi.</span>
                        </div>
                        <div class="cart-section-highlight">
                            <strong>Tez buyurtma</strong>
                            <span>Mahsulot qo'shib, darhol umumiy buyurtmaga o'tishingiz mumkin.</span>
                        </div>
                        <div class="cart-section-highlight">
                            <strong>Admin tasdig'i</strong>
                            <span>Buyurtma yuborilgach, telefon yoki Telegram orqali bog'laniladi.</span>
                        </div>
                    </div>
                </div>
                <div class="cart-head-note">
                    <span class="cart-note-chip">Qulay jarayon</span>
                    <strong>Buyurtma aniq va tartibli rasmiylashadi</strong>
                    <p>Buyurtma kelgach, admin uni ko'radi va siz bilan telefon yoki Telegram orqali aloqaga chiqadi.</p>
                    <div class="cart-note-points">
                        <span>Savatcha tayyorlanadi</span>
                        <span>Ma'lumot yuboriladi</span>
                        <span>Admin tasdiqlaydi</span>
                    </div>
                </div>
            </div>

            <div class="cart-layout">
                <article class="cart-card">
                    <div class="cart-card-head">
                        <div>
                            <p class="section-label">Savatcha</p>
                            <h3>Tanlangan mahsulotlar</h3>
                        </div>
                        <a href="#catalog" class="text-link">Yana mahsulot qo'shish</a>
                    </div>

                    <p class="cart-empty" data-cart-empty>
                        Hozircha savatcha bo'sh. Katalogdan mahsulot qo'shsangiz, ular shu yerda jamlanadi.
                    </p>

                    <div class="cart-items" data-cart-items></div>

                    <div class="cart-summary">
                        <div>
                            <span>Jami soni</span>
                            <strong data-cart-total-qty>0 ta</strong>
                        </div>
                        <div>
                            <span>Umumiy summa</span>
                            <strong data-cart-total-price>0 so'm</strong>
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
                            <p class="section-label">Umumiy buyurtma</p>
                            <h3>Admin bilan bog'lanish uchun ma'lumot qoldiring</h3>
                            <p class="order-form-intro">
                                Mahsulotlar, rang va yetkazib berish tafsilotlarini yozing. Admin siz bilan bog'lanib, buyurtmani tez va
                                aniq tasdiqlaydi.
                            </p>
                        </div>
                    </div>

                    <div class="contact-form-grid">
                        <label class="contact-field">
                            <span>Ismingiz</span>
                            <input type="text" name="customer_name" placeholder="Ismingizni kiriting" required>
                        </label>
                        <label class="contact-field">
                            <span>Telefon</span>
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
                            <span>Manzil</span>
                            <input type="text" name="address" placeholder="Shahar yoki yetkazib berish manzili">
                        </label>
                        <label class="contact-field contact-field-full">
                            <span>Izoh</span>
                            <textarea name="notes" rows="5" placeholder="Rang, o'lcham yoki qo'shimcha istaklaringizni yozing"></textarea>
                        </label>
                    </div>

                    <div class="order-form-actions">
                        <button type="submit" class="button button-primary" data-order-submit disabled>
                            Umumiy buyurtma berish
                        </button>

                        <p class="form-note form-note-muted">
                            Buyurtma yuborilgach, admin mahsulotlar bo'yicha siz bilan aloqaga chiqadi va tafsilotlarni tasdiqlaydi.
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
                <p class="section-label light">Buyurtma qanday ishlaydi</p>
                <h2 class="section-title light">Oddiy, tushunarli va qulay jarayon</h2>
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
