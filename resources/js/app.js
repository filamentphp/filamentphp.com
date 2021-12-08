import Alpine from 'alpinejs'
import Clipboard from '@ryangjchandler/alpine-clipboard'
import docsearch from '@docsearch/js'

Alpine.store('sidebar', { isOpen: false })

Alpine.plugin(Clipboard)

window.Alpine = Alpine
Alpine.start()

docsearch({
    appId: 'BH4D9OD16A',
    apiKey: '3a6f5ec59e023f465d3526ca02af8404',
    indexName: 'filamentadmin',
    container: '#docsearch',
    debug: false,
})
