---
title: "Filament: What to Expect in 2024"
slug: alexandersix-filament-what-to-expect-in-2024
author_slug: alexandersix
publish_date: 2024-01-03
categories: [general]
type_slug: news
---

![Filament: What to Expect in 2024 Banner Image](/images/content/articles/alexandersix-filament-what-to-expect-in-2024/filament-what-to-expect-in-2024.webp)

2023 was an incredible year for Filament, and the momentum just keeps on going into 2024! The Filament core team has taken a lot of time over the past couple of months to develop our goals for 2024, and we're excited to share them with you here! This list was originally shared during the Filament 2024 Kickoff event, so if you want to be the first to hear about our yearly goals, make sure to tune in to our Filament 2025 Kickoff event next year!

## Recap of 2023

2023 was, by practically all accounts, the best year for Filament so far. Lots of accomplishments all around by the core team and the community, but here are a few of our favorites:

### Filament v3 & v3.1

[Filament v3](https://filamentphp.com/community/danharrin-filament-v3) was released in August, following the very successful launch of Livewire v3! This release was followed up quickly by v3.1, our largest minor release to date (more information on v3.1 can be found [here](https://filamentphp.com/community/alexandersix-filament-v3-1)).

### New Team Members

The core team gained three new members in 2023: [Hassan](https://zahirnia.com) to lead as the UI/UX Marketing Designer for Filament, [Saade](https://github.com/saade) to revamp the plugin submission process, and [Alex](https://alexandersix.com) to head up Filament's developer relations. With the new additions, Filament's core team is now made up of eight members!

### Some Stats

In 2023, Filament was installed around 2 million times. Filament has around 2.7 million installs total as of January 1, 2024, so a vast majority of our installs have come just in the last 12 months!

Also in 2023, there were 186 individual releases for Filament. That's just over one release every two days!

### Theming

Theming had a lot of work done during 2023 to make life better and easier for Filament users who want to tweak how their install looks. Throughout 2023, every single component was redesigned from the ground-up for Filament v3, and APIs were added to allow for easier theming of Filament projects. These APIs are how Minimal Theme (more on that in a bit) was created, and they allow for practically any customization you might want to be added to your Filament install.

## Our Goals for 2024

### Filament Core Goals

#### Release v3.2

We are shooting for Filament v3.2 to be released in early 2024. This version will include some great quality-of-life changes, many of which were shared as ideas and implemented by the community! Here are some of the highlights that we're planning to add in this release:

- **Reveal-able Password Inputs** – a small quality-of-life addition that allows passwords to be toggled visible within a password input.
- **New Toggle Button UI** – an alternative UI component for radio buttons and checkboxes (more information [here](https://github.com/filamentphp/filament/pull/9860))
- **Split Component for Forms** – adding the [Split](https://filamentphp.com/docs/3.x/infolists/layout/split) component from Infolists to Forms
- **“Wait, Don't Leave!” Functionality** – an alert for the User if they attempt to leave a page before a form is submitted or while a confirmation modal is open
- **Apply Button for Filters** – defers the processing of filter queries until the button is clicked, instead of running a filter query on each individual filter change
- **CSV Exports** – companion to the [CSV imports](https://filamentphp.com/docs/3.x/actions/prebuilt-actions/import) introduced in v3.1

#### Nested Resources

Another feature that we want to bring to Filament is nested resources. There have been a few members of the community who have implemented a version of nested resources within their applications already, but we want to help make that work easier by supporting nesting natively. Work is currently ongoing for nested resources, and we hope we'll be able to share it with you soon!

#### Static Table Data Sources

Currently, Filament's tables require Eloquent to populate data. Not everything worth putting in a table is retrievable with Eloquent, though! In 2024, we want to do some work on Filament's tables to allow them to populate data from an array or from a function returning an array. This would *dramatically* increase the usefulness of Filament tables across all parts of an application, not just those parts that involve models in a database.

#### Filament v4

This one's a bit of a stretch goal for us, but a lot of the changes and ideas that we have for Filament would likely be best served in a new major version. Our intention with v3 was to keep it around for a long time, but there's a chance that we release our next major version at the end of 2024!

### Filament Theming Goals

#### Theming API Updates

Currently, almost everything that Filament's users are wanting to do in their themes can be done using the new APIs added to Filament components in v3. However, the implementation isn't as technically sound as we'd like. This is mostly down to the fact that, when our default styles are overridden to create themes, the original Tailwind classes are still sticking around in the class string. This has two big issues that we want to address:

1. Specificity – there are ways around this, but it's clunky to write long CSS selector strings or sprinkle `!important` throughout your codebase
2. Payload size – with Livewire sending HTML over the wire, the more Tailwind classes you have in the DOM, the larger the payload that Livewire has to send, receive, and parse

There are a few ideas on the table for how we solve this issue while maintaining discoverability of styles and an easy-to-use API, but we haven't settled on one just yet.

#### Filament Component Explorer

Filament has a *lot* of UI components that can be used in TALL-stack projects, and in 2024, we want to help developers discover, view, and integrate them into their projects!

In the JavaScript world, [Storybook](https://storybook.js.org) is a fantastic piece of software that helps developers view and use components within their projects. We want to create an experience similar to Storybook for our Filament UI components that allows easy copy/paste usage of the Blade components.

#### Integrating Volt

[Volt](https://livewire.laravel.com/docs/volt) is an amazing functional API for Livewire components that allows developers to build single-file components where the PHP and Blade code can live together. If you're familiar with how Vue.js single-file components work, this is *very* similar. Volt is an incredible project, and we want to integrate it into our Filament components! Our goal is to create Volt APIs (or minimal wrappers) for each of the Filament packages for easy use within TALL stack apps and Livewire pages.

#### Headless Filament

This is our theming stretch goal, for sure! In 2024, we want to explore the possibility of providing “headless” Filament UI components. This would give developers the power to bring their own styles to Filament's components and customize them however they see fit!

### Filament Content & Community Goals

#### More, Varied Content

In 2024, our main goal is to produce more, diversified content on the official Filament channels. We've seen the requests for tutorials, tips & tricks, code examples, and much more, and we want to get to work on all of those! We also know that not everyone learns the same way, and not everyone is always in the mood to read an article, watch a video, or play with a code example. So in 2024, our goal is to ensure that our most popular topics are made into multiple types of content, so there's something for everyone. Specifically, here are the types of topics we're focusing on during the first part of the year:

- Release overviews (like [this article](https://filamentphp.com/community/alexandersix-filament-v3-1) on Filament v3.1)
- Tips & tricks (like [this one](https://filamentphp.com/community/danharrin-fast-table-pagination) from Dan)
- Longer, “Let's Code” content for building an app or plugin from scratch to deployment

#### Community Spotlight

Filament has one of the greatest communities of any open-source project, and some of the plugins, themes, and showcase messages that we see in the Discord server have amazed us over and over again! Because of this, we want to make sure that we as the core team are doing our part to ensure that the hard work of our community is recognized and celebrated!

In 2024, we will be starting to add ways to spotlight awesome members of the community, so stay tuned for more information on that as the year goes on!

#### The Filament Podcast

It's finally happening! In early 2024 (probably after the v3.2 release), Filament is getting our very own official podcast. The podcast will be one of the many forms of content that we put out regularly on the official Filament channels, and will be a fantastic place to hear about new features, upcoming releases, and outstanding community projects and content!

## Thank You!

Last, but certainly not least, thank you! Filament wouldn't be what it is today without the Filament community. We are so humbled and honored that you are on this journey with us, and we are **so** excited to see what 2024 brings for each one of you.

Also, I want to give a huge thank-you to [Ralph](https://github.com/ralphjsmit) for writing up an incredibly detailed summary of the 2024 Kickoff event that helped a lot with writing this article!

As always, we'd love to hear your feedback on our goals for this year! What are you most excited for? Is there anything you'd add? Anything you'd remove? We're always around in the Discord server and on Twitter, so let us know what you think!
