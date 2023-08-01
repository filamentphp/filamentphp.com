---
title: Why is my panel resource missing from the sidebar?
slug: danharrin-panel-resource-missing
author_slug: danharrin
publish_date: 2023-08-01
categories: [panel-builder]
type_slug: trick
---

Have you created a resource, but it's not appearing in the navigation menu?

If you have a model policy in `app/Policies`, make sure you return `true` from the `viewAny()` method.

Many people forget that model policies are generated with models when you run `php artisan make:model --all`. Laravel generates an empty `viewAny()` method by default, which means that you are unauthorised from accessing that resource in a panel.

You can learn more about resource authorization in our [documentation](https://filamentphp.com/docs/admin/resources/getting-started#authorization).
