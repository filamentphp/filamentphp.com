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
                    label: '1.x',
                    autogenerate: { directory: '1.x' },
                },
                {
                    label: '2.x',
                    autogenerate: { directory: '2.x' },
                },
                {
                    label: '3.x',
                    autogenerate: { directory: '3.x' },
                },
                {
                    label: '4.x',
                    autogenerate: { directory: '4.x' },
                },
            ],
            components: {
                Footer: './docs/components/Footer.astro',
                Sidebar: './docs/components/Sidebar.astro',
            },
            customCss: ['./docs/tailwind.css'],
        }),
        tailwind({
            applyBaseStyles: false,
            configFile: './docs/tailwind.config.mjs',
        }),
    ],
})
