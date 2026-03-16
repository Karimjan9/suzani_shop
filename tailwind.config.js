import defaultTheme from 'tailwindcss/defaultTheme';
import daisyui from 'daisyui';
import flowbite from 'flowbite/plugin';

export default {
    content: [
        './app/**/*.php',
        './bootstrap/**/*.php',
        './config/**/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.scss',
        './vendor/filament/**/*.blade.php',
        './vendor/livewire/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                suzani: {
                    clay: '#a33f2f',
                    gold: '#d8a14d',
                    teal: '#1f6a67',
                    ink: '#34180f',
                },
            },
        },
    },
    plugins: [flowbite, daisyui],
    daisyui: {
        themes: [
            {
                suzani: {
                    primary: '#a33f2f',
                    secondary: '#1f6a67',
                    accent: '#d8a14d',
                    neutral: '#34180f',
                    'base-100': '#fffaf3',
                    'base-200': '#f8f1e7',
                    'base-300': '#efe2d2',
                    info: '#4f86c6',
                    success: '#2d7d46',
                    warning: '#bf7b16',
                    error: '#b93a32',
                },
            },
            'light',
        ],
    },
};
