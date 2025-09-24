---
title: "Filament v4 is Stable!"
slug: alexandersix-filament-v4-is-stable
author_slug: alexandersix
publish_date: 2025-08-12
categories: [general]
type_slug: news
---

![Filament v4 is Stable!](/images/content/articles/alexandersix-filament-v4-is-stable/v4-stable.webp)

It's official! As of today, August 12, 2025, Filament v4 is officially stable!
And in large part, that is thanks to our incredible community and all the help
with testing, bug fixing, and overall recommendations. We don't take for granted
all of you and the work you've put in to help us get to where we are today.

If you haven't been keeping up with the news regarding the v4 beta, or if you're
new to Filament as of version 4, you'll be very happy to know that we have
added in some incredible updates, new features, and overall performance enhancements
to help you build even more incredible applications with Filament. There are
WAY too many to list out here, but for a full rundown of the major updates present
in v4, you can check out this incredible article written by the Filament Core Team's
very own Leandro: ["What's new in Filament v4?"](https://filamentphp.com/content/leandrocfe-whats-new-in-filament-v4)

## What to expect from our favorite updates

We're very excited about the v4 release, so to celebrate, we wanted to share a
few of our favorite features and what you can expect from them when using the
new v4 release!

### Performance Enhancements

You know we couldn't make a list of our favorite updates without touching
on the performance enhancements in v4. Whether you're building a brand-new,
greenfield application on v4 or updating an older version of Filament to v4,
you'll immediately notice some nice speed boosts across your application.

Out of the box, without any adjustments or code changes, you'll immediately
receive a noticeable performance improvement when using Filament's tables!
We have done a lot of work optimizing how the rendering code runs,
and during our internal testing, we see improvements of around 3x for large
datasets!

In addition, we've also added in a custom partial rendering solution that
will allow you to skip expensive component re-renders when they are not needed.
These improvements don't come for free, but they are opt-in with the use of
methods like `partiallyRenderComponentsAfterStateUpdated()` and
`skipRenderAfterStateUpdated()`. There's more to dig into here, so take a
look at the [documentation for partial rendering](https://filamentphp.com/docs/4.x/forms/overview#field-partial-rendering)
for more information on what each of these methods do, specifically.

If video content is more your speed (ha!), take a look at
[this video from Nuno](https://www.youtube.com/watch?v=uJfFURplMQg) where
he and Dan dive more deeply into the performance improvements found in v4!

### Schemas

Ever wanted to easily combine Filament's form fields, infolist entries,
layout components, and prime components (the basic building blocks of
most applications)? Previously, this was a bit of a pain to handle, but
in v4, we've squished all of these together into what we're calling "Schemas"
to more easily allow you to mix and match these different components
together to create truly custom, ergonomic server-driven UIs. You can
consider this a familiar and easy-to-understand re-imagining of how to
combine the building blocks that Filament provides into something that
works exactly as you (and your users) would expect in your app.

For a full list of the available Schema components and more information
about how they're used in general, [check out the documentation](https://filamentphp.com/docs/4.x/schemas/overview#introduction)!

For those of you who prefer to glance at some code, here's an example
schema direct from the documentation! You can see that, within the
same schema (`form`, in this example), we're using components that were
previously located in the Layout, Infolist, and Form namespaces!

```php
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

$schema
    ->components([
        Grid::make(2)
            ->schema([
                Section::make('Details')
                    ->schema([
                        TextInput::make('name'),
                        Select::make('position')
                            ->options([
                                'developer' => 'Developer',
                                'designer' => 'Designer',
                            ]),
                        Checkbox::make('is_admin'),
                    ]),
                Section::make('Auditing')
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ]),
            ]),
    ])
```

Hopefully this starts the gears turning in your brain! We're
so excited to see what people are capable of with this new, simple
to use system in place in v4.

### Custom Data Tables

I mean, it's about time, right?

In all seriousness, we're so excited about our new table implementation
and the fact that it now allows arbitrary, non-Model-backed data to be
displayed! Now it's just as simple as giving your Filament Table an array
of data to be shown, and we handle the rest for you. No more wrestling with
the underlying Filament components or deferring to Sushi (a great package
in its own right, though) to add custom data to your tables!

The best part is that in this new implementation, custom data, whether
hard-coded, retrieved from an external API, or gleaned from anywhere else,
receives all the same niceties that typical Model-backed data gets. This
means your custom data can be paginated, searched, sorted, and it can
even have Actions attached to it!

For more information, check our our [custom data documentation](https://filamentphp.com/docs/4.x/tables/custom-data)!

### Actions, Actions, Actions

This one is a short one, but a very, very sweet one.

Admit it, we've all done it before: we've wanted to add an Action
somewhere in our Filament application, but we imported the _wrong_
Action type from the _wrong_ namespace. It's not a hard error to
fix, but it's incredibly irritating when it happens.

In v4, this is an issue (mostly) of the past!

We have now unified all of the action classes, so instead of needing
to specifically use the `Action` class that corresponds to your
given context, all actions now use a single `Filament\Actions`
namespace. And, in addition to Action imports being much easier now,
this also means that you can more easily create portable Actions
which can be reused across different contexts (Forms, Infolists, Tables, etc.).

## There's more where that came from

These are just a small handful of the incredible updates that have
been packed into the v4 release.

We're probably a bit biased in saying it, but we think this is easily
one of the greatest Filament releases to date! You can read all about
the update in the documentation or in Leandro's v4 overview post,
but in my opinion, the best way to see what's available is to give it
a try for yourself! Installation is as easy as ever, and the upgrade
path from v3 -> v4 is simple and almost entirely automated thanks to
our custom upgrade scripts (think Laravel Shift, but for Filament).

Once again, we have to give a huge thank you to the entire community
for their constant encouragement and support, as well as for their
contributions to this release. Filament wouldn't be half the project
it is today without all of you, and we're eternally grateful to have
you along for the ride.

Give v4 a whirl, and let us know what you think! We'd love to hear from
you in the Filament Discord server, especially if you're building
something that you're proud of using Filament!
