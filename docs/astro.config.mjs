import { defineConfig } from "astro/config";
import tailwind from "@astrojs/tailwind";
import react from "@astrojs/react";
import mdx from "@astrojs/mdx";

// https://astro.build/config
export default defineConfig({
  base: "/docs",
  site: "https://filamentphp.com",
  integrations: [
    tailwind({
      config: {
        path: "./tailwind.config.cjs",
        applyBaseStyles: false,
      },
    }),
    react(),
    mdx(),
  ],
  markdown: {
    syntaxHighlight: false,
    shikiConfig: {
      theme: "material-palenight",
    },
  },
});
