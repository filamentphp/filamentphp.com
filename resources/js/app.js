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

Alpine.plugin(Tooltip)
