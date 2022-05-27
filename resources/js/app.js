import Alpine from 'alpinejs'
import Clipboard from '@ryangjchandler/alpine-clipboard'
import Collapse from '@alpinejs/collapse'
import Focus from '@alpinejs/focus'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import docsearch from '@docsearch/js'
import Splide from '@splidejs/splide'

Alpine.store('sidebar', { isOpen: false })

Alpine.plugin(Clipboard)
Alpine.plugin(Collapse)
Alpine.plugin(Focus)
Alpine.plugin(FormsAlpinePlugin)

window.Alpine = Alpine
Alpine.start()

if (document.querySelector('.splide')) {
    new Splide('.splide').mount()
}

docsearch({
    appId: 'LMIKXMDI4P',
    apiKey: '1e3d12b0b9c3a4db16cd896e83b9efa0',
    indexName: 'filamentadmin',
    container: '#docsearch',
    debug: false,
})
