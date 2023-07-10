import Alpine from 'alpinejs'
import Clipboard from '@ryangjchandler/alpine-clipboard'
import Collapse from '@alpinejs/collapse'
import Focus from '@alpinejs/focus'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import Persist from '@alpinejs/persist'
import docsearch from '@docsearch/js'
import Splide from '@splidejs/splide'
import { gsap } from 'gsap'
import * as ScrollTrigger from 'gsap/ScrollTrigger'
import Tooltip from '@ryangjchandler/alpine-tooltip'
import 'tippy.js/dist/tippy.css'
import 'tippy.js/themes/material.css'
import 'tippy.js/animations/shift-away-subtle.css'
import autoAnimate from '@formkit/auto-animate'
import MiniSearch from 'minisearch'

// AutoAnimate
window.autoAnimate = autoAnimate

// Asset loading
import.meta.glob(['../images/**', '../svg/**'])

// GSAP
gsap.registerPlugin(ScrollTrigger)
window.gsap = gsap
window.reducedMotion = window.matchMedia(
    '(prefers-reduced-motion: reduce)',
).matches

// Minisearch
window.MiniSearch = MiniSearch

// Alpine
Alpine.store('sidebar', { isOpen: false })

Alpine.plugin(Clipboard)
Alpine.plugin(Collapse)
Alpine.plugin(Focus)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(Persist)
Alpine.plugin(Tooltip)

window.Alpine = Alpine
Alpine.start()

// Splide
if (document.querySelector('.splide')) {
    new Splide('.splide').mount()
}

// DocSearch
docsearch({
    appId: 'LMIKXMDI4P',
    apiKey: '1e3d12b0b9c3a4db16cd896e83b9efa0',
    indexName: 'filamentadmin',
    container: '#docsearch',
    debug: false,
})
