import { defineCollection } from 'astro:content'
import { docsLoader } from '@astrojs/starlight/loaders'
import { docsSchema } from '@astrojs/starlight/schema'
import { glob } from 'astro/loaders'

export const collections = {
	docs: defineCollection({ loader: glob({
        pattern: `**/[^_]*.{md,mdx}`,
        base: './docs/content/docs',
        generateId: ({ entry }) => entry.split('.').slice(0, -1).join('.'),
    }), schema: docsSchema() }),
}
