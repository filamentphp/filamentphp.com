const colors = require('tailwindcss/colors')
const { fontFamily } = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        './config/markdown.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.amber,
                success: colors.green,
                warning: colors.amber,
            },
            fontFamily: {
                cursive: ['Kalam', ...fontFamily.serif],
                heading: ['Lexend', ...fontFamily.sans],
                mono: ['JetBrains Mono', ...fontFamily.sans],
                sans: ['DM Sans', ...fontFamily.sans],
            },
            maxWidth: {
                '8xl': '88rem',
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        a: {
                            '&:hover': {
                                color: theme('colors.primary.600'),
                            },
                            '&:focus': {
                                color: theme('colors.primary.600'),
                            },
                        },
                        blockquote: {
                            fontStyle: 'normal',
                        },
                        'blockquote p:first-of-type::before': {
                            content: 'none',
                        },
                        'blockquote p:first-of-type::after': {
                            content: 'none',
                        },
                        code: {
                            fontWeight: theme('fontWeight.normal'),
                        },
                    },
                },
                invert: {
                    css: {
                        a: {
                            '&:hover': {
                                color: theme('colors.primary.500'),
                            },
                            '&:focus': {
                                color: theme('colors.primary.500'),
                            },
                        },
                    },
                },
            }),
            zIndex: {
                '-1': '-1',
            },
        },
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
