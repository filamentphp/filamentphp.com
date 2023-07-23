const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./src/**/*.{js,jsx,astro}'],
    darkMode: 'class',
    theme: {
        fontSize: {
            xs: ['0.75rem', { lineHeight: '1rem' }],
            sm: ['0.875rem', { lineHeight: '1.5rem' }],
            base: ['1rem', { lineHeight: '2rem' }],
            lg: ['1.125rem', { lineHeight: '1.75rem' }],
            xl: ['1.25rem', { lineHeight: '2rem' }],
            '2xl': ['1.5rem', { lineHeight: '2.5rem' }],
            '3xl': ['2rem', { lineHeight: '2.5rem' }],
            '4xl': ['2.5rem', { lineHeight: '3rem' }],
            '5xl': ['3rem', { lineHeight: '3.5rem' }],
            '6xl': ['3.75rem', { lineHeight: '1' }],
            '7xl': ['4.5rem', { lineHeight: '1' }],
            '8xl': ['6rem', { lineHeight: '1' }],
            '9xl': ['8rem', { lineHeight: '1' }],
        },
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.amber,
                success: colors.green,
                warning: colors.amber,
                cream: '#FFF9F5',
                butter: '#FDAE4B',
                midnight: '#0F033A',
                evening: '#251A4D',
                merino: '#F2E7DD',
                hurricane: '#807575',
                dolphin: '#6C6489',
                'peach-orange': '#FFC497',
                'seashell-peach': '#FFF0E8',
                'dawn-pink': '#F1E5E4',
                salmon: '#F89377',
                'fair-pink': '#FFEAE4',
            },
            fontFamily: {
                sans: ['Be Vietnam Pro', ...defaultTheme.fontFamily.sans],
                display: ['Be Vietnam Pro', ...defaultTheme.fontFamily.sans],
                mono: ['JetBrains Mono', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                '8xl': '88rem',
            },
        },
    },
    plugins: [require('@tailwindcss/typography')],
}
