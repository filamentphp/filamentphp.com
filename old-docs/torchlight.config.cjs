module.exports = {
    // Your token from https://torchlight.dev
    token: 'torch_jejBHv4rHZd1wp760zXp1500agrI6tfAIfHEspLB',

    // The Torchlight client caches highlighted code blocks. Here you
    // can define which directory you'd like to use. You'll likely
    // want to add this directory to your .gitignore. Set to
    // `false` to use an in-memory cache. You may also
    // provide a full cache implementation.
    cache: 'torchlight-cache',

    // Which theme you want to use. You can find all of the themes at
    // https://torchlight.dev/docs/themes.
    theme: 'material-theme-palenight',

    // The Host of the API.
    host: 'https://api.torchlight.dev',

    // Global options to control block-level settings.
    // https://torchlight.dev/docs/options
    options: {
        // Turn line numbers on or off globally.
        lineNumbers: false,

        // Control the `style` attribute applied to line numbers.
        // lineNumbersStyle: '',

        // Turn on +/- diff indicators.
        diffIndicators: true,

        // If there are any diff indicators for a line, put them
        // in place of the line number to save horizontal space.
        diffIndicatorsInPlaceOfLineNumbers: true,

        // When lines are collapsed, this is the text that will
        // be shown to indicate that they can be expanded.
        // summaryCollapsedIndicator: '...',
    },

    // Options for the highlight command.
    highlight: {
        // Directory where your un-highlighted source files live. If
        // left blank, Torchlight will use the current directory.
        input: './dist',

        // Directory where your highlighted files should be placed. If
        // left blank, files will be modified in place.
        output: '',

        // Globs to include when looking for files to highlight.
        includeGlobs: ['**/*.htm', '**/*.html'],

        // String patterns to ignore (not globs). The entire file
        // path will be searched and if any of these strings
        // appear, the file will be ignored.
        excludePatterns: ['/node_modules/', '/vendor/'],
    },
}
