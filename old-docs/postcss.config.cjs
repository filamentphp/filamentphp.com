module.exports = {
    plugins: {
        'postcss-import': {},
        'tailwindcss/nesting': {},
        tailwindcss: {},
        'postcss-focus-visible': {
            replaceWith: '[data-focus-visible-added]',
        },
        autoprefixer: {},
    },
}
