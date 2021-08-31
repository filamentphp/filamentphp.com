import Alpine from 'alpinejs'
import Clipboard from '@ryangjchandler/alpine-clipboard'

Alpine.store('sidebar', { isOpen: false })

Alpine.plugin(Clipboard)

window.Alpine = Alpine
Alpine.start()
