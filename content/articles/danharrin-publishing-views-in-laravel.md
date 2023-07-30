---
title: Publishing Views in Laravel
slug: danharrin-publishing-views-in-laravel
author_slug: danharrin
publish_date: 2022-06-23
categories: [general, laravel]
type_slug: article
---

**TLDR:** Publishing Blade views can introduce breaking changes into your app. If you're interested in how to stay safe, see [this section](#staying-safe).

If you've used Laravel packages before, you'll know that many of them use Blade views to render content. When a package developer [registers a `/views` directory](https://laravel.com/docs/packages#views), they're actually instructing Laravel to search in **two** places to find Blade views.

Imagine a scenario, whereby a package wanted to render the `dashboard` view. Package views are prefixed by the package name, so the developer has written something like:

```php
view('filament::dashboard');
```

Firstly, Laravel will search the `/resources/views/vendor/filament` directory, to find the `dashboard` view. This is a directory within your Laravel app which you have complete control over, unlike any files in the `/vendor` directory.

And finally, if Laravel cannot find the the `dashboard` view inside that directory, it will search in the package's views directory, which is inside the `/vendor` directory. These view files are not editable by the user, as any changes are overwritten when `composer update` is run.

**This structure is powerful.** It allows the user of the package to override ANY view they want, allowing them total control over how the package views look and function inside their app.

And to make this process easier, Laravel allows users can copy every package view from the `/vendor` directory into `/resources/views/vendor`, using `vendor:publish`. Sounds easy, right? Yes, but often very overlooked.

## What's so dangerous?

Well, Blade views aren't always just snippets of content, a wrapper `<div>` with a few CSS classes, or an image you can swap out. In 2022, Blade is super powerful to Laravel developers. We have so many helpful directives that we can use to run PHP code inside our views. We also have Livewire, which gives us an API to our backend code from within Blade.

**By publishing Blade views, you are asserting that the code inside that view may never change again, throughout the life of that package's major version.**

I will reiterate that in more consequential terms: Whenever you run `composer update`, you run the risk of breaking your published views, if they interact in any way with PHP classes inside your package, or data passed directly to the view.

1) For example in v1.0, a Dashboard view may use the `$data` variable to receive an array of data to display in a chart.
2) You don't like the way the chart looks and want to add a few custom CSS classes. So, you decide to publish the view into your app, and add the extra code.
3) In v1.1, the package maintainer adds a new feature to the charts: you can now add multiple datasets to the chart, so `$data` is now a collection of arrays.
4) You run `composer update`, and since the package follows semantic versioning, v1.1 gets installed.
5) Now, when you visit your dashboard, an error: your `$data` is now a collection of arrays, and the chart is completely broken.
6) You report a bug to the package maintainer, along with 10 other people who have also published that view, and their time is spent helping you debug the issue, when in fact the cause was actually your problem all along.

And the worst part of this is - because `vendor:publish` is so widely used to publish all package views at once, **people who have not even changed the Dashboard view also experience the bug**, and have no idea why it happens, because they didn't even know the dashboard view existed.

### Another tripping hazard: Blade components

Blade components have added another layer of complexity to this problem, since views are now able to interact with each other in really cool ways. However, a new problem occurs, from attributes - a package maintainer may decide to add a new, required attribute to a component you're using in a published Blade view, and since you don't pass that attribute to the component, an exception gets thrown and your app breaks again.

## Staying safe

Obviously, the simplest way to protect yourself from publishing views is to not to it in the first place.

Sometimes, when we are met with a challenge, we look for the easiest solution. In this case, this often involves just publishing the view and changing it. Next time, why not try your best to use CSS for customisation? Many of these modifications to package views can be done without touching the view, with just a little extra code. Part of this problem probably stems from the fact that Blade users are often backend developers at heart, and want to touch as little frontend code as possible. I get that, I also find CSS difficult sometimes, especially if you're overriding existing styles and you need to consider specificity. However, even Tailwind classes can be used in CSS files now, through `@apply`, and work with `!important` just fine. And if you ever find that you need an extra class added to the view inside the package, PR it! I'm sure the package maintainer will understand and accept your changes, since they want to minimize the time they spend debugging your future issues.

And if you really really need to publish a view, please don't use `vendor:publish`. Visit your `/vendor` directory, **look for the view you actually need to change**, and only copy that view into your app. This will absolutely minimizing the impact that future package releases will have on your code, and while it is still not totally safe, this is a more manageable risk.

If you want to be super safe when publishing views, also lock the package to a specific version in `composer.json`. Instead of..

```json
"filament/filament": "^2.0"
```

Try this:

```json
"filament/filament": "v2.12.1"
```

Then, when a new release is made, manually bump the version in `composer.json`, and double check any published views for breaking changes.

## I'm a package maintainer, how can I make my packages safer for customization?

Firstly - make your package customisable through CSS. If you're using Tailwind or other generic classes to structure your HTML, add in some package-specific classes. Maybe a `package-button` or a `package-dashboard-chart`. And don't be afraid to suggest to your users that they should PR in extra classes that they need. Encourage them to take this route instead of publishing views.

Also, remove the `vendor:publish` command for views from your documentation. Most users will see a command and just run it anyway when they install the package. Actively discourage users from doing that.

Another way you can decrease the publishing risk for your users, is to make your views more granular. By making views smaller and less responsible for interacting with PHP code, you're making the package safer to customize. For example, break down `search` into `search.input`, `search.icon`, `search.label`, `search.results.list` and `search.results.card`. Your users will thank you 😄
