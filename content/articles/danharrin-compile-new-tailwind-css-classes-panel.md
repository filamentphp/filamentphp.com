---
title: How can I compile new Tailwind CSS classes in a panel?
slug: danharrin-combine-new-tailwind-css-classes-panel
author_slug: danharrin
publish_date: 2023-08-01
categories: [panel-builder, tailwind-css]
type_slug: trick
---

Tailwind does not compile every single possible utility class. It only compiles the ones that are actually used within Filament. Therefore, to use new utility classes, you must compile them yourself. In the panel builder, you can do this with a custom theme. You can find out how to set up custom themes in our [documentation](https://filamentphp.com/docs/panels/themes#creating-a-custom-theme).

Once you've set up and compiled a custom theme, if the Tailwind class you need is still not compiled, check the `content` array of the theme's `tailwind.config.js` file, to ensure that your file is included.
