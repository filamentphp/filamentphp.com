import { defineConfig } from 'astro/config'
import react from '@astrojs/react'
import mdx from '@astrojs/mdx'
import icon from 'astro-icon'
import { h } from 'hastscript'
import rehypeAutolinkHeadings from 'rehype-autolink-headings'
import rehypeSlug from 'rehype-slug'

// https://astro.build/config
export default defineConfig({
    base: '/docs',
    site: 'https://filamentphp.com',
    integrations: [react(), mdx(), icon()],
    markdown: {
        shikiConfig: {
            themes: {
                light: 'catppuccin-latte',
                dark: 'catppuccin-mocha',
            },
        },
        rehypePlugins: [
            rehypeSlug,
            // Automatically add links to headings (@ref https://github.com/rehypejs/rehype-autolink-headings)
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
