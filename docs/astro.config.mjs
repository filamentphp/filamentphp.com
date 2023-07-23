import { defineConfig } from 'astro/config'
import tailwind from '@astrojs/tailwind'
import react from '@astrojs/react'
import mdx from '@astrojs/mdx'
import { h } from 'hastscript'
import rehypeAutolinkHeadings from 'rehype-autolink-headings'

// https://astro.build/config
export default defineConfig({
    base: '/docs',
    site: 'https://filamentphp.com',
    integrations: [
        tailwind({
            config: {
                path: './tailwind.config.cjs',
                applyBaseStyles: false,
            },
        }),
        react(),
        mdx(),
    ],
    markdown: {
        syntaxHighlight: false,
        shikiConfig: {
            theme: 'material-palenight',
        },
        rehypePlugins: [
            // Automatically add links to headings (@see https://github.com/rehypejs/rehype-autolink-headings)
            [
                rehypeAutolinkHeadings,
                {
                    behavior: 'prepend',
                    properties: { class: 'heading-anchor' },
                    content: (heading) => [
                        h(
                            `span.heading-anchor-icon`,
                            { ariaHidden: 'true' },
                            '#',
                        ),
                    ],
                },
            ],
        ],
    },
})
