---
title: "The Filament Wire: Issue 1"
slug: wire-1
author_slug: blackpig
publish_date: 2022-06-20
categories: [general]
type_slug: news
---

**Hello and welcome to issue one of The Filament Wire.**

So what's been happening since my last little teaser in the pre-issue?  Well first up, I need to apologise because I missed my publishing deadline of Friday.  The plan is to publish on the 1st and 3rd Friday of each month and here we are at issue one and we're already late.  Sorry folks, I'll try not to let it happen again.

In my defence, we hit temperatures up and around 42C last week and during the weekend and without any air-conditioning/climate control my ancient MacBook was struggling to cope as much as I was.  I also run an organic pig farm raising Gascon Black Pigs (hence my handle) and the welfare of my pigs trumped the publishing deadline.  Anyway, by way of apology, here is a picture of Eyelashes, enjoying a cool down in the wallow that I dug out for her.

![](http://reuben.ninja/images/eyelashes.jpg)

Ok, back to the serious stuff.  Filament's popularity continues to grow with weekly averaged daily installs hovering at just under 1000/day and total installs at over 130,000. These are a fantastic figures, so thank you to everyone who has downloaded Filament - whether you are using it to solve real world business issues, in personal projects or just evaluating it to see why everyone loves it - thank you!

## The Release Radar

Wow, Dan and Ryan have been busy, with 15 tagged releases since the pre-issue, including a minor version dot bump.

- [2.12.25](https://github.com/laravel-filament/filament/releases/tag/v2.12.25) - fixes, additional language support for RTL and complex plurals
- [2.12.26](https://github.com/laravel-filament/filament/releases/tag/v2.12.26) - Added grid support for the Repeater field
- [2.12.27](https://github.com/laravel-filament/filament/releases/tag/v2.12.27) - fixes
- [2.12.28](https://github.com/laravel-filament/filament/releases/tag/v2.12.28) - fixes
- [2.12.29](https://github.com/laravel-filament/filament/releases/tag/v2.12.29) - fixes
- [2.12.30](https://github.com/laravel-filament/filament/releases/tag/v2.12.30) - fixes , added afterValidated() hook to the Wizard Step
- [2.12.31](https://github.com/laravel-filament/filament/releases/tag/v2.12.31) - efficiency
- [2.13.0-beta/2.13.0](https://github.com/laravel-filament/filament/releases/tag/v2.13.0) - reworked Actions, grouped table and page actions, actionModalContent and soft deletes
- [2.13.2](https://github.com/laravel-filament/filament/releases/tag/v2.13.2) - fix to Spatie Translatable plugin
- [2.13.3](https://github.com/laravel-filament/filament/releases/tag/v2.13.3) - general fixes and RTL support of grouped actions
- [2.13.4](https://github.com/laravel-filament/filament/releases/tag/v2.13.4) - fix to group actions
- [2.13.5](https://github.com/laravel-filament/filament/releases/tag/v2.13.5) - fixes and also support for Filepond imageResizeMode property
- [2.13.6](https://github.com/laravel-filament/filament/releases/tag/v2.13.6) - fixes, introduces the Select/Repeater ->relationship() modifier  and full width form actions
- [2.13.7](https://github.com/laravel-filament/filament/releases/tag/v2.13.7) - general fixes

In amongst all the support and fixes, there were 3 main features/enhancements that caught my eye:

**Added ->grid() support for the repeater field.**  This couldn't have been better timed for me, I was literally checking the docs for this functionality when the discussion came up in discord.  Quick work from the community (@flux and @ralhjsmit iirc) and boom!

**Grouped Table and Page actions**. Quite a lot going on here but as is usual a simple and elegant implementation from Dan & Ryan.  You can now group table and page actions - saving yourself some valuable real estate on your layouts.  Dan & Ryan live-streamed the process - you can still [see it here](https://www.youtube.com/watch?v=cGBa3InJOQI&feature=youtu.be).

**The Select/Repeater->relationship() modifier.**  The main reason I'm highlighting this is that this change has deprecated various components that you may want to be aware of going forwards: BelongsToSelect, HasManyRepeater, BelongsToManyMultiSelect and BelongsToManyCheckboxList are all no more - they will all still function and continue to work but I'd look to update your code to use the new `->relationship()` method.

We had a fairly large change that warranted a Semver  jump from 2.12 -> 2.13.  Dan has already written a chunky blog post explaining everything, and as a good developer who always follows the DRY principal, I'll just link you to [the article](https://filamentphp.com/blog/v2130-admin-resources).

Also a big shout to everyone that contributed fixes, tweaks or updates to the docs - you're all unsung heroes and your efforts are truly appreciated.

## Plug Me In

The marketplace is thriving, with another ten or so plug-ins having been added since I published the pre-issue a fortnight back.

I know I promised a bit of a review and look into a plug-in - but to be honest, time ran away and I haven't had a chance to play properly with my chosen plug-in.  I am currently building an application for my wife's business which is around wedding and event catering and I had hoped to install and start using @saade's implementation of [Full Calendar](https://filamentphp.com/plugins/filament-fullcalendar).  I know I will be building this functionality out later this week - so you will definitely get the full low down on it in the next issue.

Also, let me know in the comments if there is a particular plug-in you'd like to know more about and I'll get that scheduled in.

## Tricks and Tips
Another section of the Filament world that is growing thanks to our community contributions.  I check-in and have a read through of the new entries most days.

It's a great resource and I've already managed to point people to tricks that answer the questions they've [posed in Discord](https://discord.com/channels/883083792112300104/883083792653381695/984582790433624094) (yeah, yeah, I know it was my tip, but hey....)

Again, thank you everyone that has contributed and for this issue's top tip I'm going to go with ['Testing Plugins'](https://filamentphp.com/tricks/testing-plugins) from Ramón Zayas - a nice example of how to set up admin users for testing. Thanks Ramón!

## The Links

Doesn't actually have anything to do with golf but is another section of the Filament site that is building up nicely.  I dropped by to have quick look through and [Roadmap](https://filamentphp.com/links/19) contributed by Dennis caught my attention.  I'm not going to over-commit and promise to have a review of it for the next issue but it's certainly on my list of things to evaluate. It looks like it could be quite useful and hopefully will just drop into an existing Filament project.

Speaking of roadmaps, Dan linked us to the Filament v2 feature [roadmap](https://github.com/orgs/laravel-filament/projects/2/views/1) (gotta admire that smooth segue) - I don't believe they are listed in priority order but that gives you a taste of what's planned beyond the normal support and fixes.

And yes, there are already whispers and murmurings about Filament v3 and what may or may not be appearing.  However, we can save that speculation for another issue.

## Au revoir

Ok, so I think that is just about it for this issue,  I hope you found something interesting or useful to read. The Filament Wire is for you, the community, so please let me know in the comments what you would like to see included - whether it's a particular plug-in, tutorials, general chat about the state of the TALL stack or PHP or any other tools.

I'm hoping to have a Q&A session with Dan or Ryan in the near future - let me know what sort of questions you'd like to know the answers to and I'll get the thumb-screws out!

Thanks for reading this far

Peace,

Blackpig
