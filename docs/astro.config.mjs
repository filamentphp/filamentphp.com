import { defineConfig } from 'astro/config'
import react from '@astrojs/react'
import mdx from '@astrojs/mdx'
import icon from 'astro-icon'
import { h } from 'hastscript'
import rehypeAutolinkHeadings from 'rehype-autolink-headings'

// https://astro.build/config
export default defineConfig({
    base: '/docs',
    site: 'https://filamentphp.com',
    integrations: [react(), mdx(), icon()],
    markdown: {
        shikiConfig: {
            theme: 'material-theme-palenight',
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
