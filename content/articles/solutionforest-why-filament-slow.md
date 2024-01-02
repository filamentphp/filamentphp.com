---
title: Why My Filament slow?
slug: solutionforest-why-filament-slow
author_slug: solution-forest
publish_date: 2023-12-25
categories: [general, panel-builder]
type_slug: trick
---

I use **Filament PHP** and **Laravel Debug Bar** for my work. It's usually great! But sometimes, when I make CMS with Filament, my computer slows down a lot. This even happens on my new Mac M3 max!

This slow problem only happens on my computer, not on the internet where other people can use what I make.

I figured out that Filament uses lots of small parts to show things, and Debug Bar doesn't handle them very well. But we can fix it by telling Debug Bar to ignore these small parts.

First, we need to get the settings for Debug Bar. We do this by typing something:

```shell
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
```

Then we find a file called `config/debugbar.php` that this command gave us. Inside this file, there's a part named `collectors`. It tells Debug Bar what to check. I made a change so it doesn't check the views by switching `true` to `false`.

Additionally, to speed up Filament, there's a handy command we can use:

```shell
php artisan icons:cache
```

Running this will cache the icons, giving Filament a nice boost in speed.

For our work, we set up our computers with either **Laravel Herd** or **Docker**. These help us make sure everything we create works well.


