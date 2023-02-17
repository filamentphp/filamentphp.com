# Filament Documentation

## Commands

All commands are run from the root of the project, from a terminal:

| Command                | Action                                                           |
| :--------------------- | :--------------------------------------------------------------- |
| `npm run checkout`     | Pulls down the latest Filament docs                              |
| `npm run sync`         | Pulls down the latest Filament docs and syncs the markdown files |
| `npm run torchlight`   | Process files with Torchlight.dev                                |
| `npm install`          | Installs dependencies                                            |
| `npm run dev`          | Starts local dev server at `localhost:3000`                      |
| `npm run build`        | Build your production site to `./dist/`                          |
| `npm run generate`     | Sync, Build and Highlight the production site to `./dist/`       |
| `npm run preview`      | Preview your build locally, before deploying                     |
| `npm run astro ...`    | Run CLI commands like `astro add`, `astro check`                 |
| `npm run astro --help` | Get help using the Astro CLI                                     |

## MDX Components

### Callout

```mdx
---
title: Some title
---
import Callout from "@components/Callout.astro"

<Callout type="note" title="Filament Rocks!">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, laudantium aut! Ipsa qui tempore sapiente cupiditate voluptatem architecto culpa libero, beatae provident numquam saepe reiciendis? Consectetur corporis quo beatae. Neque!
</Callout>
```

### QuickLinks

```mdx
---
title: Some title
---
import QuickLinks from "@components/QuickLinks.astro"
import QuickLink from "@components/QuickLink.astro"

<QuickLinks>
<QuickLink title="Admin Panel" icon="heroicons:chart-bar" href="/docs/2.x/admin/installation" description="A fully-featured Laravel admin panel." />
<QuickLink title="Forms Builder" icon="heroicons:document-text" href="/docs/2.x/forms/installation" description="An intuitive Laravel form builder." />
<QuickLink title="Tables Builder" icon="heroicons:table-cells" href="/docs/2.x/tables/installation" description="An interactive Laravel table builder." />
<QuickLink title="Notifications" icon="heroicons:bell" href="/docs/2.x/notifications/installation" description="Powerful Laravel notifications." />
</QuickLinks>
```

## Want to learn more?

Feel free to check [our documentation](https://docs.astro.build) or jump into our [Discord server](https://astro.build/chat).
