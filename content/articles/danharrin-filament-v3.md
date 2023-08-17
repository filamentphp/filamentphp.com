---
title: Filament v3 has been released
slug: danharrin-filament-v3
author_slug: danharrin
publish_date: 2023-08-01
categories: [general]
type_slug: news
---

Filament v3 has been released! This is a major release with a lot of new features and improvements. The team has refreshed the design of every single Blade template in the project.

In addition, Filament now requires Laravel 10+ instead of 8+, Livewire 3 instead of Livewire 2, and PHP 8.1+.

## Action modals, everywhere

Open modals and slide-overs from [any button](/docs/3.x/actions/adding-an-action-to-a-livewire-component) on the page. Even [nest modals within other modals](/docs/3.x/actions/modals#opening-another-modal-from-an-extra-footer-action) with full state preservation. Also available outside the panel builder, in your own Livewire components.

![Action modals](/images/content/articles/danharrin-filament-v3/features/action-modals.webp)

## Powerful table reporting

[Summarize table builder rows](/docs/3.x/tables/summaries) with a suite of aggregate functions to calculate statistics and provide an analytical overview of your data. [Group rows](/docs/3.x/tables/grouping) together by common attributes and summarize that data too.

![Table report](/images/content/articles/danharrin-filament-v3/features/table-report.webp)

## Multi-tenancy built for SaaS

Use the panel builder to build [multi-tenant](/docs/3.x/panels/tenancy) applications, with [subscription billing](/docs/3.x/panels/tenancy#billing), at record speed. Switch between tenants without leaving the panel. Filament is the perfect companion to Laravel Spark.

![Tenant switcher](/images/content/articles/danharrin-filament-v3/features/tenancy.webp)

## Beautiful read-only "View" pages

Embed [infolists](/docs/3.x/infolists/getting-started) in your apps for flexible responsive layouts to render read-only data. Completely customizable with your own components. [Add action buttons](/docs/3.x/infolists/actions) inside the infolist to perform actions on the record.

![Infolist](/images/content/articles/danharrin-filament-v3/features/infolist.webp)

## Unlimited panels in one app

In v2, our main package was the "admin panel". Now, Filament allows you to [build multiple completely separate panels](/docs/3.x/panels/configuration#introducing-panels) with their own resources, dashboards, custom pages and configuration. The package is now known as the "panel builder". Filament can be used by your users, not just your admins. You can even [ship an entire panel](/docs/3.x/panels/plugins#distributing-a-panel-in-a-plugin) in a Composer package with ease.

![Multiple panels](/images/content/articles/danharrin-filament-v3/features/panels.webp)

## Improved theme customization

Customize the [color palette](/docs/3.x/panels/themes#changing-the-colors) and [typography](/docs/3.x/panels/themes#changing-the-font) of your panel without having to compile any Tailwind CSS. Easily hook into our [suite of CSS classes](/docs/3.x/support/style-customization) to characterize a panel with your own branding - it's all yours.

![Theme](/images/content/articles/danharrin-filament-v3/features/theme.webp)

## And more...

### Enhanced authentication features

[New registration, password reset, email verification and user profile pages](/docs/3.x/panels/users#authentication-features). Paired with the new [multi-tenancy features](#multi-tenancy-built-for-saas), you can start building a SaaS app with Filament in minutes. Everything is seamlessly integrated with Laravel's native authentication features.

### Image editor

The [file upload form field](/docs/3.x/forms/fields/file-upload) now has a built-in [image editor](/docs/3.x/forms/fields/file-upload#image-editor), allowing you to crop, resize and transform images before uploading them to your server. You can even edit images that have already been uploaded, and the editor will re-upload the new version.

### New markdown editor

The [markdown editor form field](/docs/3.x/forms/fields/markdown-editor) has been rebuilt from the ground up, now including enhanced formatting and features, like tables and syntax highlighting for code blocks. It's now based on [Spatie's markdown editor plugin](https://github.com/spatie/filament-markdown-editor) from v2.

### List page tabs

[Add tabs](/docs/3.x/panels/resources/listing-records#using-tabs-to-filter-the-records) to the list page of your resources, allowing for a quick filtering experience for records in the table.

### Widgets outside of panels

Widgets, previously confined to the admin panel only, have now been extracted into their own package, `filament/widgets`, which allows you to [use them anywhere in your app](/docs/3.x/widgets/adding-a-widget-to-a-blade-view), outside the panel builder.

### Blade component library

The [core Blade component library](/docs/3.x/support/blade-components/overview) has been documented, allowing you to use Filament's UI in your own Blade views. This is also perfect for plugins that want to maintain a consistent look and feel with Filament.

## Thank yous

I would like to say a huge thank you to the entire Filament team for their hard work on this release. It's been a long time coming, and I'm so proud of what we've achieved together. This is such a large project, and I could not do this all alone. [Zep](https://twitter.com/zepfietje) has single-handedly redesigned every UI component and restructured large parts of the frontend codebase to be more maintainable going forward. [Adam](https://twitter.com/awcodes1) has been a huge help with preparing the plugin ecosystem, including writing plugin documentation and upgrading the plugin skeleton. [Dennis](https://phpc.social/@denniskoch) and the entire support team on Discord have been invaluable in helping users with their questions and issues. And finally [Hassan](https://twitter.com/HassanZahirnia), the newest member of our team, has redesigned and built this beautiful new website from scratch.

I'd also like to thank the community for their support and feedback leading up to this release. Especially to Hugh, Kevin, Mark, Ben, David and others who worked closely with the Filament team with testing the alpha releases of v3 since the start of 2023. We couldn't have done it without you.

## Conclusion

This article covers just a small selection of the new features in Filament v3. Wanna upgrade? [Read the upgrade guide](/docs/3.x/panels/upgrade-guide) to get started. We even have an automatic upgrade script which will do lots of the repetitive work for you.

You can find us on [Discord](/discord) if you have any questions or need help with anything. For larger projects or more complex problems, we also offer [private consultations](/consulting) which you can book with the Filament core team, starting at 30 minutes. 
