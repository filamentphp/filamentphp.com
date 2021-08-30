const colors = require('tailwindcss/colors')
const { fontFamily } = require('tailwindcss/defaultTheme')

module.exports = {
    mode: 'jit',
    purge: [
        './config/markdown.php',
        './resources/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.yellow,
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                heading: ['Lexend', ...fontFamily.sans],
                mono: ['JetBrains Mono', ...fontFamily.sans],
                sans: ['DM Sans', ...fontFamily.sans],
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
                            backgroundColor: theme('colors.yellow.100'),
                            borderRadius: theme('borderRadius.lg'),
                            fontWeight: theme('fontWeight.normal'),
                            padding: `${theme('spacing[0.5]')} theme('spacing.1')`,
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
