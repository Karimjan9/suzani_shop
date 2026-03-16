<style>
    :root {
        --bg: #f5efe6;
        --surface: rgba(255, 251, 245, 0.82);
        --surface-strong: #fffaf4;
        --text: #221815;
        --muted: #6e5c50;
        --line: rgba(71, 47, 34, 0.12);
        --primary: #7a4a30;
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
        padding: 1.5rem 0 4rem;
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
        gap: 1rem;
        padding: 0.85rem 1rem;
        border: 1px solid var(--line);
        border-radius: 999px;
        background: rgba(255, 251, 246, 0.78);
        backdrop-filter: blur(18px);
        box-shadow: 0 18px 45px rgba(58, 34, 21, 0.07);
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
    }

    .topbar-links a,
    .text-link,
    .product-foot a,
    .category-card a,
    .contact-card a {
        transition: color 180ms ease;
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
        padding-top: 5rem;
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
    }

    .hero-visual-stage {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 11rem;
        gap: 1rem;
        align-items: stretch;
        min-height: 39rem;
    }

    .hero-visual-main,
    .hero-visual-detail {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 2rem;
        box-shadow: var(--shadow);
    }

    .hero-visual-main {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.5rem;
        background:
            linear-gradient(180deg, rgba(10, 8, 7, 0.04), rgba(10, 8, 7, 0.32)),
            radial-gradient(circle at 20% 18%, rgba(255, 244, 230, 0.78), transparent 28%),
            radial-gradient(circle at 70% 36%, rgba(183, 138, 82, 0.22), transparent 30%),
            linear-gradient(135deg, #efe2d1 0%, #d7b996 43%, #866148 100%);
    }

    .hero-visual-main::after {
        position: absolute;
        inset: 8% 10% 18% 12%;
        border-radius: 1.7rem;
        border: 1px solid rgba(255, 248, 239, 0.42);
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.18), transparent 24%),
            radial-gradient(circle at 30% 30%, rgba(255, 248, 239, 0.24), transparent 20%),
            linear-gradient(145deg, rgba(115, 69, 42, 0.2), rgba(41, 25, 18, 0.52));
        content: '';
    }

    .hero-visual-label,
    .hero-visual-caption,
    .hero-visual-detail span,
    .hero-visual-detail strong {
        position: relative;
        z-index: 1;
    }

    .hero-visual-label span,
    .hero-visual-detail span {
        display: inline-flex;
        width: fit-content;
        padding: 0.38rem 0.72rem;
        border-radius: 999px;
        background: rgba(255, 248, 239, 0.18);
        color: #fff6ee;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .hero-visual-label strong {
        display: block;
        max-width: 9ch;
        margin-top: 1rem;
        color: #fff8f1;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2.6rem, 4vw, 4rem);
        line-height: 0.98;
    }

    .hero-visual-caption {
        max-width: 15rem;
        padding: 1rem 1.1rem;
        border-radius: 1.5rem;
        background: rgba(255, 248, 239, 0.16);
        color: #fdf7f0;
        line-height: 1.7;
        backdrop-filter: blur(12px);
    }

    .hero-visual-stack {
        display: grid;
        gap: 1rem;
    }

    .hero-visual-detail {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        min-height: 0;
        padding: 1.2rem;
        background:
            linear-gradient(180deg, rgba(17, 13, 10, 0.04), rgba(17, 13, 10, 0.44)),
            radial-gradient(circle at 18% 18%, rgba(255, 243, 228, 0.5), transparent 25%),
            linear-gradient(145deg, #d2b08b 0%, #8e684f 100%);
    }

    .hero-visual-detail strong {
        margin-top: 0.7rem;
        color: #fff8f1;
        font-size: 1.2rem;
        line-height: 1.3;
    }

    .hero-visual-detail-top {
        min-height: 14rem;
    }

    .hero-visual-detail-bottom {
        min-height: 11rem;
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
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 15rem;
        padding: 1.3rem;
        color: #fff8f0;
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
        grid-template-columns: minmax(0, 1.2fr) minmax(0, 1fr);
        gap: 1rem;
        align-items: end;
        margin-bottom: 1.1rem;
    }

    .catalog-search-wrap,
    .catalog-sort-wrap {
        display: grid;
        gap: 0.45rem;
    }

    .catalog-controls {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        gap: 1rem;
        align-items: end;
    }

    .catalog-label {
        color: var(--muted);
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .catalog-search,
    .catalog-sort {
        width: 100%;
        padding: 0.95rem 1rem;
        border: 1px solid var(--line);
        border-radius: 1rem;
        background: rgba(255, 251, 245, 0.82);
        outline: none;
        transition:
            border-color 180ms ease,
            box-shadow 180ms ease;
    }

    .catalog-search:focus,
    .catalog-sort:focus {
        border-color: rgba(163, 63, 47, 0.32);
        box-shadow: 0 0 0 4px rgba(163, 63, 47, 0.08);
    }

    .catalog-filter-group {
        display: flex;
        flex-wrap: wrap;
        gap: 0.7rem;
    }

    .filter-chip {
        padding: 0.8rem 1rem;
        border: 1px solid var(--line);
        border-radius: 999px;
        background: rgba(255, 251, 245, 0.82);
        color: var(--muted);
        font-weight: 700;
        cursor: pointer;
        transition:
            background-color 180ms ease,
            color 180ms ease,
            border-color 180ms ease,
            transform 180ms ease;
    }

    .filter-chip:hover,
    .filter-chip.is-active {
        color: #fff7f2;
        border-color: transparent;
        background: linear-gradient(135deg, var(--primary) 0%, #c35e3f 100%);
    }

    .filter-chip:hover {
        transform: translateY(-1px);
    }

    .catalog-meta {
        margin-bottom: 1.25rem;
        color: var(--muted);
    }

    .catalog-meta span {
        color: var(--text);
        font-weight: 800;
    }

    .catalog-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .catalog-card {
        display: flex;
        flex-direction: column;
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
        overflow: hidden;
        border-radius: 1.3rem;
        border: 1px solid rgba(82, 43, 23, 0.1);
        min-height: 20rem;
    }

    .contact-map-frame iframe {
        width: 100%;
        height: 100%;
        min-height: 20rem;
        display: block;
    }

    .contact-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1rem;
    }

    .contact-field {
        display: grid;
        gap: 0.45rem;
    }

    .contact-field-full {
        grid-column: 1 / -1;
    }

    .contact-field input,
    .contact-field textarea {
        width: 100%;
        padding: 0.95rem 1rem;
        border: 1px solid var(--line);
        border-radius: 1rem;
        background: rgba(255, 252, 247, 0.82);
        outline: none;
        transition:
            border-color 180ms ease,
            box-shadow 180ms ease;
    }

    .contact-field input:focus,
    .contact-field textarea:focus {
        border-color: rgba(163, 63, 47, 0.32);
        box-shadow: 0 0 0 4px rgba(163, 63, 47, 0.08);
    }

    .contact-field textarea {
        resize: vertical;
        min-height: 8rem;
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

    .cart-head-note {
        max-width: 24rem;
        padding: 1rem 1.1rem;
        border: 1px solid var(--line);
        border-radius: 1.25rem;
        background: rgba(255, 251, 245, 0.82);
        box-shadow: var(--shadow);
    }

    .cart-head-note strong {
        display: block;
        margin-bottom: 0.35rem;
        font-size: 1rem;
    }

    .cart-head-note p {
        color: var(--muted);
        line-height: 1.7;
    }

    .cart-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
        gap: 1.25rem;
        align-items: start;
    }

    .cart-card {
        padding: 1.7rem;
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

    .footer-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.3fr) repeat(2, minmax(0, 0.75fr));
        gap: 1.5rem;
        align-items: start;
    }

    .footer-brand {
        display: grid;
        gap: 1rem;
    }

    .footer-link-list {
        display: grid;
        gap: 0.6rem;
    }

    .footer-link-list a,
    .footer-link-list span {
        width: fit-content;
    }

    .footer-link-list a {
        transition: color 180ms ease;
    }

    .footer-link-list a:hover {
        color: var(--primary);
    }

    .footer-meta {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 1.5rem;
        padding-top: 1.2rem;
        border-top: 1px solid rgba(71, 47, 34, 0.08);
        color: var(--muted);
        font-size: 0.92rem;
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

        .cart-head-note {
            max-width: none;
        }

        .footer-meta {
            flex-direction: column;
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
        .footer-meta {
            flex-direction: column;
            align-items: stretch;
        }

        .topbar {
            border-radius: 1.5rem;
        }

        .topbar-links {
            gap: 0.75rem;
        }

        .hero-grid {
            padding-top: 2.5rem;
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
        }

        .hero-visual-main {
            min-height: 24rem;
        }

        .hero-visual-stack {
            grid-template-columns: 1fr;
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
        padding-top: 7rem;
    }

    .topbar {
        position: fixed;
        top: 1rem;
        left: 50%;
        z-index: 40;
        width: min(1160px, calc(100% - 2rem));
        transform: translateX(-50%);
        transition:
            padding 220ms ease,
            box-shadow 220ms ease,
            background-color 220ms ease,
            border-color 220ms ease;
    }

    .topbar.is-scrolled {
        padding: 0.72rem 1rem;
        border-color: rgba(122, 74, 48, 0.18);
        background: rgba(255, 250, 243, 0.92);
        box-shadow: 0 22px 45px rgba(49, 27, 17, 0.14);
    }

    .topbar-links {
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .topbar-admin-link {
        min-height: 2.7rem;
        border-color: rgba(122, 74, 48, 0.18);
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
        gap: 0.85rem;
        margin-bottom: 1rem;
    }

    .product-gallery-stage {
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 14rem;
        padding: 1.15rem;
        border: 1px solid rgba(255, 255, 255, 0.48);
        border-radius: 1.5rem;
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.14);
    }

    .product-gallery-stage strong {
        max-width: 11ch;
        color: #fffaf3;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(1.5rem, 2.2vw, 2.25rem);
        line-height: 1.05;
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
    }

    .product-gallery-controls {
        display: flex;
        gap: 0.55rem;
    }

    .product-gallery-nav {
        padding: 0.55rem 0.8rem;
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 999px;
        background: rgba(255, 251, 246, 0.12);
        color: #fffaf3;
        font-size: 0.8rem;
        font-weight: 700;
        transition:
            transform 180ms ease,
            background-color 180ms ease;
    }

    .product-gallery-nav:hover {
        transform: translateY(-1px);
        background: rgba(255, 251, 246, 0.18);
    }

    .product-gallery-accordion {
        display: flex;
        gap: 0.7rem;
    }

    .product-gallery-panel {
        position: relative;
        overflow: hidden;
        flex: 1 1 0;
        min-height: 10.5rem;
        padding: 1rem 0.85rem;
        border: 1px solid rgba(255, 255, 255, 0.34);
        border-radius: 1.2rem;
        text-align: left;
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.1);
        transition:
            flex 280ms ease,
            transform 220ms ease,
            box-shadow 220ms ease,
            border-color 220ms ease;
    }

    .product-gallery-panel span {
        display: flex;
        align-items: flex-end;
        height: 100%;
        color: #fffaf3;
        font-size: 0.84rem;
        font-weight: 700;
        line-height: 1.35;
    }

    .product-gallery-panel.is-active {
        flex: 2.4 1 0;
        border-color: rgba(255, 255, 255, 0.52);
        box-shadow: 0 18px 36px rgba(43, 23, 14, 0.16);
    }

    .product-gallery-panel:hover {
        transform: translateY(-2px);
    }

    .catalog-gallery.product-showcase-gallery {
        margin-bottom: 1.2rem;
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
            padding-top: 8.25rem;
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
            top: 0.75rem;
            width: calc(100% - 1rem);
        }

        .hero-section {
            padding-top: 11.5rem;
        }

        .topbar-links {
            width: 100%;
            justify-content: stretch;
        }

        .topbar-links a,
        .topbar-admin-link {
            width: 100%;
        }

        .product-gallery-stage {
            min-height: 11rem;
        }

        .product-gallery-accordion {
            flex-direction: column;
        }

        .product-gallery-panel,
        .product-gallery-panel.is-active {
            min-height: 6.2rem;
            flex: 1 1 auto;
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
        padding: 1.35rem;
        border: 1px solid rgba(71, 47, 34, 0.08);
        border-radius: 1.8rem;
        background: rgba(255, 252, 247, 0.74);
        box-shadow: 0 18px 40px rgba(42, 24, 15, 0.06);
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
        }
    }
</style>
