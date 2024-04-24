---
title: How to make the application's scrollbars slim?
slug: invaders-xx-slim-scrollbars
author_slug: invaders-xx
publish_date: 2023-08-01
categories: [form-builder]
type_slug: trick
---

Add the following lines to your [custom theme](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme) and adapt as you wish:

Remember that it's a [non standard feature](https://developer.mozilla.org/en-US/docs/Web/CSS/::-webkit-scrollbar) and it's not supported by all [browsers](https://developer.mozilla.org/en-US/docs/Web/CSS/::-webkit-scrollbar#specifications), that's why '@supports selector(::-webkit-scrollbar)' is implemented to check the support.

```css
@supports selector(::-webkit-scrollbar) {
    ::-webkit-scrollbar {
        height: 7px;
        width: 7px
    }

    ::-webkit-scrollbar-track {
        @apply bg-gray-50;
    }

    ::-webkit-scrollbar-thumb {
        @apply bg-gray-200/50;
    }

    ::-webkit-scrollbar-thumb:hover {
        @apply bg-gray-200;
    }

    .dark ::-webkit-scrollbar-track {
        @apply bg-gray-700;
    }

    .dark ::-webkit-scrollbar-thumb {
        @apply bg-gray-800/50;
    }

    .dark ::-webkit-scrollbar-thumb:hover {
        @apply bg-gray-800;
    }
}
```