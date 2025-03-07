// @ts-check
import { defineConfig } from 'astro/config'
import starlight from '@astrojs/starlight'
import tailwind from '@astrojs/tailwind'

export default defineConfig({
    site: 'https://filamentphp.com',
    base: '/docs',
    publicDir: './docs/public',
    outDir: './public/docs',
    srcDir: './docs',
    trailingSlash: 'never',
    integrations: [
        starlight({
            title: 'Filament',
            social: {
                github: 'https://github.com/withastro/starlight',
            },
            sidebar: [
                {
                    label: 'Guides',
                    items: [
                        { label: 'Example Guide', slug: 'guides/example' },
                    ],
                },
                {
                    label: 'Reference',
                    autogenerate: { directory: 'reference' },
                },
            ],
            customCss: ['./docs/tailwind.css'],
        }),
        tailwind({ applyBaseStyles: false, configFile: './docs/tailwind.config.mjs' }),
    ],
})
