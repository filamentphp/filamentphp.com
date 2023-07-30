---
title: "The Filament Wire: Issue 2"
slug: wire-2
author_slug: blackpig
publish_date: 2022-07-22
categories: [general]
type_slug: news
---

**Salut Wire Walkers. Welcome to issue 2 of the Filament Wire.**

So lets's dispense with excuses and just accept that my publishing schedule is a thing of fiction and realistically you can expect a new issue on a monthly/ad hoc basis.

It was only last month that I was reporting temperatures down here in excess of 40C and here we are, scarily, in the same situation - with record temperatures being recorded across Europe and the globe.  Where I live we could smell the smoke from the forest fires raging in the Gironde 150km away. It's all very concerning and worrying.

However, this is a blog about Filament and the numbers that we like to see increasing and setting records are Filament installs.  Weekly averaged daily installs are over 1,200/day with total installs hitting in excess of 161,000, that's an increase of 32,000 installs in the last month. What's interesting to note is that there was a significant dip in the weekly averaged daily installs for the first week of July - dropping  to 880 on the 5th - before bouncing back up.  I'm not sure if there is anything to read into that - maybe all the school holidays started and the parents amongst us were unable to start on all the projects they had planned for the summer!  If you have thoughts or ideas that may be account for the dip, let me know in the comments.

## Release Radar
Wow - these boys are busy - another slew of tagged releases plus a handful of hot-fixes (those will be the gaps in the semver numbering). We also got another dot release bump thanks to support for Vite.

- [2.13.8](https://github.com/laravel-filament/filament/releases/tag/v2.13.8) added Important Configuration, ->download() option for file uploads and made the sidebar configurable
- [2.13.9](https://github.com/laravel-filament/filament/releases/tag/v2.13.9) couple of fixes
- [2.13.10](https://github.com/laravel-filament/filament/releases/tag/v2.13.10) couple of minor fixes and updates to language translations
- [2.13.11](https://github.com/laravel-filament/filament/releases/tag/v2.13.11) a few more fixes and language translations, Listing filters stored in the query string by default
- [2.13.12](https://github.com/laravel-filament/filament/releases/tag/v2.13.12) language file and dependency injection for table filters
- [2.13.13](https://github.com/laravel-filament/filament/releases/tag/v2.13.13) a few fixes and language files, passing an array of classes to visibleOn & hiddenOn, dynamic builder block labels
- [2.13.14](https://github.com/laravel-filament/filament/releases/tag/v2.13.14) a few updates and fixes
- [2.13.15](https://github.com/laravel-filament/filament/releases/tag/v2.13.15) translation and fixes, make card width configurable
- [2.13.16](https://github.com/laravel-filament/filament/releases/tag/v2.13.16) fixes and language support
- [2.13.22](https://github.com/laravel-filament/filament/releases/tag/v2.13.22) fixes, language support and some ui updates
- [2.13.24](https://github.com/laravel-filament/filament/releases/tag/v2.13.24) testing helpers
- [2.13.25](https://github.com/laravel-filament/filament/releases/tag/v2.13.25) small feature improvements
- [2.13.26](https://github.com/laravel-filament/filament/releases/tag/v2.13.26) validation notifications, HTML in select options
- [2.13.27](https://github.com/laravel-filament/filament/releases/tag/v2.13.27) store filters in the session, Laravel Pint
- [2.13.28](https://github.com/laravel-filament/filament/releases/tag/v2.13.28) fixes, add label to Repeater field, floating UI
- [2.14.0](https://github.com/laravel-filament/filament/releases/tag/v2.14.0) Vite support, CSS classes in resource pages
- [2.14.2](https://github.com/laravel-filament/filament/releases/tag/v2.14.2) general fixes
- [2.14.3](https://github.com/laravel-filament/filament/releases/tag/v2.13.3) fixes

So a couple of pretty big/useful things to highlight coming out over the last month:

**Related to each other**: storing table filters in the [query string](https://github.com/filamentphp/filament/pull/2863) and optionally in the [session](https://github.com/filamentphp/filament/pull/2965)

**Something I've been waiting for is setting label values** a really useful UI addition for the [Builder block](https://github.com/filamentphp/filament/pull/2976) and [Repeater fields](https://github.com/filamentphp/filament/pull/3062)

**A really useful and major addition was the [testing helpers](https://github.com/filamentphp/filament/pull/3027)** go check out [the docs](https://filamentphp.com/docs/2.x/admin/testing) to see how they can help with your Filament dev

**Validation Notifications** another [great enhancement](https://github.com/filamentphp/filament/pull/2906) from Dan

**HTML in selects** a [useful enhancement](https://github.com/filamentphp/filament/pull/3084), check out the [trick](https://filamentphp.com/tricks/render-html-in-select-options) to see how to get the best of this feature

**Floating UI** a big shoutout to @AWCodes for his work on porting this over to [Filament core](https://github.com/filamentphp/filament/pull/2994)

**Vite support** which was a [big enough impact](https://github.com/filamentphp/filament/pull/3100) to warrant that dot release increment. Thank you to @Z3d0X for your work on this feature!

What I'm loving about this as I look through the releases is the number of new contributors we have helping improve and grow Filament. Whether it's a simple addition of a new language support, a little fix or enhancement or some major contributions thank you to everyone that gives up their time and effort to help make Filament such a wonderful project.

## Plug Me In
Aha plug-ins.  Yes, well the Calendar plug-in? Sorry, I haven't done a smidgen of work on the app for my wife's business so, that's another promise broken.  Sorry - but it _is_ on my to do list (implementing it into her application) - so I will try and have something on it for the next edition.

All is not lost though. It's been a bumper time for new plug-ins and I'd like to highlight a couple that really caught my attention.

First up is a paid for plug-in from @ralphjsmit [Onboarding Manager Pro](https://filamentphp.com/plugins/onboarding-manager-pro) - this looks to be a feature packed and professionally built onboarding tool.  This is definitely a plug-in that I plan to provide a detail review of for you all.  In the meantime check out the plug-in page - it's a great example of a well documented plug-in.

Next is another little plug-in from @awcodes [Quick Create](https://filamentphp.com/plugins/quick-create) - this simply provides a short cut to create items from the header of your Filament Admin panel.  I love the simplicity/no configuration aspect of this plugin.  If you're allowed to create it, it appears in the drop down. Nice.

This [Workflow Manager](https://filamentphp.com/plugins/workflow-manager) plug-in from @El OUFIR Hatim grabbed my attention. This looks like a slick workflow implementation tool and definitely something I would have paid premium price for - so thanks for offering this out as free plug-in - there's a lot of work that's gone into it. You can find out more in the associated [blog post](https://filamentphp.com/blog/add-workflows-to-filament-in-10-minutes).

As of the time of writing there are nearly [90 approved plug-ins](https://filamentphp.com/plugins) - so check them out, support our OSS stars and possibly save yourself some development time in the process.

## It's Tricky
Our fantastic community keeps providing us with tips and tricks to help make our Filament lives a little easier (as if it wasn't simple enough already).

Take a look at the [Render HTML in Select Options](https://filamentphp.com/blog/add-workflows-to-filament-in-10-minutes) trick from @Consignr (hey - is that the correct Discord handle for you?) that ties into his work on the same PR and explains how to add the html. Take heed of the warning though!

Dan also added a quick trick to enable [fast table pagination](https://filamentphp.com/tricks/fast-table-pagination).  I've seen some chatter in the Discord server about slow(ish) pagination or table loading for very, very large datasets - this trick should alleviate the problem.

## In case You Missed It
So, I think most of us have heard of [Spatie](https://spatie.be/) (and probably have used their packages) and [Freek Van der Herten](https://twitter.com/freekmurze).  Well Dan has been busy partnering for a live stream with Freek to go through their [Premium Comments Package](https://spatie.be/products/laravel-comments) and how to implement into Filament.

You can see that stream [here](https://www.youtube.com/watch?v=gpwFLeeWz8M)

Ok folks, I think that is just about it from me for this issue.  If you have anything to add, good or bad, I'm always happy to hear your feedback, just drop me a message in the comments below.

Let me know what you'd like to see in the Wire - I'm trying to keep it Filament focussed (obviously) but this bulletin is produced for you and if it's related somehow I will try and cover it. You can message me directly on @Blackpig#0421 or leave a message in the comments.

Peace,

Blackpig
