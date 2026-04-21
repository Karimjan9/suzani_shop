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
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .brand-knot {
        width: 1rem;
        height: 1rem;
        border: 2px solid var(--primary);
        border-radius: 0.3rem;
        transform: rotate(45deg);
        box-shadow: 0 0 0 4px rgba(163, 63, 47, 0.12);
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
        grid-template-columns: minmax(0, 1fr) minmax(24rem, 0.92fr);
        gap: 3rem;
        align-items: center;
        padding-top: 2.25rem;
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
        max-width: 9ch;
        font-size: clamp(3.6rem, 7vw, 7rem);
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
        margin-top: 2rem;
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
        min-height: 39rem;
        padding: 0.85rem;
    }

    .hero-art::before,
    .hero-art::after {
        position: absolute;
        pointer-events: none;
        content: '';
    }

    .hero-art::before {
        inset: 2.2rem 1rem 1.6rem -0.35rem;
        z-index: 0;
        border-radius: 2.9rem;
        background:
            radial-gradient(circle at 18% 22%, rgba(244, 219, 173, 0.54), transparent 34%),
            radial-gradient(circle at 80% 20%, rgba(154, 96, 66, 0.24), transparent 24%),
            radial-gradient(circle at 72% 78%, rgba(89, 122, 110, 0.16), transparent 26%);
        filter: blur(28px);
        opacity: 0.88;
    }

    .hero-art::after {
        inset: 0.1rem 0.2rem 0.2rem 0;
        z-index: 0;
        border: 1px solid rgba(183, 138, 82, 0.16);
        border-radius: 2.7rem;
        background: linear-gradient(135deg, rgba(255, 251, 246, 0.58) 0%, rgba(242, 230, 214, 0.32) 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.46),
            0 28px 68px rgba(49, 27, 17, 0.12);
    }

    .hero-visual-stage {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 1fr) 11rem;
        gap: 1rem;
        align-items: stretch;
        min-height: 39rem;
        padding: 0.95rem;
        border: 1px solid rgba(183, 138, 82, 0.18);
        border-radius: 2.45rem;
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
        inset: 0.7rem;
        z-index: 0;
        border: 1px solid rgba(183, 138, 82, 0.12);
        border-radius: calc(2.45rem - 0.7rem);
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
        border-radius: 2rem;
        box-shadow:
            0 24px 58px rgba(36, 20, 13, 0.16),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .hero-visual-main {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.5rem;
        background: linear-gradient(135deg, #efe2d1 0%, #d7b996 43%, #866148 100%);
    }

    .hero-visual-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.04);
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
        inset: 0.82rem 0.85rem 0.95rem 0.9rem;
        z-index: 1;
        border-radius: 1.55rem;
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
        width: fit-content;
        max-width: 16rem;
        padding: 1rem 1.05rem;
        border: 1px solid rgba(255, 244, 229, 0.74);
        border-radius: 1.6rem;
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
        max-width: 9ch;
        margin-top: 0;
        color: #241712;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2.6rem, 4vw, 4rem);
        line-height: 0.98;
        letter-spacing: -0.035em;
        text-wrap: balance;
    }

    .hero-visual-caption {
        max-width: 15rem;
        isolation: isolate;
        padding: 1rem 1.1rem;
        border-radius: 1.5rem;
        border: 1px solid rgba(255, 244, 229, 0.7);
        background:
            linear-gradient(135deg, rgba(255, 252, 246, 0.88) 0%, rgba(242, 230, 214, 0.82) 100%),
            repeating-linear-gradient(90deg, transparent 0 18px, rgba(183, 138, 82, 0.05) 18px 19px),
            repeating-linear-gradient(180deg, transparent 0 18px, rgba(183, 138, 82, 0.05) 18px 19px);
        color: #4a3529;
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
        gap: 1rem;
    }

    .hero-visual-detail {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
        gap: 0.55rem;
        min-height: 0;
        padding: 1.2rem;
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
        inset: 0.75rem;
        z-index: 1;
        border: 1px solid rgba(255, 248, 239, 0.34);
        border-radius: 1.25rem;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.14), transparent 26%),
            repeating-linear-gradient(90deg, transparent 0 26px, rgba(255, 243, 229, 0.07) 26px 27px),
            repeating-linear-gradient(180deg, transparent 0 26px, rgba(255, 243, 229, 0.07) 26px 27px);
        box-shadow: inset 0 0 0 1px rgba(255, 248, 239, 0.12);
        content: '';
    }

    .hero-visual-detail strong {
        display: inline-block;
        isolation: isolate;
        overflow: hidden;
        max-width: 8ch;
        margin-top: 0;
        padding: 0.72rem 0.82rem;
        border: 1px solid rgba(255, 244, 229, 0.72);
        border-radius: 1rem;
        background:
            linear-gradient(135deg, rgba(255, 252, 247, 0.94) 0%, rgba(244, 233, 220, 0.88) 100%),
            repeating-linear-gradient(90deg, transparent 0 14px, rgba(183, 138, 82, 0.05) 14px 15px),
            repeating-linear-gradient(180deg, transparent 0 14px, rgba(183, 138, 82, 0.05) 14px 15px);
        color: #241712;
        font-size: 1.2rem;
        line-height: 1.18;
        text-wrap: balance;
        box-shadow:
            0 14px 28px rgba(33, 18, 11, 0.14),
            inset 0 1px 0 rgba(255, 255, 255, 0.72),
            inset 0 0 0 1px rgba(183, 138, 82, 0.06),
            inset 0 0 0 10px rgba(255, 255, 255, 0.1);
    }

    .hero-visual-detail-top {
        min-height: 14rem;
    }

    .hero-visual-detail-bottom {
        min-height: 11rem;
    }

    .hero-visual-main:hover .hero-visual-image,
    .hero-visual-detail:hover .hero-visual-image {
        transform: scale(1.08);
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
        margin-bottom: 0.75rem;
        font-size: 1.35rem;
        font-weight: 700;
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
    }

    .testimonial-card {
        padding: 1.6rem;
    }

    .testimonial-card div {
        margin-top: 1.25rem;
    }

    .testimonial-card span {
        display: block;
        margin-top: 0.2rem;
        color: var(--muted);
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
        min-height: 20rem;
        background: linear-gradient(135deg, rgba(255, 251, 245, 0.96) 0%, rgba(240, 229, 213, 0.92) 100%);
    }

    .contact-map-surface {
        position: relative;
        isolation: isolate;
        width: 100%;
        height: 100%;
        min-height: 20rem;
        display: flex;
        align-items: flex-end;
        padding: 1.2rem;
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
            linear-gradient(180deg, rgba(255, 251, 245, 0.14) 0%, rgba(255, 251, 245, 0.04) 34%, rgba(34, 24, 21, 0.18) 100%),
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
        width: min(100%, 22rem);
        display: grid;
        gap: 0.7rem;
        padding: 1rem 1.1rem;
        border: 1px solid rgba(82, 43, 23, 0.1);
        border-radius: 1.05rem;
        background: rgba(255, 252, 247, 0.9);
        backdrop-filter: blur(14px);
        box-shadow: 0 18px 34px rgba(58, 34, 21, 0.12);
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
        line-height: 1.65;
    }

    .contact-map-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding-top: 0.3rem;
        border-top: 1px solid rgba(82, 43, 23, 0.08);
    }

    .contact-map-meta span:last-child {
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
        font-weight: 700;
        line-height: 1.2;
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
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1.1rem;
    }

    .contact-field {
        display: grid;
        gap: 0.55rem;
    }

    .contact-field-full {
        grid-column: 1 / -1;
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

    .contact-form-note {
        color: #1f6a67;
        font-weight: 600;
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
        }

        .hero-visual-stage,
        .hero-feature-bar,
        .cta-points {
            grid-template-columns: 1fr;
        }

        .hero-visual-stage {
            min-height: auto;
        }

        .hero-visual-main {
            min-height: 30rem;
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

        .hero-visual-label,
        .hero-visual-caption {
            max-width: 14rem;
            padding: 0.9rem 0.95rem;
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

    body.is-gallery-open {
        overflow: hidden;
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

        .topbar-actions {
            justify-content: stretch;
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

    .footer-grid-immersive {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) repeat(2, minmax(0, 0.9fr)) minmax(0, 1.02fr);
        gap: 1rem;
        align-items: start;
    }

    .footer-brand-card,
    .footer-menu-card,
    .footer-contact-card {
        position: relative;
        overflow: hidden;
        display: grid;
        gap: 1rem;
        min-height: 100%;
        padding: 1.45rem;
        border: 1px solid rgba(255, 239, 224, 0.08);
        border-radius: 1.7rem;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.03));
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

    .footer-brand-card:hover,
    .footer-menu-card:hover,
    .footer-contact-card:hover {
        transform: translateY(-4px);
        border-color: rgba(255, 228, 201, 0.14);
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.04));
        box-shadow:
            0 28px 54px rgba(7, 5, 10, 0.24),
            inset 0 1px 0 rgba(255, 250, 246, 0.06);
    }

    .footer-card-kicker {
        background: rgba(255, 255, 255, 0.05);
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
        color: #fff7ef;
        font-size: 1.12rem;
        font-weight: 700;
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
        background: rgba(255, 255, 255, 0.04);
        transition:
            transform 220ms ease,
            border-color 220ms ease,
            background 220ms ease,
            box-shadow 220ms ease;
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
            linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, rgba(214, 147, 88, 0.12) 100%);
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
        display: grid;
        grid-template-columns: auto minmax(0, 1fr) auto;
        gap: 0.9rem;
        align-items: center;
        padding: 0.95rem 1rem;
        border: 1px solid rgba(255, 239, 224, 0.08);
        border-radius: 1.2rem;
        background: rgba(255, 255, 255, 0.04);
        transition:
            transform 220ms ease,
            border-color 220ms ease,
            background 220ms ease,
            box-shadow 220ms ease;
    }

    .footer-contact-row:hover,
    .footer-contact-row:focus-visible {
        transform: translateY(-3px);
        border-color: rgba(255, 219, 188, 0.16);
        background:
            linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, rgba(86, 112, 198, 0.12) 100%);
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
</style>
