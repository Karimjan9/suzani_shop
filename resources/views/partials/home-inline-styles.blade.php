<style>
    :root {
        --bg: #f5efe6;
        --surface: rgba(255, 251, 245, 0.82);
        --surface-strong: #fffaf4;
        --text: #221815;
        --muted: #6e5c50;
        --line: rgba(71, 47, 34, 0.12);
        --primary: #7a4a30;
        --primary-deep: #3b2418;
        --gold: #b78a52;
        --shadow: 0 24px 70px rgba(40, 22, 14, 0.08);
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html {
        scroll-behavior: smooth;
    }

    body.site-shell {
        min-height: 100vh;
        color: var(--text);
        font-family: 'Outfit', ui-sans-serif, system-ui, sans-serif;
        background:
            radial-gradient(circle at top left, rgba(183, 138, 82, 0.18), transparent 28%),
            radial-gradient(circle at 85% 12%, rgba(122, 74, 48, 0.12), transparent 18%),
            linear-gradient(180deg, #f2eadf 0%, #f6f0e8 42%, #fdf9f4 100%);
    }

    body.site-shell::before {
        position: fixed;
        inset: 0;
        pointer-events: none;
        content: '';
        background-image:
            linear-gradient(rgba(114, 62, 38, 0.025) 1px, transparent 1px),
            linear-gradient(90deg, rgba(114, 62, 38, 0.025) 1px, transparent 1px);
        background-size: 24px 24px;
        mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.85), transparent 90%);
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    .container {
        width: min(1160px, calc(100% - 2rem));
        margin-inline: auto;
    }

    .hero-section {
        position: relative;
        overflow: hidden;
        padding: 0.75rem 0 4rem;
    }

    .hero-noise {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.55), transparent 24%),
            radial-gradient(circle at 80% 10%, rgba(183, 138, 82, 0.12), transparent 20%);
        opacity: 0.85;
    }

    .topbar {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.35rem;
        padding: 0.85rem 1.15rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(255, 253, 248, 0.96) 0%, rgba(245, 237, 227, 0.92) 100%);
        backdrop-filter: blur(18px);
        box-shadow: 0 20px 48px rgba(58, 34, 21, 0.08), inset 0 1px 0 rgba(255, 255, 255, 0.88);
    }

    .topbar::after {
        position: absolute;
        inset: 0;
        border-radius: inherit;
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.7);
        pointer-events: none;
        content: '';
    }

    .brand-mark {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        min-width: max-content;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .brand-logo-wrap {
        display: inline-grid;
        place-items: center;
        width: 3rem;
        height: 3rem;
        overflow: hidden;
        padding: 0.16rem;
        border: 1px solid rgba(122, 74, 48, 0.14);
        border-radius: 0.95rem;
        background: rgba(255, 251, 245, 0.78);
        box-shadow:
            0 12px 24px rgba(58, 34, 21, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.72);
    }

    .brand-logo {
        width: 100%;
        height: 100%;
        border-radius: 0.72rem;
        display: block;
        object-fit: contain;
    }

    .topbar-links {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        color: var(--muted);
        flex: 1;
        justify-content: flex-end;
    }

    .topbar-links a,
    .text-link,
    .product-foot a,
    .category-card a,
    .contact-card a {
        transition: color 180ms ease, transform 180ms ease;
    }

    .topbar-links a {
        display: inline-flex;
        align-items: center;
        min-height: 2.8rem;
        padding: 0 0.2rem;
        border-radius: 999px;
    }

    .cart-link {
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
    }

    .topbar-admin-link {
        white-space: nowrap;
    }

    .language-switcher {
        position: relative;
        display: inline-grid;
        grid-template-columns: repeat(3, minmax(2.35rem, 1fr));
        align-items: center;
        gap: 0.22rem;
        min-height: 2.8rem;
        padding: 0.24rem;
        border: 1px solid rgba(122, 74, 48, 0.16);
        border-radius: 999px;
        background:
            linear-gradient(135deg, rgba(255, 252, 246, 0.92), rgba(245, 232, 217, 0.72)),
            radial-gradient(circle at 18% 18%, rgba(216, 161, 77, 0.22), transparent 34%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.92),
            0 12px 30px rgba(58, 34, 21, 0.08);
        overflow: hidden;
    }

    .language-switcher::before {
        position: absolute;
        inset: 0.2rem;
        width: calc((100% - 0.4rem) / 3);
        border-radius: 999px;
        background: linear-gradient(135deg, #7a4a30 0%, #a33f2f 48%, #d8a14d 100%);
        box-shadow:
            0 10px 24px rgba(122, 74, 48, 0.26),
            inset 0 1px 0 rgba(255, 255, 255, 0.28);
        content: '';
        transition: transform 260ms cubic-bezier(0.22, 1, 0.36, 1), background 220ms ease;
    }

    .language-switcher:has(.language-option:nth-child(2).is-active)::before {
        transform: translateX(100%);
    }

    .language-switcher:has(.language-option:nth-child(3).is-active)::before {
        transform: translateX(200%);
    }

    .language-option {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.35rem;
        min-height: 2.28rem;
        border-radius: 999px;
        color: var(--muted);
        font-size: 0.74rem;
        font-weight: 850;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        transition: color 180ms ease, transform 180ms ease;
    }

    .language-option:hover,
    .language-option:focus-visible {
        color: var(--primary-deep);
        transform: translateY(-1px);
    }

    .language-option.is-active {
        color: #fffaf3;
    }

    .language-option:focus-visible {
        outline: 0;
        box-shadow: 0 0 0 3px rgba(216, 161, 77, 0.28);
    }

    .cart-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 1.75rem;
        height: 1.75rem;
        padding: 0 0.45rem;
        border-radius: 999px;
        background: var(--primary);
        color: #fff7f2;
        font-size: 0.78rem;
        font-weight: 800;
        line-height: 1;
    }

    .topbar-links a:hover,
    .text-link:hover,
    .product-foot a:hover,
    .category-card a:hover,
    .contact-card a:hover {
        color: var(--primary);
    }

    .hero-grid {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 0.88fr) minmax(36rem, 1.18fr);
        gap: clamp(2rem, 3vw, 3.75rem);
        align-items: stretch;
        padding-top: 1.35rem;
    }

    .hero-grid.container {
        width: min(1320px, calc(100% - 2rem), calc(100% - var(--ribbon-safe-inset) - var(--ribbon-safe-inset)));
    }

    .hero-copy {
        display: flex;
        flex-direction: column;
        min-width: 0;
        max-width: 100%;
        min-height: 100%;
        padding-block: clamp(0.5rem, 1.8vw, 1.4rem) 0.35rem;
    }

    .eyebrow,
    .section-label {
        margin-bottom: 0.9rem;
        color: var(--primary);
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .hero-copy h1,
    .section-title {
        font-family: 'Playfair Display', Georgia, serif;
        line-height: 0.98;
        letter-spacing: -0.03em;
    }

    .hero-copy h1 {
        max-width: min(8.4ch, 100%);
        font-size: clamp(3.2rem, 5.25vw, 5.9rem);
        letter-spacing: 0;
    }

    .hero-text,
    .about-card p,
    .product-card p,
    .step-card p,
    .testimonial-card p,
    .contact-copy,
    .hero-card p {
        color: var(--muted);
        line-height: 1.75;
    }

    .hero-text {
        max-width: 34rem;
        margin-top: 1.4rem;
        font-size: 1.08rem;
    }

    .hero-trust-note {
        max-width: 34rem;
        margin-top: 1.2rem;
        color: var(--muted);
        line-height: 1.8;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 2rem;
    }

    .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.95rem 1.35rem;
        border-radius: 999px;
        font-weight: 600;
        transition:
            transform 180ms ease,
            box-shadow 180ms ease,
            background-color 180ms ease;
    }

    .button:hover {
        transform: translateY(-2px);
    }

    .button-primary {
        color: #fff7f2;
        background: linear-gradient(135deg, #3b2418 0%, var(--primary) 100%);
        box-shadow: 0 16px 32px rgba(59, 36, 24, 0.16);
    }

    .button-secondary {
        border: 1px solid rgba(71, 47, 34, 0.14);
        background: rgba(255, 251, 245, 0.92);
    }

    .button-compact {
        padding: 0.8rem 1rem;
        font-size: 0.92rem;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
        margin-top: auto;
        padding-top: 2rem;
    }

    .hero-stats div {
        padding: 1.15rem 1.2rem;
        border: 1px solid var(--line);
        border-radius: 1.5rem;
        background: rgba(255, 251, 246, 0.74);
        box-shadow: var(--shadow);
    }

    .hero-stats strong {
        display: block;
        font-size: 1.6rem;
        font-weight: 800;
    }

    .hero-stats span {
        color: var(--muted);
        font-size: 0.95rem;
    }

    .hero-art {
        position: relative;
        display: flex;
        align-self: stretch;
        min-height: 100%;
        padding: 0.25rem 0 0;
    }

    .hero-art::before,
    .hero-art::after {
        position: absolute;
        pointer-events: none;
        content: '';
    }

    .hero-art::before {
        inset: 1rem 0.85rem 1rem -0.65rem;
        z-index: 0;
        border-radius: 3.25rem;
        background:
            radial-gradient(circle at 18% 22%, rgba(244, 219, 173, 0.54), transparent 34%),
            radial-gradient(circle at 80% 20%, rgba(154, 96, 66, 0.24), transparent 24%),
            radial-gradient(circle at 72% 78%, rgba(89, 122, 110, 0.16), transparent 26%);
        filter: blur(28px);
        opacity: 0.88;
    }

    .hero-art::after {
        inset: 0;
        z-index: 0;
        border: 1px solid rgba(183, 138, 82, 0.16);
        border-radius: 3rem;
        background: linear-gradient(135deg, rgba(255, 251, 246, 0.58) 0%, rgba(242, 230, 214, 0.32) 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.46),
            0 28px 68px rgba(49, 27, 17, 0.12);
    }

    .hero-visual-stage {
        position: relative;
        z-index: 1;
        display: grid;
        flex: 1;
        grid-template-columns: minmax(0, 1fr) 16rem;
        gap: 1.15rem;
        align-items: stretch;
        min-height: 46rem;
        height: 100%;
        padding: 1.15rem;
        border: 1px solid rgba(183, 138, 82, 0.18);
        border-radius: 2.8rem;
        background:
            radial-gradient(circle at top left, rgba(255, 248, 237, 0.78), transparent 28%),
            linear-gradient(135deg, rgba(255, 251, 245, 0.82) 0%, rgba(244, 233, 219, 0.48) 100%);
        box-shadow:
            0 28px 72px rgba(49, 27, 17, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.54);
        backdrop-filter: blur(14px);
    }

    .hero-visual-stage::before {
        position: absolute;
        inset: 0.8rem;
        z-index: 0;
        border: 1px solid rgba(183, 138, 82, 0.12);
        border-radius: calc(2.8rem - 0.8rem);
        background:
            radial-gradient(circle at 14% 16%, rgba(255, 255, 255, 0.3), transparent 16%),
            repeating-linear-gradient(90deg, transparent 0 42px, rgba(183, 138, 82, 0.045) 42px 43px),
            repeating-linear-gradient(180deg, transparent 0 42px, rgba(183, 138, 82, 0.045) 42px 43px);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.32);
        content: '';
    }

    .hero-visual-stage > * {
        position: relative;
        z-index: 1;
    }

    .hero-visual-main,
    .hero-visual-detail {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        border: 1px solid rgba(255, 251, 245, 0.68);
        border-radius: 2.2rem;
        box-shadow:
            0 24px 58px rgba(36, 20, 13, 0.16),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .hero-visual-main {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.75rem;
        background: linear-gradient(135deg, #efe2d1 0%, #d7b996 43%, #866148 100%);
    }

    .hero-visual-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.08);
        transition: transform 420ms ease;
    }

    .hero-visual-image-main {
        object-position: center;
    }

    .hero-visual-image-detail {
        object-position: center;
    }

    .hero-visual-image-material {
        object-position: center;
    }

    .hero-visual-main::before,
    .hero-visual-detail::before {
        position: absolute;
        inset: 0;
        content: '';
    }

    .hero-visual-main::before {
        z-index: 0;
        background:
            linear-gradient(180deg, rgba(20, 15, 11, 0.08) 0%, rgba(20, 15, 11, 0.44) 100%),
            radial-gradient(circle at 16% 14%, rgba(255, 244, 230, 0.72), transparent 24%),
            linear-gradient(140deg, rgba(115, 69, 42, 0.06), rgba(41, 25, 18, 0.38));
    }

    .hero-visual-main::after {
        position: absolute;
        inset: 0.95rem 1rem 1.05rem;
        z-index: 1;
        border-radius: 1.75rem;
        border: 1px solid rgba(255, 248, 239, 0.38);
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.18), transparent 24%),
            radial-gradient(circle at 30% 30%, rgba(255, 248, 239, 0.24), transparent 20%),
            repeating-linear-gradient(90deg, transparent 0 36px, rgba(255, 243, 229, 0.06) 36px 37px),
            repeating-linear-gradient(180deg, transparent 0 36px, rgba(255, 243, 229, 0.06) 36px 37px),
            linear-gradient(145deg, rgba(115, 69, 42, 0.2), rgba(41, 25, 18, 0.52));
        box-shadow:
            inset 0 0 0 1px rgba(255, 248, 239, 0.16),
            inset 0 0 0 12px rgba(255, 248, 239, 0.03);
        content: '';
    }

    .hero-visual-label,
    .hero-visual-caption,
    .hero-visual-detail span,
    .hero-visual-detail strong {
        position: relative;
        z-index: 2;
    }

    .hero-visual-label {
        display: grid;
        isolation: isolate;
        justify-items: flex-start;
        gap: 0.72rem;
        box-sizing: border-box;
        width: min(25rem, 100%);
        max-width: 100%;
        min-width: 0;
        padding: 1.15rem 1.2rem;
        border: 1px solid rgba(255, 244, 229, 0.74);
        border-radius: 1.8rem;
        background:
            linear-gradient(135deg, rgba(255, 252, 247, 0.95) 0%, rgba(244, 233, 219, 0.9) 100%),
            repeating-linear-gradient(90deg, transparent 0 18px, rgba(183, 138, 82, 0.06) 18px 19px),
            repeating-linear-gradient(180deg, transparent 0 18px, rgba(183, 138, 82, 0.06) 18px 19px);
        box-shadow:
            0 20px 40px rgba(31, 17, 11, 0.16),
            inset 0 1px 0 rgba(255, 255, 255, 0.72),
            inset 0 0 0 1px rgba(183, 138, 82, 0.08),
            inset 0 0 0 12px rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(14px);
    }

    .hero-visual-label span,
    .hero-visual-detail span {
        display: inline-flex;
        width: fit-content;
        padding: 0.42rem 0.76rem;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(122, 74, 48, 0.88);
        color: #fff7f0;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        box-shadow: 0 10px 20px rgba(40, 22, 15, 0.14);
    }

    .hero-visual-label strong {
        display: block;
        max-width: 100%;
        margin-top: 0;
        color: #241712;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2rem, 2.55vw, 2.8rem);
        line-height: 1.03;
        letter-spacing: 0;
        overflow-wrap: normal;
        text-wrap: pretty;
    }

    .hero-visual-caption {
        max-width: 18rem;
        isolation: isolate;
        padding: 1.05rem 1.15rem;
        border-radius: 1.7rem;
        border: 1px solid rgba(255, 244, 229, 0.7);
        background:
            linear-gradient(135deg, rgba(255, 252, 246, 0.88) 0%, rgba(242, 230, 214, 0.82) 100%),
            repeating-linear-gradient(90deg, transparent 0 18px, rgba(183, 138, 82, 0.05) 18px 19px),
            repeating-linear-gradient(180deg, transparent 0 18px, rgba(183, 138, 82, 0.05) 18px 19px);
        color: #4a3529;
        font-size: 0.98rem;
        font-weight: 600;
        line-height: 1.7;
        box-shadow:
            0 18px 34px rgba(32, 18, 12, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.7),
            inset 0 0 0 1px rgba(183, 138, 82, 0.06),
            inset 0 0 0 10px rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(14px);
    }

    .hero-visual-stack {
        display: grid;
        gap: 1.15rem;
    }

    .hero-visual-detail {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
        gap: 0.55rem;
        min-height: 0;
        padding: 1.35rem;
        background: linear-gradient(145deg, #d2b08b 0%, #8e684f 100%);
    }

    .hero-visual-detail::before {
        z-index: 0;
        background:
            linear-gradient(180deg, rgba(17, 13, 10, 0.1) 0%, rgba(17, 13, 10, 0.58) 100%),
            radial-gradient(circle at 18% 18%, rgba(255, 243, 228, 0.36), transparent 25%);
    }

    .hero-visual-detail::after {
        position: absolute;
        inset: 0.82rem;
        z-index: 1;
        border: 1px solid rgba(255, 248, 239, 0.34);
        border-radius: 1.45rem;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.14), transparent 26%),
            repeating-linear-gradient(90deg, transparent 0 26px, rgba(255, 243, 229, 0.07) 26px 27px),
            repeating-linear-gradient(180deg, transparent 0 26px, rgba(255, 243, 229, 0.07) 26px 27px);
        box-shadow: inset 0 0 0 1px rgba(255, 248, 239, 0.12);
        content: '';
    }

    .hero-visual-detail strong {
        display: block;
        isolation: isolate;
        box-sizing: border-box;
        width: 100%;
        max-width: 100%;
        margin-top: 0;
        padding: 0.82rem 0.94rem;
        border: 1px solid rgba(255, 244, 229, 0.72);
        border-radius: 1.15rem;
        background:
            linear-gradient(135deg, rgba(255, 252, 247, 0.94) 0%, rgba(244, 233, 220, 0.88) 100%),
            repeating-linear-gradient(90deg, transparent 0 14px, rgba(183, 138, 82, 0.05) 14px 15px),
            repeating-linear-gradient(180deg, transparent 0 14px, rgba(183, 138, 82, 0.05) 14px 15px);
        color: #241712;
        font-size: 1.34rem;
        line-height: 1.18;
        text-wrap: balance;
        box-shadow:
            0 14px 28px rgba(33, 18, 11, 0.14),
            inset 0 1px 0 rgba(255, 255, 255, 0.72),
            inset 0 0 0 1px rgba(183, 138, 82, 0.06),
            inset 0 0 0 10px rgba(255, 255, 255, 0.1);
    }

    .hero-visual-detail-top {
        min-height: 17rem;
    }

    .hero-visual-detail-bottom {
        min-height: 14rem;
    }

    .hero-visual-main:hover .hero-visual-image,
    .hero-visual-detail:hover .hero-visual-image {
        transform: scale(1.12);
    }

    .card-label,
    .mini-badge,
    .pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: fit-content;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .card-label,
    .pill {
        padding: 0.45rem 0.8rem;
        background: rgba(163, 63, 47, 0.1);
        color: var(--primary);
    }

    .mini-badge {
        padding: 0.35rem 0.7rem;
        background: rgba(255, 255, 255, 0.12);
        color: #ffe8c9;
    }

    .hero-feature-bar {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
        margin-top: 2.2rem;
    }

    .hero-feature {
        padding: 1.25rem 1.35rem;
        border: 1px solid var(--line);
        border-radius: 1.5rem;
        background: rgba(255, 251, 246, 0.82);
        box-shadow: var(--shadow);
    }

    .hero-feature strong {
        display: block;
        margin-bottom: 0.45rem;
        font-size: 1rem;
        font-weight: 700;
    }

    .hero-feature p {
        color: var(--muted);
        line-height: 1.7;
    }

    .hero-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(10px);
    }

    .orb-one {
        top: 0;
        left: 10%;
        width: 13rem;
        height: 13rem;
        background: radial-gradient(circle, rgba(216, 161, 77, 0.56), transparent 70%);
        animation: drift 10s ease-in-out infinite;
    }

    .orb-two {
        right: -1rem;
        bottom: 1rem;
        width: 16rem;
        height: 16rem;
        background: radial-gradient(circle, rgba(163, 63, 47, 0.2), transparent 72%);
        animation: drift 12s ease-in-out infinite reverse;
    }

    .section {
        padding: 5.5rem 0;
    }

    .section-soft {
        background: linear-gradient(180deg, rgba(255, 249, 240, 0.7), rgba(252, 245, 236, 0.92));
    }

    .section-deep {
        color: #fff6ee;
        background:
            radial-gradient(circle at top right, rgba(216, 161, 77, 0.18), transparent 24%),
            linear-gradient(135deg, #4a130e 0%, #70271e 50%, #2f5a58 100%);
    }

    .section-head,
    .about-grid,
    .contact-grid {
        display: grid;
        gap: 1.5rem;
        align-items: start;
    }

    .section-head {
        grid-template-columns: 1fr auto;
        margin-bottom: 2rem;
    }

    .text-link {
        align-self: end;
        font-weight: 600;
        color: var(--muted);
    }

    .section-action-link {
        position: relative;
        isolation: isolate;
        justify-self: end;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.78rem;
        max-width: 100%;
        min-height: 3.35rem;
        padding: 0.92rem 1.25rem;
        border: 1px solid rgba(122, 74, 48, 0.16);
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(255, 253, 248, 0.98) 0%, rgba(245, 236, 224, 0.94) 100%);
        color: var(--primary-deep);
        font-weight: 800;
        line-height: 1.2;
        text-align: center;
        box-shadow:
            0 18px 34px rgba(59, 36, 24, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(14px);
        transition:
            transform 220ms ease,
            box-shadow 220ms ease,
            border-color 220ms ease,
            color 220ms ease,
            background-color 220ms ease;
    }

    .section-action-link::before,
    .section-action-link::after {
        position: relative;
        z-index: 1;
    }

    .section-action-link::before {
        position: absolute;
        top: -18%;
        left: -30%;
        width: 32%;
        height: 136%;
        background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.08) 18%, rgba(255, 255, 255, 0.72) 50%, rgba(255, 255, 255, 0.08) 82%, transparent 100%);
        transform: translateX(-220%) skewX(-22deg);
        opacity: 0;
        pointer-events: none;
        content: '';
    }

    .section-action-link::after {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: 999px;
        flex: 0 0 auto;
        background: rgba(122, 74, 48, 0.1);
        color: var(--primary);
        font-size: 1rem;
        font-weight: 800;
        line-height: 1;
        content: '\2192';
        transition:
            transform 220ms ease,
            background-color 220ms ease,
            color 220ms ease,
            box-shadow 220ms ease;
    }

    .section-action-link:hover,
    .section-action-link:focus-visible {
        color: var(--primary);
        border-color: rgba(122, 74, 48, 0.28);
        transform: translateY(-3px);
        box-shadow:
            0 22px 38px rgba(59, 36, 24, 0.14),
            0 0 0 4px rgba(183, 138, 82, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.92);
    }

    .section-action-link:hover::before,
    .section-action-link:focus-visible::before {
        opacity: 1;
        animation: section-action-sheen 780ms ease;
    }

    .section-action-link:hover::after,
    .section-action-link:focus-visible::after {
        transform: translateX(3px) scale(1.06);
        background: linear-gradient(135deg, var(--primary-deep) 0%, var(--primary) 100%);
        color: #fff8f2;
        box-shadow: 0 10px 20px rgba(59, 36, 24, 0.2);
    }

    .section-action-link:focus-visible {
        outline: none;
    }

    .section-action-link:active {
        transform: translateY(-1px) scale(0.985);
    }

    .section-title {
        max-width: 14ch;
        font-size: clamp(2rem, 4vw, 3.65rem);
    }

    .about-hero {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(0, 0.9fr);
        gap: 1.5rem;
        align-items: end;
        margin-bottom: 1.6rem;
    }

    .about-lead {
        max-width: 42rem;
        margin-top: 1rem;
        color: var(--muted);
        line-height: 1.8;
    }

    .about-stat-row {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
    }

    .about-stat-card {
        padding: 1.25rem 1rem;
        border: 1px solid var(--line);
        border-radius: 1.4rem;
        background: rgba(255, 251, 245, 0.82);
        box-shadow: var(--shadow);
        text-align: center;
    }

    .about-stat-card strong {
        display: block;
        font-size: 1.5rem;
        font-weight: 800;
    }

    .about-stat-card span {
        color: var(--muted);
        font-size: 0.92rem;
    }

    .about-grid {
        grid-template-columns: 1fr 1fr;
    }

    .about-story-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.25rem;
        margin-bottom: 1.25rem;
    }

    .about-card,
    .contact-card,
    .product-card,
    .step-card,
    .testimonial-card,
    .category-card {
        border: 1px solid var(--line);
        border-radius: 1.8rem;
        background: var(--surface);
        box-shadow: var(--shadow);
        backdrop-filter: blur(8px);
    }

    .about-card {
        padding: 1.8rem;
    }

    .about-gallery-grid {
        align-items: stretch;
        margin-bottom: 1.25rem;
    }

    .about-gallery-grid > * {
        min-height: 100%;
    }

    .about-gallery-card,
    .about-gallery-note {
        display: grid;
        gap: 1.2rem;
        height: 100%;
    }

    .about-gallery-card {
        grid-template-rows: auto 1fr;
    }

    .about-gallery-note {
        grid-template-rows: auto auto auto 1fr;
    }

    .about-gallery-head {
        grid-template-columns: 1fr;
        gap: 0.9rem;
        align-items: start;
        margin-bottom: 0;
    }

    .about-gallery-head h3,
    .about-gallery-note h3 {
        width: 100%;
        max-width: none;
        font-size: 1.7rem;
        font-weight: 700;
        line-height: 1.28;
        text-wrap: normal;
    }

    .about-gallery-caption {
        align-self: start;
        justify-self: start;
        padding: 0.5rem 0.85rem;
        border-radius: 999px;
        background: rgba(163, 63, 47, 0.08);
        color: var(--primary);
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .about-showcase-gallery {
        display: grid;
        min-height: 100%;
        margin-bottom: 0;
    }

    .about-gallery-stage {
        min-height: 21rem;
        height: 100%;
    }

    .about-gallery-points {
        display: grid;
        gap: 0.9rem;
        align-content: start;
    }

    .about-gallery-points div {
        display: grid;
        gap: 0.25rem;
        padding: 1rem 1.05rem;
        border: 1px solid rgba(122, 74, 48, 0.1);
        border-radius: 1.15rem;
        background: rgba(255, 251, 245, 0.72);
    }

    .about-gallery-points strong {
        font-size: 1rem;
        font-weight: 700;
    }

    .about-gallery-points span {
        color: var(--muted);
        line-height: 1.65;
    }

    .about-card p + p {
        margin-top: 1rem;
    }

    .about-story-card h3,
    .about-process-card h3,
    .about-why-card h3 {
        margin-bottom: 0.85rem;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .about-deep-grid {
        align-items: stretch;
    }

    .about-process-card,
    .about-why-card {
        padding: 1.8rem;
    }

    .craft-process-list {
        display: grid;
        gap: 1rem;
        margin-top: 1rem;
    }

    .craft-process-item {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 0.95rem;
        align-items: start;
        padding-bottom: 1rem;
        border-bottom: 1px dashed rgba(82, 43, 23, 0.14);
    }

    .craft-process-item:last-child {
        padding-bottom: 0;
        border-bottom: 0;
    }

    .craft-process-item span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.4rem;
        height: 2.4rem;
        border-radius: 999px;
        background: rgba(163, 63, 47, 0.1);
        color: var(--primary);
        font-weight: 800;
    }

    .craft-process-item strong {
        display: block;
        margin-bottom: 0.3rem;
        font-size: 1rem;
    }

    .craft-process-item p,
    .why-choose-list li {
        color: var(--muted);
        line-height: 1.7;
    }

    .why-choose-list {
        display: grid;
        gap: 0.85rem;
        margin-top: 1rem;
    }

    .why-choose-list li {
        position: relative;
        padding-left: 1.35rem;
    }

    .why-choose-list li::before {
        position: absolute;
        left: 0;
        top: 0.5rem;
        width: 0.55rem;
        height: 0.55rem;
        border-radius: 999px;
        background: var(--gold);
        content: '';
        box-shadow: 0 0 0 4px rgba(216, 161, 77, 0.16);
    }

    .product-grid,
    .catalog-grid,
    .portfolio-grid,
    .category-grid,
    .steps-grid,
    .testimonial-grid {
        display: grid;
        gap: 1.25rem;
    }

    .product-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    #products .container,
    #catalog .container {
        width: min(1240px, calc(100% - 2rem));
    }

    .portfolio-intro {
        max-width: 42rem;
        margin-bottom: 1.4rem;
        color: var(--muted);
        line-height: 1.8;
    }

    .portfolio-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .portfolio-card {
        overflow: hidden;
        border: 1px solid var(--line);
        border-radius: 1.8rem;
        background: rgba(255, 250, 243, 0.78);
        box-shadow: var(--shadow);
        transition:
            transform 180ms ease,
            border-color 180ms ease;
    }

    .portfolio-card:hover {
        transform: translateY(-4px);
        border-color: rgba(163, 63, 47, 0.22);
    }

    .portfolio-visual {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 15rem;
        padding: 1.3rem;
        color: #fff8f0;
    }

    .portfolio-visual::before {
        position: absolute;
        inset: 0;
        z-index: 1;
        background:
            linear-gradient(180deg, rgba(25, 14, 9, 0.04) 0%, rgba(25, 14, 9, 0.12) 34%, rgba(25, 14, 9, 0.7) 100%),
            linear-gradient(135deg, rgba(255, 241, 230, 0.18), rgba(0, 0, 0, 0));
        content: '';
    }

    .portfolio-visual-copy {
        position: relative;
        z-index: 2;
        display: flex;
        flex: 1;
        flex-direction: column;
        justify-content: space-between;
        gap: 1.2rem;
    }

    .portfolio-visual-image {
        position: absolute;
        inset: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 260ms ease;
    }

    .portfolio-card:hover .portfolio-visual-image {
        transform: scale(1.04);
    }

    .portfolio-visual span {
        width: fit-content;
        padding: 0.45rem 0.75rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.12);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .portfolio-visual strong {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 2rem;
        line-height: 1;
        max-width: 9ch;
        text-wrap: balance;
    }

    .portfolio-body {
        padding: 1.4rem;
    }

    .portfolio-body h3 {
        margin-bottom: 0.8rem;
    }

    .portfolio-title-button {
        display: grid;
        gap: 0.55rem;
        width: 100%;
        padding: 0;
        border: 0;
        background: transparent;
        color: var(--text);
        text-align: left;
        cursor: pointer;
        transition:
            transform 180ms ease,
            color 180ms ease;
    }

    .portfolio-title-button > span:first-child {
        font-size: 1.35rem;
        font-weight: 700;
        line-height: 1.3;
    }

    .portfolio-title-button-meta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: fit-content;
        min-height: 2rem;
        padding: 0.45rem 0.8rem;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 999px;
        background: rgba(255, 248, 241, 0.92);
        color: var(--primary);
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        box-shadow:
            0 12px 22px rgba(42, 24, 15, 0.06),
            inset 0 1px 0 rgba(255, 255, 255, 0.92);
        transition:
            transform 180ms ease,
            border-color 180ms ease,
            background-color 180ms ease,
            box-shadow 180ms ease,
            color 180ms ease;
    }

    .portfolio-title-button:hover {
        transform: translateY(-1px);
        color: var(--primary);
    }

    .portfolio-title-button:hover .portfolio-title-button-meta,
    .portfolio-title-button:focus-visible .portfolio-title-button-meta {
        transform: translateY(-1px);
        border-color: rgba(122, 74, 48, 0.2);
        background: linear-gradient(135deg, rgba(255, 252, 247, 0.98) 0%, rgba(243, 230, 215, 0.94) 100%);
        color: var(--primary-deep);
        box-shadow:
            0 16px 28px rgba(42, 24, 15, 0.1),
            0 0 0 4px rgba(122, 74, 48, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.94);
    }

    .portfolio-title-button:focus-visible {
        outline: none;
    }

    .portfolio-body p {
        color: var(--muted);
        line-height: 1.75;
    }

    .portfolio-card-rose .portfolio-visual {
        background:
            linear-gradient(180deg, transparent, rgba(53, 18, 14, 0.4)),
            radial-gradient(circle at 22% 20%, rgba(255, 233, 227, 0.34), transparent 30%),
            linear-gradient(135deg, #d17c66 0%, #8e3227 100%);
    }

    .portfolio-card-gold .portfolio-visual {
        background:
            linear-gradient(180deg, transparent, rgba(74, 54, 14, 0.34)),
            radial-gradient(circle at 22% 20%, rgba(255, 248, 220, 0.34), transparent 30%),
            linear-gradient(135deg, #ebc56b 0%, #b57928 100%);
    }

    .portfolio-card-teal .portfolio-visual {
        background:
            linear-gradient(180deg, transparent, rgba(16, 45, 43, 0.38)),
            radial-gradient(circle at 22% 20%, rgba(223, 255, 249, 0.28), transparent 30%),
            linear-gradient(135deg, #4ba59f 0%, #205d58 100%);
    }

    .portfolio-card-ink .portfolio-visual {
        background:
            linear-gradient(180deg, transparent, rgba(15, 19, 35, 0.42)),
            radial-gradient(circle at 22% 20%, rgba(227, 236, 255, 0.24), transparent 30%),
            linear-gradient(135deg, #5b6e97 0%, #252a3d 100%);
    }

    .portfolio-card-clay .portfolio-visual {
        background:
            linear-gradient(180deg, transparent, rgba(58, 24, 16, 0.42)),
            radial-gradient(circle at 22% 20%, rgba(255, 235, 221, 0.24), transparent 30%),
            linear-gradient(135deg, #cb7c56 0%, #7f331d 100%);
    }

    .portfolio-card-sky .portfolio-visual {
        background:
            linear-gradient(180deg, transparent, rgba(21, 50, 76, 0.42)),
            radial-gradient(circle at 22% 20%, rgba(237, 247, 255, 0.24), transparent 30%),
            linear-gradient(135deg, #7db6df 0%, #416b8f 100%);
    }

    .catalog-toolbar {
        display: grid;
        grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr) minmax(13rem, 0.5fr);
        gap: 1rem;
        align-items: stretch;
        margin-bottom: 1.1rem;
    }

    .catalog-toolbar-block,
    .catalog-search-wrap,
    .catalog-sort-wrap {
        display: grid;
        gap: 0.85rem;
    }

    .catalog-controls {
        align-content: space-between;
    }

    .catalog-block-head {
        display: grid;
        gap: 0.25rem;
    }

    .catalog-label {
        color: var(--primary);
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .catalog-block-note {
        color: var(--muted);
        font-size: 0.92rem;
        line-height: 1.6;
    }

    .catalog-search,
    .catalog-sort {
        width: 100%;
        min-height: 3.6rem;
        padding: 0.95rem 1.1rem;
        border: 1px solid rgba(71, 47, 34, 0.1);
        border-radius: 1.15rem;
        background: rgba(255, 251, 245, 0.9);
        color: var(--text);
        font-size: 1rem;
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.92),
            0 12px 24px rgba(42, 24, 15, 0.04);
        outline: none;
        transition:
            border-color 180ms ease,
            box-shadow 180ms ease,
            transform 180ms ease;
    }

    .catalog-search:focus,
    .catalog-sort:focus {
        transform: translateY(-1px);
        border-color: rgba(163, 63, 47, 0.28);
        box-shadow:
            0 0 0 4px rgba(163, 63, 47, 0.08),
            0 14px 28px rgba(42, 24, 15, 0.08);
    }

    .catalog-filter-group {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem;
        align-items: flex-start;
    }

    .filter-chip {
        min-height: 3rem;
        padding: 0.8rem 1.05rem;
        border: 1px solid rgba(71, 47, 34, 0.1);
        border-radius: 999px;
        background: rgba(255, 251, 245, 0.92);
        color: var(--muted);
        font-weight: 700;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.92);
        cursor: pointer;
        transition:
            background-color 180ms ease,
            color 180ms ease,
            border-color 180ms ease,
            transform 180ms ease,
            box-shadow 180ms ease;
    }

    .filter-chip:hover,
    .filter-chip.is-active {
        color: #fff7f2;
        border-color: transparent;
        background: linear-gradient(135deg, #9c5333 0%, #c7734f 100%);
        box-shadow: 0 16px 24px rgba(122, 74, 48, 0.18);
    }

    .filter-chip:hover {
        transform: translateY(-1px);
    }

    .catalog-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.25rem;
        color: var(--muted);
    }

    .catalog-result-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        padding: 0.75rem 1rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 999px;
        background: rgba(255, 252, 247, 0.84);
        box-shadow: 0 10px 24px rgba(42, 24, 15, 0.04);
    }

    .catalog-result-pill::before {
        width: 0.55rem;
        height: 0.55rem;
        border-radius: 999px;
        background: linear-gradient(135deg, #9c5333 0%, #d18e5f 100%);
        content: '';
    }

    .catalog-meta span {
        color: var(--text);
        font-weight: 800;
    }

    .catalog-meta-note {
        font-size: 0.92rem;
        line-height: 1.6;
        text-align: right;
    }

    .catalog-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        align-items: stretch;
        grid-auto-rows: 1fr;
    }

    .catalog-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 100%;
    }

    .catalog-card-head,
    .catalog-card-foot {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
    }

    .catalog-card-head {
        margin-bottom: 0.9rem;
    }

    .catalog-gallery,
    .product-mini-gallery {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.65rem;
        margin-bottom: 1rem;
    }

    .product-shot,
    .product-thumb {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.48);
        min-height: 4.8rem;
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.18);
    }

    .product-shot {
        min-height: 6.5rem;
    }

    .product-shot span,
    .product-thumb {
        display: flex;
        align-items: flex-end;
        justify-content: flex-start;
        padding: 0.75rem;
        color: #fffaf3;
        font-size: 0.82rem;
        font-weight: 700;
        line-height: 1.3;
    }

    .product-tone-rose {
        background:
            linear-gradient(180deg, transparent, rgba(46, 17, 12, 0.35)),
            radial-gradient(circle at 20% 20%, rgba(255, 238, 231, 0.52), transparent 35%),
            linear-gradient(135deg, #d78168 0%, #9a3628 100%);
    }

    .product-tone-gold {
        background:
            linear-gradient(180deg, transparent, rgba(61, 42, 11, 0.28)),
            radial-gradient(circle at 24% 24%, rgba(255, 250, 223, 0.5), transparent 34%),
            linear-gradient(135deg, #ebc572 0%, #b97b24 100%);
    }

    .product-tone-teal {
        background:
            linear-gradient(180deg, transparent, rgba(13, 45, 42, 0.32)),
            radial-gradient(circle at 24% 24%, rgba(229, 255, 252, 0.42), transparent 34%),
            linear-gradient(135deg, #4ea7a2 0%, #1f5f5b 100%);
    }

    .product-tone-ink {
        background:
            linear-gradient(180deg, transparent, rgba(15, 19, 35, 0.4)),
            radial-gradient(circle at 24% 24%, rgba(226, 236, 255, 0.36), transparent 34%),
            linear-gradient(135deg, #51638d 0%, #252a3d 100%);
    }

    .product-tone-clay {
        background:
            linear-gradient(180deg, transparent, rgba(56, 24, 16, 0.4)),
            radial-gradient(circle at 24% 24%, rgba(255, 233, 219, 0.36), transparent 34%),
            linear-gradient(135deg, #cb7a53 0%, #7d321c 100%);
    }

    .product-tone-sky {
        background:
            linear-gradient(180deg, transparent, rgba(19, 48, 71, 0.36)),
            radial-gradient(circle at 24% 24%, rgba(236, 247, 255, 0.44), transparent 34%),
            linear-gradient(135deg, #7bb2d9 0%, #406b8f 100%);
    }

    .catalog-category {
        color: var(--muted);
        font-size: 0.9rem;
    }

    .catalog-card-foot {
        margin-top: auto;
        padding-top: 1.25rem;
    }

    .catalog-card-foot strong {
        font-size: 1.12rem;
    }

    .product-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 0.65rem;
    }

    .product-specs {
        display: grid;
        gap: 0.65rem;
        margin-top: 1rem;
    }

    .product-specs li {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        padding-bottom: 0.55rem;
        border-bottom: 1px dashed rgba(82, 43, 23, 0.12);
    }

    .product-specs span {
        color: var(--muted);
        font-size: 0.9rem;
    }

    .product-specs strong {
        max-width: 58%;
        text-align: right;
        font-size: 0.95rem;
    }

    .product-details {
        margin-top: 1rem;
        border: 1px solid rgba(82, 43, 23, 0.1);
        border-radius: 1rem;
        background: rgba(255, 252, 247, 0.68);
    }

    .product-details summary {
        padding: 0.95rem 1rem;
        font-weight: 700;
        cursor: pointer;
        list-style: none;
    }

    .product-details summary::-webkit-details-marker {
        display: none;
    }

    .product-details[open] summary {
        border-bottom: 1px solid rgba(82, 43, 23, 0.08);
    }

    .product-details p {
        padding: 0 1rem 1rem;
    }

    .product-story-block {
        padding: 0 1rem 1rem;
        border-top: 1px dashed rgba(71, 47, 34, 0.1);
    }

    .product-story-block span {
        display: block;
        margin-bottom: 0.45rem;
        color: var(--primary);
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .catalog-empty {
        margin-top: 1rem;
        padding: 1rem 1.1rem;
        border: 1px dashed rgba(163, 63, 47, 0.28);
        border-radius: 1rem;
        color: var(--muted);
        background: rgba(255, 251, 245, 0.68);
    }

    .is-hidden {
        display: none !important;
    }

    .product-card {
        padding: 1.55rem;
        transition:
            transform 180ms ease,
            border-color 180ms ease;
    }

    .product-card:hover,
    .category-card:hover,
    .testimonial-card:hover {
        transform: translateY(-4px);
        border-color: rgba(163, 63, 47, 0.24);
    }

    .product-card h3,
    .category-card h3,
    .step-card h3 {
        margin: 1rem 0 0.8rem;
        font-size: 1.45rem;
        font-weight: 700;
    }

    .product-foot {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 1.3rem;
    }

    .product-foot strong {
        font-size: 1.12rem;
    }

    .product-foot a,
    .category-card a,
    .contact-card a {
        font-weight: 700;
    }

    .category-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .category-card {
        min-height: 16rem;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        gap: 0.7rem;
        overflow: hidden;
        position: relative;
    }

    .category-card::before {
        position: absolute;
        inset: auto -2rem -2rem auto;
        width: 7rem;
        height: 7rem;
        border-radius: 999px;
        content: '';
        opacity: 0.26;
    }

    .category-card span {
        font-size: 0.92rem;
        color: var(--muted);
    }

    .category-rose {
        background: linear-gradient(180deg, rgba(255, 244, 239, 0.95), rgba(252, 223, 213, 0.88));
    }

    .category-rose::before {
        background: #c65c45;
    }

    .category-gold {
        background: linear-gradient(180deg, rgba(255, 249, 233, 0.95), rgba(244, 228, 177, 0.9));
    }

    .category-gold::before {
        background: #d8a14d;
    }

    .category-teal {
        background: linear-gradient(180deg, rgba(237, 251, 248, 0.95), rgba(194, 230, 224, 0.88));
    }

    .category-teal::before {
        background: #1f6a67;
    }

    .category-ink {
        color: #fff7ef;
        background: linear-gradient(180deg, rgba(53, 33, 28, 0.95), rgba(29, 23, 20, 0.96));
    }

    .category-ink span,
    .category-ink a {
        color: rgba(255, 247, 239, 0.78);
    }

    .category-ink::before {
        background: #d8a14d;
    }

    .light {
        color: #fff4ea;
    }

    .split-light .section-title {
        max-width: 16ch;
    }

    .steps-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .step-card {
        padding: 1.5rem;
        border-color: rgba(255, 241, 231, 0.16);
        background: rgba(255, 247, 239, 0.08);
    }

    .step-card span {
        color: #ffcf95;
        font-size: 0.9rem;
        font-weight: 800;
        letter-spacing: 0.14em;
    }

    .step-card p {
        color: rgba(255, 240, 231, 0.82);
    }

    .testimonial-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        align-items: stretch;
    }

    .testimonial-card {
        display: grid;
        grid-template-rows: auto 1fr auto;
        gap: 1rem;
        min-height: 100%;
        padding: 1.35rem;
        border-radius: 1.7rem;
        background:
            linear-gradient(180deg, rgba(255, 253, 249, 0.98) 0%, rgba(244, 235, 223, 0.9) 100%);
        box-shadow:
            0 22px 42px rgba(42, 24, 15, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.92);
    }

    .testimonial-card-top {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 0.85rem;
    }

    .testimonial-stars {
        display: inline-flex;
        align-items: center;
        gap: 0.2rem;
    }

    .testimonial-star {
        color: rgba(196, 168, 139, 0.56);
        font-size: 1.08rem;
        line-height: 1;
    }

    .testimonial-star.is-filled {
        color: #d8a14d;
        text-shadow: 0 4px 12px rgba(216, 161, 77, 0.22);
    }

    .testimonial-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 2rem;
        padding: 0.45rem 0.82rem;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 999px;
        background: rgba(255, 247, 239, 0.92);
        color: var(--primary);
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .testimonial-frame {
        position: relative;
        display: grid;
        gap: 0.75rem;
        min-height: 100%;
        padding: 1rem 1.05rem;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 1.35rem;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.82) 0%, rgba(250, 242, 233, 0.78) 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.86),
            inset 0 0 0 1px rgba(255, 255, 255, 0.32);
    }

    .testimonial-frame::before {
        position: absolute;
        top: 0.9rem;
        right: 1rem;
        color: rgba(122, 74, 48, 0.14);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 3.2rem;
        line-height: 1;
        content: '“';
    }

    .testimonial-headline {
        position: relative;
        z-index: 1;
        max-width: 18ch;
        color: var(--text);
        font-size: 1.12rem;
        font-weight: 700;
        line-height: 1.45;
    }

    .testimonial-quote {
        position: relative;
        z-index: 1;
        margin: 0;
        padding-right: 1.1rem;
        font-size: 0.95rem;
        line-height: 1.85;
    }

    .testimonial-user {
        display: grid;
        grid-template-columns: auto minmax(0, 1fr);
        gap: 0.85rem;
        align-items: center;
    }

    .testimonial-avatar {
        display: inline-grid;
        place-items: center;
        width: 3rem;
        height: 3rem;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 1rem;
        background:
            radial-gradient(circle at top left, rgba(255, 234, 213, 0.82), transparent 58%),
            linear-gradient(135deg, rgba(255, 248, 241, 0.98) 0%, rgba(239, 224, 208, 0.92) 100%);
        color: var(--primary-deep);
        font-size: 0.95rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        box-shadow:
            0 12px 24px rgba(42, 24, 15, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.92);
    }

    .testimonial-user-copy {
        display: grid;
        gap: 0.18rem;
    }

    .testimonial-user-copy strong {
        font-size: 1rem;
        font-weight: 700;
    }

    .testimonial-user-copy span {
        display: block;
        color: var(--muted);
        font-size: 0.9rem;
        line-height: 1.55;
    }

    .contact-grid {
        grid-template-columns: 1fr 0.9fr;
    }

    .contact-copy {
        max-width: 35rem;
        margin-top: 1rem;
    }

    .contact-methods {
        display: grid;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .contact-method-card {
        padding: 1.25rem 1.35rem;
        border: 1px solid var(--line);
        border-radius: 1.35rem;
        background: rgba(255, 250, 243, 0.84);
        box-shadow: var(--shadow);
    }

    .contact-method-card span,
    .contact-card-head span,
    .contact-field span {
        display: block;
        margin-bottom: 0.35rem;
        color: var(--muted);
        font-size: 0.9rem;
    }

    .contact-method-card a {
        font-size: 1.14rem;
        font-weight: 700;
    }

    .contact-layout {
        display: grid;
        gap: 1rem;
    }

    .contact-card {
        display: grid;
        gap: 1.25rem;
        padding: 1.7rem;
    }

    .contact-card a,
    .contact-card p {
        font-size: 1.18rem;
        font-weight: 600;
    }

    .contact-card-head p {
        color: var(--text);
        font-size: 1.15rem;
        font-weight: 700;
    }

    .contact-address-card {
        margin-top: 1rem;
    }

    .contact-map-card,
    .contact-form-card {
        gap: 1rem;
    }

    .contact-map-frame {
        position: relative;
        overflow: hidden;
        border-radius: 1.3rem;
        border: 1px solid rgba(82, 43, 23, 0.1);
        min-height: 22.5rem;
        background: linear-gradient(135deg, rgba(255, 251, 245, 0.96) 0%, rgba(240, 229, 213, 0.92) 100%);
    }

    .contact-map-surface {
        position: relative;
        isolation: isolate;
        width: 100%;
        height: 100%;
        min-height: 22.5rem;
        display: block;
        padding: 0;
        background:
            radial-gradient(circle at 24% 24%, rgba(31, 106, 103, 0.06), transparent 18%),
            radial-gradient(circle at 78% 74%, rgba(183, 138, 82, 0.12), transparent 24%),
            linear-gradient(135deg, rgba(255, 251, 245, 0.18) 0%, rgba(240, 229, 213, 0.12) 100%);
    }

    .contact-map-embed {
        position: absolute;
        inset: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .contact-map-surface::before,
    .contact-map-surface::after {
        position: absolute;
        inset: 0;
        pointer-events: none;
        content: '';
    }

    .contact-map-surface::before {
        background:
            linear-gradient(180deg, rgba(255, 251, 245, 0.12) 0%, rgba(255, 251, 245, 0.02) 48%, rgba(34, 24, 21, 0.1) 100%),
            radial-gradient(circle at 18% 18%, rgba(255, 255, 255, 0.18), transparent 24%),
            radial-gradient(circle at 82% 76%, rgba(122, 74, 48, 0.16), transparent 28%);
        z-index: 1;
        opacity: 1;
    }

    .contact-map-surface::after {
        inset: 1rem;
        border-radius: 1rem;
        border: 1px solid rgba(122, 74, 48, 0.08);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.36);
        z-index: 3;
    }

    .contact-map-pin {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 2;
        width: 3.8rem;
        height: 3.8rem;
        border-radius: 50% 50% 50% 0;
        transform: translate(-50%, -100%) rotate(-45deg);
        background: linear-gradient(135deg, var(--primary) 0%, #d37f52 100%);
        box-shadow:
            0 16px 30px rgba(59, 36, 24, 0.2),
            0 0 0 8px rgba(163, 63, 47, 0.08);
    }

    .contact-map-pin::before {
        position: absolute;
        inset: 0.82rem;
        border-radius: 999px;
        background: rgba(255, 248, 238, 0.96);
        content: '';
    }

    .contact-map-details {
        position: relative;
        z-index: 4;
        width: 100%;
        display: grid;
        gap: 0.8rem;
        padding: 1.1rem 1.15rem 1.15rem;
        border: 1px solid rgba(82, 43, 23, 0.1);
        border-radius: 1.15rem;
        background: linear-gradient(180deg, rgba(255, 252, 247, 0.96) 0%, rgba(249, 241, 231, 0.92) 100%);
        backdrop-filter: blur(10px);
        box-shadow: 0 16px 28px rgba(58, 34, 21, 0.08);
    }

    .contact-map-chip,
    .contact-map-meta span:first-child {
        color: var(--primary);
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .contact-map-details strong {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.2rem;
        line-height: 1.15;
    }

    .contact-map-details p {
        color: var(--muted);
        font-size: 0.96rem;
        font-weight: 500;
        line-height: 1.7;
        margin: 0;
    }

    .contact-map-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        justify-content: space-between;
        gap: 0.85rem 1rem;
        padding-top: 0.3rem;
        border-top: 1px solid rgba(82, 43, 23, 0.08);
    }

    .contact-map-meta {
        display: grid;
        gap: 0.18rem;
    }

    .contact-map-meta span:last-child {
        font-size: 0.98rem;
        font-weight: 700;
        color: var(--primary-deep);
    }

    .contact-map-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: fit-content;
        min-height: 2.75rem;
        padding: 0.72rem 0.95rem;
        border: 1px solid rgba(122, 74, 48, 0.14);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.72);
        color: var(--primary-deep);
        font-size: 0.92rem;
        font-weight: 700;
        line-height: 1.2;
        text-align: center;
        text-decoration: none;
        transition:
            transform 180ms ease,
            border-color 180ms ease,
            background-color 180ms ease,
            box-shadow 180ms ease;
    }

    .contact-map-link:hover {
        transform: translateY(-1px);
        border-color: rgba(122, 74, 48, 0.24);
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 12px 24px rgba(58, 34, 21, 0.12);
    }

    .contact-form-grid {
        display: grid;
        grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
        gap: 1rem;
        align-items: stretch;
    }

    .contact-form-stack {
        display: grid;
        gap: 0.95rem;
        align-content: start;
    }

    .contact-form-stack-message {
        grid-template-rows: minmax(0, 1fr) auto;
    }

    .contact-field {
        display: grid;
        gap: 0.55rem;
    }

    .contact-field-message {
        height: 100%;
    }

    .contact-field input,
    .contact-field textarea {
        width: 100%;
        padding: 1rem 1.05rem;
        border: 1px solid rgba(122, 74, 48, 0.14);
        border-radius: 1.1rem;
        background: rgba(255, 252, 247, 0.9);
        outline: none;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
        transition:
            border-color 180ms ease,
            box-shadow 180ms ease,
            background-color 180ms ease;
    }

    .contact-field input:hover,
    .contact-field textarea:hover {
        border-color: rgba(122, 74, 48, 0.22);
    }

    .contact-field input:focus,
    .contact-field textarea:focus {
        border-color: rgba(163, 63, 47, 0.32);
        box-shadow: 0 0 0 4px rgba(163, 63, 47, 0.08);
    }

    .contact-field textarea {
        resize: vertical;
        min-height: 8.75rem;
    }

    .contact-field-message textarea {
        min-height: 12.75rem;
    }

    .contact-form-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 0.85rem 1rem;
    }

    .contact-form-note {
        color: #1f6a67;
        margin: 0;
        font-size: 0.93rem;
        font-weight: 600;
        line-height: 1.55;
    }

    .button:disabled,
    .button[disabled] {
        cursor: not-allowed;
        opacity: 0.65;
        transform: none;
        box-shadow: none;
    }

    .cart-shell {
        display: grid;
        gap: 1.35rem;
    }

    .cart-section-head {
        grid-template-columns: minmax(0, 1.18fr) minmax(18rem, 0.82fr);
        gap: 1.1rem;
        margin-bottom: 1.35rem;
    }

    .cart-section-copy,
    .cart-head-note {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(183, 138, 82, 0.22);
        border-radius: 1.8rem;
        background:
            radial-gradient(circle at top right, rgba(183, 138, 82, 0.14), transparent 24%),
            linear-gradient(135deg, rgba(255, 252, 247, 0.94) 0%, rgba(246, 237, 226, 0.94) 100%);
        box-shadow: 0 24px 58px rgba(51, 29, 18, 0.08);
    }

    .cart-section-copy {
        padding: 1.65rem 1.7rem;
    }

    .cart-section-copy::before,
    .cart-head-note::before {
        position: absolute;
        inset: 0.8rem;
        border: 1px solid rgba(183, 138, 82, 0.12);
        border-radius: calc(1.8rem - 0.8rem);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.28);
        pointer-events: none;
        content: '';
    }

    .cart-section-copy > *,
    .cart-head-note > * {
        position: relative;
        z-index: 1;
    }

    .cart-section-kicker {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.65rem 0.9rem;
    }

    .cart-section-chip,
    .cart-note-chip {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: fit-content;
        padding: 0.42rem 0.78rem;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.58);
        color: var(--primary-deep);
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .cart-section-copy .section-title {
        max-width: 9ch;
        margin-top: 0.55rem;
    }

    .cart-section-text {
        max-width: 44rem;
        margin-top: 0.9rem;
        color: var(--muted);
        line-height: 1.8;
    }

    .cart-section-highlights {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(11.5rem, 1fr));
        gap: 0.85rem;
        margin-top: 1.25rem;
    }

    .cart-section-highlight {
        padding: 1rem 1.05rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.1rem;
        background: rgba(255, 255, 255, 0.48);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.74),
            0 10px 24px rgba(51, 29, 18, 0.04);
    }

    .cart-section-highlight strong {
        display: block;
        margin-bottom: 0.3rem;
        font-size: 1rem;
    }

    .cart-section-highlight span {
        color: var(--muted);
        font-size: 0.92rem;
        line-height: 1.65;
    }

    .cart-head-note {
        display: grid;
        align-content: start;
        gap: 0.9rem;
        min-height: 100%;
        padding: 1.35rem 1.4rem;
    }

    .cart-head-note strong {
        display: block;
        margin-bottom: 0;
        font-size: 1.16rem;
        line-height: 1.35;
    }

    .cart-head-note p {
        color: var(--muted);
        line-height: 1.7;
    }

    .cart-note-points {
        display: grid;
        gap: 0.65rem;
    }

    .cart-note-points span {
        display: flex;
        align-items: center;
        min-height: 3rem;
        padding: 0.75rem 0.9rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1rem;
        background: rgba(255, 255, 255, 0.48);
        color: var(--primary-deep);
        font-size: 0.9rem;
        font-weight: 700;
        line-height: 1.45;
    }

    .cart-note-points span::before {
        width: 0.48rem;
        height: 0.48rem;
        margin-right: 0.7rem;
        border-radius: 999px;
        background: var(--gold);
        box-shadow: 0 0 0 4px rgba(183, 138, 82, 0.14);
        content: '';
    }

    .cart-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
        gap: 1.25rem;
        align-items: start;
    }

    .cart-card {
        position: relative;
        overflow: hidden;
        padding: 1.7rem;
        border: 1px solid rgba(183, 138, 82, 0.22);
        border-radius: 1.9rem;
        background:
            radial-gradient(circle at top right, rgba(183, 138, 82, 0.16), transparent 26%),
            radial-gradient(circle at bottom left, rgba(122, 74, 48, 0.08), transparent 24%),
            linear-gradient(135deg, rgba(255, 251, 245, 0.94) 0%, rgba(245, 236, 224, 0.92) 100%);
        box-shadow: 0 28px 60px rgba(51, 29, 18, 0.08);
        backdrop-filter: blur(14px);
    }

    .cart-card::before,
    .footer-shell::before,
    .footer-panel::before {
        position: absolute;
        inset: 0.85rem;
        border: 1px solid rgba(183, 138, 82, 0.12);
        border-radius: calc(1.9rem - 0.85rem);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.28);
        pointer-events: none;
        content: '';
    }

    .cart-card > *,
    .footer-shell > *,
    .footer-panel > * {
        position: relative;
        z-index: 1;
    }

    .cart-card-head {
        display: flex;
        align-items: start;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .cart-card-head h3 {
        margin-top: 0.35rem;
        font-size: 1.45rem;
        font-weight: 700;
    }

    .order-form-card {
        display: grid;
        gap: 1.1rem;
    }

    .order-form-card-head {
        margin-bottom: 0;
        padding-bottom: 1.15rem;
        border-bottom: 1px solid rgba(71, 47, 34, 0.08);
    }

    .order-form-intro {
        max-width: 34rem;
        margin-top: 0.9rem;
        color: var(--muted);
        line-height: 1.75;
    }

    .order-form-actions {
        display: grid;
        gap: 0.8rem;
    }

    .order-form-card .button-primary {
        width: 100%;
        min-height: 3.4rem;
    }

    .order-form-card .form-note-muted {
        padding: 0.95rem 1rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.1rem;
        background: rgba(255, 251, 245, 0.78);
    }

    .cart-empty {
        padding: 1rem 1.1rem;
        border: 1px dashed rgba(163, 63, 47, 0.24);
        border-radius: 1rem;
        color: var(--muted);
        background: rgba(255, 251, 245, 0.72);
    }

    .cart-items {
        display: grid;
        gap: 1rem;
    }

    .cart-item {
        display: grid;
        grid-template-columns: auto minmax(0, 1fr) auto;
        gap: 1rem;
        padding: 1rem;
        border: 1px solid var(--line);
        border-radius: 1.35rem;
        background: rgba(255, 252, 247, 0.84);
    }

    .cart-item-visual {
        display: flex;
        align-items: flex-end;
        justify-content: flex-start;
        width: 5.25rem;
        min-height: 5.25rem;
        padding: 0.8rem;
        border-radius: 1rem;
        background:
            linear-gradient(180deg, transparent, rgba(46, 17, 12, 0.35)),
            radial-gradient(circle at 20% 20%, rgba(255, 238, 231, 0.52), transparent 35%),
            linear-gradient(135deg, #d78168 0%, #9a3628 100%);
        color: #fff8f1;
        font-size: 0.8rem;
        font-weight: 700;
        line-height: 1.35;
    }

    .cart-item-head {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        align-items: center;
        justify-content: space-between;
    }

    .cart-item-head h4 {
        font-size: 1.1rem;
        font-weight: 700;
    }

    .cart-item-head span,
    .cart-item-meta span {
        color: var(--muted);
        font-size: 0.9rem;
    }

    .cart-item-body p {
        margin-top: 0.45rem;
        color: var(--muted);
        line-height: 1.65;
    }

    .cart-item-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
        margin-top: 0.85rem;
    }

    .cart-item-meta span {
        padding: 0.45rem 0.7rem;
        border-radius: 999px;
        background: rgba(163, 63, 47, 0.08);
    }

    .cart-item-price {
        display: grid;
        justify-items: end;
        gap: 0.75rem;
    }

    .cart-item-price strong {
        font-size: 1.05rem;
    }

    .cart-quantity {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.35rem 0.4rem;
        border: 1px solid var(--line);
        border-radius: 999px;
        background: rgba(255, 251, 245, 0.88);
    }

    .cart-quantity button,
    .cart-remove {
        border: 0;
        background: transparent;
        cursor: pointer;
        font: inherit;
    }

    .cart-quantity button {
        width: 2rem;
        height: 2rem;
        border-radius: 999px;
        background: rgba(163, 63, 47, 0.08);
        color: var(--primary);
        font-weight: 800;
    }

    .cart-remove {
        color: var(--primary);
        font-weight: 700;
    }

    .cart-summary {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1rem;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px dashed rgba(82, 43, 23, 0.14);
    }

    .cart-summary div {
        padding: 1rem 1.05rem;
        border: 1px solid var(--line);
        border-radius: 1.1rem;
        background: rgba(255, 251, 245, 0.82);
    }

    .cart-summary span {
        display: block;
        margin-bottom: 0.35rem;
        color: var(--muted);
        font-size: 0.9rem;
    }

    .cart-summary strong {
        font-size: 1.2rem;
        font-weight: 800;
    }

    .form-note {
        line-height: 1.7;
    }

    .form-note-muted {
        color: var(--muted);
    }

    .form-note-error {
        color: #a33f2f;
        font-weight: 600;
    }

    .form-note-success {
        color: #1f6a67;
        font-weight: 600;
    }

    .cta-shell {
        display: grid;
        gap: 1.4rem;
        padding: 2rem;
        border: 1px solid rgba(183, 138, 82, 0.24);
        border-radius: 2rem;
        background:
            radial-gradient(circle at top left, rgba(255, 248, 236, 0.9), transparent 32%),
            linear-gradient(135deg, rgba(255, 250, 243, 0.96) 0%, rgba(245, 234, 219, 0.96) 100%);
        box-shadow: 0 28px 60px rgba(51, 29, 18, 0.08);
    }

    .cta-copy p:last-child {
        max-width: 44rem;
        color: var(--muted);
        line-height: 1.8;
    }

    .cta-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .cta-points {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
    }

    .cta-point {
        padding: 1.1rem 1.15rem;
        border: 1px solid rgba(71, 47, 34, 0.1);
        border-radius: 1.4rem;
        background: rgba(255, 252, 247, 0.76);
    }

    .cta-point strong,
    .footer-links h3 {
        display: block;
        margin-bottom: 0.45rem;
        font-size: 1rem;
        font-weight: 700;
    }

    .cta-point span,
    .footer-brand p,
    .footer-link-list {
        color: var(--muted);
        line-height: 1.75;
    }

    .site-footer {
        padding: 2rem 0 2.5rem;
        border-top: 1px solid rgba(71, 47, 34, 0.08);
        background:
            linear-gradient(180deg, rgba(252, 247, 240, 0.94), rgba(244, 236, 226, 0.96));
    }

    .footer-shell {
        position: relative;
        overflow: hidden;
        padding: 1.35rem;
        border: 1px solid rgba(183, 138, 82, 0.22);
        border-radius: 2rem;
        background:
            radial-gradient(circle at top left, rgba(255, 248, 236, 0.82), transparent 34%),
            linear-gradient(135deg, rgba(255, 251, 245, 0.94) 0%, rgba(245, 236, 224, 0.96) 100%);
        box-shadow: 0 28px 64px rgba(51, 29, 18, 0.08);
        backdrop-filter: blur(18px);
    }

    .footer-topbar {
        position: relative;
        overflow: hidden;
        display: grid;
        grid-template-columns: minmax(0, 1.4fr) auto;
        gap: 1.2rem;
        align-items: center;
        margin-bottom: 1rem;
        padding: 1.4rem 1.45rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.65rem;
        background:
            radial-gradient(circle at top right, rgba(183, 138, 82, 0.18), transparent 24%),
            linear-gradient(135deg, rgba(255, 253, 248, 0.92) 0%, rgba(249, 242, 233, 0.92) 100%);
    }

    .footer-topbar::before {
        position: absolute;
        inset: 0.75rem;
        border: 1px solid rgba(183, 138, 82, 0.12);
        border-radius: calc(1.65rem - 0.75rem);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.32);
        pointer-events: none;
        content: '';
    }

    .footer-topbar > * {
        position: relative;
        z-index: 1;
    }

    .footer-topbar-copy {
        display: grid;
        gap: 0.65rem;
    }

    .footer-topbar-copy h2 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2rem, 3vw, 2.7rem);
        line-height: 0.98;
    }

    .footer-topbar-copy p:last-child {
        max-width: 44rem;
        color: var(--muted);
        line-height: 1.75;
    }

    .footer-topbar-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 0.75rem;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.25fr) repeat(3, minmax(0, 0.78fr));
        gap: 1.1rem;
        align-items: start;
    }

    .footer-panel {
        position: relative;
        overflow: hidden;
        display: grid;
        gap: 1rem;
        min-height: 100%;
        padding: 1.35rem 1.4rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.5rem;
        background: rgba(255, 252, 247, 0.72);
    }

    .footer-panel h3 {
        font-size: 1.05rem;
        font-weight: 700;
    }

    .footer-brand {
        display: grid;
        gap: 1rem;
    }

    .footer-brand .brand-mark {
        margin-bottom: 0.15rem;
    }

    .footer-brand p {
        font-size: 0.98rem;
    }

    .footer-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem;
    }

    .footer-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.55rem 0.85rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.56);
        color: var(--primary-deep);
        font-size: 0.82rem;
        font-weight: 700;
    }

    .footer-links {
        display: grid;
        gap: 0.95rem;
    }

    .footer-link-list {
        display: grid;
        gap: 0.75rem;
    }

    .footer-link-list a,
    .footer-link-list span {
        width: 100%;
        display: flex;
        align-items: center;
        min-height: 3.05rem;
        padding: 0.8rem 0.95rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1rem;
        background: rgba(255, 255, 255, 0.46);
    }

    .footer-link-list a {
        transition:
            color 180ms ease,
            border-color 180ms ease,
            background-color 180ms ease,
            transform 180ms ease;
    }

    .footer-link-list a:hover {
        color: var(--primary);
        border-color: rgba(122, 74, 48, 0.18);
        background: rgba(255, 248, 240, 0.92);
        transform: translateX(2px);
    }

    .footer-contact-list {
        display: grid;
        gap: 0.75rem;
    }

    .footer-contact-item {
        padding: 0.9rem 1rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.05rem;
        background: rgba(255, 255, 255, 0.46);
    }

    .footer-contact-item span {
        display: block;
        margin-bottom: 0.35rem;
        color: var(--muted);
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .footer-contact-item a,
    .footer-contact-item p {
        font-size: 0.98rem;
        font-weight: 600;
        line-height: 1.65;
    }

    .footer-contact-item a {
        transition: color 180ms ease;
    }

    .footer-contact-item a:hover {
        color: var(--primary);
    }

    .footer-meta {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.85rem;
        margin-top: 1.1rem;
    }

    .footer-meta span {
        display: flex;
        align-items: center;
        min-height: 100%;
        padding: 1rem 1.1rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.2rem;
        background: rgba(255, 252, 247, 0.68);
        color: var(--muted);
        font-size: 0.92rem;
        line-height: 1.65;
    }

    .footer-meta span:first-child {
        display: none;
    }

    @keyframes drift {
        0%,
        100% {
            transform: translate3d(0, 0, 0) scale(1);
        }
        50% {
            transform: translate3d(0, -12px, 0) scale(1.05);
        }
    }

    @keyframes section-action-sheen {
        0% {
            transform: translateX(-220%) skewX(-22deg);
            opacity: 0;
        }
        18% {
            opacity: 0.18;
        }
        48% {
            opacity: 0.7;
        }
        100% {
            transform: translateX(340%) skewX(-22deg);
            opacity: 0;
        }
    }

    @media (max-width: 1024px) {
        .hero-grid,
        .about-hero,
        .about-grid,
        .contact-grid,
        .section-head,
        .footer-grid {
            grid-template-columns: 1fr;
        }

        .hero-copy h1 {
            max-width: 12ch;
        }

        .hero-art {
            min-height: auto;
            padding-top: 0.35rem;
        }

        .hero-visual-stage,
        .hero-feature-bar,
        .cta-points {
            grid-template-columns: 1fr;
        }

        .hero-visual-stage {
            min-height: auto;
            padding: 0.95rem;
        }

        .hero-visual-main {
            min-height: 32rem;
        }

        .hero-visual-stack {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .about-story-grid,
        .product-grid,
        .catalog-grid,
        .portfolio-grid,
        .category-grid,
        .steps-grid,
        .testimonial-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .catalog-toolbar,
        .catalog-controls,
        .cart-layout {
            grid-template-columns: 1fr;
        }

        .product-specs li {
            flex-direction: column;
            gap: 0.35rem;
        }

        .product-specs strong {
            max-width: 100%;
            text-align: left;
        }

        .craft-process-item {
            grid-template-columns: 1fr;
        }

        .contact-form-grid {
            grid-template-columns: 1fr;
        }

        .contact-form-stack-message {
            grid-template-rows: auto;
        }

        .contact-field-message textarea {
            min-height: 10.5rem;
        }

        .contact-form-actions,
        .contact-map-actions {
            align-items: stretch;
        }

        .contact-form-actions .button,
        .contact-map-link {
            width: 100%;
        }

        .cart-section-head {
            grid-template-columns: 1fr;
        }

        .cart-head-note {
            max-width: none;
        }

        .footer-topbar,
        .footer-meta {
            grid-template-columns: 1fr;
        }

        .footer-topbar-actions {
            justify-content: flex-start;
        }

        .footer-shell {
            padding: 1rem;
        }

        .section-action-link {
            justify-self: start;
        }
    }

    @media (max-width: 720px) {
        .hero-section {
            padding-bottom: 3.5rem;
        }

        .topbar,
        .topbar-links,
        .hero-actions,
        .hero-stats,
        .product-foot,
        .cart-card-head,
        .product-actions,
        .cta-actions,
        .footer-topbar-actions,
        .footer-meta {
            grid-template-columns: 1fr;
        }

        .footer-topbar,
        .footer-panel {
            padding: 1.15rem;
        }

        .footer-topbar-actions {
            display: grid;
        }

        .footer-topbar-actions .button {
            width: 100%;
        }

        .footer-topbar::before,
        .footer-shell::before,
        .footer-panel::before {
            inset: 0.65rem;
        }

        .footer-topbar-copy h2 {
            font-size: clamp(1.8rem, 9vw, 2.35rem);
        }

        .cart-section-copy,
        .cart-head-note {
            padding: 1.2rem;
        }

        .cart-section-copy::before,
        .cart-head-note::before {
            inset: 0.65rem;
        }

        .cart-note-points span {
            min-height: 0;
        }

        .order-form-card .button-primary {
            min-width: 0;
        }

        .topbar {
            border-radius: 1.5rem;
        }

        .topbar-links {
            gap: 0.75rem;
        }

        .hero-grid {
            padding-top: 1.75rem;
        }

        .hero-copy h1 {
            max-width: 100%;
            font-size: clamp(2.8rem, 16vw, 4.4rem);
        }

        .hero-stats,
        .hero-feature-bar,
        .about-stat-row,
        .about-story-grid,
        .product-grid,
        .catalog-grid,
        .portfolio-grid,
        .category-grid,
        .steps-grid,
        .testimonial-grid {
            grid-template-columns: 1fr;
        }

        .hero-art {
            min-height: auto;
            padding: 0.35rem;
        }

        .hero-art::after {
            border-radius: 2.1rem;
        }

        .hero-visual-stage {
            padding: 0.7rem;
            border-radius: 2rem;
        }

        .hero-visual-stage::before {
            inset: 0.55rem;
            border-radius: calc(2rem - 0.55rem);
        }

        .hero-visual-main {
            min-height: 24rem;
        }

        .hero-grid.container {
            width: min(100%, calc(100% - 1rem));
        }

        .hero-visual-main,
        .hero-visual-detail {
            border-radius: 1.6rem;
        }

        .hero-visual-main::after,
        .hero-visual-detail::after {
            inset: 0.62rem;
            border-radius: 1.2rem;
        }

        .hero-visual-stack {
            grid-template-columns: 1fr;
        }

        .hero-visual-caption {
            max-width: 14rem;
            padding: 0.9rem 0.95rem;
        }

        .hero-visual-label {
            width: min(100%, 19rem);
            max-width: 100%;
            padding: 0.9rem 0.95rem;
        }

        .hero-visual-label strong {
            font-size: clamp(1.8rem, 8vw, 2.35rem);
            line-height: 1.05;
        }

        .hero-visual-detail strong {
            padding: 0.65rem 0.72rem;
        }

        .section {
            padding: 4rem 0;
        }

        .section-title {
            max-width: 100%;
        }

        .cart-item,
        .cart-summary {
            grid-template-columns: 1fr;
        }

        .cart-item-price {
            justify-items: start;
        }

        .product-actions > * {
            width: 100%;
        }

        .cta-shell {
            padding: 1.4rem;
        }
    }
    .hero-section {
        padding-top: 0.75rem;
    }

    .topbar {
        position: sticky;
        top: 0.5rem;
        z-index: 40;
        width: auto;
        margin-inline: auto;
        transform: none;
        transition:
            padding 220ms ease,
            box-shadow 220ms ease,
            background-color 220ms ease,
            border-color 220ms ease;
    }

    .topbar.is-scrolled {
        padding: 0.72rem 1.1rem;
        border-color: rgba(122, 74, 48, 0.18);
        background: rgba(255, 250, 243, 0.92);
        box-shadow: 0 22px 45px rgba(49, 27, 17, 0.14);
    }

    .topbar-links {
        flex-wrap: wrap;
    }

    .topbar-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex: 0 0 auto;
        align-self: stretch;
        margin-left: 0.25rem;
        padding-left: 1rem;
        border-left: 1px solid rgba(122, 74, 48, 0.12);
    }

    .topbar-admin-link {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.9rem;
        min-width: 8.4rem;
        min-height: 100%;
        padding: 0.55rem 1.45rem;
        border: 1px solid rgba(122, 74, 48, 0.1);
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(255, 252, 247, 0.98) 0%, rgba(247, 239, 228, 0.94) 100%);
        box-shadow:
            0 10px 22px rgba(59, 36, 24, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.94);
        transition:
            transform 180ms ease,
            box-shadow 180ms ease,
            border-color 180ms ease,
            background-color 180ms ease;
        position: relative;
        overflow: hidden;
    }

    .topbar-admin-link::before {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top left, rgba(183, 138, 82, 0.22), rgba(183, 138, 82, 0) 56%),
            linear-gradient(135deg, rgba(183, 138, 82, 0.14), rgba(183, 138, 82, 0));
        pointer-events: none;
        content: '';
    }

    .topbar-admin-link::after {
        position: absolute;
        top: -35%;
        left: -32%;
        width: 42%;
        height: 170%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.42), transparent);
        transform: rotate(18deg);
        opacity: 0.72;
        pointer-events: none;
        content: '';
    }

    .topbar-admin-copy,
    .topbar-admin-knot {
        position: relative;
        z-index: 1;
    }

    .topbar-admin-copy {
        display: grid;
        gap: 0.08rem;
        text-align: left;
    }

    .topbar-admin-overline {
        color: rgba(122, 74, 48, 0.78);
        font-size: 0.62rem;
        font-weight: 800;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .topbar-admin-title {
        color: var(--primary-deep);
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.02em;
    }

    .topbar-admin-knot {
        width: 1rem;
        height: 1rem;
        border: 2px solid rgba(122, 74, 48, 0.7);
        border-radius: 0.3rem;
        transform: rotate(45deg);
        box-shadow: 0 0 0 4px rgba(183, 138, 82, 0.14);
        transition:
            transform 220ms ease,
            box-shadow 220ms ease,
            border-color 220ms ease;
    }

    .topbar-admin-link:hover {
        transform: translateY(-1px);
        border-color: rgba(122, 74, 48, 0.26);
        background: rgba(255, 250, 243, 0.98);
        box-shadow:
            0 14px 26px rgba(59, 36, 24, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.92);
    }

    .topbar-admin-link:hover::after {
        animation: login-sheen 1100ms ease;
    }

    .topbar-admin-link:hover .topbar-admin-knot {
        transform: rotate(45deg) scale(1.08);
        border-color: rgba(122, 74, 48, 0.92);
        box-shadow: 0 0 0 6px rgba(183, 138, 82, 0.2);
    }

    .topbar-admin-link:focus-visible {
        outline: 2px solid rgba(122, 74, 48, 0.34);
        outline-offset: 4px;
    }

    @keyframes login-sheen {
        0% {
            transform: translateX(0) rotate(18deg);
        }
        100% {
            transform: translateX(440%) rotate(18deg);
        }
    }

    .product-card,
    .portfolio-card,
    .category-card,
    .step-card,
    .testimonial-card,
    .contact-card,
    .hero-feature,
    .admin-entry-card {
        will-change: transform, opacity;
    }

    .product-card {
        position: relative;
        overflow: hidden;
        transition:
            transform 280ms ease,
            border-color 220ms ease,
            box-shadow 220ms ease;
    }

    .product-card::after {
        position: absolute;
        inset: -40% auto auto -120%;
        width: 55%;
        height: 180%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.18), transparent);
        transform: rotate(20deg);
        opacity: 0;
        pointer-events: none;
        content: '';
    }

    .product-card:hover {
        transform: translateY(-8px);
        border-color: rgba(122, 74, 48, 0.18);
        box-shadow: 0 26px 60px rgba(43, 23, 14, 0.12);
    }

    .product-card:hover::after {
        opacity: 1;
        animation: sheen 900ms ease;
    }

    .product-showcase-gallery {
        display: grid;
        gap: 0;
        margin-bottom: 1rem;
    }

    .product-showcase-gallery > .product-gallery-nav-wrap {
        display: none;
    }

    .product-gallery-stage {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        display: grid;
        grid-template-rows: auto 1fr auto;
        gap: 1rem;
        width: 100%;
        min-height: 15rem;
        padding: 1rem;
        border: 0;
        border: 1px solid rgba(255, 255, 255, 0.48);
        border-radius: 1.75rem;
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.14);
        text-align: left;
        transition:
            transform 220ms ease,
            box-shadow 220ms ease;
    }

    .product-gallery-stage::before,
    .product-gallery-stage::after {
        position: absolute;
        inset: auto;
        pointer-events: none;
        content: '';
    }

    .product-gallery-stage::before {
        top: -18%;
        right: -10%;
        width: 10rem;
        height: 10rem;
        border-radius: 999px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.32) 0%, rgba(255, 255, 255, 0) 72%);
        opacity: 0.9;
    }

    .product-gallery-stage::after {
        inset: 0;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.14), transparent 28%, rgba(18, 12, 10, 0.1) 100%),
            linear-gradient(90deg, rgba(255, 255, 255, 0.08) 0, rgba(255, 255, 255, 0) 20%, rgba(255, 255, 255, 0.08) 100%);
        opacity: 0.78;
    }

    .product-gallery-stage:hover {
        transform: translateY(-2px);
        box-shadow:
            inset 0 0 0 1px rgba(255, 255, 255, 0.16),
            0 20px 44px rgba(43, 23, 14, 0.14);
    }

    .product-gallery-badge {
        display: inline-flex;
        width: fit-content;
        padding: 0.42rem 0.72rem;
        border-radius: 999px;
        background: rgba(255, 248, 239, 0.16);
        color: #fff9f2;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        position: relative;
        z-index: 1;
    }

    .product-gallery-nav-wrap {
        position: relative;
        z-index: 1;
        display: block;
        min-height: 0;
    }

    .product-gallery-nav,
    .gallery-lightbox-arrow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.45rem;
        height: 2.45rem;
        padding: 0;
        border: 1px solid rgba(122, 74, 48, 0.16);
        border-radius: 999px;
        background: rgba(255, 251, 246, 0.82);
        color: var(--primary-deep);
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1;
        backdrop-filter: blur(14px);
        box-shadow: 0 10px 24px rgba(43, 23, 14, 0.14);
        transition:
            transform 180ms ease,
            background-color 180ms ease,
            border-color 180ms ease;
    }

    .product-gallery-nav:disabled {
        cursor: default;
        opacity: 0.55;
    }

    .product-gallery-nav {
        position: absolute;
        top: 50%;
        z-index: 3;
        flex-shrink: 0;
        transform: translateY(-50%);
    }

    .product-gallery-nav[data-gallery-prev] {
        left: 0.25rem;
    }

    .product-gallery-nav[data-gallery-next] {
        right: 0.25rem;
    }

    .product-gallery-visual {
        position: relative;
        z-index: 1;
        display: grid;
        gap: 0.85rem;
        width: 100%;
        min-width: 0;
        min-height: 100%;
        padding: 0 3.15rem;
        border: 0;
        background: transparent;
        color: inherit;
        text-align: center;
        cursor: zoom-in;
    }

    .product-gallery-visual-art {
        position: relative;
        display: block;
        width: 100%;
        aspect-ratio: 4 / 5;
        min-height: 10.4rem;
        border-radius: 1.45rem;
        border: 1px solid rgba(255, 255, 255, 0.22);
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.14), rgba(255, 255, 255, 0.03)),
            radial-gradient(circle at 50% 30%, rgba(255, 255, 255, 0.28), rgba(255, 255, 255, 0) 58%),
            rgba(255, 250, 243, 0.08);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.22),
            0 20px 34px rgba(28, 16, 12, 0.18);
        overflow: hidden;
    }

    .product-gallery-image {
        display: block;
        width: 100%;
        height: 100%;
        min-height: 0;
        object-fit: cover;
        object-position: center;
        transform: scale(1.01);
    }

    .product-gallery-visual-art::before,
    .product-gallery-visual-art::after,
    .product-gallery-visual-pattern::before,
    .product-gallery-visual-pattern::after {
        position: absolute;
        content: '';
    }

    .product-gallery-visual-art::before {
        inset: 12% 15%;
        border-radius: 1.2rem;
        border: 1px solid rgba(255, 252, 248, 0.34);
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0.02)),
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.22), rgba(255, 255, 255, 0) 68%);
    }

    .product-gallery-visual-art::after {
        inset: auto auto 16% 50%;
        width: 42%;
        height: 42%;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.32);
        transform: translateX(-50%);
        opacity: 0.42;
    }

    .product-gallery-visual-pattern {
        position: absolute;
        inset: 16% 20%;
        border-radius: 1.1rem;
        overflow: hidden;
        background:
            radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.34) 0%, rgba(255, 255, 255, 0) 52%),
            linear-gradient(135deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.02));
    }

    .product-gallery-visual-pattern::before {
        inset: 18% auto 18% 50%;
        width: 1px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.45), rgba(255, 255, 255, 0));
        transform: translateX(-50%);
    }

    .product-gallery-visual-pattern::after {
        inset: 50% 18% auto 18%;
        height: 1px;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.34), rgba(255, 255, 255, 0));
        transform: translateY(-50%);
    }

    .product-gallery-visual-copy {
        display: grid;
        gap: 0.22rem;
        width: 100%;
        min-height: 4.65rem;
        justify-items: center;
        align-content: start;
    }

    .product-gallery-visual strong {
        max-width: 12ch;
        min-height: 2.15em;
        color: #fffaf3;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(1.5rem, 2vw, 2rem);
        line-height: 1.05;
        text-wrap: balance;
    }

    .product-gallery-visual-subtitle {
        color: rgba(255, 250, 243, 0.78);
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .product-gallery-meta {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
    }

    .product-gallery-hint {
        color: rgba(255, 250, 243, 0.92);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .product-gallery-nav:hover {
        transform: translateY(calc(-50% - 1px));
        border-color: rgba(122, 74, 48, 0.24);
        background: rgba(255, 251, 246, 0.94);
    }

    .gallery-lightbox-arrow:hover {
        transform: translateY(-1px);
        border-color: rgba(122, 74, 48, 0.24);
        background: rgba(255, 251, 246, 0.94);
    }

    .product-gallery-visual:hover .product-gallery-visual-art {
        transform: translateY(-2px) scale(1.01);
    }

    .product-gallery-visual:focus-visible,
    .product-gallery-nav:focus-visible,
    .gallery-lightbox-arrow:focus-visible {
        outline: 2px solid rgba(255, 251, 246, 0.88);
        outline-offset: 3px;
    }

    .product-gallery-visual-art,
    .product-gallery-visual-pattern {
        transition:
            transform 220ms ease,
            box-shadow 220ms ease;
    }

    .product-gallery-counter {
        min-width: 4rem;
        padding: 0.38rem 0.78rem;
        border-radius: 999px;
        background: rgba(255, 251, 246, 0.16);
        color: #fffaf3;
        font-size: 0.82rem;
        font-weight: 700;
        text-align: center;
        letter-spacing: 0.04em;
    }

    .gallery-lightbox {
        position: fixed;
        inset: 0;
        z-index: 70;
    }

    .gallery-lightbox-backdrop {
        position: absolute;
        inset: 0;
        border: 0;
        background: rgba(23, 15, 11, 0.72);
        backdrop-filter: blur(12px);
    }

    .gallery-lightbox-dialog {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: auto minmax(0, 1fr) minmax(18rem, 20rem) auto;
        gap: 1rem;
        align-items: center;
        width: min(1160px, calc(100% - 2rem));
        margin: min(8vh, 4rem) auto 0;
    }

    .gallery-lightbox-stage {
        display: grid;
        gap: 1rem;
        min-height: min(68vh, 36rem);
        padding: 2rem;
        border-radius: 2rem;
        box-shadow: 0 30px 70px rgba(18, 11, 8, 0.28);
        align-content: space-between;
    }

    .gallery-lightbox-stage span {
        color: rgba(255, 250, 243, 0.92);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .gallery-lightbox-stage strong {
        max-width: 10ch;
        color: #fffaf3;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2.6rem, 6vw, 5rem);
        line-height: 0.98;
    }

    .gallery-lightbox-stage p {
        color: rgba(255, 250, 243, 0.88);
        font-size: 1rem;
        font-weight: 700;
    }

    .gallery-lightbox-close {
        position: absolute;
        top: -3.5rem;
        right: 0;
        padding: 0.65rem 1rem;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 999px;
        background: rgba(255, 251, 246, 0.16);
        color: #fffaf3;
        font-weight: 700;
    }

    .gallery-lightbox-info {
        display: grid;
        gap: 1rem;
        align-self: stretch;
        padding: 1.4rem;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 1.6rem;
        background: rgba(255, 251, 246, 0.12);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.14),
            0 24px 50px rgba(18, 11, 8, 0.2);
        backdrop-filter: blur(12px);
    }

    .gallery-lightbox-info-head {
        display: grid;
        gap: 0.35rem;
    }

    .gallery-lightbox-info-head span {
        color: #fffaf3;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.9rem;
        font-weight: 700;
        line-height: 1.05;
    }

    .gallery-lightbox-info-head strong {
        color: rgba(255, 250, 243, 0.96);
        font-size: 1rem;
        font-weight: 800;
        letter-spacing: 0.04em;
    }

    .gallery-lightbox-info-meta {
        display: grid;
        gap: 0.65rem;
    }

    .gallery-lightbox-info-meta span {
        padding: 0.8rem 0.9rem;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 1rem;
        background: rgba(255, 251, 246, 0.08);
        color: rgba(255, 250, 243, 0.9);
        font-size: 0.92rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        text-transform: none;
    }

    .gallery-lightbox-info p {
        color: rgba(255, 250, 243, 0.86);
        font-size: 0.96rem;
        font-weight: 500;
        line-height: 1.8;
    }

    .portfolio-spotlight-modal {
        position: fixed;
        inset: 0;
        z-index: 74;
    }

    .portfolio-spotlight-backdrop {
        position: absolute;
        inset: 0;
        border: 0;
        background: rgba(16, 10, 8, 0.74);
        backdrop-filter: blur(14px);
    }

    .portfolio-spotlight-dialog {
        position: relative;
        z-index: 1;
        width: min(1240px, calc(100% - 1rem));
        margin: 0.5rem auto 0;
    }

    .portfolio-spotlight-close {
        position: absolute;
        top: 0.8rem;
        right: 0.8rem;
        z-index: 3;
        padding: 0.65rem 0.95rem;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 999px;
        background: rgba(255, 251, 246, 0.14);
        color: #fffaf3;
        font-weight: 700;
        box-shadow: 0 12px 24px rgba(8, 5, 5, 0.18);
        transition:
            transform 180ms ease,
            background-color 180ms ease,
            border-color 180ms ease;
    }

    .portfolio-spotlight-close:hover {
        transform: translateY(-1px);
        border-color: rgba(255, 255, 255, 0.26);
        background: rgba(255, 251, 246, 0.22);
    }

    .portfolio-spotlight-close:focus-visible {
        outline: 2px solid rgba(255, 235, 214, 0.7);
        outline-offset: 4px;
    }

    .portfolio-spotlight-shell {
        display: grid;
        grid-template-columns: minmax(0, 1.22fr) minmax(20rem, 0.78fr);
        gap: 1rem;
        align-items: stretch;
        min-height: calc(100vh - 1rem);
        max-height: calc(100vh - 1rem);
        padding: 1rem;
        border: 1px solid rgba(255, 243, 231, 0.12);
        border-radius: 2.1rem;
        background:
            radial-gradient(circle at top left, rgba(255, 232, 214, 0.18), transparent 24%),
            linear-gradient(135deg, rgba(24, 15, 14, 0.96) 0%, rgba(46, 22, 18, 0.96) 42%, rgba(17, 12, 15, 0.98) 100%);
        box-shadow: 0 36px 90px rgba(7, 4, 4, 0.38);
    }

    .portfolio-spotlight-stage {
        position: relative;
        overflow: hidden;
        min-height: 100%;
        border-radius: 1.8rem;
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.08),
            0 24px 52px rgba(8, 5, 5, 0.24);
    }

    .portfolio-spotlight-stage::before {
        position: absolute;
        inset: 0;
        z-index: 1;
        background:
            linear-gradient(180deg, rgba(14, 10, 9, 0.06) 0%, rgba(14, 10, 9, 0.18) 32%, rgba(14, 10, 9, 0.82) 100%),
            radial-gradient(circle at 20% 16%, rgba(255, 248, 242, 0.16), transparent 22%);
        pointer-events: none;
        content: '';
    }

    .portfolio-spotlight-image {
        position: absolute;
        inset: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .portfolio-spotlight-stage-copy {
        position: absolute;
        right: 1.35rem;
        bottom: 1.35rem;
        left: 1.35rem;
        z-index: 2;
        display: grid;
        gap: 0.75rem;
        justify-items: start;
    }

    .portfolio-spotlight-stage-copy span {
        display: inline-flex;
        align-items: center;
        min-height: 2rem;
        padding: 0.45rem 0.85rem;
        border-radius: 999px;
        background: rgba(255, 250, 245, 0.14);
        color: #fff3e6;
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        backdrop-filter: blur(14px);
    }

    .portfolio-spotlight-stage-copy strong {
        max-width: 10ch;
        color: #fffaf3;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2.4rem, 4.2vw, 4.4rem);
        line-height: 0.94;
        text-wrap: balance;
    }

    .portfolio-spotlight-copy {
        display: grid;
        align-content: start;
        gap: 1.1rem;
        padding: 1.35rem;
        border: 1px solid rgba(255, 242, 229, 0.1);
        border-radius: 1.8rem;
        background:
            linear-gradient(180deg, rgba(255, 252, 247, 0.98) 0%, rgba(244, 235, 224, 0.95) 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.94),
            0 22px 44px rgba(12, 8, 7, 0.18);
        overflow: auto;
    }

    .portfolio-spotlight-kicker {
        color: var(--primary);
        font-size: 0.82rem;
        font-weight: 800;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .portfolio-spotlight-copy h3 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2.2rem, 4vw, 3.7rem);
        line-height: 0.95;
        letter-spacing: -0.03em;
    }

    .portfolio-spotlight-copy > p {
        color: var(--muted);
        font-size: 1rem;
        line-height: 1.9;
    }

    .portfolio-spotlight-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .portfolio-spotlight-meta span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 2.4rem;
        padding: 0.65rem 0.95rem;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 999px;
        background: rgba(255, 250, 243, 0.9);
        color: var(--primary-deep);
        font-size: 0.8rem;
        font-weight: 700;
        line-height: 1.4;
    }

    body.is-gallery-open {
        overflow: hidden;
    }

    @media (max-width: 980px) {
        .portfolio-spotlight-dialog {
            width: min(100%, calc(100% - 0.8rem));
        }

        .portfolio-spotlight-shell {
            grid-template-columns: 1fr;
            min-height: 0;
            max-height: calc(100vh - 0.8rem);
            overflow: auto;
        }

        .portfolio-spotlight-stage {
            min-height: min(58vh, 32rem);
        }

        .portfolio-spotlight-copy {
            overflow: visible;
        }
    }

    @media (max-width: 720px) {
        .portfolio-title-button > span:first-child {
            font-size: 1.2rem;
        }

        .portfolio-spotlight-dialog {
            width: min(100%, calc(100% - 0.7rem));
            margin-top: 0.35rem;
        }

        .portfolio-spotlight-close {
            top: 0.7rem;
            right: 0.7rem;
        }

        .portfolio-spotlight-shell {
            padding: 0.75rem;
            border-radius: 1.5rem;
        }

        .portfolio-spotlight-stage,
        .portfolio-spotlight-copy {
            border-radius: 1.3rem;
        }

        .portfolio-spotlight-stage {
            min-height: 21rem;
        }

        .portfolio-spotlight-stage-copy {
            right: 1rem;
            bottom: 1rem;
            left: 1rem;
        }

        .portfolio-spotlight-stage-copy strong {
            font-size: clamp(2rem, 10vw, 2.9rem);
        }

        .portfolio-spotlight-copy {
            padding: 1rem;
        }

        .portfolio-spotlight-copy h3 {
            font-size: clamp(1.9rem, 9vw, 2.7rem);
        }
    }

    .catalog-gallery.product-showcase-gallery {
        grid-template-columns: minmax(0, 1fr);
        margin-bottom: 1.2rem;
    }

    .catalog-gallery .product-gallery-stage {
        min-height: clamp(21.5rem, 27vw, 24rem);
        padding: 1rem 0.95rem 0.95rem;
    }

    .catalog-gallery .product-gallery-visual {
        gap: 0.9rem;
        padding-inline: 3.2rem;
    }

    .catalog-gallery .product-gallery-visual-art {
        min-height: 13.25rem;
    }

    .catalog-gallery .product-gallery-visual strong {
        max-width: 9ch;
    }

    .catalog-gallery .product-gallery-visual-subtitle {
        min-height: 2.35em;
    }

    .admin-entry-section {
        padding-top: 0;
    }

    .admin-entry-card {
        display: grid;
        grid-template-columns: minmax(0, 1.3fr) auto;
        gap: 1.5rem;
        align-items: center;
        padding: 1.8rem 2rem;
        border: 1px solid rgba(71, 47, 34, 0.1);
        border-radius: 2rem;
        background:
            linear-gradient(135deg, rgba(255, 253, 248, 0.96) 0%, rgba(240, 232, 220, 0.96) 100%);
        box-shadow: 0 22px 56px rgba(42, 24, 15, 0.08);
    }

    .admin-entry-copy p:last-child {
        max-width: 38rem;
        color: var(--muted);
        line-height: 1.8;
    }

    .admin-entry-button {
        min-width: 10rem;
    }

    .reveal-item {
        opacity: 0;
        transform: translateY(28px);
        transition:
            opacity 620ms ease,
            transform 620ms ease;
        transition-delay: var(--reveal-delay, 0ms);
    }

    .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .product-card.is-cart-selected {
        animation: product-picked 900ms ease;
    }

    .button.is-success,
    .contact-form-note.is-success {
        animation: gentle-pulse 700ms ease;
    }

    .cart-badge.is-pop {
        animation: cart-pop 720ms ease;
    }

    .product-card.is-filtered-in {
        animation: filter-rise 500ms ease;
    }

    @keyframes product-picked {
        0% {
            transform: translateY(0) scale(1);
            box-shadow: var(--shadow);
        }
        35% {
            transform: translateY(-10px) scale(1.01);
            box-shadow: 0 28px 64px rgba(122, 74, 48, 0.2);
        }
        100% {
            transform: translateY(0) scale(1);
            box-shadow: var(--shadow);
        }
    }

    @keyframes cart-pop {
        0% {
            transform: scale(1);
        }
        35% {
            transform: scale(1.16);
        }
        100% {
            transform: scale(1);
        }
    }

    @keyframes filter-rise {
        0% {
            transform: translateY(12px);
            opacity: 0.7;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes gentle-pulse {
        0% {
            transform: scale(1);
        }
        45% {
            transform: scale(1.03);
        }
        100% {
            transform: scale(1);
        }
    }

    @keyframes sheen {
        0% {
            transform: translateX(0) rotate(20deg);
        }
        100% {
            transform: translateX(440%) rotate(20deg);
        }
    }

    @media (max-width: 1024px) {
        .hero-section {
            padding-top: 0.75rem;
        }

        .product-gallery-accordion,
        .admin-entry-card {
            grid-template-columns: 1fr;
        }

        .product-gallery-panel.is-active {
            flex: 1.8 1 0;
        }
    }

    @media (max-width: 720px) {
        .topbar {
            top: 0.35rem;
            width: auto;
        }

        .hero-section {
            padding-top: 0.5rem;
        }

        .topbar-links {
            width: 100%;
            justify-content: stretch;
        }

        .topbar-links a,
        .topbar-actions,
        .topbar-admin-link {
            width: 100%;
        }

        .brand-mark {
            justify-content: center;
        }

        .topbar-actions {
            justify-content: stretch;
        }

        .language-switcher {
            width: 100%;
        }

        .language-option {
            min-width: 0;
        }

        .product-gallery-stage {
            min-height: 11rem;
        }

        .product-gallery-nav-wrap {
            gap: 0.5rem;
        }

        .product-gallery-nav {
            width: 2.15rem;
            height: 2.15rem;
        }

        .product-gallery-visual-art {
            min-height: 8.5rem;
        }

        .product-gallery-meta {
            flex-direction: column;
            align-items: flex-start;
        }

        .gallery-lightbox-dialog {
            grid-template-columns: 1fr;
            margin-top: 4rem;
        }

        .gallery-lightbox-stage {
            min-height: 24rem;
        }

        .gallery-lightbox-info {
            order: 3;
            padding: 1rem;
        }

        .gallery-lightbox-arrow {
            position: absolute;
            top: calc(50% - 1.4rem);
            z-index: 2;
        }

        .gallery-lightbox-arrow-left {
            left: 0.5rem;
        }

        .gallery-lightbox-arrow-right {
            right: 0.5rem;
        }

        .gallery-lightbox-close {
            top: -2.8rem;
        }
    }

    .delivery-section {
        background:
            radial-gradient(circle at 12% 12%, rgba(183, 138, 82, 0.1), transparent 28%),
            linear-gradient(180deg, rgba(255, 250, 243, 0.58), rgba(245, 236, 224, 0.82));
    }

    .delivery-shell {
        position: relative;
        overflow: hidden;
        padding: 1.6rem;
        border: 1px solid rgba(183, 138, 82, 0.22);
        border-radius: 1.9rem;
        background:
            radial-gradient(circle at top left, rgba(255, 255, 255, 0.86), transparent 28%),
            linear-gradient(135deg, rgba(255, 252, 247, 0.96) 0%, rgba(246, 237, 226, 0.94) 100%);
        box-shadow:
            0 28px 64px rgba(51, 29, 18, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.88);
    }

    .delivery-shell::before {
        position: absolute;
        inset: 0.85rem;
        border: 1px solid rgba(183, 138, 82, 0.12);
        border-radius: calc(1.9rem - 0.85rem);
        pointer-events: none;
        content: '';
    }

    .delivery-shell > * {
        position: relative;
        z-index: 1;
    }

    .delivery-head {
        display: grid;
        grid-template-columns: auto minmax(0, 1fr);
        gap: 0.9rem;
        align-items: start;
        margin-bottom: 1.2rem;
    }

    .delivery-head .section-title {
        font-size: clamp(2.2rem, 5vw, 3.6rem);
    }

    .delivery-head p:last-child {
        margin-top: 0.35rem;
        color: var(--muted);
        line-height: 1.7;
    }

    .delivery-ornament {
        width: 2.7rem;
        height: 2.7rem;
        border: 1px solid rgba(183, 138, 82, 0.42);
        border-radius: 0.8rem;
        background:
            linear-gradient(45deg, transparent 42%, rgba(183, 138, 82, 0.42) 43%, rgba(183, 138, 82, 0.42) 57%, transparent 58%),
            linear-gradient(-45deg, transparent 42%, rgba(183, 138, 82, 0.42) 43%, rgba(183, 138, 82, 0.42) 57%, transparent 58%);
        transform: rotate(45deg);
        box-shadow: 0 0 0 6px rgba(183, 138, 82, 0.08);
    }

    .delivery-ornament-small {
        width: 1.8rem;
        height: 1.8rem;
        border-radius: 0.55rem;
        box-shadow: 0 0 0 4px rgba(183, 138, 82, 0.08);
    }

    .delivery-stack {
        display: grid;
        gap: 1rem;
    }

    .delivery-group,
    .delivery-note,
    .delivery-address,
    .delivery-guarantees {
        border: 1px solid rgba(183, 138, 82, 0.18);
        border-radius: 1.35rem;
        background:
            linear-gradient(135deg, rgba(255, 252, 247, 0.72), rgba(250, 241, 231, 0.58));
        box-shadow: 0 14px 30px rgba(51, 29, 18, 0.05);
    }

    .delivery-group {
        padding: 1rem;
    }

    .delivery-group-head {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        margin-bottom: 0.85rem;
    }

    .delivery-group-head h3,
    .delivery-note h3,
    .delivery-address h3 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.35rem;
        line-height: 1.2;
    }

    .delivery-group-head p {
        margin-top: 0.1rem;
        color: var(--muted);
        font-size: 0.9rem;
    }

    .delivery-service-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.9rem;
    }

    .delivery-service {
        position: relative;
        overflow: hidden;
        display: grid;
        gap: 0.8rem;
        min-height: 12rem;
        padding: 1.1rem;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 1.1rem;
        background:
            radial-gradient(circle at 78% 18%, rgba(183, 138, 82, 0.12), transparent 28%),
            linear-gradient(135deg, rgba(255, 252, 247, 0.92), rgba(246, 236, 224, 0.86));
    }

    .delivery-service::after,
    .delivery-address::after {
        position: absolute;
        right: 1rem;
        bottom: 0.75rem;
        width: min(16rem, 42%);
        height: 5.4rem;
        border-bottom: 1px solid rgba(183, 138, 82, 0.18);
        border-left: 1px solid rgba(183, 138, 82, 0.12);
        border-radius: 48% 0 0 0;
        opacity: 0.7;
        pointer-events: none;
        content: '';
    }

    .delivery-service-wide {
        grid-template-columns: minmax(16rem, 1fr) minmax(0, 0.85fr);
        align-items: center;
    }

    .delivery-service-copy,
    .delivery-service-bottom,
    .delivery-brand,
    .delivery-note > *,
    .delivery-address > * {
        position: relative;
        z-index: 1;
    }

    .delivery-service-name,
    .delivery-brand {
        display: block;
        font-size: 1.2rem;
        font-weight: 800;
    }

    .delivery-brand-dhl {
        color: #d71920;
        font-style: italic;
        letter-spacing: 0.04em;
    }

    .delivery-brand-uzpost {
        color: #0d62b7;
        letter-spacing: 0.05em;
    }

    .delivery-service p,
    .delivery-note p,
    .delivery-address p {
        color: var(--muted);
        line-height: 1.65;
    }

    .delivery-service dl {
        display: grid;
        gap: 0.65rem;
        margin: 0;
    }

    .delivery-service dt {
        color: var(--muted);
        font-size: 0.78rem;
    }

    .delivery-service dd {
        margin: 0;
        color: var(--text);
        font-weight: 800;
    }

    .delivery-service-bottom {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 1rem;
        margin-top: auto;
    }

    .delivery-visual {
        min-height: 7rem;
    }

    .delivery-visual-truck {
        display: grid;
        place-items: center;
        min-height: 10rem;
    }

    .delivery-truck {
        position: relative;
        width: min(18rem, 100%);
        height: 7.5rem;
    }

    .delivery-truck-box,
    .delivery-truck-cab {
        position: absolute;
        bottom: 1.4rem;
        border: 1px solid rgba(122, 74, 48, 0.22);
        background: linear-gradient(135deg, #d6b089, #9d6c45);
    }

    .delivery-truck-box {
        left: 0;
        display: grid;
        place-items: center;
        width: 10.5rem;
        height: 4.9rem;
        border-radius: 0.3rem;
        color: #fff8ee;
        font-size: 1.55rem;
        font-weight: 900;
        letter-spacing: 0.05em;
    }

    .delivery-truck-cab {
        right: 0.35rem;
        width: 5rem;
        height: 4.1rem;
        border-radius: 0.45rem 1.2rem 0.35rem 0.35rem;
        background: linear-gradient(135deg, #f5eee5, #ba8b60);
    }

    .delivery-wheel {
        position: absolute;
        bottom: 0.8rem;
        width: 1.45rem;
        height: 1.45rem;
        border: 0.35rem solid #3f2b24;
        border-radius: 999px;
        background: #f8ead8;
    }

    .delivery-wheel-left {
        left: 2.1rem;
    }

    .delivery-wheel-right {
        right: 1.8rem;
    }

    .delivery-plane,
    .delivery-box {
        position: relative;
        display: block;
        width: 7.2rem;
        height: 4.5rem;
    }

    .delivery-plane::before {
        position: absolute;
        left: 0.4rem;
        top: 2rem;
        width: 6.4rem;
        height: 0.55rem;
        border-radius: 999px;
        background: linear-gradient(90deg, #f2c14e, #d71920);
        content: '';
    }

    .delivery-plane::after {
        position: absolute;
        left: 3rem;
        top: 0.8rem;
        width: 2.5rem;
        height: 2.5rem;
        border-left: 1.1rem solid #f2c14e;
        border-top: 0.55rem solid transparent;
        border-bottom: 0.55rem solid transparent;
        transform: rotate(-16deg);
        content: '';
    }

    .delivery-box {
        width: 5.6rem;
        height: 4.1rem;
        border: 1px solid rgba(13, 98, 183, 0.22);
        border-radius: 0.35rem;
        background:
            linear-gradient(90deg, transparent 46%, rgba(13, 98, 183, 0.14) 47%, rgba(13, 98, 183, 0.14) 53%, transparent 54%),
            linear-gradient(135deg, #ffffff, #dce9f8);
        box-shadow: 0 16px 28px rgba(42, 24, 15, 0.12);
    }

    .delivery-note,
    .delivery-address {
        position: relative;
        overflow: hidden;
        display: grid;
        grid-template-columns: auto minmax(0, 1fr) auto;
        gap: 1rem;
        align-items: center;
        padding: 1rem 1.1rem;
    }

    .delivery-note-icon,
    .delivery-pin {
        display: inline-grid;
        place-items: center;
        width: 3rem;
        height: 3rem;
        border: 1px solid rgba(183, 138, 82, 0.32);
        border-radius: 999px;
        background: rgba(255, 246, 235, 0.8);
        color: var(--primary-deep);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.6rem;
        font-weight: 800;
    }

    .delivery-pin::before {
        width: 1.35rem;
        height: 1.35rem;
        border-radius: 50% 50% 50% 0;
        background: #c98d5f;
        transform: rotate(-45deg);
        content: '';
    }

    .delivery-note-badges,
    .delivery-guarantees {
        display: flex;
        flex-wrap: wrap;
        gap: 0.7rem;
        align-items: center;
    }

    .delivery-note-badges span,
    .delivery-guarantees span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 2.4rem;
        padding: 0.55rem 0.85rem;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 999px;
        background: rgba(255, 251, 245, 0.72);
        color: var(--primary-deep);
        font-size: 0.82rem;
        font-weight: 800;
    }

    .delivery-guarantees {
        justify-content: space-around;
        padding: 0.85rem;
    }

    html[data-theme='nocturne'] .delivery-section {
        background:
            radial-gradient(circle at 12% 10%, rgba(201, 141, 95, 0.12), transparent 28%),
            linear-gradient(180deg, rgba(33, 25, 24, 0.92), rgba(18, 18, 17, 0.96));
    }

    html[data-theme='nocturne'] .delivery-shell {
        border-color: rgba(201, 141, 95, 0.28);
        background:
            radial-gradient(circle at top right, rgba(201, 141, 95, 0.16), transparent 28%),
            linear-gradient(135deg, rgba(24, 24, 23, 0.98) 0%, rgba(13, 14, 14, 0.98) 100%);
        box-shadow:
            0 30px 70px rgba(0, 0, 0, 0.32),
            inset 0 1px 0 rgba(255, 226, 182, 0.07);
    }

    html[data-theme='nocturne'] .delivery-shell::before,
    html[data-theme='nocturne'] .delivery-group,
    html[data-theme='nocturne'] .delivery-note,
    html[data-theme='nocturne'] .delivery-address,
    html[data-theme='nocturne'] .delivery-guarantees {
        border-color: rgba(201, 141, 95, 0.24);
    }

    html[data-theme='nocturne'] .delivery-head p:last-child,
    html[data-theme='nocturne'] .delivery-group-head p,
    html[data-theme='nocturne'] .delivery-service p,
    html[data-theme='nocturne'] .delivery-note p,
    html[data-theme='nocturne'] .delivery-address p,
    html[data-theme='nocturne'] .delivery-service dt {
        color: rgba(231, 213, 197, 0.76);
    }

    html[data-theme='nocturne'] .delivery-group,
    html[data-theme='nocturne'] .delivery-note,
    html[data-theme='nocturne'] .delivery-address,
    html[data-theme='nocturne'] .delivery-guarantees {
        background:
            radial-gradient(circle at top right, rgba(201, 141, 95, 0.1), transparent 28%),
            linear-gradient(135deg, rgba(29, 29, 28, 0.92), rgba(15, 16, 16, 0.9));
        box-shadow:
            0 18px 38px rgba(0, 0, 0, 0.28),
            inset 0 1px 0 rgba(255, 226, 182, 0.05);
    }

    html[data-theme='nocturne'] .delivery-service {
        border-color: rgba(201, 141, 95, 0.24);
        background:
            radial-gradient(circle at 76% 16%, rgba(201, 141, 95, 0.14), transparent 30%),
            linear-gradient(135deg, rgba(23, 24, 24, 0.96), rgba(13, 14, 14, 0.92));
    }

    html[data-theme='nocturne'] .delivery-service dd,
    html[data-theme='nocturne'] .delivery-service-name,
    html[data-theme='nocturne'] .delivery-group-head h3,
    html[data-theme='nocturne'] .delivery-note h3,
    html[data-theme='nocturne'] .delivery-address h3 {
        color: #f3c78f;
    }

    html[data-theme='nocturne'] .delivery-truck-box,
    html[data-theme='nocturne'] .delivery-truck-cab {
        border-color: rgba(243, 199, 143, 0.28);
        background: linear-gradient(135deg, #4c3b32, #151515);
    }

    html[data-theme='nocturne'] .delivery-truck-box {
        color: #f3c78f;
    }

    html[data-theme='nocturne'] .delivery-wheel {
        border-color: #0b0c0c;
        background: #d6a565;
    }

    html[data-theme='nocturne'] .delivery-note-icon,
    html[data-theme='nocturne'] .delivery-pin,
    html[data-theme='nocturne'] .delivery-note-badges span,
    html[data-theme='nocturne'] .delivery-guarantees span {
        border-color: rgba(201, 141, 95, 0.26);
        background: rgba(34, 31, 28, 0.88);
        color: #f3c78f;
    }

    html[data-theme='nocturne'] .delivery-box {
        background:
            linear-gradient(90deg, transparent 46%, rgba(13, 98, 183, 0.32) 47%, rgba(13, 98, 183, 0.32) 53%, transparent 54%),
            linear-gradient(135deg, #e7edf5, #8ba3bf);
        box-shadow: 0 16px 30px rgba(0, 0, 0, 0.28);
    }

    @media (max-width: 860px) {
        .delivery-service-wide,
        .delivery-note,
        .delivery-address {
            grid-template-columns: 1fr;
        }

        .delivery-service-grid {
            grid-template-columns: 1fr;
        }

        .delivery-note-badges,
        .delivery-guarantees {
            justify-content: stretch;
        }

        .delivery-note-badges span,
        .delivery-guarantees span {
            flex: 1 1 10rem;
        }
    }

    @media (max-width: 560px) {
        .delivery-shell {
            padding: 1rem;
            border-radius: 1.45rem;
        }

        .delivery-shell::before {
            inset: 0.55rem;
            border-radius: calc(1.45rem - 0.55rem);
        }

        .delivery-head {
            grid-template-columns: 1fr;
        }

        .delivery-service {
            padding: 0.9rem;
        }

        .delivery-truck {
            transform: scale(0.82);
            transform-origin: center;
        }
    }

    .delivery-reference {
        padding-top: 2.5rem;
    }

    .delivery-reference .container {
        width: min(100% - 1.5rem, 88rem);
        max-width: 88rem;
    }

    .delivery-reference .delivery-shell {
        padding: clamp(1rem, 2vw, 1.45rem);
        border-radius: 1.45rem;
    }

    .delivery-reference .delivery-head {
        grid-template-columns: auto minmax(0, 1fr) auto;
        align-items: center;
        margin-bottom: 0.9rem;
        text-align: left;
    }

    .delivery-reference .delivery-head .section-title {
        margin: 0;
        color: #30251f;
        font-size: clamp(2rem, 3.2vw, 3.05rem);
        line-height: 0.95;
    }

    .delivery-reference .delivery-head p:last-child {
        margin-top: 0.35rem;
        font-size: 0.95rem;
    }

    .delivery-head-end {
        justify-self: end;
    }

    .delivery-rosette {
        position: relative;
        background: none;
        transform: rotate(0deg);
    }

    .delivery-rosette::before,
    .delivery-rosette::after {
        position: absolute;
        inset: 0.28rem;
        border: 1px solid currentColor;
        border-radius: 0.35rem;
        color: #c98d5f;
        content: '';
    }

    .delivery-rosette::after {
        transform: rotate(45deg);
    }

    .delivery-reference .delivery-group {
        padding: 0.95rem;
        border-radius: 1.15rem;
    }

    .delivery-reference .delivery-group-head {
        margin-bottom: 0.75rem;
        padding-inline: 0.2rem;
    }

    .delivery-reference .delivery-group-head h3,
    .delivery-reference .delivery-note h3,
    .delivery-reference .delivery-address h3 {
        color: #3a2b24;
        font-size: 1.55rem;
    }

    .delivery-reference .delivery-group-head p::before {
        content: '\2022';
        margin-inline: 0.45rem;
        color: #c98d5f;
    }

    .delivery-reference .delivery-service {
        min-height: 12rem;
        border-radius: 1rem;
    }

    .delivery-reference .delivery-service-wide {
        grid-template-columns: minmax(24rem, 1.12fr) minmax(17rem, 0.66fr) auto;
        padding: 1rem 1.15rem 1rem 1.45rem;
        gap: clamp(1rem, 2.2vw, 1.75rem);
    }

    .delivery-arch,
    .delivery-map-line {
        position: absolute;
        z-index: 0;
        opacity: 0.34;
        pointer-events: none;
    }

    .delivery-arch {
        width: 9rem;
        height: 8rem;
        border: 1px solid rgba(201, 141, 95, 0.24);
        border-bottom: 0;
        border-radius: 5rem 5rem 0 0;
    }

    .delivery-arch::before,
    .delivery-arch::after {
        position: absolute;
        bottom: 0;
        width: 1.9rem;
        height: 5.8rem;
        border: 1px solid rgba(201, 141, 95, 0.2);
        border-bottom: 0;
        border-radius: 1rem 1rem 0 0;
        content: '';
    }

    .delivery-arch::before {
        left: 1.35rem;
    }

    .delivery-arch::after {
        right: 1.35rem;
    }

    .delivery-arch-left {
        left: 1.2rem;
        bottom: 1rem;
    }

    .delivery-arch-right {
        right: 1.7rem;
        bottom: 1rem;
    }

    .delivery-arch-address {
        right: 5rem;
        bottom: 0.75rem;
        width: 15rem;
        height: 7rem;
    }

    .delivery-map-line {
        inset: 1.25rem 1rem auto auto;
        width: 10rem;
        height: 5.2rem;
        border-top: 1px dashed rgba(201, 141, 95, 0.2);
        border-right: 1px dashed rgba(201, 141, 95, 0.18);
        border-radius: 50%;
    }

    .delivery-reference .delivery-truck {
        width: min(24.5rem, 100%);
        height: 8.6rem;
        filter: drop-shadow(0 18px 24px rgba(58, 34, 21, 0.16));
    }

    .delivery-reference .delivery-truck-box {
        width: 14.2rem;
        height: 5.5rem;
        padding: 0.95rem;
        background: linear-gradient(135deg, #b88559, #6b4939);
    }

    .delivery-reference .delivery-truck-box img {
        width: 7.1rem;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 2px 1px rgba(0, 0, 0, 0.18));
    }

    .delivery-reference .delivery-truck-cab {
        right: 0.25rem;
        width: 6.6rem;
        height: 4.65rem;
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.78) 0 34%, rgba(80, 58, 49, 0.92) 35% 100%);
    }

    .delivery-reference .delivery-wheel-left {
        left: 2.4rem;
    }

    .delivery-reference .delivery-wheel-right {
        right: 2.15rem;
    }

    .delivery-reference .delivery-service-name {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.55rem;
        font-weight: 700;
    }

    .delivery-reference .delivery-brand img {
        display: block;
        width: auto;
        height: 2.2rem;
        max-width: 9.8rem;
        object-fit: contain;
        object-position: left center;
    }

    .delivery-reference .delivery-brand-uzpost img {
        width: 9.8rem;
        height: 2.8rem;
        object-fit: cover;
        object-position: 61% 77%;
        mix-blend-mode: multiply;
        opacity: 0.16;
    }

    .delivery-reference .delivery-brand-uzpost {
        position: relative;
        display: inline-flex;
        align-items: center;
        min-height: 2.8rem;
    }

    .delivery-reference .delivery-brand-uzpost span {
        position: absolute;
        left: 0.35rem;
        color: #1768b1;
        font-size: 1.78rem;
        font-weight: 900;
        font-style: italic;
        letter-spacing: 0.02em;
        line-height: 1;
    }

    .delivery-reference .delivery-service-bottom {
        min-height: 5.8rem;
    }

    .delivery-reference .delivery-plane {
        width: 8.4rem;
        height: 4.8rem;
        transform: translateY(0.2rem);
    }

    .delivery-reference .delivery-plane::before {
        top: 2.2rem;
        width: 7.4rem;
        height: 0.68rem;
    }

    .delivery-reference .delivery-plane::after {
        left: 3.35rem;
        top: 0.75rem;
        border-left-width: 1.35rem;
        border-top-width: 0.7rem;
        border-bottom-width: 0.7rem;
    }

    .delivery-reference .delivery-box {
        width: 5.7rem;
        height: 4.4rem;
        transform: perspective(8rem) rotateY(-12deg);
    }

    .delivery-round-arrow {
        position: relative;
        z-index: 1;
        display: inline-grid;
        place-items: center;
        width: 2.7rem;
        height: 2.7rem;
        border: 1px solid rgba(201, 141, 95, 0.3);
        border-radius: 999px;
        color: #c98d5f;
        font-size: 2rem;
        line-height: 1;
        background: rgba(255, 250, 243, 0.62);
    }

    .delivery-reference .delivery-note,
    .delivery-reference .delivery-address {
        min-height: 6.5rem;
        border-radius: 1.05rem;
    }

    .delivery-reference .delivery-note-icon,
    .delivery-reference .delivery-pin {
        width: 3.6rem;
        height: 3.6rem;
    }

    .delivery-note-badges span,
    .delivery-guarantees span {
        gap: 0.45rem;
    }

    .delivery-note-badges i,
    .delivery-guarantees i {
        width: 1.1rem;
        height: 1.1rem;
        border: 1px solid currentColor;
        border-radius: 999px;
        opacity: 0.72;
    }

    .delivery-reference .delivery-guarantees {
        border-radius: 1.05rem;
    }

    html[data-theme='nocturne'] .delivery-reference .delivery-head .section-title,
    html[data-theme='nocturne'] .delivery-reference .delivery-group-head h3,
    html[data-theme='nocturne'] .delivery-reference .delivery-note h3,
    html[data-theme='nocturne'] .delivery-reference .delivery-address h3,
    html[data-theme='nocturne'] .delivery-reference .delivery-service-name {
        color: #dca85f;
    }

    html[data-theme='nocturne'] .delivery-reference .delivery-shell {
        background:
            radial-gradient(circle at 84% 12%, rgba(201, 141, 95, 0.16), transparent 28%),
            linear-gradient(135deg, rgba(18, 19, 19, 0.99) 0%, rgba(11, 12, 12, 0.99) 100%);
    }

    html[data-theme='nocturne'] .delivery-reference .delivery-service,
    html[data-theme='nocturne'] .delivery-reference .delivery-group,
    html[data-theme='nocturne'] .delivery-reference .delivery-note,
    html[data-theme='nocturne'] .delivery-reference .delivery-address,
    html[data-theme='nocturne'] .delivery-reference .delivery-guarantees {
        background:
            radial-gradient(circle at 82% 16%, rgba(201, 141, 95, 0.11), transparent 30%),
            linear-gradient(135deg, rgba(21, 22, 22, 0.96), rgba(10, 11, 11, 0.94));
    }

    html[data-theme='nocturne'] .delivery-reference .delivery-truck {
        filter: drop-shadow(0 18px 24px rgba(0, 0, 0, 0.38));
    }

    html[data-theme='nocturne'] .delivery-reference .delivery-brand-uzpost img {
        mix-blend-mode: normal;
        filter: saturate(0.95) brightness(0.96);
        opacity: 0.12;
    }

    html[data-theme='nocturne'] .delivery-reference .delivery-brand-uzpost span {
        color: #2c82d6;
    }

    html[data-theme='nocturne'] .delivery-round-arrow {
        border-color: rgba(220, 168, 95, 0.42);
        background: rgba(16, 17, 17, 0.86);
        color: #dca85f;
    }

    html[data-theme='nocturne'] .delivery-arch,
    html[data-theme='nocturne'] .delivery-arch::before,
    html[data-theme='nocturne'] .delivery-arch::after {
        border-color: rgba(220, 168, 95, 0.22);
    }

    @media (max-width: 860px) {
        .delivery-reference .delivery-head,
        .delivery-reference .delivery-service-wide {
            grid-template-columns: 1fr;
        }

        .delivery-head-end,
        .delivery-round-arrow {
            display: none;
        }

        .delivery-reference .container {
            width: min(100% - 1rem, 88rem);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .reveal-item,
        .product-card,
        .topbar,
        .product-gallery-panel,
        .product-gallery-nav,
        .button {
            transition: none !important;
            animation: none !important;
        }
    }

    .collection-shell {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(18rem, 0.72fr);
        gap: 1.5rem;
        align-items: end;
        margin-bottom: 1.5rem;
    }

    .collection-copy {
        max-width: 42rem;
        color: var(--muted);
        line-height: 1.85;
    }

    .collection-active-card {
        position: relative;
        overflow: hidden;
        padding: 1.5rem;
        border: 1px solid rgba(71, 47, 34, 0.1);
        border-radius: 1.8rem;
        background:
            radial-gradient(circle at top right, rgba(183, 138, 82, 0.14), transparent 28%),
            linear-gradient(135deg, rgba(255, 252, 247, 0.98), rgba(245, 235, 223, 0.94));
        box-shadow: 0 24px 52px rgba(42, 24, 15, 0.08);
        transition:
            transform 220ms ease,
            opacity 220ms ease;
    }

    .collection-active-card span {
        display: inline-flex;
        margin-bottom: 0.85rem;
        color: var(--primary);
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .collection-active-card strong {
        display: block;
        margin-bottom: 0.8rem;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(1.8rem, 2.5vw, 2.6rem);
        line-height: 1.05;
    }

    .collection-active-card p {
        color: var(--muted);
        line-height: 1.75;
    }

    .category-mixer-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1rem;
        margin-bottom: 1.6rem;
    }

    .category-card {
        position: relative;
        overflow: hidden;
        display: grid;
        gap: 1.05rem;
        align-content: end;
        width: 100%;
        min-height: 16rem;
        padding: 1.45rem;
        border: 0;
        appearance: none;
        text-align: left;
        cursor: pointer;
        transition:
            transform 240ms ease,
            border-color 220ms ease,
            box-shadow 220ms ease;
    }

    .category-card::after {
        position: absolute;
        right: -1.8rem;
        bottom: -1.8rem;
        width: 6.8rem;
        height: 6.8rem;
        border-radius: 50%;
        background: rgba(122, 74, 48, 0.16);
        pointer-events: none;
        content: '';
        transition: transform 240ms ease, opacity 240ms ease;
    }

    .category-card:hover,
    .category-card.is-active {
        transform: translateY(-6px);
        border-color: rgba(122, 74, 48, 0.2);
        box-shadow: 0 24px 54px rgba(42, 24, 15, 0.12);
    }

    .category-card:hover::after,
    .category-card.is-active::after {
        transform: scale(1.08);
    }

    .category-card h3 {
        max-width: 12ch;
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1.15;
    }

    .category-card strong {
        position: relative;
        z-index: 1;
        font-size: 0.96rem;
        font-weight: 700;
    }

    .category-card span,
    .category-card h3,
    .category-card strong {
        position: relative;
        z-index: 1;
    }

    .category-card.is-active strong {
        color: var(--primary);
    }

    .catalog-toolbar {
        position: relative;
        overflow: hidden;
        padding: 1.35rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.8rem;
        background:
            radial-gradient(circle at top left, rgba(210, 170, 132, 0.16), transparent 34%),
            linear-gradient(135deg, rgba(255, 253, 248, 0.96) 0%, rgba(246, 238, 227, 0.94) 100%);
        box-shadow: 0 18px 40px rgba(42, 24, 15, 0.06);
    }

    .catalog-toolbar::before {
        position: absolute;
        inset: auto auto -2.5rem -2.5rem;
        width: 8rem;
        height: 8rem;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(156, 83, 51, 0.12), rgba(156, 83, 51, 0));
        content: '';
    }

    .catalog-toolbar::after {
        position: absolute;
        inset: 0;
        border-radius: inherit;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.92);
        pointer-events: none;
        content: '';
    }

    .catalog-toolbar-block {
        position: relative;
        z-index: 1;
        padding: 1rem 1.05rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.4rem;
        background: rgba(255, 252, 247, 0.72);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.88),
            0 12px 28px rgba(42, 24, 15, 0.04);
    }

    .catalog-meta {
        margin-top: 1rem;
    }

    .catalog-grid {
        position: relative;
        transition: opacity 220ms ease, transform 220ms ease;
    }

    .catalog-grid.is-loading,
    .catalog-meta.is-loading,
    .collection-active-card.is-loading {
        opacity: 0.58;
    }

    .catalog-grid.is-loading {
        transform: translateY(6px);
    }

    .catalog-grid.is-loading::before {
        position: absolute;
        inset: 0;
        border-radius: 1.8rem;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.36), transparent);
        animation: ajax-shimmer 850ms linear infinite;
        pointer-events: none;
        content: '';
    }

    @keyframes ajax-shimmer {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    @media (max-width: 1024px) {
        .collection-shell,
        .category-mixer-grid {
            grid-template-columns: 1fr 1fr;
        }

        .collection-shell {
            grid-template-columns: 1fr;
        }

        .catalog-toolbar {
            grid-template-columns: 1fr 1fr;
        }

        .catalog-sort-wrap {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 720px) {
        .category-mixer-grid {
            grid-template-columns: 1fr;
        }

        .category-card {
            min-height: 12rem;
        }

        .catalog-toolbar {
            padding: 1rem;
            grid-template-columns: 1fr;
        }

        .catalog-toolbar-block {
            padding: 0.95rem;
        }

        .catalog-meta {
            flex-direction: column;
            align-items: flex-start;
        }

        .catalog-meta-note {
            text-align: left;
        }
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

    .topbar-actions {
        gap: 0.75rem;
    }

    .theme-toggle {
        position: relative;
        isolation: isolate;
        display: inline-grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        align-items: center;
        min-width: 12rem;
        padding: 0.32rem;
        appearance: none;
        border: 1px solid rgba(122, 74, 48, 0.12);
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(255, 252, 247, 0.98) 0%, rgba(244, 235, 224, 0.92) 100%);
        color: inherit;
        font: inherit;
        cursor: pointer;
        box-shadow:
            0 12px 28px rgba(59, 36, 24, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.92);
        transition:
            transform 180ms ease,
            border-color 180ms ease,
            box-shadow 180ms ease,
            background-color 180ms ease;
    }

    .theme-toggle::before {
        position: absolute;
        top: 0.28rem;
        left: 0.28rem;
        width: calc(50% - 0.28rem);
        height: calc(100% - 0.56rem);
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(122, 74, 48, 0.12) 0%, rgba(183, 138, 82, 0.22) 100%);
        box-shadow:
            0 10px 22px rgba(59, 36, 24, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.46);
        content: '';
        transition:
            transform 240ms ease,
            background 240ms ease,
            box-shadow 240ms ease;
    }

    .theme-toggle:hover {
        transform: translateY(-1px);
    }

    .theme-toggle:focus-visible {
        outline: 2px solid rgba(122, 74, 48, 0.34);
        outline-offset: 4px;
    }

    .theme-toggle-label {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 2.55rem;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: rgba(110, 92, 80, 0.84);
        transition: color 180ms ease;
    }

    html[data-theme='atelier'] .theme-toggle-label-light,
    html[data-theme='nocturne'] .theme-toggle-label-dark {
        color: var(--primary-deep);
    }

    html[data-theme='nocturne'] {
        --bg: #1f1817;
        --surface: rgba(49, 37, 34, 0.82);
        --surface-strong: #332724;
        --text: #f2e7db;
        --muted: #cbb9ad;
        --line: rgba(240, 223, 210, 0.12);
        --primary: #c98d5f;
        --primary-deep: #f6debf;
        --gold: #d9ad6a;
        --teal: #4f968f;
        --shadow: 0 28px 80px rgba(8, 5, 5, 0.28);
    }

    html[data-theme='nocturne'] body.site-shell {
        background:
            radial-gradient(circle at top left, rgba(201, 141, 95, 0.18), transparent 28%),
            radial-gradient(circle at 85% 12%, rgba(79, 150, 143, 0.14), transparent 22%),
            linear-gradient(180deg, #191413 0%, #231a18 45%, #2a201d 100%);
    }

    html[data-theme='nocturne'] body.site-shell::before {
        background-image:
            linear-gradient(rgba(255, 232, 214, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 232, 214, 0.03) 1px, transparent 1px);
    }

    html[data-theme='nocturne'] .site-ribbon {
        filter: saturate(0.82) brightness(0.78);
        box-shadow:
            0 0 0 1px rgba(240, 223, 210, 0.1),
            0 26px 52px rgba(0, 0, 0, 0.26);
    }

    html[data-theme='nocturne'] .site-ribbon::before {
        opacity: 0.48;
    }

    html[data-theme='nocturne'] .site-ribbon::after {
        border-color: rgba(244, 223, 190, 0.16);
        box-shadow:
            inset 0 0 0 1px rgba(245, 223, 190, 0.08),
            inset 0 0 0 12px rgba(244, 223, 190, 0.03);
    }

    html[data-theme='nocturne'] .contact-map-surface {
        background:
            radial-gradient(circle at 24% 24%, rgba(79, 150, 143, 0.18), transparent 18%),
            radial-gradient(circle at 78% 74%, rgba(201, 141, 95, 0.2), transparent 24%),
            linear-gradient(135deg, rgba(51, 39, 36, 0.96) 0%, rgba(31, 24, 23, 0.98) 100%);
    }

    html[data-theme='nocturne'] .contact-map-surface::before {
        opacity: 0.58;
    }

    html[data-theme='nocturne'] .contact-map-surface::after {
        border-color: rgba(240, 223, 210, 0.08);
        box-shadow: inset 0 0 0 1px rgba(255, 243, 234, 0.04);
    }

    html[data-theme='nocturne'] .contact-map-details {
        border-color: rgba(240, 223, 210, 0.08);
        background: rgba(38, 29, 27, 0.82);
        box-shadow: 0 24px 54px rgba(8, 5, 5, 0.24);
    }

    html[data-theme='nocturne'] .contact-map-actions {
        border-top-color: rgba(240, 223, 210, 0.08);
    }

    html[data-theme='nocturne'] .contact-map-link {
        border-color: rgba(240, 223, 210, 0.1);
        background: rgba(53, 40, 37, 0.9);
        color: #fff2e6;
    }

    html[data-theme='nocturne'] .contact-map-link:hover {
        border-color: rgba(201, 141, 95, 0.22);
        background: rgba(67, 50, 46, 0.94);
        box-shadow: 0 14px 28px rgba(8, 5, 5, 0.22);
    }

    html[data-theme='nocturne'] .contact-method-card {
        border-color: rgba(232, 199, 163, 0.13);
        background:
            radial-gradient(circle at top right, rgba(201, 141, 95, 0.14), transparent 30%),
            linear-gradient(135deg, rgba(58, 43, 39, 0.94) 0%, rgba(35, 27, 26, 0.9) 100%);
        box-shadow:
            0 20px 42px rgba(8, 5, 5, 0.22),
            inset 0 1px 0 rgba(255, 244, 228, 0.06);
    }

    html[data-theme='nocturne'] .contact-method-card span {
        color: rgba(231, 213, 197, 0.68);
    }

    html[data-theme='nocturne'] .contact-method-card a,
    html[data-theme='nocturne'] .contact-method-card p {
        color: #fff1df;
    }

    html[data-theme='nocturne'] .contact-method-card:hover {
        border-color: rgba(243, 199, 143, 0.22);
        background:
            radial-gradient(circle at top right, rgba(201, 141, 95, 0.2), transparent 32%),
            linear-gradient(135deg, rgba(72, 52, 46, 0.98) 0%, rgba(42, 32, 30, 0.94) 100%);
        box-shadow:
            0 24px 48px rgba(8, 5, 5, 0.26),
            0 0 0 4px rgba(243, 199, 143, 0.06),
            inset 0 1px 0 rgba(255, 244, 228, 0.08);
    }

    html[data-theme='nocturne'] .topbar,
    html[data-theme='nocturne'] .theme-toggle,
    html[data-theme='nocturne'] .topbar-admin-link,
    html[data-theme='nocturne'] .button-secondary,
    html[data-theme='nocturne'] .hero-stats div,
    html[data-theme='nocturne'] .hero-feature,
    html[data-theme='nocturne'] .about-stat-card,
    html[data-theme='nocturne'] .about-card,
    html[data-theme='nocturne'] .contact-card,
    html[data-theme='nocturne'] .product-card,
    html[data-theme='nocturne'] .step-card,
    html[data-theme='nocturne'] .testimonial-card,
    html[data-theme='nocturne'] .category-card,
    html[data-theme='nocturne'] .portfolio-card,
    html[data-theme='nocturne'] .catalog-toolbar,
    html[data-theme='nocturne'] .catalog-toolbar-block,
    html[data-theme='nocturne'] .catalog-search,
    html[data-theme='nocturne'] .catalog-sort,
    html[data-theme='nocturne'] .collection-active-card,
    html[data-theme='nocturne'] .cart-head-note,
    html[data-theme='nocturne'] .cart-item,
    html[data-theme='nocturne'] .cart-empty,
    html[data-theme='nocturne'] .cart-quantity,
    html[data-theme='nocturne'] .contact-field input,
    html[data-theme='nocturne'] .contact-field textarea,
    html[data-theme='nocturne'] .admin-entry-card,
    html[data-theme='nocturne'] .gallery-lightbox-info,
    html[data-theme='nocturne'] .gallery-lightbox-close,
    html[data-theme='nocturne'] .product-gallery-nav,
    html[data-theme='nocturne'] .gallery-lightbox-arrow {
        border-color: rgba(240, 223, 210, 0.1);
        background:
            linear-gradient(135deg, rgba(69, 52, 47, 0.92) 0%, rgba(37, 29, 27, 0.88) 100%);
        color: #f3c78f;
        box-shadow:
            0 24px 56px rgba(8, 5, 5, 0.22),
            inset 0 1px 0 rgba(255, 243, 234, 0.05);
        transition:
            background 220ms ease,
            border-color 220ms ease,
            color 220ms ease,
            box-shadow 220ms ease;
    }

    html[data-theme='nocturne'] .product-gallery-nav:hover,
    html[data-theme='nocturne'] .gallery-lightbox-arrow:hover {
        border-color: rgba(243, 199, 143, 0.24);
        background:
            linear-gradient(135deg, rgba(86, 64, 56, 0.96) 0%, rgba(49, 37, 34, 0.94) 100%);
        color: #ffe0b7;
        box-shadow:
            0 18px 34px rgba(8, 5, 5, 0.28),
            0 0 0 4px rgba(243, 199, 143, 0.08),
            inset 0 1px 0 rgba(255, 243, 234, 0.08);
    }

    html[data-theme='nocturne'] .topbar {
        background: linear-gradient(135deg, rgba(49, 37, 34, 0.96) 0%, rgba(31, 24, 23, 0.94) 100%);
    }

    html[data-theme='nocturne'] .topbar::after {
        box-shadow: inset 0 0 0 1px rgba(255, 243, 234, 0.06);
    }

    html[data-theme='nocturne'] .brand-logo-wrap {
        border-color: rgba(245, 213, 168, 0.18);
        background: rgba(36, 27, 26, 0.76);
        box-shadow:
            0 14px 28px rgba(0, 0, 0, 0.28),
            inset 0 1px 0 rgba(255, 255, 255, 0.06);
    }

    html[data-theme='nocturne'] .topbar-actions {
        border-left-color: rgba(240, 223, 210, 0.1);
    }

    html[data-theme='nocturne'] .theme-toggle {
        background: linear-gradient(135deg, rgba(58, 43, 40, 0.98) 0%, rgba(35, 28, 27, 0.92) 100%);
    }

    html[data-theme='nocturne'] .language-switcher {
        border-color: rgba(245, 213, 168, 0.18);
        background:
            linear-gradient(135deg, rgba(36, 27, 26, 0.96), rgba(22, 17, 17, 0.88)),
            radial-gradient(circle at 80% 15%, rgba(31, 106, 103, 0.24), transparent 36%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.08),
            0 16px 34px rgba(0, 0, 0, 0.32);
    }

    html[data-theme='nocturne'] .language-switcher::before {
        background: linear-gradient(135deg, #d8a14d 0%, #a33f2f 52%, #1f6a67 100%);
        box-shadow:
            0 12px 26px rgba(0, 0, 0, 0.34),
            0 0 24px rgba(216, 161, 77, 0.2);
    }

    html[data-theme='nocturne'] .language-option {
        color: rgba(255, 244, 226, 0.68);
    }

    html[data-theme='nocturne'] .language-option:hover,
    html[data-theme='nocturne'] .language-option:focus-visible {
        color: #ffe4b8;
    }

    html[data-theme='nocturne'] .language-option.is-active {
        color: #15100f;
    }

    html[data-theme='nocturne'] .theme-toggle::before {
        transform: translateX(100%);
        background: linear-gradient(135deg, rgba(201, 141, 95, 0.92) 0%, rgba(106, 74, 53, 0.84) 100%);
        box-shadow:
            0 12px 22px rgba(0, 0, 0, 0.2),
            inset 0 1px 0 rgba(255, 243, 234, 0.18);
    }

    html[data-theme='nocturne'] .theme-toggle-label {
        color: rgba(227, 208, 194, 0.72);
    }

    html[data-theme='nocturne'] .theme-toggle-label-dark {
        color: #fff6ec;
    }

    html[data-theme='nocturne'] .topbar-admin-link {
        background: linear-gradient(135deg, rgba(67, 49, 44, 0.96) 0%, rgba(45, 34, 31, 0.94) 100%);
    }

    html[data-theme='nocturne'] .topbar-admin-overline {
        color: rgba(242, 219, 198, 0.72);
    }

    html[data-theme='nocturne'] .topbar-admin-title,
    html[data-theme='nocturne'] .brand-mark,
    html[data-theme='nocturne'] .cart-item-price strong,
    html[data-theme='nocturne'] .cart-card-head h3 {
        color: #fff2e6;
    }

    html[data-theme='nocturne'] .topbar-admin-knot {
        border-color: rgba(242, 219, 198, 0.78);
        box-shadow: 0 0 0 4px rgba(201, 141, 95, 0.18);
    }

    html[data-theme='nocturne'] .section-soft {
        background: linear-gradient(180deg, rgba(39, 29, 27, 0.9), rgba(33, 25, 24, 0.96));
    }

    html[data-theme='nocturne'] .section-deep {
        background:
            radial-gradient(circle at top right, rgba(217, 173, 106, 0.16), transparent 24%),
            linear-gradient(135deg, #3b1815 0%, #503128 48%, #1f4946 100%);
    }

    html[data-theme='nocturne'] .hero-art::before {
        background:
            radial-gradient(circle at 18% 22%, rgba(201, 141, 95, 0.3), transparent 34%),
            radial-gradient(circle at 80% 20%, rgba(88, 137, 126, 0.18), transparent 24%),
            radial-gradient(circle at 72% 78%, rgba(217, 173, 106, 0.16), transparent 26%);
        opacity: 0.72;
    }

    html[data-theme='nocturne'] .hero-art::after,
    html[data-theme='nocturne'] .hero-visual-stage {
        border-color: rgba(240, 223, 210, 0.1);
        background:
            radial-gradient(circle at top left, rgba(201, 141, 95, 0.12), transparent 28%),
            linear-gradient(135deg, rgba(49, 37, 34, 0.92) 0%, rgba(31, 24, 23, 0.9) 100%);
        box-shadow:
            0 28px 70px rgba(8, 5, 5, 0.28),
            inset 0 1px 0 rgba(255, 243, 234, 0.06);
    }

    html[data-theme='nocturne'] .hero-visual-main,
    html[data-theme='nocturne'] .hero-visual-detail {
        border-color: rgba(240, 223, 210, 0.12);
        box-shadow:
            0 24px 58px rgba(8, 5, 5, 0.24),
            inset 0 1px 0 rgba(255, 243, 234, 0.08);
    }

    html[data-theme='nocturne'] .hero-visual-stage::before,
    html[data-theme='nocturne'] .hero-visual-main::after,
    html[data-theme='nocturne'] .hero-visual-detail::after {
        border-color: rgba(240, 223, 210, 0.08);
        box-shadow: inset 0 0 0 1px rgba(255, 243, 234, 0.05);
    }

    html[data-theme='nocturne'] .hero-visual-label,
    html[data-theme='nocturne'] .hero-visual-caption,
    html[data-theme='nocturne'] .hero-visual-detail strong {
        border-color: rgba(240, 223, 210, 0.12);
        background:
            linear-gradient(135deg, rgba(58, 43, 40, 0.94) 0%, rgba(37, 29, 27, 0.9) 100%),
            repeating-linear-gradient(90deg, transparent 0 18px, rgba(240, 223, 210, 0.04) 18px 19px),
            repeating-linear-gradient(180deg, transparent 0 18px, rgba(240, 223, 210, 0.04) 18px 19px);
        box-shadow:
            0 18px 34px rgba(8, 5, 5, 0.2),
            inset 0 1px 0 rgba(255, 243, 234, 0.07),
            inset 0 0 0 1px rgba(240, 223, 210, 0.05);
    }

    html[data-theme='nocturne'] .hero-visual-label strong,
    html[data-theme='nocturne'] .hero-visual-caption,
    html[data-theme='nocturne'] .hero-visual-detail strong {
        color: #fff2e6;
    }

    html[data-theme='nocturne'] .hero-visual-label span,
    html[data-theme='nocturne'] .hero-visual-detail span {
        border-color: rgba(255, 243, 234, 0.12);
        background: rgba(201, 141, 95, 0.88);
        box-shadow: 0 12px 24px rgba(8, 5, 5, 0.18);
    }

    html[data-theme='nocturne'] .catalog-toolbar {
        background:
            radial-gradient(circle at top left, rgba(201, 141, 95, 0.16), transparent 34%),
            linear-gradient(135deg, rgba(53, 40, 37, 0.98) 0%, rgba(36, 28, 27, 0.94) 100%);
    }

    html[data-theme='nocturne'] .button-secondary,
    html[data-theme='nocturne'] .hero-stats div,
    html[data-theme='nocturne'] .hero-feature,
    html[data-theme='nocturne'] .about-stat-card,
    html[data-theme='nocturne'] .about-card,
    html[data-theme='nocturne'] .contact-card,
    html[data-theme='nocturne'] .product-card,
    html[data-theme='nocturne'] .step-card,
    html[data-theme='nocturne'] .testimonial-card,
    html[data-theme='nocturne'] .category-card,
    html[data-theme='nocturne'] .portfolio-card,
    html[data-theme='nocturne'] .catalog-toolbar-block,
    html[data-theme='nocturne'] .collection-active-card,
    html[data-theme='nocturne'] .cart-head-note,
    html[data-theme='nocturne'] .cart-item,
    html[data-theme='nocturne'] .cart-empty,
    html[data-theme='nocturne'] .cart-quantity,
    html[data-theme='nocturne'] .contact-field input,
    html[data-theme='nocturne'] .contact-field textarea,
    html[data-theme='nocturne'] .catalog-search,
    html[data-theme='nocturne'] .catalog-sort,
    html[data-theme='nocturne'] .admin-entry-card {
        background: rgba(49, 37, 34, 0.82);
    }

    html[data-theme='nocturne'] .catalog-search,
    html[data-theme='nocturne'] .catalog-sort,
    html[data-theme='nocturne'] .contact-field input,
    html[data-theme='nocturne'] .contact-field textarea {
        color: var(--text);
    }

    html[data-theme='nocturne'] .catalog-search::placeholder,
    html[data-theme='nocturne'] .contact-field input::placeholder,
    html[data-theme='nocturne'] .contact-field textarea::placeholder {
        color: rgba(203, 185, 173, 0.64);
    }

    html[data-theme='nocturne'] .filter-chip,
    html[data-theme='nocturne'] .catalog-result-pill {
        border-color: rgba(232, 199, 163, 0.13);
        background:
            linear-gradient(135deg, rgba(67, 50, 45, 0.92) 0%, rgba(36, 28, 26, 0.88) 100%);
        color: rgba(234, 214, 196, 0.82);
        box-shadow:
            inset 0 1px 0 rgba(255, 244, 228, 0.06),
            0 14px 28px rgba(10, 7, 6, 0.18);
    }

    html[data-theme='nocturne'] .filter-chip:hover,
    html[data-theme='nocturne'] .filter-chip.is-active {
        border-color: rgba(214, 128, 83, 0.36);
        background: linear-gradient(135deg, #8e4a2f 0%, #c06b45 100%);
        color: #fff4ea;
        box-shadow:
            0 16px 28px rgba(8, 5, 5, 0.28),
            0 0 0 4px rgba(214, 128, 83, 0.1);
    }

    html[data-theme='nocturne'] .catalog-result-pill span {
        color: #fff1df;
    }

    html[data-theme='nocturne'] .catalog-result-pill::before {
        background: linear-gradient(135deg, #d18e5f 0%, #c06b45 100%);
        box-shadow: 0 0 0 4px rgba(209, 142, 95, 0.13);
    }

    html[data-theme='nocturne'] .product-detail-trigger {
        border-color: rgba(243, 199, 143, 0.22);
        background:
            linear-gradient(135deg, rgba(74, 50, 39, 0.96) 0%, rgba(128, 69, 44, 0.9) 100%);
        color: #ffe9cf;
        box-shadow:
            0 16px 30px rgba(8, 5, 5, 0.24),
            inset 0 1px 0 rgba(255, 236, 206, 0.12);
    }

    html[data-theme='nocturne'] .product-detail-trigger:hover {
        border-color: rgba(255, 212, 157, 0.38);
        background:
            linear-gradient(135deg, rgba(98, 64, 47, 0.98) 0%, rgba(169, 88, 54, 0.94) 100%);
        color: #fff7ef;
        box-shadow:
            0 18px 34px rgba(8, 5, 5, 0.3),
            0 0 0 4px rgba(243, 199, 143, 0.09),
            inset 0 1px 0 rgba(255, 236, 206, 0.16);
    }

    html[data-theme='nocturne'] .product-detail-trigger:focus-visible {
        outline-color: rgba(243, 199, 143, 0.34);
    }

    html[data-theme='nocturne'] .about-gallery-points div {
        border-color: rgba(232, 199, 163, 0.16);
        background:
            linear-gradient(135deg, rgba(71, 54, 48, 0.94) 0%, rgba(39, 30, 28, 0.9) 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 244, 228, 0.08),
            0 16px 30px rgba(10, 7, 6, 0.22);
    }

    html[data-theme='nocturne'] .about-gallery-points strong {
        color: #fff3e6;
    }

    html[data-theme='nocturne'] .about-gallery-points span {
        color: rgba(231, 213, 197, 0.78);
    }

    html[data-theme='nocturne'] .portfolio-body,
    html[data-theme='nocturne'] .portfolio-card {
        background-color: rgba(44, 33, 31, 0.88);
    }

    html[data-theme='nocturne'] .testimonial-card {
        background:
            linear-gradient(180deg, rgba(53, 40, 37, 0.96) 0%, rgba(36, 28, 27, 0.92) 100%);
    }

    html[data-theme='nocturne'] .testimonial-badge,
    html[data-theme='nocturne'] .testimonial-frame,
    html[data-theme='nocturne'] .testimonial-avatar {
        border-color: rgba(240, 223, 210, 0.1);
        background:
            linear-gradient(135deg, rgba(58, 43, 40, 0.94) 0%, rgba(37, 29, 27, 0.9) 100%);
        box-shadow:
            0 18px 32px rgba(8, 5, 5, 0.18),
            inset 0 1px 0 rgba(255, 243, 234, 0.05);
    }

    html[data-theme='nocturne'] .testimonial-badge,
    html[data-theme='nocturne'] .testimonial-avatar,
    html[data-theme='nocturne'] .testimonial-headline,
    html[data-theme='nocturne'] .testimonial-user-copy strong {
        color: #fff2e6;
    }

    html[data-theme='nocturne'] .testimonial-frame::before {
        color: rgba(255, 242, 230, 0.1);
    }

    html[data-theme='nocturne'] .testimonial-star {
        color: rgba(203, 185, 173, 0.4);
    }

    html[data-theme='nocturne'] .testimonial-star.is-filled {
        color: #d9ad6a;
        text-shadow: 0 6px 16px rgba(217, 173, 106, 0.18);
    }

    html[data-theme='nocturne'] .cta-shell {
        border-color: rgba(240, 223, 210, 0.12);
        background:
            radial-gradient(circle at top left, rgba(201, 141, 95, 0.14), transparent 32%),
            linear-gradient(135deg, rgba(45, 34, 31, 0.98) 0%, rgba(34, 27, 26, 0.96) 100%);
        box-shadow:
            0 28px 60px rgba(8, 5, 5, 0.24),
            inset 0 1px 0 rgba(255, 243, 234, 0.05);
    }

    html[data-theme='nocturne'] .cta-copy p:last-child,
    html[data-theme='nocturne'] .cta-point span {
        color: var(--muted);
    }

    html[data-theme='nocturne'] .cta-point {
        border-color: rgba(240, 223, 210, 0.08);
        background: rgba(49, 37, 34, 0.78);
    }

    html[data-theme='nocturne'] .cta-point strong {
        color: #fff2e6;
    }

    html[data-theme='nocturne'] .cart-section-copy,
    html[data-theme='nocturne'] .cart-head-note,
    html[data-theme='nocturne'] .cart-section-highlight,
    html[data-theme='nocturne'] .cart-note-points span {
        border-color: rgba(240, 223, 210, 0.1);
        background:
            radial-gradient(circle at top right, rgba(201, 141, 95, 0.16), transparent 24%),
            rgba(49, 37, 34, 0.84);
        box-shadow:
            0 24px 56px rgba(8, 5, 5, 0.18),
            inset 0 1px 0 rgba(255, 243, 234, 0.04);
    }

    html[data-theme='nocturne'] .cart-card {
        border-color: rgba(240, 223, 210, 0.12);
        background:
            radial-gradient(circle at top right, rgba(201, 141, 95, 0.15), transparent 28%),
            radial-gradient(circle at bottom left, rgba(31, 106, 103, 0.12), transparent 26%),
            linear-gradient(135deg, rgba(47, 36, 33, 0.96) 0%, rgba(31, 24, 23, 0.94) 100%);
        box-shadow:
            0 30px 64px rgba(8, 5, 5, 0.28),
            inset 0 1px 0 rgba(255, 243, 234, 0.05);
    }

    html[data-theme='nocturne'] .cart-card::before {
        border-color: rgba(240, 223, 210, 0.08);
        box-shadow: inset 0 0 0 1px rgba(255, 243, 234, 0.04);
    }

    html[data-theme='nocturne'] .cart-card-head,
    html[data-theme='nocturne'] .order-form-card-head,
    html[data-theme='nocturne'] .cart-summary {
        border-color: rgba(240, 223, 210, 0.1);
    }

    html[data-theme='nocturne'] .order-form-intro,
    html[data-theme='nocturne'] .contact-field span,
    html[data-theme='nocturne'] .cart-summary span,
    html[data-theme='nocturne'] .order-form-card .form-note-muted {
        color: rgba(231, 213, 197, 0.76);
    }

    html[data-theme='nocturne'] .cart-summary div,
    html[data-theme='nocturne'] .order-form-card .form-note-muted {
        border-color: rgba(232, 199, 163, 0.12);
        background:
            linear-gradient(135deg, rgba(67, 50, 45, 0.88) 0%, rgba(37, 29, 27, 0.84) 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 244, 228, 0.06),
            0 14px 28px rgba(10, 7, 6, 0.18);
    }

    html[data-theme='nocturne'] .cart-summary strong {
        color: #fff1df;
    }

    html[data-theme='nocturne'] .order-form-card .button-primary:disabled,
    html[data-theme='nocturne'] .order-form-card .button-primary[disabled] {
        border-color: rgba(232, 199, 163, 0.16);
        background:
            linear-gradient(135deg, rgba(85, 65, 56, 0.9) 0%, rgba(57, 43, 38, 0.88) 100%);
        color: rgba(255, 236, 214, 0.62);
        opacity: 1;
        box-shadow: inset 0 1px 0 rgba(255, 244, 228, 0.05);
    }

    html[data-theme='nocturne'] .cart-section-copy::before,
    html[data-theme='nocturne'] .cart-head-note::before {
        border-color: rgba(240, 223, 210, 0.08);
        box-shadow: inset 0 0 0 1px rgba(255, 243, 234, 0.04);
    }

    html[data-theme='nocturne'] .cart-section-chip,
    html[data-theme='nocturne'] .cart-note-chip {
        border-color: rgba(240, 223, 210, 0.08);
        background: rgba(53, 40, 37, 0.9);
        color: #fff2e6;
    }

    html[data-theme='nocturne'] .cart-section-text,
    html[data-theme='nocturne'] .cart-section-highlight span,
    html[data-theme='nocturne'] .cart-head-note p {
        color: var(--muted);
    }

    html[data-theme='nocturne'] .cart-section-highlight strong,
    html[data-theme='nocturne'] .cart-head-note strong,
    html[data-theme='nocturne'] .cart-note-points span {
        color: #fff2e6;
    }

    html[data-theme='nocturne'] .cart-note-points span::before {
        box-shadow: 0 0 0 4px rgba(201, 141, 95, 0.16);
    }

    html[data-theme='nocturne'] .section-action-link {
        border-color: rgba(240, 223, 210, 0.12);
        background: linear-gradient(135deg, rgba(58, 43, 40, 0.94) 0%, rgba(37, 29, 27, 0.92) 100%);
        color: #fff2e6;
        box-shadow:
            0 18px 34px rgba(8, 5, 5, 0.18),
            inset 0 1px 0 rgba(255, 243, 234, 0.05);
    }

    html[data-theme='nocturne'] .section-action-link::before {
        background: linear-gradient(90deg, transparent 0%, rgba(255, 242, 230, 0.06) 18%, rgba(255, 242, 230, 0.36) 50%, rgba(255, 242, 230, 0.06) 82%, transparent 100%);
    }

    html[data-theme='nocturne'] .section-action-link::after {
        background: rgba(201, 141, 95, 0.14);
        color: #ffd7b1;
        box-shadow: inset 0 0 0 1px rgba(240, 223, 210, 0.06);
    }

    html[data-theme='nocturne'] .section-action-link:hover,
    html[data-theme='nocturne'] .section-action-link:focus-visible {
        color: #ffd7b1;
        border-color: rgba(201, 141, 95, 0.28);
        box-shadow:
            0 24px 40px rgba(8, 5, 5, 0.26),
            0 0 0 4px rgba(201, 141, 95, 0.12),
            inset 0 1px 0 rgba(255, 243, 234, 0.06);
    }

    html[data-theme='nocturne'] .section-action-link:hover::after,
    html[data-theme='nocturne'] .section-action-link:focus-visible::after {
        background: linear-gradient(135deg, rgba(201, 141, 95, 0.24) 0%, rgba(217, 173, 106, 0.42) 100%);
        color: #fff8f1;
        box-shadow: 0 12px 24px rgba(8, 5, 5, 0.22);
    }

    html[data-theme='nocturne'] .topbar-links a:hover,
    html[data-theme='nocturne'] .text-link:hover {
        color: #ffd7b1;
    }

    @media (max-width: 720px) {
        .theme-toggle {
            width: 100%;
            min-width: 0;
        }
    }

    .site-footer.footer-canvas {
        position: relative;
        z-index: 3;
        overflow: clip;
        margin-top: clamp(4rem, 7vw, 6rem);
        padding: clamp(5rem, 8vw, 7rem) 0 1.6rem;
        border-top: 0;
        background:
            radial-gradient(circle at 16% 0%, rgba(228, 170, 100, 0.18), transparent 28%),
            radial-gradient(circle at 84% 12%, rgba(93, 118, 204, 0.16), transparent 26%),
            linear-gradient(120deg, #06101d 0%, #140a1f 48%, #321207 100%);
        isolation: isolate;
    }

    .site-footer.footer-canvas::before,
    .site-footer.footer-canvas::after {
        position: absolute;
        inset: 0;
        pointer-events: none;
        content: '';
    }

    .site-footer.footer-canvas::before {
        background-image:
            linear-gradient(rgba(255, 232, 214, 0.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 232, 214, 0.06) 1px, transparent 1px);
        background-size: 28px 28px;
        mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.85), transparent 96%);
        opacity: 0.38;
    }

    .site-footer.footer-canvas::after {
        inset: auto 8% -9rem auto;
        width: 22rem;
        height: 22rem;
        border-radius: 999px;
        background: radial-gradient(circle, rgba(210, 147, 84, 0.34) 0%, rgba(210, 147, 84, 0) 72%);
        filter: blur(16px);
        animation: footerCanvasGlow 14s ease-in-out infinite alternate;
    }

    .site-footer.footer-canvas > .container.footer-canvas-container {
        width: min(1320px, calc(100% - 2rem));
    }

    .footer-banner {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(18rem, 24rem);
        gap: 1.4rem;
        align-items: end;
        margin-bottom: -2.8rem;
        padding: 1.7rem;
        border: 1px solid rgba(255, 238, 224, 0.16);
        border-radius: 2.2rem;
        background:
            radial-gradient(circle at top left, rgba(255, 220, 191, 0.2), transparent 34%),
            linear-gradient(135deg, rgba(140, 74, 50, 0.96) 0%, rgba(103, 44, 31, 0.96) 38%, rgba(34, 18, 30, 0.98) 100%);
        box-shadow:
            0 34px 72px rgba(8, 5, 11, 0.28),
            inset 0 1px 0 rgba(255, 244, 233, 0.08);
        backdrop-filter: blur(18px);
    }

    .footer-banner::before,
    .footer-surface::before {
        position: absolute;
        inset: 0.8rem;
        border: 1px solid rgba(255, 239, 224, 0.08);
        border-radius: calc(2.2rem - 0.8rem);
        pointer-events: none;
        content: '';
    }

    .footer-banner::after {
        position: absolute;
        inset: auto auto -6rem -4rem;
        width: 18rem;
        height: 18rem;
        border-radius: 999px;
        background: radial-gradient(circle, rgba(255, 214, 180, 0.12) 0%, rgba(255, 214, 180, 0) 72%);
        filter: blur(6px);
        animation: footerCanvasDrift 16s linear infinite;
        content: '';
    }

    .footer-banner > * {
        position: relative;
        z-index: 1;
    }

    .footer-kicker,
    .footer-card-kicker {
        display: inline-flex;
        align-items: center;
        width: fit-content;
        min-height: 2rem;
        padding: 0.45rem 0.85rem;
        border: 1px solid rgba(255, 241, 229, 0.14);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.08);
        color: rgba(255, 237, 223, 0.88);
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .footer-card-kicker {
        position: relative;
        gap: 0.52rem;
        padding-right: 0.72rem;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.04));
        box-shadow: inset 0 1px 0 rgba(255, 250, 246, 0.08);
    }

    .footer-card-kicker::after {
        width: 0.36rem;
        height: 0.36rem;
        border-radius: 999px;
        background: currentColor;
        box-shadow: 0 0 0 0.24rem rgba(255, 226, 199, 0.08);
        content: '';
    }

    .footer-banner-copy {
        display: grid;
        gap: 1rem;
    }

    .footer-banner-copy h2 {
        max-width: 12ch;
        color: #fff7ef;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2.45rem, 4.2vw, 4.5rem);
        line-height: 0.96;
    }

    .footer-banner-copy p {
        max-width: 42rem;
        color: rgba(247, 228, 214, 0.82);
        font-size: 1rem;
        line-height: 1.82;
    }

    .footer-banner-points {
        display: flex;
        flex-wrap: wrap;
        gap: 0.7rem;
    }

    .footer-banner-points span,
    .footer-pill,
    .footer-bottom-pills span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 2.35rem;
        padding: 0.65rem 0.95rem;
        border: 1px solid rgba(255, 240, 228, 0.12);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.07);
        color: #fff1e3;
        font-size: 0.8rem;
        font-weight: 700;
        line-height: 1.4;
        backdrop-filter: blur(10px);
    }

    .footer-banner-side {
        display: grid;
        gap: 1rem;
        align-content: end;
    }

    .footer-banner-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.9rem;
    }

    .footer-banner-stat {
        padding: 1rem 1.05rem;
        border: 1px solid rgba(255, 241, 229, 0.1);
        border-radius: 1.35rem;
        background: rgba(255, 255, 255, 0.07);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04);
    }

    .footer-banner-stat strong {
        display: block;
        margin-bottom: 0.3rem;
        color: #fff9f4;
        font-size: 1.5rem;
        font-weight: 800;
    }

    .footer-banner-stat span {
        color: rgba(245, 226, 214, 0.72);
        font-size: 0.9rem;
        line-height: 1.55;
    }

    .footer-banner-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.85rem;
    }

    .footer-action-button {
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.72rem;
        min-height: 3.4rem;
        padding: 0.95rem 1.3rem;
        border: 1px solid rgba(255, 242, 230, 0.14);
        border-radius: 999px;
        color: #fff8f3;
        font-size: 0.95rem;
        font-weight: 700;
        line-height: 1.2;
        text-align: center;
        box-shadow:
            0 18px 34px rgba(9, 5, 10, 0.22),
            inset 0 1px 0 rgba(255, 250, 246, 0.08);
        transition:
            transform 220ms ease,
            border-color 220ms ease,
            background-color 220ms ease,
            box-shadow 220ms ease,
            color 220ms ease;
    }

    .footer-action-button::before {
        position: absolute;
        top: -10%;
        left: -55%;
        width: 40%;
        height: 120%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.34), transparent);
        transform: skewX(-24deg);
        opacity: 0;
        content: '';
        transition:
            transform 460ms ease,
            opacity 460ms ease;
    }

    .footer-action-button:hover,
    .footer-action-button:focus-visible {
        transform: translateY(-3px);
        border-color: rgba(255, 221, 189, 0.26);
        box-shadow:
            0 22px 40px rgba(9, 5, 10, 0.28),
            inset 0 1px 0 rgba(255, 250, 246, 0.12);
    }

    .footer-action-button:hover::before,
    .footer-action-button:focus-visible::before {
        transform: translateX(320%) skewX(-24deg);
        opacity: 1;
    }

    .footer-action-button:focus-visible,
    .footer-social-link:focus-visible,
    .footer-menu-list a:focus-visible,
    .footer-contact-row:focus-visible {
        outline: 2px solid rgba(255, 219, 188, 0.7);
        outline-offset: 4px;
    }

    .footer-action-button svg,
    .footer-social-link svg,
    .footer-brand-mark-icon svg,
    .footer-contact-icon svg,
    .footer-contact-action svg {
        width: 1.1rem;
        height: 1.1rem;
    }

    .footer-canvas svg path,
    .footer-canvas svg circle,
    .footer-canvas svg rect {
        fill: none;
        stroke: currentColor;
        stroke-width: 1.8;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .footer-action-button-primary {
        background: linear-gradient(135deg, #f6dcc0 0%, #d5a26d 46%, #b16744 100%);
        border-color: rgba(255, 231, 207, 0.3);
        color: #24110c;
    }

    .footer-action-button-secondary {
        background: rgba(255, 255, 255, 0.08);
    }

    .footer-action-button-ghost {
        background: linear-gradient(135deg, rgba(66, 87, 150, 0.22) 0%, rgba(255, 255, 255, 0.04) 100%);
    }

    .footer-surface {
        position: relative;
        padding: 5rem 1.45rem 1.5rem;
        border: 1px solid rgba(255, 237, 224, 0.12);
        border-radius: 2.45rem;
        background:
            radial-gradient(circle at top right, rgba(207, 146, 92, 0.12), transparent 24%),
            radial-gradient(circle at bottom left, rgba(88, 122, 204, 0.08), transparent 28%),
            linear-gradient(180deg, rgba(8, 17, 31, 0.94) 0%, rgba(20, 10, 20, 0.94) 100%);
        box-shadow:
            0 32px 80px rgba(8, 5, 11, 0.38),
            inset 0 1px 0 rgba(255, 250, 246, 0.04);
        backdrop-filter: blur(20px);
    }

    .footer-surface::before {
        border-radius: calc(2.45rem - 0.8rem);
    }

    .footer-surface::after {
        position: absolute;
        right: 1.5rem;
        bottom: 1.6rem;
        width: 13rem;
        height: 13rem;
        border-radius: 50%;
        background:
            radial-gradient(circle at center, rgba(244, 191, 142, 0.14) 0 12%, transparent 12% 100%),
            radial-gradient(circle at center, transparent 0 34%, rgba(244, 191, 142, 0.1) 34% 37%, transparent 37% 100%),
            radial-gradient(circle at center, transparent 0 56%, rgba(127, 152, 230, 0.08) 56% 60%, transparent 60% 100%);
        opacity: 0.9;
        filter: blur(0.2px);
        pointer-events: none;
        content: '';
    }

    .footer-surface > * {
        position: relative;
        z-index: 1;
    }

    .footer-grid-immersive {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) repeat(2, minmax(0, 0.9fr)) minmax(0, 1.02fr);
        gap: 1rem;
        align-items: start;
    }

    .footer-brand-card,
    .footer-menu-card,
    .footer-contact-card {
        --footer-accent: #d99869;
        --footer-accent-soft: rgba(217, 152, 105, 0.18);
        --footer-accent-secondary: rgba(104, 126, 207, 0.12);
        position: relative;
        isolation: isolate;
        overflow: hidden;
        display: grid;
        gap: 1rem;
        min-height: 100%;
        padding: 1.45rem;
        border: 1px solid rgba(255, 239, 224, 0.08);
        border-radius: 1.7rem;
        background:
            radial-gradient(circle at top right, var(--footer-accent-soft), transparent 34%),
            radial-gradient(circle at bottom left, var(--footer-accent-secondary), transparent 42%),
            linear-gradient(180deg, rgba(255, 255, 255, 0.07), rgba(255, 255, 255, 0.03));
        box-shadow:
            0 20px 40px rgba(7, 5, 10, 0.16),
            inset 0 1px 0 rgba(255, 250, 246, 0.04);
        transition:
            transform 220ms ease,
            border-color 220ms ease,
            background 220ms ease,
            box-shadow 220ms ease;
    }

    .footer-brand-card::before,
    .footer-menu-card::before,
    .footer-contact-card::before {
        position: absolute;
        inset: -35% auto auto -10%;
        width: 11rem;
        height: 11rem;
        border-radius: 999px;
        background: radial-gradient(circle, rgba(255, 215, 189, 0.1), rgba(255, 215, 189, 0));
        content: '';
    }

    .footer-brand-card::after,
    .footer-menu-card::after,
    .footer-contact-card::after {
        position: absolute;
        inset: 0.72rem;
        border: 1px solid rgba(255, 243, 231, 0.05);
        border-radius: 1.2rem;
        background:
            linear-gradient(90deg, var(--footer-accent-soft), transparent) top left / 4.4rem 1px no-repeat,
            linear-gradient(180deg, var(--footer-accent-soft), transparent) top left / 1px 4.4rem no-repeat,
            linear-gradient(-90deg, var(--footer-accent-soft), transparent) top right / 4.4rem 1px no-repeat,
            linear-gradient(180deg, var(--footer-accent-soft), transparent) top right / 1px 4.4rem no-repeat,
            linear-gradient(90deg, var(--footer-accent-soft), transparent) bottom left / 4.4rem 1px no-repeat,
            linear-gradient(-180deg, var(--footer-accent-soft), transparent) bottom left / 1px 4.4rem no-repeat,
            linear-gradient(-90deg, var(--footer-accent-soft), transparent) bottom right / 4.4rem 1px no-repeat,
            linear-gradient(-180deg, var(--footer-accent-soft), transparent) bottom right / 1px 4.4rem no-repeat;
        opacity: 0.9;
        pointer-events: none;
        content: '';
    }

    .footer-brand-card {
        --footer-accent: #ebb181;
        --footer-accent-soft: rgba(235, 177, 129, 0.22);
        --footer-accent-secondary: rgba(182, 83, 64, 0.16);
    }

    .footer-menu-card.is-amber {
        --footer-accent: #ebb27a;
        --footer-accent-soft: rgba(235, 178, 122, 0.18);
        --footer-accent-secondary: rgba(176, 82, 68, 0.14);
    }

    .footer-menu-card.is-sapphire {
        --footer-accent: #94abf3;
        --footer-accent-soft: rgba(148, 171, 243, 0.18);
        --footer-accent-secondary: rgba(84, 111, 205, 0.14);
    }

    .footer-contact-card {
        --footer-accent: #e1a16e;
        --footer-accent-soft: rgba(225, 161, 110, 0.18);
        --footer-accent-secondary: rgba(100, 126, 214, 0.12);
    }

    .footer-brand-card > *,
    .footer-menu-card > *,
    .footer-contact-card > * {
        position: relative;
        z-index: 2;
    }

    .footer-card-ornament {
        position: absolute;
        top: 0.9rem;
        right: 0.9rem;
        width: 6.4rem;
        color: rgba(255, 224, 197, 0.28);
        opacity: 0.95;
        pointer-events: none;
        transform: rotate(4deg);
        z-index: 1;
    }

    .footer-card-ornament svg {
        display: block;
        width: 100%;
        height: auto;
    }

    .footer-brand-card .footer-card-ornament-brand {
        top: 1rem;
        right: 1rem;
        width: 7.9rem;
        color: rgba(245, 192, 146, 0.38);
        transform: rotate(-2deg);
    }

    .footer-contact-card .footer-card-ornament-contact {
        top: 0.9rem;
        right: 1rem;
        width: 6.9rem;
        color: rgba(237, 180, 131, 0.32);
        transform: rotate(0deg);
    }

    .footer-menu-card.is-sapphire .footer-card-ornament {
        color: rgba(163, 181, 255, 0.32);
    }

    .footer-menu-card.is-amber .footer-card-ornament {
        color: rgba(248, 196, 146, 0.28);
    }

    .footer-brand-card:hover,
    .footer-menu-card:hover,
    .footer-contact-card:hover {
        transform: translateY(-4px);
        border-color: rgba(255, 228, 201, 0.14);
        background:
            radial-gradient(circle at top right, var(--footer-accent-soft), transparent 34%),
            radial-gradient(circle at bottom left, var(--footer-accent-secondary), transparent 42%),
            linear-gradient(180deg, rgba(255, 255, 255, 0.09), rgba(255, 255, 255, 0.04));
        box-shadow:
            0 28px 54px rgba(7, 5, 10, 0.24),
            inset 0 1px 0 rgba(255, 250, 246, 0.06);
    }

    .footer-brand-mark {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .footer-brand-mark-icon {
        display: grid;
        place-items: center;
        width: 4rem;
        height: 4rem;
        border-radius: 1.25rem;
        background:
            radial-gradient(circle at top left, rgba(255, 236, 219, 0.28), transparent 46%),
            linear-gradient(135deg, rgba(216, 153, 94, 0.82) 0%, rgba(153, 73, 48, 0.92) 100%);
        color: #fff9f5;
        box-shadow:
            0 18px 28px rgba(43, 18, 10, 0.24),
            inset 0 1px 0 rgba(255, 250, 246, 0.16);
    }

    .footer-brand-mark-icon svg {
        width: 1.8rem;
        height: 1.8rem;
    }

    .footer-brand-mark-copy {
        display: grid;
        gap: 0.2rem;
    }

    .footer-brand-mark-copy strong {
        color: #fff7ef;
        font-size: 1.35rem;
        font-weight: 800;
        letter-spacing: 0.02em;
    }

    .footer-brand-mark-copy small {
        color: rgba(240, 223, 210, 0.72);
        font-size: 0.86rem;
        line-height: 1.55;
    }

    .footer-brand-card p,
    .footer-menu-list span,
    .footer-contact-copy small,
    .footer-bottom p {
        color: rgba(240, 223, 210, 0.74);
    }

    .footer-brand-card p {
        max-width: 32rem;
        line-height: 1.82;
    }

    .footer-pill-row,
    .footer-social-row,
    .footer-bottom-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .footer-social-link {
        display: inline-grid;
        place-items: center;
        width: 3rem;
        height: 3rem;
        border: 1px solid rgba(255, 238, 224, 0.1);
        border-radius: 1rem;
        background: rgba(255, 255, 255, 0.07);
        color: #fff6ee;
        box-shadow:
            0 16px 28px rgba(7, 5, 10, 0.16),
            inset 0 1px 0 rgba(255, 250, 246, 0.06);
        transition:
            transform 220ms ease,
            border-color 220ms ease,
            background 220ms ease,
            box-shadow 220ms ease;
    }

    .footer-social-link:hover,
    .footer-social-link:focus-visible {
        transform: translateY(-4px) scale(1.03);
        border-color: rgba(255, 219, 188, 0.24);
        background:
            linear-gradient(135deg, rgba(214, 147, 88, 0.3) 0%, rgba(86, 112, 198, 0.18) 100%);
        box-shadow:
            0 22px 36px rgba(7, 5, 10, 0.22),
            inset 0 1px 0 rgba(255, 250, 246, 0.1);
    }

    .footer-menu-card h3,
    .footer-contact-card h3 {
        position: relative;
        padding-bottom: 0.8rem;
        color: #fff7ef;
        font-size: 1.12rem;
        font-weight: 700;
    }

    .footer-menu-card h3::after,
    .footer-contact-card h3::after {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 4.6rem;
        height: 0.22rem;
        border-radius: 999px;
        background: linear-gradient(90deg, var(--footer-accent) 0%, rgba(255, 255, 255, 0.08) 100%);
        box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.04);
        content: '';
    }

    .footer-menu-list,
    .footer-contact-stack {
        display: grid;
        gap: 0.82rem;
    }

    .footer-menu-list a {
        position: relative;
        display: grid;
        gap: 0.28rem;
        padding: 1rem 2.4rem 1rem 1rem;
        border: 1px solid rgba(255, 239, 224, 0.08);
        border-radius: 1.2rem;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.03) 100%);
        box-shadow: inset 0 1px 0 rgba(255, 250, 246, 0.04);
        transition:
            transform 220ms ease,
            border-color 220ms ease,
            background 220ms ease,
            box-shadow 220ms ease;
    }

    .footer-menu-list a::before {
        position: absolute;
        top: 0.9rem;
        bottom: 0.9rem;
        left: 0.72rem;
        width: 0.18rem;
        border-radius: 999px;
        background: linear-gradient(180deg, var(--footer-accent) 0%, rgba(255, 248, 240, 0.16) 100%);
        opacity: 0.9;
        content: '';
    }

    .footer-menu-list a::after {
        position: absolute;
        top: 50%;
        right: 1rem;
        width: 0.65rem;
        height: 0.65rem;
        border-top: 2px solid currentColor;
        border-right: 2px solid currentColor;
        color: rgba(255, 237, 224, 0.76);
        transform: translateY(-50%) rotate(45deg);
        content: '';
    }

    .footer-menu-list a:hover,
    .footer-menu-list a:focus-visible {
        transform: translateY(-3px) translateX(2px);
        border-color: rgba(255, 219, 188, 0.16);
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.09) 0%, var(--footer-accent-soft) 100%);
        box-shadow:
            0 18px 28px rgba(7, 5, 10, 0.18),
            inset 0 1px 0 rgba(255, 250, 246, 0.06);
    }

    .footer-menu-list strong,
    .footer-contact-copy strong {
        display: block;
        color: #fff8f2;
        font-size: 0.98rem;
        font-weight: 700;
        line-height: 1.55;
    }

    .footer-menu-list span,
    .footer-contact-copy small {
        font-size: 0.85rem;
        line-height: 1.65;
    }

    .footer-contact-row {
        position: relative;
        overflow: hidden;
        display: grid;
        grid-template-columns: auto minmax(0, 1fr) auto;
        gap: 0.9rem;
        align-items: center;
        padding: 0.95rem 1rem;
        border: 1px solid rgba(255, 239, 224, 0.08);
        border-radius: 1.2rem;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.03) 100%);
        box-shadow: inset 0 1px 0 rgba(255, 250, 246, 0.04);
        transition:
            transform 220ms ease,
            border-color 220ms ease,
            background 220ms ease,
            box-shadow 220ms ease;
    }

    .footer-contact-row::before {
        position: absolute;
        top: 0.85rem;
        bottom: 0.85rem;
        left: 0.72rem;
        width: 0.18rem;
        border-radius: 999px;
        background: linear-gradient(180deg, var(--footer-accent) 0%, rgba(255, 248, 240, 0.16) 100%);
        opacity: 0.85;
        content: '';
    }

    .footer-contact-row:hover,
    .footer-contact-row:focus-visible {
        transform: translateY(-3px);
        border-color: rgba(255, 219, 188, 0.16);
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, var(--footer-accent-secondary) 100%);
        box-shadow:
            0 18px 28px rgba(7, 5, 10, 0.18),
            inset 0 1px 0 rgba(255, 250, 246, 0.06);
    }

    .footer-contact-row.is-static:hover {
        transform: none;
    }

    .footer-contact-icon,
    .footer-contact-action {
        display: inline-grid;
        place-items: center;
    }

    .footer-contact-icon {
        width: 2.85rem;
        height: 2.85rem;
        border-radius: 1rem;
        background:
            linear-gradient(135deg, rgba(214, 147, 88, 0.18), rgba(255, 255, 255, 0.06));
        color: #fff4eb;
    }

    .footer-contact-action {
        width: 2.15rem;
        height: 2.15rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.08);
        color: rgba(255, 242, 230, 0.82);
    }

    .footer-contact-copy {
        min-width: 0;
    }

    .footer-contact-copy small {
        display: block;
        margin-bottom: 0.18rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .footer-contact-copy strong {
        overflow-wrap: anywhere;
    }

    .footer-contact-row.is-static .footer-contact-action {
        opacity: 0.48;
    }

    .footer-bottom {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 1rem;
        padding: 1rem 0.25rem 0;
        border-top: 1px solid rgba(255, 239, 224, 0.08);
    }

    .footer-bottom p {
        max-width: 38rem;
        font-size: 0.95rem;
        line-height: 1.75;
    }

    .footer-bottom-pills {
        justify-content: flex-end;
    }

    .footer-bottom-pills span {
        background: rgba(255, 255, 255, 0.05);
        font-size: 0.76rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    @keyframes footerCanvasGlow {
        0% {
            transform: translate3d(0, 0, 0) scale(1);
        }
        100% {
            transform: translate3d(-1.5rem, -0.75rem, 0) scale(1.08);
        }
    }

    @keyframes footerCanvasDrift {
        0% {
            transform: translate3d(0, 0, 0) scale(1);
        }
        50% {
            transform: translate3d(1.4rem, -1rem, 0) scale(1.08);
        }
        100% {
            transform: translate3d(0, 0, 0) scale(1);
        }
    }

    @media (max-width: 1180px) {
        .footer-banner {
            grid-template-columns: 1fr;
        }

        .footer-banner-copy h2 {
            max-width: 14ch;
        }

        .footer-banner-side {
            grid-template-columns: minmax(0, 1fr);
            justify-items: start;
        }

        .footer-grid-immersive {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .footer-brand-card {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 860px) {
        .site-footer.footer-canvas {
            padding-top: 4.4rem;
        }

        .footer-banner {
            margin-bottom: 1rem;
        }

        .footer-surface {
            padding-top: 1.45rem;
        }

        .footer-banner-stats,
        .footer-grid-immersive {
            grid-template-columns: 1fr;
        }

        .footer-bottom {
            align-items: flex-start;
        }

        .footer-bottom-pills {
            justify-content: flex-start;
        }
    }

    @media (max-width: 640px) {
        .site-footer.footer-canvas > .container.footer-canvas-container {
            width: min(100%, calc(100% - 1rem));
        }

        .footer-banner,
        .footer-surface,
        .footer-brand-card,
        .footer-menu-card,
        .footer-contact-card {
            border-radius: 1.55rem;
        }

        .footer-banner {
            padding: 1.25rem;
        }

        .footer-banner::before,
        .footer-surface::before {
            inset: 0.65rem;
            border-radius: calc(1.55rem - 0.65rem);
        }

        .footer-surface {
            padding: 1.2rem;
        }

        .footer-brand-card,
        .footer-menu-card,
        .footer-contact-card {
            padding: 1.15rem;
        }

        .footer-card-ornament {
            right: 0.72rem;
            width: 5.2rem;
            opacity: 0.72;
        }

        .footer-brand-card .footer-card-ornament-brand,
        .footer-contact-card .footer-card-ornament-contact {
            width: 5.9rem;
        }

        .footer-banner-copy h2 {
            font-size: clamp(2.1rem, 12vw, 3rem);
        }

        .footer-banner-actions,
        .footer-pill-row,
        .footer-social-row,
        .footer-bottom-pills {
            gap: 0.6rem;
        }

        .footer-action-button {
            width: 100%;
        }

        .footer-contact-row {
            grid-template-columns: auto minmax(0, 1fr);
        }

        .footer-contact-action {
            display: none;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .site-footer.footer-canvas::after,
        .footer-banner::after,
        .footer-action-button::before {
            animation: none;
            transition: none;
        }

        .footer-action-button,
        .footer-social-link,
        .footer-menu-list a,
        .footer-contact-row,
        .footer-brand-card,
        .footer-menu-card,
        .footer-contact-card {
            transition: none;
        }
    }
    /* Delivery reference layout fallback */
.delivery-showcase-section {
        padding: clamp(1rem, 2vw, 2rem) 0 clamp(2rem, 4vw, 4rem);
        background:
            linear-gradient(90deg, rgba(255, 248, 239, 0.82), rgba(237, 223, 207, 0.72)),
            #efe4d7;
    }

    html[data-theme='nocturne'] .delivery-showcase-section {
        background:
            linear-gradient(90deg, rgba(13, 14, 14, 0.96), rgba(28, 22, 18, 0.92)),
            #111;
    }

    .delivery-showcase-shell {
        position: relative;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        width: min(1280px, calc(100% - 1.25rem));
        margin-inline: auto;
        overflow: hidden;
        border: 1px solid rgba(188, 142, 96, 0.24);
        border-radius: 0.9rem;
        background: #f7efe6;
        box-shadow: 0 28px 70px rgba(49, 27, 17, 0.12);
    }

    .delivery-preview-toggle {
        position: absolute;
        top: 1.9rem;
        left: 50%;
        z-index: 6;
        display: inline-grid;
        grid-template-columns: auto 2rem 2rem auto;
        align-items: center;
        gap: 0.35rem;
        min-height: 2.35rem;
        padding: 0.22rem 0.75rem;
        border: 1px solid rgba(188, 142, 96, 0.28);
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(242, 225, 206, 0.96), rgba(24, 24, 23, 0.92));
        color: #7a4a30;
        font-size: 0.68rem;
        font-weight: 800;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        transform: translateX(-50%);
        box-shadow: 0 16px 30px rgba(31, 18, 11, 0.18);
    }

    .delivery-preview-toggle span:last-child {
        color: #dca85f;
    }

    .delivery-toggle-sun,
    .delivery-toggle-moon {
        display: inline-grid;
        place-items: center;
        width: 2rem;
        height: 2rem;
        border-radius: 999px;
    }

    .delivery-toggle-sun {
        background: rgba(255, 248, 239, 0.9);
        color: #b97848;
    }

    .delivery-toggle-sun::before {
        width: 0.9rem;
        height: 0.9rem;
        border: 1px solid currentColor;
        border-radius: 999px;
        box-shadow: 0 -0.42rem 0 -0.34rem currentColor, 0 0.42rem 0 -0.34rem currentColor, 0.42rem 0 0 -0.34rem currentColor, -0.42rem 0 0 -0.34rem currentColor;
        content: '';
    }

    .delivery-toggle-moon {
        background: #161716;
        color: #dca85f;
    }

    .delivery-toggle-moon::before {
        width: 1rem;
        height: 1rem;
        border-radius: 999px;
        background: currentColor;
        box-shadow: 0.35rem -0.1rem 0 0 #161716;
        content: '';
    }

    .delivery-board {
        --delivery-bg: #fbf6ef;
        --delivery-card: rgba(255, 252, 247, 0.82);
        --delivery-card-strong: rgba(255, 252, 247, 0.94);
        --delivery-border: rgba(190, 145, 96, 0.26);
        --delivery-border-soft: rgba(190, 145, 96, 0.16);
        --delivery-text: #332821;
        --delivery-muted: #76665a;
        --delivery-accent: #c8895d;
        --delivery-title: #352922;
        --delivery-shadow: 0 18px 45px rgba(55, 31, 19, 0.08);
        --delivery-line-art: rgba(201, 141, 95, 0.2);
        --delivery-truck-box: #b9855d;
        --delivery-truck-side: #6a493b;
        --delivery-truck-cab: #eee2d4;
        --delivery-truck-window: #5d463e;
        min-width: 0;
        padding: clamp(1.05rem, 1.65vw, 1.4rem);
        color: var(--delivery-text);
        background:
            linear-gradient(145deg, rgba(255, 252, 247, 0.93), rgba(244, 233, 219, 0.86)),
            var(--delivery-bg);
    }

    .delivery-board-dark {
        --delivery-bg: #101111;
        --delivery-card: rgba(20, 21, 21, 0.82);
        --delivery-card-strong: rgba(18, 19, 19, 0.95);
        --delivery-border: rgba(211, 151, 82, 0.34);
        --delivery-border-soft: rgba(211, 151, 82, 0.2);
        --delivery-text: #f4d4aa;
        --delivery-muted: rgba(244, 213, 176, 0.72);
        --delivery-accent: #dca85f;
        --delivery-title: #e0ad65;
        --delivery-shadow: 0 18px 45px rgba(0, 0, 0, 0.34);
        --delivery-line-art: rgba(220, 168, 95, 0.22);
        --delivery-truck-box: #242525;
        --delivery-truck-side: #111;
        --delivery-truck-cab: #1c1d1d;
        --delivery-truck-window: #474a49;
        background:
            radial-gradient(circle at 78% 8%, rgba(220, 168, 95, 0.1), transparent 24%),
            linear-gradient(145deg, #171817, #0e0f0f 62%, #111);
    }

    .delivery-board + .delivery-board {
        border-left: 1px solid rgba(188, 142, 96, 0.2);
    }

    .delivery-board-head {
        display: flex;
        align-items: flex-start;
        gap: 0.85rem;
        min-height: 4.75rem;
        margin-bottom: 0.7rem;
    }

    .delivery-board-dark .delivery-board-head {
        justify-content: flex-end;
        text-align: right;
    }

    .delivery-board-dark .delivery-board-head .delivery-board-mark {
        order: 2;
    }

    .delivery-board-head h2 {
        margin: 0;
        color: var(--delivery-title);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(1.85rem, 3vw, 2.65rem);
        line-height: 0.95;
    }

    .delivery-board-head p {
        margin-top: 0.35rem;
        color: var(--delivery-muted);
        font-size: 0.83rem;
        line-height: 1.45;
    }

    .delivery-board-mark,
    .delivery-mini-mark {
        position: relative;
        display: inline-grid;
        place-items: center;
        flex: 0 0 auto;
        border: 1px solid var(--delivery-border);
        color: var(--delivery-accent);
    }

    .delivery-board-mark {
        width: 2.6rem;
        height: 2.6rem;
        border-radius: 0.72rem;
    }

    .delivery-mini-mark {
        width: 1.65rem;
        height: 1.65rem;
        border-radius: 0.5rem;
    }

    .delivery-board-mark::before,
    .delivery-board-mark::after,
    .delivery-mini-mark::before,
    .delivery-mini-mark::after {
        position: absolute;
        inset: 0.34rem;
        border: 1px solid currentColor;
        border-radius: 0.34rem;
        content: '';
    }

    .delivery-mini-mark::before,
    .delivery-mini-mark::after {
        inset: 0.24rem;
        border-radius: 0.24rem;
    }

    .delivery-board-mark::after,
    .delivery-mini-mark::after {
        transform: rotate(45deg);
    }

    .delivery-board-stack {
        display: grid;
        gap: 0.9rem;
    }

    .delivery-panel,
    .delivery-info-row,
    .delivery-guarantee-strip {
        border: 1px solid var(--delivery-border);
        border-radius: 0.9rem;
        background:
            linear-gradient(145deg, var(--delivery-card), rgba(255, 255, 255, 0.02)),
            var(--delivery-card);
        box-shadow: var(--delivery-shadow);
    }

    .delivery-panel {
        padding: 0.9rem;
    }

    .delivery-panel-head {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.8rem;
    }

    .delivery-panel-head h3,
    .delivery-info-row h3 {
        margin: 0;
        color: var(--delivery-title);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(1.18rem, 1.7vw, 1.45rem);
        line-height: 1.1;
    }

    .delivery-panel-head p {
        margin: 0;
        color: var(--delivery-muted);
        font-size: 0.76rem;
    }

    .delivery-panel-head p::before {
        margin-inline: 0.35rem;
        color: var(--delivery-accent);
        content: '\2022';
    }

    .delivery-route-card {
        position: relative;
        overflow: hidden;
        min-width: 0;
        min-height: 10.7rem;
        padding: 1rem;
        border: 1px solid var(--delivery-border-soft);
        border-radius: 0.8rem;
        background:
            linear-gradient(135deg, var(--delivery-card-strong), rgba(255, 255, 255, 0.02)),
            var(--delivery-card-strong);
    }

    .delivery-route-card > * {
        position: relative;
        z-index: 1;
    }

    .delivery-route-card-local {
        display: grid;
        grid-template-columns: minmax(16rem, 1.16fr) minmax(12.5rem, 0.75fr) auto;
        align-items: center;
        gap: clamp(0.75rem, 1.5vw, 1.2rem);
    }

    .delivery-foreign-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.9rem;
    }

    .delivery-world-map,
    .delivery-architecture {
        position: absolute;
        z-index: 0;
        pointer-events: none;
    }

    .delivery-world-map {
        inset: 1.8rem 1.25rem auto auto;
        width: 12rem;
        height: 5rem;
        opacity: 0.28;
        background:
            radial-gradient(ellipse at 22% 48%, var(--delivery-line-art) 0 16%, transparent 17%),
            radial-gradient(ellipse at 44% 42%, var(--delivery-line-art) 0 22%, transparent 23%),
            radial-gradient(ellipse at 70% 52%, var(--delivery-line-art) 0 18%, transparent 19%),
            linear-gradient(90deg, transparent 0 18%, var(--delivery-line-art) 18% 19%, transparent 19% 40%, var(--delivery-line-art) 40% 41%, transparent 41% 64%, var(--delivery-line-art) 64% 65%, transparent 65%);
        filter: blur(0.1px);
    }

    .delivery-architecture {
        width: 9.8rem;
        height: 7.4rem;
        border: 1px solid var(--delivery-line-art);
        border-bottom: 0;
        border-radius: 5rem 5rem 0 0;
        opacity: 0.55;
    }

    .delivery-architecture::before,
    .delivery-architecture::after {
        position: absolute;
        bottom: 0;
        width: 1.85rem;
        height: 5.4rem;
        border: 1px solid var(--delivery-line-art);
        border-bottom: 0;
        border-radius: 1rem 1rem 0 0;
        content: '';
    }

    .delivery-architecture::before {
        left: 1.35rem;
    }

    .delivery-architecture::after {
        right: 1.35rem;
    }

    .delivery-architecture-left {
        left: 1.15rem;
        bottom: 0.8rem;
    }

    .delivery-architecture-right {
        right: 1.4rem;
        bottom: 0.8rem;
    }

    .delivery-architecture-address {
        right: 4.5rem;
        bottom: 0;
        width: min(16rem, 42%);
        height: 6.8rem;
    }

    .delivery-truck-scene {
        display: grid;
        place-items: center;
        min-height: 8.5rem;
    }

    .delivery-truck-art {
        position: relative;
        width: min(21rem, 100%);
        height: 7.5rem;
        filter: drop-shadow(0 18px 22px rgba(42, 23, 14, 0.14));
    }

    .delivery-showcase-section .delivery-truck-box,
    .delivery-showcase-section .delivery-truck-cab {
        position: absolute;
        bottom: 1.35rem;
        border: 1px solid var(--delivery-border);
    }

    .delivery-showcase-section .delivery-truck-box {
        left: 0.8rem;
        display: grid;
        place-items: center;
        width: 11.4rem;
        height: 4.7rem;
        padding: 0.8rem;
        border-radius: 0.25rem;
        background:
            linear-gradient(90deg, var(--delivery-truck-box), var(--delivery-truck-box) 78%, var(--delivery-truck-side) 79%),
            var(--delivery-truck-box);
    }

    .delivery-showcase-section .delivery-truck-box img {
        width: 6.7rem;
        max-height: 2.6rem;
        object-fit: contain;
        filter: drop-shadow(0 2px 1px rgba(0, 0, 0, 0.16));
    }

    .delivery-showcase-section .delivery-truck-cab {
        right: 1rem;
        width: 5.3rem;
        height: 4.35rem;
        border-radius: 0.3rem 0.95rem 0.24rem 0.32rem;
        background:
            linear-gradient(135deg, var(--delivery-truck-window) 0 36%, var(--delivery-truck-cab) 37% 100%);
    }

    .delivery-showcase-section .delivery-truck-cab::before {
        position: absolute;
        left: 0.35rem;
        top: 0.35rem;
        width: 2.15rem;
        height: 1.75rem;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.82) 0 48%, rgba(255, 255, 255, 0.05) 49%);
        clip-path: polygon(28% 0, 100% 0, 100% 100%, 0 100%);
        content: '';
    }

    .delivery-showcase-section .delivery-wheel {
        position: absolute;
        bottom: 0.8rem;
        width: 1.28rem;
        height: 1.28rem;
        border: 0.34rem solid #3d2b25;
        border-radius: 999px;
        background: #f9eee2;
    }

    .delivery-board-dark .delivery-wheel {
        border-color: #080909;
        background: var(--delivery-accent);
    }

    .delivery-wheel-one {
        left: 2.85rem;
    }

    .delivery-wheel-two {
        right: 2.15rem;
    }

    .delivery-route-copy strong {
        display: block;
        color: var(--delivery-title);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(1.25rem, 1.7vw, 1.55rem);
        line-height: 1.1;
    }

    .delivery-route-copy p,
    .delivery-route-card > p,
    .delivery-info-row p {
        margin: 0.3rem 0 0;
        color: var(--delivery-muted);
        font-size: 0.82rem;
        line-height: 1.55;
    }

    .delivery-route-copy dl,
    .delivery-service-foot dl {
        display: grid;
        gap: 0.65rem;
        margin: 0.9rem 0 0;
    }

    .delivery-route-copy dt,
    .delivery-service-foot dt {
        color: var(--delivery-muted);
        font-size: 0.7rem;
        line-height: 1.2;
    }

    .delivery-route-copy dd,
    .delivery-service-foot dd {
        margin: 0;
        color: var(--delivery-title);
        font-size: 0.9rem;
        font-weight: 900;
        line-height: 1.25;
    }

    .delivery-card-arrow {
        display: inline-grid;
        place-items: center;
        width: 2.35rem;
        height: 2.35rem;
        border: 1px solid var(--delivery-border);
        border-radius: 999px;
        background: rgba(255, 251, 245, 0.5);
        color: var(--delivery-accent);
        font-size: 1.65rem;
        line-height: 1;
    }

    .delivery-board-dark .delivery-card-arrow {
        background: rgba(17, 18, 18, 0.72);
    }

    .delivery-showcase-section .delivery-brand {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        width: fit-content;
        min-height: 2.45rem;
    }

    .delivery-showcase-section .delivery-brand img {
        display: block;
        width: auto;
        max-width: 8.6rem;
        max-height: 2.25rem;
        object-fit: contain;
        object-position: left center;
    }

    .delivery-showcase-section .delivery-brand-dhl {
        padding: 0.25rem 0.45rem;
        background: rgba(255, 204, 0, 0.18);
    }

    .delivery-showcase-section .delivery-brand-uzpost {
        min-width: 8.5rem;
    }

    .delivery-showcase-section .delivery-brand-uzpost img {
        width: 8.5rem;
        height: 2.45rem;
        object-fit: cover;
        object-position: 60% 77%;
        opacity: 0.16;
        mix-blend-mode: multiply;
    }

    .delivery-board-dark .delivery-brand-uzpost img {
        opacity: 0.12;
        mix-blend-mode: normal;
        filter: brightness(1.05);
    }

    .delivery-showcase-section .delivery-brand-uzpost span {
        position: absolute;
        left: 0.2rem;
        color: #1768b1;
        font-size: 1.62rem;
        font-weight: 900;
        font-style: italic;
        letter-spacing: 0.02em;
    }

    .delivery-board-dark .delivery-brand-uzpost span {
        color: #2d87d9;
    }

    .delivery-service-foot {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 0.75rem;
        min-height: 5.2rem;
        margin-top: 1rem;
    }

    .delivery-plane-art {
        position: relative;
        flex: 0 0 auto;
        width: 8.2rem;
        height: 4.2rem;
    }

    .delivery-plane-art::before {
        position: absolute;
        left: 0.2rem;
        top: 2.05rem;
        width: 7.4rem;
        height: 0.58rem;
        border-radius: 999px;
        background: linear-gradient(90deg, #f7bd34 0 70%, #d51f25 71%);
        content: '';
    }

    .delivery-plane-art::after {
        position: absolute;
        left: 3.35rem;
        top: 0.85rem;
        width: 2.7rem;
        height: 2.25rem;
        background: #f7bd34;
        clip-path: polygon(0 0, 75% 42%, 100% 100%, 40% 74%, 22% 100%);
        transform: rotate(-10deg);
        content: '';
    }

    .delivery-box-art {
        position: relative;
        display: block;
        flex: 0 0 auto;
        width: 4.7rem;
        height: 3.75rem;
        border: 1px solid rgba(31, 120, 206, 0.38);
        border-radius: 0.22rem;
        background: linear-gradient(135deg, #ffffff, #dceaf8);
        box-shadow: 0 12px 22px rgba(35, 21, 14, 0.14);
        transform: perspective(7rem) rotateY(-10deg);
    }

    .delivery-box-art i {
        position: absolute;
        inset: 0 43% 0 auto;
        width: 0.55rem;
        background: rgba(31, 120, 206, 0.14);
    }

    .delivery-info-row {
        position: relative;
        overflow: hidden;
        display: grid;
        grid-template-columns: auto minmax(0, 1fr) auto;
        align-items: center;
        gap: 1rem;
        min-height: 5.9rem;
        padding: 0.95rem 1rem;
    }

    .delivery-address-row {
        grid-template-columns: auto minmax(0, 1fr);
    }

    .delivery-info-icon {
        position: relative;
        z-index: 1;
        display: inline-grid;
        place-items: center;
        width: 3.3rem;
        height: 3.3rem;
        border: 1px solid var(--delivery-border);
        border-radius: 999px;
        background: rgba(255, 248, 239, 0.62);
        color: var(--delivery-accent);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.55rem;
        font-weight: 800;
    }

    .delivery-board-dark .delivery-info-icon {
        background: rgba(16, 17, 17, 0.76);
    }

    .delivery-info-icon-pin::before {
        width: 1.35rem;
        height: 1.35rem;
        border-radius: 50% 50% 50% 0;
        background: currentColor;
        transform: rotate(-45deg);
        content: '';
    }

    .delivery-chip-list,
    .delivery-guarantee-strip {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.75rem;
        align-items: center;
    }

    .delivery-chip-list {
        grid-template-columns: repeat(2, max-content);
    }

    .delivery-chip-list span,
    .delivery-guarantee-strip span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.45rem;
        min-height: 2.35rem;
        padding: 0.55rem 0.75rem;
        border: 1px solid var(--delivery-border-soft);
        border-radius: 999px;
        background: rgba(255, 251, 245, 0.42);
        color: var(--delivery-title);
        font-size: 0.72rem;
        font-weight: 800;
        line-height: 1.15;
        text-align: center;
    }

    .delivery-board-dark .delivery-chip-list span,
    .delivery-board-dark .delivery-guarantee-strip span {
        background: rgba(17, 18, 18, 0.56);
    }

    .delivery-chip-list i,
    .delivery-guarantee-strip i {
        flex: 0 0 auto;
        width: 1rem;
        height: 1rem;
        border: 1px solid currentColor;
        border-radius: 999px;
        opacity: 0.75;
    }

    .delivery-guarantee-strip {
        padding: 0.75rem 0.9rem;
    }

    @media (max-width: 1120px) {
        .delivery-showcase-shell {
            grid-template-columns: 1fr;
            max-width: 42rem;
        }

        .delivery-board + .delivery-board {
            border-left: 0;
            border-top: 1px solid rgba(188, 142, 96, 0.2);
        }

        .delivery-preview-toggle {
            top: 0.9rem;
        }

        .delivery-board-head {
            padding-top: 2.7rem;
        }

        .delivery-route-card-local,
        .delivery-info-row {
            grid-template-columns: 1fr;
        }

        .delivery-card-arrow {
            display: none;
        }

        .delivery-chip-list {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 640px) {
        .delivery-showcase-shell {
            width: min(100% - 0.7rem, 42rem);
            border-radius: 0.75rem;
        }

        .delivery-board {
            padding: 0.85rem;
        }

        .delivery-board-dark .delivery-board-head {
            justify-content: flex-start;
            text-align: left;
        }

        .delivery-board-dark .delivery-board-head .delivery-board-mark {
            order: 0;
        }

        .delivery-panel,
        .delivery-route-card,
        .delivery-info-row,
        .delivery-guarantee-strip {
            border-radius: 0.75rem;
        }

        .delivery-foreign-grid,
        .delivery-chip-list,
        .delivery-guarantee-strip {
            grid-template-columns: 1fr;
        }

        .delivery-truck-art {
            transform: scale(0.86);
            transform-origin: center;
        }

        .delivery-preview-toggle {
            grid-template-columns: auto 1.8rem 1.8rem auto;
            max-width: calc(100% - 1rem);
            font-size: 0.58rem;
            letter-spacing: 0.12em;
        }
    }

/* Delivery visual parity layer */
.delivery-showcase-section {
    padding: clamp(0.7rem, 1.3vw, 1rem) 0 clamp(1rem, 2vw, 1.5rem);
    background:
        radial-gradient(circle at 7% 14%, rgba(200, 169, 126, 0.18), transparent 18rem),
        radial-gradient(circle at 93% 86%, rgba(200, 169, 126, 0.15), transparent 18rem),
        linear-gradient(90deg, #f5efe7 0 50%, #101111 50% 100%);
}

.delivery-showcase-shell {
    width: min(1280px, calc(100% - 1rem));
    min-height: 830px;
    border-color: rgba(200, 169, 126, 0.28);
    border-radius: 0.85rem;
    background: linear-gradient(90deg, #f7efe7 0 50%, #101111 50% 100%);
}

.delivery-showcase-shell::before {
    position: absolute;
    inset: 0;
    z-index: 1;
    background-image:
        linear-gradient(90deg, rgba(142, 92, 58, 0.07) 1px, transparent 1px),
        linear-gradient(0deg, rgba(142, 92, 58, 0.05) 1px, transparent 1px);
    background-size: 32px 32px;
    opacity: 0.4;
    pointer-events: none;
    content: '';
}

.delivery-board {
    position: relative;
    z-index: 2;
}

.delivery-preview-toggle {
    position: absolute;
    z-index: 6;
    top: 1.7rem;
    min-height: 2.15rem;
    padding: 0.2rem 0.72rem;
    border-color: rgba(200, 169, 126, 0.34);
    background:
        linear-gradient(90deg, rgba(238, 218, 195, 0.96) 0 50%, rgba(16, 17, 17, 0.96) 50% 100%);
}

.delivery-board {
    --delivery-bg: #f5efe7;
    --delivery-card: rgba(255, 251, 245, 0.74);
    --delivery-card-strong: rgba(255, 252, 247, 0.82);
    --delivery-border: rgba(200, 169, 126, 0.34);
    --delivery-border-soft: rgba(200, 169, 126, 0.24);
    --delivery-title: #35251d;
    --delivery-muted: #77665a;
    --delivery-accent: #c48b55;
    --delivery-shadow: 0 16px 38px rgba(57, 34, 21, 0.08);
    display: grid;
    align-content: start;
    padding: 1.85rem 1.9rem 1.05rem;
    background:
        radial-gradient(circle at 84% 30%, rgba(200, 169, 126, 0.13), transparent 13rem),
        linear-gradient(145deg, rgba(255, 251, 245, 0.94), rgba(244, 235, 225, 0.9));
}

.delivery-board::before,
.delivery-board::after {
    position: absolute;
    z-index: 0;
    width: 9.2rem;
    height: 9.2rem;
    background: url('/images/home/delivery/arabic-art.svg') center / contain no-repeat;
    opacity: 0.18;
    pointer-events: none;
    content: '';
}

.delivery-board::before {
    top: 1.15rem;
    left: 1.2rem;
}

.delivery-board::after {
    right: 1.15rem;
    bottom: 1.2rem;
    transform: rotate(45deg);
}

.delivery-board > * {
    position: relative;
    z-index: 1;
}

.delivery-board-dark {
    --delivery-bg: #0f0f0f;
    --delivery-card: rgba(22, 23, 22, 0.78);
    --delivery-card-strong: rgba(18, 19, 18, 0.88);
    --delivery-border: rgba(212, 175, 55, 0.26);
    --delivery-border-soft: rgba(212, 175, 55, 0.22);
    --delivery-title: #d4af37;
    --delivery-muted: rgba(234, 199, 139, 0.72);
    --delivery-accent: #d4af37;
    --delivery-shadow: 0 20px 42px rgba(0, 0, 0, 0.34);
    background:
        radial-gradient(circle at 82% 24%, rgba(212, 175, 55, 0.09), transparent 14rem),
        linear-gradient(145deg, #141514, #0f0f0f 68%, #111);
}

.delivery-board-dark::before,
.delivery-board-dark::after {
    opacity: 0.28;
    filter: sepia(0.8) saturate(1.3) brightness(0.95);
}

.delivery-board-head {
    min-height: 4.8rem;
    margin-bottom: 0.8rem;
}

.delivery-board-head h2 {
    font-size: clamp(2.1rem, 2.8vw, 2.7rem);
    letter-spacing: 0;
}

.delivery-board-head p {
    font-size: 0.82rem;
}

.delivery-board-mark,
.delivery-mini-mark {
    overflow: hidden;
    border: 0;
    background: url('/images/home/delivery/arabic-art.svg') center / contain no-repeat;
}

.delivery-board-mark::before,
.delivery-board-mark::after,
.delivery-mini-mark::before,
.delivery-mini-mark::after {
    display: none;
}

.delivery-board-mark {
    width: 3.15rem;
    height: 3.15rem;
}

.delivery-mini-mark {
    width: 2rem;
    height: 2rem;
}

.delivery-board-stack {
    gap: 0.72rem;
}

.delivery-panel {
    padding: 0.88rem 0.92rem 0.9rem;
}

.delivery-panel,
.delivery-info-row,
.delivery-guarantee-strip,
.delivery-route-card {
    backdrop-filter: blur(10px);
}

.delivery-panel-head {
    gap: 0.8rem;
    margin-bottom: 0.78rem;
}

.delivery-panel-head h3,
.delivery-info-row h3 {
    font-size: clamp(1.35rem, 1.8vw, 1.6rem);
    letter-spacing: 0;
}

.delivery-route-card {
    min-height: 10.2rem;
    padding: 0.95rem 1rem;
    border-radius: 0.78rem;
}

.delivery-route-card-local {
    grid-template-columns: minmax(15rem, 1fr) minmax(12.75rem, 0.66fr) auto;
    gap: 0.85rem;
}

.delivery-route-media-truck {
    display: grid;
    place-items: center;
    min-height: 8.4rem;
}

.delivery-truck-asset {
    display: block;
    width: min(24.2rem, 108%);
    max-width: none;
    margin-left: -0.45rem;
    filter: drop-shadow(0 18px 18px rgba(54, 30, 17, 0.18));
}

.delivery-board-dark .delivery-truck-asset {
    filter: drop-shadow(0 18px 20px rgba(0, 0, 0, 0.46));
}

.delivery-route-copy {
    min-width: 0;
}

.delivery-route-copy strong {
    font-size: clamp(1.35rem, 1.6vw, 1.62rem);
}

.delivery-route-copy p,
.delivery-route-card > p,
.delivery-info-row p {
    font-size: 0.82rem;
}

.delivery-route-copy dl {
    gap: 0.75rem;
    margin-top: 0.85rem;
}

.delivery-route-copy dt,
.delivery-service-foot dt {
    font-size: 0.68rem;
}

.delivery-route-copy dd,
.delivery-service-foot dd {
    font-size: 0.92rem;
}

.delivery-card-arrow {
    align-self: center;
    width: 2.45rem;
    height: 2.45rem;
    background: rgba(255, 251, 245, 0.64);
}

.delivery-board-dark .delivery-card-arrow {
    background: rgba(17, 18, 18, 0.76);
}

.delivery-architecture {
    width: 15rem;
    height: 8rem;
    border: 0;
    border-radius: 0;
    background: url('/images/home/delivery/architecture-line.svg') center bottom / contain no-repeat;
    opacity: 0.32;
}

.delivery-architecture::before,
.delivery-architecture::after {
    display: none;
}

.delivery-architecture-left {
    left: 0.85rem;
    bottom: 0.2rem;
}

.delivery-architecture-right {
    right: 0.85rem;
    bottom: 0.2rem;
}

.delivery-architecture-address {
    right: 1rem;
    bottom: 0;
    width: min(20rem, 48%);
    height: 6.8rem;
}

.delivery-world-map {
    inset: 1.3rem 1rem auto auto;
    width: min(16rem, 70%);
    height: 6.2rem;
    background: url('/images/home/delivery/world-map-line.svg') center / contain no-repeat;
    opacity: 0.24;
    filter: none;
}

.delivery-foreign-grid {
    gap: 0.85rem;
}

.delivery-foreign-grid .delivery-route-card {
    display: grid;
    grid-template-rows: auto auto 1fr;
    min-height: 10.85rem;
}

.delivery-showcase-section .delivery-brand-dhl {
    background: transparent;
    padding: 0;
}

.delivery-showcase-section .delivery-brand-dhl img {
    max-width: 7.2rem;
    max-height: 1.75rem;
}

.delivery-showcase-section .delivery-brand-uzpost {
    min-width: 8.4rem;
}

.delivery-showcase-section .delivery-brand-uzpost img {
    display: none;
}

.delivery-showcase-section .delivery-brand-uzpost span {
    position: static;
    font-size: 1.55rem;
}

.delivery-service-foot {
    min-height: 4.75rem;
    margin-top: 0.55rem;
}

.delivery-service-asset {
    display: block;
    flex: 0 0 auto;
    width: min(9.9rem, 48%);
    max-height: 5.7rem;
    object-fit: contain;
    object-position: right bottom;
    filter: drop-shadow(0 14px 14px rgba(48, 28, 15, 0.16));
}

.delivery-service-asset-plane {
    width: min(10.6rem, 54%);
    transform: translateY(0.35rem);
}

.delivery-service-asset-box {
    width: min(6.5rem, 38%);
    transform: translate(0.15rem, 0.15rem);
}

.delivery-board-dark .delivery-service-asset {
    filter: drop-shadow(0 14px 16px rgba(0, 0, 0, 0.45));
}

.delivery-payment-row {
    grid-template-columns: auto minmax(0, 1fr) minmax(13rem, auto);
}

.delivery-info-row {
    min-height: 5.65rem;
    padding: 0.85rem 1rem;
}

.delivery-info-icon {
    width: 3.1rem;
    height: 3.1rem;
    font-size: 1.45rem;
}

.delivery-chip-list {
    gap: 0.65rem;
}

.delivery-chip-list span,
.delivery-guarantee-strip span {
    min-height: 2.05rem;
    padding: 0.45rem 0.7rem;
    background: rgba(255, 251, 245, 0.36);
    font-size: 0.68rem;
}

.delivery-guarantee-strip {
    gap: 0.9rem;
    padding: 0.9rem 1rem;
}

.delivery-guarantee-strip span {
    min-height: 2.85rem;
    padding: 0.72rem 1rem;
    font-size: clamp(0.82rem, 0.95vw, 0.94rem);
    font-weight: 850;
}

.delivery-guarantee-strip .delivery-ui-icon {
    --delivery-icon-size: 1.16rem;
}

@media (max-width: 1120px) {
    .delivery-showcase-section {
        background: linear-gradient(180deg, #f5efe7, #101111);
    }

    .delivery-showcase-shell {
        min-height: auto;
    }

    .delivery-route-card-local,
    .delivery-payment-row {
        grid-template-columns: 1fr;
    }

    .delivery-truck-asset {
        width: min(24rem, 100%);
        margin-left: 0;
    }
}

@media (max-width: 640px) {
    .delivery-board {
        padding: 1rem 0.85rem;
    }

    .delivery-board-head {
        min-height: auto;
    }

    .delivery-service-foot {
        align-items: center;
    }

    .delivery-service-asset {
        width: min(8rem, 45%);
    }
}

/* Delivery single-mode theme override */
.delivery-showcase-section {
    padding: clamp(0.9rem, 1.5vw, 1.25rem) 0 clamp(1.6rem, 2.6vw, 2.4rem) !important;
    background:
        radial-gradient(circle at 12% 12%, rgba(200, 169, 126, 0.16), transparent 18rem),
        linear-gradient(180deg, #f6efe7, #eee2d6) !important;
}

html[data-theme='nocturne'] .delivery-showcase-section {
    background:
        radial-gradient(circle at 80% 14%, rgba(212, 175, 55, 0.1), transparent 18rem),
        linear-gradient(180deg, #141514, #0d0e0e) !important;
}

.delivery-showcase-shell {
    display: block !important;
    width: min(var(--content-max), calc(100% - 2rem), calc(100% - var(--ribbon-safe-inset) - var(--ribbon-safe-inset))) !important;
    min-height: 0 !important;
    margin-inline: auto;
    overflow: visible !important;
    border: 0 !important;
    border-radius: 0 !important;
    background: transparent !important;
    box-shadow: none !important;
}

.delivery-showcase-shell::before,
.delivery-preview-toggle {
    display: none !important;
}

.delivery-board {
    --delivery-bg: #f8f1e9;
    --delivery-card: rgba(255, 252, 247, 0.78);
    --delivery-card-strong: rgba(255, 253, 248, 0.94);
    --delivery-border: rgba(190, 145, 96, 0.28);
    --delivery-border-soft: rgba(190, 145, 96, 0.18);
    --delivery-title: #35251d;
    --delivery-muted: #78675b;
    --delivery-accent: #c48b55;
    --delivery-shadow: 0 20px 50px rgba(57, 34, 21, 0.09);
    --delivery-line-art: rgba(201, 141, 95, 0.28);
    --delivery-ornament-image: url('/images/home/delivery/provided/ornament-flower-left.png');
    --delivery-mini-ornament-image: url('/images/home/delivery/provided/ornament-flower-right.png');
    --delivery-architecture-image: url('/images/home/delivery/provided/architecture-line.png');
    --delivery-architecture-left-image: url('/images/home/delivery/provided/architecture-local-left.png');
    --delivery-architecture-right-image: url('/images/home/delivery/provided/architecture-local-dome.png');
    --delivery-architecture-address-image: url('/images/home/delivery/provided/architecture-address.png');
    --delivery-world-map-image: url('/images/home/delivery/world-map-line.svg');
    --delivery-panel-pattern-image: url('/images/home/delivery/provided/ornament-center.png');
    --delivery-border-ornament-image: url('/images/home/delivery/provided/ornament-slim-right.png');
    box-sizing: border-box;
    width: 100%;
    padding: clamp(1rem, 2vw, 1.45rem) !important;
    border: 1px solid var(--delivery-border);
    border-radius: 0.9rem;
    background:
        radial-gradient(circle at 84% 30%, rgba(200, 169, 126, 0.13), transparent 13rem),
        linear-gradient(145deg, rgba(255, 251, 245, 0.94), rgba(244, 235, 225, 0.9)) !important;
    box-shadow: var(--delivery-shadow);
}

html[data-theme='nocturne'] .delivery-board {
    --delivery-bg: #0f0f0f;
    --delivery-card: rgba(22, 23, 22, 0.78);
    --delivery-card-strong: rgba(18, 19, 18, 0.88);
    --delivery-border: rgba(212, 175, 55, 0.28);
    --delivery-border-soft: rgba(212, 175, 55, 0.22);
    --delivery-title: #d4af37;
    --delivery-muted: rgba(234, 199, 139, 0.72);
    --delivery-accent: #d4af37;
    --delivery-shadow: 0 20px 42px rgba(0, 0, 0, 0.34);
    --delivery-line-art: rgba(212, 175, 55, 0.27);
    --delivery-ornament-image: url('/images/home/delivery/provided/ornament-flower-left.png');
    --delivery-mini-ornament-image: url('/images/home/delivery/provided/ornament-flower-right.png');
    --delivery-architecture-image: url('/images/home/delivery/provided/architecture-line.png');
    --delivery-architecture-left-image: url('/images/home/delivery/provided/architecture-local-left.png');
    --delivery-architecture-right-image: url('/images/home/delivery/provided/architecture-local-dome.png');
    --delivery-architecture-address-image: url('/images/home/delivery/provided/architecture-address-right.png');
    --delivery-world-map-image: url('/images/home/delivery/world-map-line.svg');
    --delivery-panel-pattern-image: url('/images/home/delivery/provided/ornament-center.png');
    --delivery-border-ornament-image: url('/images/home/delivery/provided/ornament-slim-right.png');
    background:
        radial-gradient(circle at 82% 24%, rgba(212, 175, 55, 0.09), transparent 14rem),
        linear-gradient(145deg, #141514, #0f0f0f 68%, #111) !important;
}

html[data-theme='nocturne'] .delivery-board-head {
    justify-content: flex-end;
    text-align: right;
}

html[data-theme='nocturne'] .delivery-board-head .delivery-board-mark {
    order: 2;
}

html[data-theme='nocturne'] .delivery-board::before,
html[data-theme='nocturne'] .delivery-board::after,
html[data-theme='nocturne'] .delivery-architecture,
html[data-theme='nocturne'] .delivery-world-map {
    filter: none;
}

.delivery-board::before,
.delivery-board::after {
    background: var(--delivery-line-art) !important;
    -webkit-mask: var(--delivery-ornament-image) center / contain no-repeat;
    mask: var(--delivery-ornament-image) center / contain no-repeat;
    opacity: 0.34 !important;
}

.delivery-board-mark,
.delivery-mini-mark {
    border: 0 !important;
    background: var(--delivery-accent) !important;
    box-shadow: none !important;
    -webkit-mask: var(--delivery-ornament-image) center / contain no-repeat;
    mask: var(--delivery-ornament-image) center / contain no-repeat;
}

.delivery-mini-mark {
    -webkit-mask: var(--delivery-mini-ornament-image) center / contain no-repeat;
    mask: var(--delivery-mini-ornament-image) center / contain no-repeat;
}

.delivery-board-mark::before,
.delivery-board-mark::after,
.delivery-mini-mark::before,
.delivery-mini-mark::after {
    display: none !important;
}

.delivery-architecture {
    border: 0 !important;
    border-radius: 0 !important;
    background-color: transparent !important;
    background-image: var(--delivery-architecture-image) !important;
    background-position: center bottom !important;
    background-repeat: no-repeat !important;
    background-size: contain !important;
    opacity: 0.3;
    filter: saturate(0.78) sepia(0.1);
    mix-blend-mode: multiply;
    -webkit-mask: none !important;
    mask: none !important;
}

.delivery-architecture::before,
.delivery-architecture::after {
    display: none !important;
}

.delivery-world-map {
    background: var(--delivery-line-art) !important;
    opacity: 0.28;
    -webkit-mask: var(--delivery-world-map-image) center / cover no-repeat;
    mask: var(--delivery-world-map-image) center / cover no-repeat;
}

html[data-theme='nocturne'] .delivery-architecture {
    opacity: 0.22;
    filter: brightness(0.58) sepia(1) saturate(1.28);
    mix-blend-mode: normal;
}

html[data-theme='nocturne'] .delivery-world-map {
    opacity: 0.32;
}

.delivery-panel,
.delivery-info-row,
.delivery-guarantee-strip {
    border-color: var(--delivery-border) !important;
    background:
        linear-gradient(145deg, var(--delivery-card), rgba(255, 255, 255, 0.02)),
        var(--delivery-card) !important;
    box-shadow: var(--delivery-shadow);
}

.delivery-panel,
.delivery-info-row {
    position: relative;
    overflow: hidden;
}

.delivery-panel::after,
.delivery-info-row::after {
    position: absolute;
    right: -1rem;
    bottom: -1.4rem;
    z-index: 0;
    width: min(18rem, 42%);
    height: min(10rem, 78%);
    background: var(--delivery-line-art);
    opacity: 0.1;
    pointer-events: none;
    content: '';
    -webkit-mask: var(--delivery-panel-pattern-image) center / cover no-repeat;
    mask: var(--delivery-panel-pattern-image) center / cover no-repeat;
}

.delivery-info-row::after {
    width: min(20rem, 46%);
    height: min(7rem, 82%);
    opacity: 0.12;
    -webkit-mask: var(--delivery-border-ornament-image) center / cover no-repeat;
    mask: var(--delivery-border-ornament-image) center / cover no-repeat;
}

.delivery-panel > *,
.delivery-info-row > * {
    position: relative;
    z-index: 1;
}

.delivery-route-card {
    border-color: var(--delivery-border-soft) !important;
    background:
        linear-gradient(135deg, var(--delivery-card-strong), rgba(255, 255, 255, 0.02)),
        var(--delivery-card-strong) !important;
}

.delivery-board-head h2,
.delivery-panel-head h3,
.delivery-info-row h3,
.delivery-route-copy strong,
.delivery-route-copy dd,
.delivery-service-foot dd,
.delivery-chip-list span,
.delivery-guarantee-strip span {
    color: var(--delivery-title) !important;
}

.delivery-board-head p,
.delivery-panel-head p,
.delivery-route-copy p,
.delivery-route-card > p,
.delivery-info-row p,
.delivery-route-copy dt,
.delivery-service-foot dt {
    color: var(--delivery-muted) !important;
}

.delivery-route-card-local {
    grid-template-columns: minmax(18rem, 1.08fr) minmax(12rem, 0.62fr) auto !important;
}

.delivery-architecture-left {
    left: 0.65rem;
    bottom: 0.15rem;
    width: min(22rem, 50%);
    height: 9rem;
    background-image: var(--delivery-architecture-left-image) !important;
    background-position: left bottom !important;
    opacity: 0.34;
}

.delivery-architecture-right {
    right: 1.15rem;
    bottom: 0.55rem;
    width: min(16rem, 32%);
    height: 9rem;
    background-image: var(--delivery-architecture-right-image) !important;
    background-position: right bottom !important;
    opacity: 0.26;
}

.delivery-architecture-address {
    right: 1.1rem;
    bottom: -0.15rem;
    width: min(33rem, 62%);
    height: 7.1rem;
    background-image: var(--delivery-architecture-address-image) !important;
    background-position: right bottom !important;
    opacity: 0.34;
}

html[data-theme='nocturne'] .delivery-architecture-left {
    opacity: 0.2;
}

html[data-theme='nocturne'] .delivery-architecture-right {
    opacity: 0.24;
}

html[data-theme='nocturne'] .delivery-architecture-address {
    opacity: 0.32;
}

.delivery-route-media-truck {
    justify-items: start;
    min-height: 10.4rem;
}

.delivery-truck-frame {
    position: relative;
    width: min(27.5rem, 100%);
    max-width: none;
    margin-left: 0;
    aspect-ratio: 216 / 100;
    filter: drop-shadow(0 18px 18px rgba(54, 30, 17, 0.18));
}

html[data-theme='nocturne'] .delivery-truck-frame {
    filter: drop-shadow(0 18px 20px rgba(0, 0, 0, 0.46));
}

.delivery-truck-asset {
    position: absolute;
    inset: 0;
    display: block;
    width: 100% !important;
    height: 100%;
    max-width: none !important;
    margin: 0 !important;
    object-fit: contain;
    object-position: center;
    transform: none;
    filter: none !important;
}

.delivery-truck-asset-dark {
    display: none;
}

html[data-theme='nocturne'] .delivery-truck-asset-light {
    display: none;
}

html[data-theme='nocturne'] .delivery-truck-asset-dark {
    display: block;
    opacity: 0.95;
    filter: brightness(0.5) contrast(1.35) saturate(0.58) sepia(0.16) drop-shadow(0 18px 20px rgba(0, 0, 0, 0.5)) !important;
}

.delivery-truck-logo {
    position: absolute;
    left: 32%;
    top: 42%;
    z-index: 2;
    display: grid;
    color: #fff8ec;
    font-family: Arial, sans-serif;
    line-height: 1;
    transform: translate(-50%, -50%);
    filter: drop-shadow(0 2px 1px rgba(0, 0, 0, 0.2));
}

html[data-theme='nocturne'] .delivery-truck-logo {
    color: #d8a85c;
}

.delivery-truck-logo strong {
    color: currentColor;
    font-family: Arial Black, Arial, sans-serif;
    font-size: clamp(0.9rem, 2.2vw, 1.42rem);
    font-weight: 900;
    letter-spacing: -0.05em;
}

.delivery-truck-logo span {
    color: currentColor;
    font-size: clamp(0.32rem, 0.75vw, 0.48rem);
    font-weight: 900;
    letter-spacing: 0.12em;
}

.delivery-truck-logo i {
    position: absolute;
    left: calc(100% + 0.3rem);
    top: 0.02rem;
    width: 1.2rem;
    height: 1.35rem;
    border: 0.16rem solid currentColor;
    transform: rotate(-15deg);
}

.delivery-truck-logo i::before,
.delivery-truck-logo i::after {
    position: absolute;
    left: 0.12rem;
    right: 0.12rem;
    height: 0.12rem;
    background: currentColor;
    content: '';
}

.delivery-truck-logo i::before {
    top: 0.35rem;
}

.delivery-truck-logo i::after {
    top: 0.7rem;
}

.delivery-showcase-section .delivery-ui-icon {
    --delivery-icon-size: 1.05rem;
    display: inline-block !important;
    flex: 0 0 var(--delivery-icon-size);
    width: var(--delivery-icon-size);
    height: var(--delivery-icon-size);
    min-height: 0 !important;
    padding: 0 !important;
    border: 0 !important;
    border-radius: 0 !important;
    background: currentColor !important;
    box-shadow: none !important;
    color: var(--delivery-accent) !important;
    -webkit-mask: var(--delivery-icon) center / contain no-repeat;
    mask: var(--delivery-icon) center / contain no-repeat;
}

.delivery-route-copy dt,
.delivery-service-foot dt {
    display: flex;
    align-items: center;
    gap: 0.45rem;
    font-weight: 700;
}

.delivery-route-copy dt .delivery-ui-icon,
.delivery-service-foot dt .delivery-ui-icon {
    --delivery-icon-size: 1.08rem;
}

.delivery-route-copy dd,
.delivery-service-foot dd {
    padding-left: 1.53rem;
}

.delivery-chip-list span,
.delivery-guarantee-strip span {
    gap: 0.5rem;
}

.delivery-chip-list .delivery-ui-icon,
.delivery-guarantee-strip .delivery-ui-icon {
    --delivery-icon-size: 0.95rem;
}

.delivery-showcase-section .delivery-chip-list .delivery-ui-icon,
.delivery-showcase-section .delivery-guarantee-strip .delivery-ui-icon {
    background: currentColor !important;
}

.delivery-info-icon .delivery-ui-icon {
    --delivery-icon-size: 1.55rem;
    color: currentColor !important;
}

.delivery-info-icon-pin::before {
    display: none !important;
}

.delivery-card-icon {
    position: absolute;
    top: 1rem;
    right: 1rem;
    z-index: 2;
    display: inline-grid;
    place-items: center;
    width: 2.35rem;
    height: 2.35rem;
    border: 1px solid var(--delivery-border-soft);
    border-radius: 999px;
    background: rgba(255, 248, 239, 0.56);
    color: var(--delivery-accent);
}

.delivery-card-icon .delivery-ui-icon {
    --delivery-icon-size: 1.18rem;
    color: currentColor !important;
}

html[data-theme='nocturne'] .delivery-card-icon {
    background: rgba(17, 18, 18, 0.7);
}

html[data-theme='nocturne'] .delivery-info-icon,
html[data-theme='nocturne'] .delivery-chip-list span,
html[data-theme='nocturne'] .delivery-guarantee-strip span,
html[data-theme='nocturne'] .delivery-card-arrow {
    background: rgba(17, 18, 18, 0.7) !important;
}

html[data-theme='nocturne'] .delivery-service-asset {
    filter: drop-shadow(0 14px 16px rgba(0, 0, 0, 0.45));
}

.delivery-service-asset-plane {
    width: min(11rem, 56%) !important;
}

.delivery-service-asset-box {
    width: min(8.35rem, 45%) !important;
    max-height: 7.1rem;
    transform: translate(0, 0.05rem);
}

@media (max-width: 720px) {
    .delivery-route-card-local,
    .delivery-payment-row {
        grid-template-columns: 1fr !important;
    }

    .delivery-card-arrow {
        display: none !important;
    }

    .delivery-truck-frame {
        width: min(25.5rem, 100%);
        margin-left: 0;
    }

    .delivery-architecture-left {
        left: -0.8rem;
        width: min(26rem, 78%);
        height: 6.8rem;
        opacity: 0.16;
    }

    .delivery-architecture-right {
        display: none !important;
    }

    .delivery-architecture-address {
        right: 0.4rem;
        width: min(25rem, 86%);
        height: 5.8rem;
        opacity: 0.22;
    }
}

@media (max-width: 560px) {
    .delivery-showcase-shell {
        width: min(100% - 0.7rem, var(--content-max)) !important;
    }

    html[data-theme='nocturne'] .delivery-board-head {
        justify-content: flex-start;
        text-align: left;
    }

    html[data-theme='nocturne'] .delivery-board-head .delivery-board-mark {
        order: 0;
    }

    .delivery-foreign-grid,
    .delivery-chip-list,
    .delivery-guarantee-strip {
        grid-template-columns: 1fr !important;
    }
}

/* Mobile responsive corrections */
@media (max-width: 720px) {
    .topbar.container,
    .topbar {
        --topbar-content-offset: calc(var(--topbar-panel-left) + 0.72rem);
        width: max-content;
        max-width: calc(100% - 1rem);
        min-height: 4.85rem;
        margin-left: max(0.5rem, env(safe-area-inset-left));
        margin-right: auto;
        padding: 0.72rem 0.78rem 0.72rem var(--topbar-content-offset);
    }

    .topbar.is-scrolled {
        --topbar-content-offset: calc(var(--topbar-panel-left) + 0.68rem);
        padding: 0.66rem 0.72rem 0.66rem var(--topbar-content-offset);
    }

    .topbar-actions {
        flex: 0 0 auto;
        width: auto;
        max-width: 100%;
    }

    .language-switcher {
        width: max-content;
        min-width: 0;
        grid-template-columns: repeat(3, minmax(2.15rem, 1fr));
    }

    .language-option {
        min-width: 2.15rem;
        min-height: 2.05rem;
    }

    .button {
        max-width: 100%;
        min-height: 2.75rem;
        text-align: center;
        line-height: 1.2;
    }

    .hero-copy h1 {
        max-width: min(8.8ch, 100%);
        font-size: clamp(2.55rem, 11.5vw, 3.35rem);
        line-height: 1.02;
        overflow-wrap: break-word;
        text-wrap: pretty;
    }

    .hero-text,
    .hero-trust-note {
        max-width: 100%;
        overflow-wrap: break-word;
    }

    .hero-actions,
    .cta-actions,
    .product-actions,
    .footer-banner-actions,
    .footer-topbar-actions {
        gap: 0.65rem;
    }

    .hero-actions .button {
        flex: 1 1 calc(50% - 0.35rem);
        min-width: min(100%, 8.4rem);
        padding-inline: clamp(0.95rem, 4vw, 1.15rem);
        white-space: nowrap;
    }

    .cta-actions .button,
    .product-actions .button,
    .footer-banner-actions .footer-action-button,
    .footer-topbar-actions .button {
        min-width: 0;
    }
}

@media (max-width: 560px) {
    .hero-actions {
        display: grid;
        grid-template-columns: 1fr;
    }

    .hero-actions .button {
        width: 100%;
        white-space: normal;
    }
}

@media (max-width: 420px) {
    .hero-copy h1 {
        max-width: min(8.2ch, 100%);
        font-size: clamp(2.45rem, 11vw, 3rem);
    }

    .cta-actions,
    .footer-banner-actions,
    .footer-topbar-actions {
        display: grid;
        grid-template-columns: 1fr;
    }

    .cta-actions .button,
    .footer-banner-actions .footer-action-button,
    .footer-topbar-actions .button {
        width: 100%;
        white-space: normal;
    }
}
</style>
