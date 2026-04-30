const storageKey = 'suzani-shop-theme';
const defaultTheme = 'atelier';
const themeMetaColors = {
    atelier: '#f5efe6',
    nocturne: '#211918',
};

const normalizeTheme = (value) => value === 'nocturne' ? 'nocturne' : defaultTheme;

const syncThemeUi = (theme) => {
    const safeTheme = normalizeTheme(theme);
    const metaTheme = document.querySelector('meta[name="theme-color"]');

    document.documentElement.setAttribute('data-theme', safeTheme);
    document.documentElement.style.colorScheme = safeTheme === 'nocturne' ? 'dark' : 'light';

    if (metaTheme) {
        metaTheme.setAttribute('content', themeMetaColors[safeTheme] || themeMetaColors.atelier);
    }

    document.querySelectorAll('[data-theme-toggle]').forEach((toggle) => {
        toggle.setAttribute('data-active-theme', safeTheme);
        toggle.setAttribute('aria-pressed', safeTheme === 'nocturne' ? 'true' : 'false');

        const status = toggle.querySelector('[data-theme-toggle-status]');

        if (status) {
            status.textContent = safeTheme === 'nocturne'
                ? (toggle.dataset.themeDarkStatus || 'Nocturne mode is active')
                : (toggle.dataset.themeLightStatus || 'Atelier mode is active');
        }
    });
};

export const initThemeToggle = () => {
    if (!document.querySelector('[data-theme-toggle]')) {
        return;
    }

    syncThemeUi(document.documentElement.getAttribute('data-theme'));

    document.querySelectorAll('[data-theme-toggle]').forEach((toggle) => {
        if (toggle.dataset.themeToggleBound === 'true') {
            return;
        }

        toggle.dataset.themeToggleBound = 'true';

        toggle.addEventListener('click', () => {
            const currentTheme = normalizeTheme(document.documentElement.getAttribute('data-theme'));
            const nextTheme = currentTheme === 'nocturne' ? defaultTheme : 'nocturne';

            syncThemeUi(nextTheme);

            try {
                window.localStorage.setItem(storageKey, nextTheme);
            } catch {
                // Ignore storage write issues and keep theme in-memory.
            }
        });
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initThemeToggle, { once: true });
} else {
    initThemeToggle();
}
