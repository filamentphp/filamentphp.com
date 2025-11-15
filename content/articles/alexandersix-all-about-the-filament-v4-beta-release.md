---
title: "All About the Filament v4 Beta Release"
slug: alexandersix-all-about-the-filament-v4-beta-release
author_slug: alexandersix
publish_date: 2025-04-25
categories: [general]
type_slug: news
---

![All about the Filament v4 Beta release](/images/content/articles/alexandersix-all-about-the-filament-v4-beta-release/v4-beta-release.webp)

## It's time for v4 Beta details

We've had a lot of exciting news come from the Filament project over the past
few years, but none has been more avidly requested than news on the v4
release. Well, today, in this post, we're going to drop some exciting details
about the v4 Beta that will be released in the near future. Get excited,
because it's almost time!

## Filament v4

Filament v4 is the biggest, most feature-packed release that Filament has
ever had. Honestly, until I looked hard into all of the features that are
being released, I was pretty skeptical of that. After all, Filament v3
was a MASSIVE release that was over 100 minor versions in the making!
We're pumped for all of you in the Filament community to get your hands
on v4 and let us know what you think of all the hard work that the team
has poured into this latest major release!

Before we get to the launch details (ooooh the suspense!), let's talk a bit
about some of the features that the team is most excited about that are
coming in Filament v4:

### Nested Resources

One of the longest-running requests that we've received for Filament is
to build nested resources right into Filament. Now, with v4, we've done
just that!

For those who may have never heard of nested resources, what these will
allow you to do is operate on a given Filament resource within the context
of a parent resource. For example, when working on a learning-management
system, you'd likely have a `CourseResource` class to back your `Course`
model. Within a `Course`, you'd also likely have many related `Lesson`
objects that contain the actual lesson material.

Previously, in v3, you could edit related `Lesson` records via a modal
within the `CourseResource`. This would open a modal with a form where
you could make your adjustments. However, in the case of something like
a `Lesson`, a simple modal form may not actually be enough. Instead, you
may have preferred to edit a `Lesson` in the context of its related
`Course`, but in a full page. Now, in v4, nested resources allow you to
do these edits of a child resource in the context of its parent.

Creating a nested resource is easy--you use the `make:filament-resource`
command as you would to create a normal resource, but you tack on
the `--nested` flag. Once done, you will end up with a `Resource`
class that is connected to its parent resource and can be edited
in the context of its parent.

We're really excited about this addition, and we hope that it's
a simple, enjoyable solution that you can use in your Filament applications!

### Multi-Factor Authentication

For a long time, the Panel package within Filament has included an authentication
system for logging in, registering, etc. Without any tweaks, this system
has worked extremely well for lots of applications. However, while a
standard email/password only authentication system works for many apps, we
fully acknowledge that there's a need for more layers of security built
in for other types of applications.

In general, we consider multi-factor authentication to be almost a
necessity in the modern era of application authentication, so in an
effort to help developers build more secure applications, we've done
the heavy lifting for you!

In the interest of giving developers more options, we have upgraded our
authentication system for v4 to include multi-factor authentication as an
option out of the box! When MFA is enabled by the application developer,
users will need to take an additional step when registering and logging
into the application to set up multi factor auth. You can allow users to
use either the Google two-factor auth system (ex: Google Authenticator) or
the email code authentication system (ex: sending a one-time password to
the given email address).

That's it! All you have to do is enable the system and Filament will
do the work for you! No setting up the MFA registration UI, no managing
the MFA authentication flow; it's all taken care of with the flip of a switch.

### Static Table Data

Another common request that we've heard a lot over the years is allowing
developers to use Filament tables with data that isn't backed by a `Model`
class. In the past, our recommendation has been to create a "Model" backed
by [Sushi](https://usesushi.dev/), but this doesn't work in all situations.

Because of this, we have spent a lot of time going back to the drawing
board for Filament's tables, and they are now able to take in static, non-Model
data and display them with all of the same features and niceties that you
know and love from the existing Filament tables package!

To add static data to a Filament table, it's as simple as passing an array
of the data that you'd like to display into the `records()` method that
is now present on the `Table` object. Once you've done that, Filament
will render out whatever data you passed in. Nice and simple!

### Unified Schemas & Actions

While we were ripping out the Filament Tables package and rebuilding it
for static data, we figured it was a good time to perform some restructuring
of the Forms, Infolists, and Actions as well.

In v3, Form components live in the `Forms` namespace and Infolist components
live in the `Infolist` namespace. However, as we stepped back and looked
at these two systems, we noticed that they have a lot in common and could
benefit a lot by being intertwined. So, in v4 we have migrated all Form
and Infolist components into the `Schema` namespace. This means that you'll
have one less namespace to worry about, but more importantly, you can now
mix and match Form and Infolist components in the same Schema area!

In a similar vein, in Filament v3, Actions have always been a bit of a tripping
hazard for developers of all levels. When going to use an Action, it was
fairly common to start typing out the `Action` class into your code editor,
just to have it autocomplete the import for the _wrong_ `Action` class.
Additionally, when creating custom Actions, it was far too easy to accidentally
extend the wrong Action or to need to create multiples of the same Action
just to use it in a Form, Infolist, Table, etc. To combat all of this, we
have updated Actions to (almost) all extend from the same base Action class.
This then means that you'll practically never import the wrong Action class
again, and, more importantly, you can now create Actions that are reusable
across multiple different Filament packages (Forms, Infolists, Tables, etc.).

### Performance Improvements

Last, but certainly not least, the team has been hard at work knocking
out some incredible performance improvements within the Filament codebase.
We've scoured each and every class to figure out where the biggest bottlenecks
existed in v3, and in doing so, we have seen **MASSIVE** performance boost
in specific applications when upgrading to Filament v4. There's a lot of
technical details surrounding these performance enhancements that we'll
likely need to make an entirely separate post about, but when you get your
hands on v4, let us know if you notice your applications running more quickly
after the upgrade!

## The announcement we've all been waiting for

Speaking of getting our hands on the v4 Beta, by reading all of the way
through this post (I _know_ you didn't just skip down here, right?), I think
you've earned the right to know that the Filament team has officially settled
on a v4 Beta release date.

You won't have to wait much longer, because we will be releasing the Filament v4 Beta on June 10, 2025 at [Laravel Live UK](https://laravellive.uk)!

We're so excited for you all to get your hands on v4 and let us know. Remember
that this upcoming release **IS STILL JUST A BETA**, so we don't recommend
using this in any production or otherwise mission-critical applications.

What are you most excited for in v4? Hit us up on Twitter or Bluesky
and let us know what you're looking forward to most!
