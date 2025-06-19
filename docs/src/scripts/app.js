import Alpine from 'alpinejs'
import autoAnimate from '@formkit/auto-animate'
import Clipboard from './clipboard'
import Collapse from '@alpinejs/collapse'
import TableOfContents from './table-of-contents'
import FloatingUi from '@awcodes/alpine-floating-ui'
import Focus from '@alpinejs/focus'
import Intersect from '@alpinejs/intersect'
import docsearch from '@docsearch/js'
import './fonts'

docsearch({
    container: '#docsearch',
    appId: 'LMIKXMDI4P',
    apiKey: '1e3d12b0b9c3a4db16cd896e83b9efa0',
    indexName: 'filamentadmin',
    placeholder: 'Search docs',
    searchParameters: {
        facetFilters: [
            `version:${document.getElementById('current-version').innerText}`,
        ],
    },
})

Alpine.plugin(Focus)
Alpine.plugin(Clipboard)
Alpine.plugin(Collapse)
Alpine.plugin(FloatingUi)
Alpine.plugin(Intersect)
Alpine.plugin(TableOfContents)

Alpine.start()

window.autoAnimate = autoAnimate
