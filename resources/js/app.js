import { gsap } from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'
import Tooltip from '@ryangjchandler/alpine-tooltip'
import 'tippy.js/dist/tippy.css'
import 'tippy.js/themes/material.css'
import 'tippy.js/animations/shift-away-subtle.css'
import autoAnimate from '@formkit/auto-animate'
import MiniSearch from 'minisearch'
import * as rive from '@rive-app/canvas'
import Swiper from 'swiper'
import { Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

// Swiper
Swiper.use([Navigation, Pagination])
window.Swiper = Swiper

// Rive
window.rive = rive

// AutoAnimate
window.autoAnimate = autoAnimate

// Asset loading
import.meta.glob(['../images/**', '../svg/**'])

// GSAP
gsap.registerPlugin(ScrollTrigger)
window.ScrollTrigger = ScrollTrigger
window.gsap = gsap
window.reducedMotion = window.matchMedia(
    '(prefers-reduced-motion: reduce)',
).matches

// Minisearch
window.MiniSearch = MiniSearch

// Alpine
Alpine.store('sidebar', { isOpen: false })

Alpine.plugin(Tooltip)
