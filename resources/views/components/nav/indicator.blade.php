<div class="absolute -bottom-4 right-1/2 translate-x-1/2">
    <div
        x-init="
            () => {
                if (reducedMotion) return

                motion.inView($el, (element) => {
                    motion.animate(
                        $el,
                        {
                            opacity: [0, 1],
                            y: [-30, 0],
                            rotate: [-360, 0],
                            scale: [0.5, 1],
                        },
                        {
                            duration: 0.7,
                            ease: motion.circOut,
                            delay: 0.05,
                        },
                    )
                })
            }
        "
        class="opacity-0 motion-reduce:opacity-100"
    >
        <div
            x-init="
                () => {
                    if (reducedMotion) return

                    motion.animate(
                        $el,
                        {
                            rotate: [0, 360],
                        },
                        {
                            duration: 3,
                            repeat: Infinity,
                            repeatType: 'loop',
                            ease: 'linear',
                        },
                    )
                }
            "
        >
            <x-icons.nexus-flower class="size-[10px]" />
        </div>
    </div>
</div>
