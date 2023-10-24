<section
    x-cloak
    x-data
    x-init="
        () => {
            window.pricingRiveInstance = new rive.Rive({
                src: '/rive/filament_pricing.riv',
                canvas: document.getElementById('pricingCanvas'),
                autoplay: false,
                onLoad: () => {
                    window.pricingRiveInstance.resizeDrawingSurfaceToCanvas()
                },
            })
            window.ScrollTrigger.create({
                id: 'pricingCanvas-scrolltrigger',
                trigger: '#pricingCanvas',
                start: 'top bottom-=200px',
                onEnter: () => {
                    window.pricingRiveInstance?.play()
                    window.ScrollTrigger.getById('pricingCanvas-scrolltrigger')?.kill()
                },
            })
            window.addEventListener('unload', () => {
                window.pricingRiveInstance.cleanup()
                window.pricingRiveInstance = undefined
            })
        }
    "
    class="mx-auto w-full max-w-5xl pt-14"
>
    <canvas
        id="pricingCanvas"
        class="w-full"
    ></canvas>
</section>
