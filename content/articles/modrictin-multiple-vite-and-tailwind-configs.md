---
title: Have multiple Vite and Tailwind bundles in your Filament project
slug: modrictin-multiple-vite-and-tailwind-configs
author_slug: modrictin
publish_date: 2023-08-17
categories: [general,tailwind-css,panel-builder]
type_slug: trick
---

## The problem

Consider an application with two distinct areas: the public area and the admin area. The objective is to have separate Tailwind configurations for each of these areas.

In this scenario, one Tailwind configuration will be used for the public area, also known as the booking engine, while another will be used for the Filament admin panel.

## The solution

At present, Vite does not offer support for multiple inputs,
thus preventing the creation of distinct bundles using a single Vite configuration.

If your aim is to generate separate build files for various sections of your application,
you'll need to employ multiple Vite configurations.
This can be achieved by crafting an additional Vite configuration and subsequently adding a
new script to your package.json.

### Step 1: Create a new Vite configuration file

Start by crafting new Vite configuration files in the root of your project. For instance, name one `vite.admin.config.js` and consider renaming the default configuration file to `vite.be.config.js`.

### Step 2: Update the Vite configuration files

Note the use of the `buildDirectory` option to define the build files' output directory.

Additionally, the `hotFile` option specifies the path to the hot file, which facilitates real-time communication of module changes from server to client.

#### vite.admin.config.js:

```js
import {defineConfig} from 'vite'
import laravel, {refreshPaths} from 'laravel-vite-plugin'

/** @type {import('vite').UserConfig} */
export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'public/admin.hot',
            buildDirectory: 'admin',
            input: [
                ...
            ],
        }),
    ],
    css: {
        postcss: {
            plugins: [
                require("tailwindcss")({
                    config: "./tailwind-admin.config.js",
                }),
            ],
        },
    },
})

```

#### vite.be.config.js:

```js
import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'


/** @type {import('vite').UserConfig} */
export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'public/be.hot',
            buildDirectory:'be',
            input: [
               ...
            ],
        }),
    ],
    css: {
        postcss: {
            plugins: [
                require("tailwindcss")({
                    config: "./tailwind-be.config.js",
                }),
            ],
        },
    },
})
```

### Step 3: Create the new Tailwind config files (optional)

There is nothing special here, but as the title say, 
you can build css from multiple Tailwind configurations for your project.

How? 
Create a new Tailwind configuration file and update the Vite configuration files to point to the new Tailwind configuration file.
    

In your input files, you can now use the `@tailwind` directive to import Tailwind's base, components, and utilities styles.

Then, when building Vite will use the Tailwind configuration file you specified in the Vite configuration file for that input file.

```js
export default defineConfig({
    ...
    css: {
        postcss: {
            plugins: [
                require("tailwindcss")({
                    config: "./tailwind-be.config.js",
                }),
            ],
        },
    },
    ...
})
```

### Step 4: Update the package.json file

I've included a new set of development and build scripts within my new configuration file. 
Additionally, I've established a unified command that streamlines the process of building all configurations collectively.

#### package.json:
```json
{
  ...
  "scripts": {
    "dev:admin": "vite --config vite.admin.config.js",
    "dev:be": "vite --config vite.be.config.js",
    "build:be": "vite build --config vite.be.config.js",
    "build:admin": "vite build --config vite.admin.config.js",
    "dev": "npm run dev:admin & npm run dev:be",
    "build": "npm run build:be && npm run build:admin"
  },
  ...
}
```

### Step 5: Run the new scripts!



## Conclusion

You can now build multiple Vite and Tailwind configurations for your Filament project.

## How to include these files in your filament project?

Check out my other article on how to include vite built these files in your filament project.

[How to include vite built files in your filament project](modrictin-include-vite-built-js-and-css-files-in-your-project)

Please email me to [modrictin7@gmail.com](mailto:modrictin7@gmail.com) if you have any feedback, question or suggestion.

