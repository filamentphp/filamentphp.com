import Alpine from 'alpinejs'
import Clipboard from '@ryangjchandler/alpine-clipboard'
import Focus from '@alpinejs/focus'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import docsearch from '@docsearch/js'
import Splide from '@splidejs/splide'

Alpine.store('sidebar', { isOpen: false })

Alpine.plugin(Clipboard)
Alpine.plugin(Focus)
Alpine.plugin(FormsAlpinePlugin)

window.Alpine = Alpine
Alpine.start()

new Splide('.splide').mount()

docsearch({
    appId: 'BH4D9OD16A',
    apiKey: '3a6f5ec59e023f465d3526ca02af8404',
    indexName: 'filamentadmin',
    container: '#docsearch',
    debug: false,
})
