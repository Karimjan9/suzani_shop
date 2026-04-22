<section id="testimonials" class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="section-label">{{ $testimonials['label'] }}</p>
                <h2 class="section-title">{{ $testimonials['title'] }}</h2>
            </div>
        </div>

        <div class="testimonial-grid">
            @foreach ($testimonials['items'] as $testimonial)
                @php
                    $rating = max(1, min(5, (int) ($testimonial['rating'] ?? 5)));
                    $initials = collect(preg_split('/\s+/', trim((string) ($testimonial['name'] ?? 'Mijoz'))) ?: [])
                        ->filter()
                        ->map(fn (string $part): string => mb_strtoupper(mb_substr($part, 0, 1)))
                        ->take(2)
                        ->implode('');
                @endphp

                <article class="testimonial-card">
                    <div class="testimonial-card-top">
                        <div class="testimonial-stars" aria-label="{{ $rating }} yulduzli baho">
                            @for ($star = 1; $star <= 5; $star++)
                                <span class="testimonial-star{{ $star <= $rating ? ' is-filled' : '' }}" aria-hidden="true">★</span>
                            @endfor
                        </div>
                        <span class="testimonial-badge">{{ $testimonial['badge'] ?? 'Tasdiqlangan xarid' }}</span>
                    </div>

                    <div class="testimonial-frame">
                        <strong class="testimonial-headline">{{ $testimonial['headline'] ?? 'Mijoz sharhi' }}</strong>
                        <p class="testimonial-quote">"{{ $testimonial['quote'] }}"</p>
                    </div>

                    <div class="testimonial-user">
                        <span class="testimonial-avatar" aria-hidden="true">{{ $initials !== '' ? $initials : 'M' }}</span>
                        <div class="testimonial-user-copy">
                            <strong>{{ $testimonial['name'] }}</strong>
                            <span>{{ $testimonial['role'] }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
