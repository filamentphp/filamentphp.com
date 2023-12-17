---
title: Filament v3.1 is Finally Here!
slug: alexandersix-filament-v3-1
author_slug: alexandersix
publish_date: 2023-12-17
categories: [general]
type_slug: news
---

![Filament v3.1 Release Banner Image](/images/content/articles/alexandersix-filament-v3-1/banner.webp)

After over 100 patch releases to Filament version v3.0 (no really, [we're serious](https://github.com/filamentphp/filament/releases/tag/v3.0.103)), one of the biggest minor releases we've ever launched has finally landed! We've included a little bit of something for everyone in this release! We have everything from dashboard and navigation updates to entire new features for handling and querying large datasets.

You can find the v3.1.0 changelog [here](https://github.com/filamentphp/filament/releases/tag/v3.1.0) if you prefer to read about the changes directly on Github. Otherwise, read on, and let's dive into some of the new features available in Filament version 3.1!

### Global Dashboard Filters

![A screenshot of a Filament dashboard using the new global dashboard filters.](/images/content/articles/alexandersix-filament-v3-1/global-dashboard-filters.webp)

Dashboards are an important piece of the Filament panel. They offer developers a quick and easy way to implement charts, statistics, and tables to provide insights into users' data. Now, starting in version 3.1, Filament dashboards give developers the ability to create global filters using our built-in form components!

You can start using these new global dashboard filters in three easy steps:

1. Use the `HasFiltersForm` trait on any Dashboard class
2. Implement the new `filtersForm()` method on the same Dashboard class. Make sure to include the schema for any form fields that should be used as a filter!
3. Access the live data within any dashboard widget using the `$this->filters` property provided by the `InteractsWithFilters` trait.

Once you have followed these steps, any change to the filter form will update your widgets' data as well!

If you'd rather not clutter up your Dashboard with form filters, you can instead use the included `FilterAction` to put your form within a modal. Adding this action to your Dashboard places a filter button in your page's header section that gives your users access to the filters. Even if your app doesn't _need_ your filters to live in a modal, this approach can potentially improve performance on computationally intense queries! When using a modal, filters don't apply immediately. They only apply when the user clicks the "Apply" button within the modal. This allows us to only re-compute the query when all filters are set, instead of re-computing every time a user updates the filter value.

Check out the documentation for more information:

- [https://filamentphp.com/docs/3.x/panels/dashboard#filtering-widget-data](https://filamentphp.com/docs/3.x/panels/dashboard#filtering-widget-data)

### Section Header Actions & Repeater/Builder "Item Actions"

![A screenshot of a Repeater using an item action to open a new tab to the given item.](/images/content/articles/alexandersix-filament-v3-1/repeater-item-actions.webp)

Actions are one of the main building blocks of the Filament panel, so we're always looking for ways to improve upon their usefulness. In version 3.1, we've added actions to two new areas: the Section header and Repeater/Builder items.

Section header actions are exactly what they say on the tin: action buttons that you can add to the header of your sections. Previously, actions that pertained to a single section of your form had to sit at the top of the form with all the other actions. Now, however, you can place these actions right alongside their relevant data!

Repeater/Builder item actions work similarly to these section header actions. One area where they are unique, though, is that these actions are aware of their item context. With these item actions, you can use the values on the specific item instance to perform your action. Item actions on Repeaters and Builders aren't new–we've offered a handful of prebuilt actions like "Delete" and "Collapse" in the past. But now with version 3.1, you are free to build your own custom actions on a per-item basis!

Check out the documentation for more information:

- [https://filamentphp.com/docs/3.x/forms/layout/section#adding-actions-to-the-sections-header](https://filamentphp.com/docs/3.x/forms/layout/section#adding-actions-to-the-sections-header)
- [https://filamentphp.com/docs/3.x/forms/fields/repeater#adding-extra-item-actions-to-a-repeater](https://filamentphp.com/docs/3.x/forms/fields/repeater#adding-extra-item-actions-to-a-repeater)
- [https://filamentphp.com/docs/3.x/forms/fields/builder#adding-extra-item-actions-to-a-builder](https://filamentphp.com/docs/3.x/forms/fields/builder#adding-extra-item-actions-to-a-builder)

### Parent Navigation Items

![A screenshot of a parent navigation item and its two children.](/images/content/articles/alexandersix-filament-v3-1/parent-navigation.webp)

Before version 3.1, Filament offered two levels of navigation hierarchy: a navigation section and the navigation item itself. This setup has served us well for a long time and has allowed for a lot of flexibility, but we felt that an addition was in order. Now, Filament allows for another layer of navigation: the parent navigation item.

Parent navigation items work like normal navigation items. Just like these normal items, you can put them in sections and use them to navigate to resources and pages. However, parent items can now have _other_ navigation items appear underneath them! This is particularly useful when you have resources that are only relevant within the context of another resource.

For example, you may have a "Shop" section with the following pages: "Products", "Categories", and "Brands". "Products" are a viable top-level resource within "Shop", but the "Category" and "Brand" resources are only relevant within the context of a "Product". Because of this, "Category" and "Brand" don't make a lot of sense as top-level navigation items. Previously, because "Products" is already nested within the "Shop" section, there wasn't a lot we could do here. Now, however, we can nest the "Categories" and "Brands" navigation items underneath the "Products" parent. When we do this, Filament styles the navigation items to show the user that these pages belong to the "Products" context.

Nesting navigation items underneath a parent is simple. From our earlier example, we can nest the "Categories" navigation item underneath "Products" by setting the $navigationParentItem property on the CategoryResource to "Products". That's all there is to it–Filament handles the rest!

Check out the documentation for more information:

- [https://filamentphp.com/docs/3.x/panels/navigation#grouping-navigation-items-under-other-items](https://filamentphp.com/docs/3.x/panels/navigation#grouping-navigation-items-under-other-items)

### CSV Imports

![A screenshot of the mapping system used in the new CSV imports feature.](/images/content/articles/alexandersix-filament-v3-1/csv-import.webp)

There are few certainties in the world, but one of them is that if you build an application for long enough, handling large datasets via CSV files will eventually become a requirement. Exporting CSV files tends to be simple enough, but importing data into your applications from a CSV can quickly become difficult.

First, you have to handle the upload of the file. Then, you create the logic to map the data from the file to your underlying data model. After that, you build the validation logic that imported data. When you've implemented data validation, you then have to figure out how you want to handle any import errors. Do you save records until the error occurs? Do you catch the error and continue? These are solvable problems, but wouldn't it be nice if there were tools in place to help you more easily build these integrations? Don't worry, Filament 3.1's got you covered.

Filament now provides a robust set of tools to help take care of the tedious, repetitive parts of building a CSV import system! The system boils down to two main concepts: mappers and validators.

Mappers allow the user to define what database fields each CSV column saves into. They ensure that your application can understand the incoming data regardless of the columns uploaded in the CSV. Filament will attempt to auto-determine the appropriate mapping based on the CSV column names, but users can change this if needed!

Validators work much like Laravel's form request validation. They look at each piece of imported data and ensure that it is of the size and shape that your application expects. Unlike Laravel's form request validation, though, if one or more imported rows don't pass validation, we don't stop the import! In this case, Filament will generate a new CSV file for you to download that only includes the failing rows. This allows you to view any failed entries, update their values, and re-upload the CSV without re-uploading validated data!

When importing data with a CSV, one of the common problems that needs to be overcome is how to handle related data. To help with this, Filament provides automatic handling for `BelongsTo` relationships! Chaining the `relationship()` method onto any ImportColumn tells Filament to find the related model and store the appropriate ID onto your record. Many different ways to find the related data are supported, so check the documentation to find the perfect match for your data!

Check out the documentation for more information:

- [https://filamentphp.com/docs/3.x/actions/prebuilt-actions/import](https://filamentphp.com/docs/3.x/actions/prebuilt-actions/import)

### Query Builder

![A screenshot of a complex query built with the new Query Builder feature.](/images/content/articles/alexandersix-filament-v3-1/query-builder.webp)

Buckle up, because this is quite possibly the biggest feature we've ever released in a minor version! Querying and filtering data is important for all sorts of business and technical reasons, and for many use cases, the existing filter system in Filament works well. It allows you to filter and sort on specific columns, which is perfect when your users are trying to narrow down the data that they're seeing in a single dimension.

But, what happens when your users need a more in-depth solution than that? Maybe you could build a dedicated page for the custom query? Or a custom section? These are both viable options, but what happens when a user needs to change their queries on the fly? Enter the new Filament Query Builder.

Filament's query builder helps developers set up filter constraints to let users create powerful queries for their data. These constraints will be visible to the user in the UI, and adding constraints to the query automatically updates the visible data. Constraints can be joined with `AND` and `OR` operators and can leverage `NOT` operators for negations. They operate on Text, Boolean, Date, and Number fields, and also include a `SelectConstraint` that can filter any column using an option in a Select field. There is even a `RelationshipConstraint` that can filter any field based on data from a related model (in a similar way to `whereHas`).

When combined, these different constraints give your users the ability to create complex and custom queries for their data all within Filament!

Check out the documentation for more information:

- [https://filamentphp.com/docs/3.x/tables/filters/query-builder](https://filamentphp.com/docs/3.x/tables/filters/query-builder)

### Sub-Navigation

![A screenshot of a page using sub-navigation to show three related links on the same resource page.](/images/content/articles/alexandersix-filament-v3-1/sub-navigation.webp)

In Filament 3.1, we've not only added navigation features to the primary navigation, but we've also added an entirely new way to guide users to pages related to the resource they are currently viewing. We call it resource sub-navigation.

Sub-navigation in Filament allows you to display links to any related pages you want within the page context itself as either a sidebar or a row of tabs. For example, if you are viewing a Post resource, you can create quick links to the Edit page and to the table of related Comments for that given post. By grouping these pages into a single sidebar, you get a few important benefits:

- You break up parts of the page that would have previously been stacked vertically
- You group related pages that may have been spread out over one or more pages
- You increase clarity for common workflows by linking to pages for related resources

Adding a sub-navigation to your panel's resource pages is simple! To create a sub-nav, you only need to implement the static `getRecordSubNavigation()` method. Once implemented, Filament will handle displaying and managing the navigation items for you!

Check out the documentation for more information:

- [https://filamentphp.com/docs/3.x/panels/resources/getting-started#resource-sub-navigation](https://filamentphp.com/docs/3.x/panels/resources/getting-started#resource-sub-navigation)

### Distinct Validation

The "distinct" validation rule has finally landed in Filament as of this v3.1 release! Many people in the Filament community (ourselves included) have bumped into situations where we needed this rule, and now we can do just that!

With the addition of the "distinct" rule (via the chainable `distinct()` method), Filament can now enforce that certain fields do not have a value that is present in any other Repeater item. The fields that can use this rule are:

- Checkbox
- Checkbox List
- Toggle
- Radio
- Select

For example, imagine that you are using a Repeater field to enter multiple contact emails for a Customer. As part of this feature, only one of these email addresses can be marked as "primary". Using the "distinct" validation rule, we can make sure that only one Repeater item has the "Is Primary" toggle set to true at any given time!

Alongside the `distinct()` validation method, we have added a method called `fixIndistinctState()`. This method works in place of `distinct()` by telling Filament to attempt to fix any instances where the "distinct" validation fails. Depending on the field type, Filament attempts to fix these discrepancies in one of two ways. For boolean fields, when one field is enabled, all other items will have the field disabled. For all other fields, any indistinct values are cleared out when the user makes a duplicate selection.

We have also added another special method for Select, Radio, and Checkbox List fields called `disableOptionsWhenSelectedInSiblingRepeaterItems()`. Using this method instead of `distinct()` tells Filament to remove a selected value from all other instances of this field within the Repeater. This can be exceptionally helpful when you want to prevent users from even knowing that an option is available more than once.

Check out the documentation for more information:

- [https://filamentphp.com/docs/3.x/forms/fields/repeater#distinct-state-validation](https://filamentphp.com/docs/3.x/forms/fields/repeater#distinct-state-validation)

### Honorable Mentions

There are a handful of updates that aren't big enough to warrant their own sections in this post, but _are_ exciting enough to us that we wanted to make sure they were included:

- Global search support for "simple resources" with modals
- Circular cropping with the `imageEditor()` method on the `FileUpload` field
- Auto-detection of boolean columns from model casts
- Expandable limits for `TextColumn` and `TextEntry`

### Thank You!

So much time and effort went into this release, and we couldn't have done it without the incredible Filament community requesting features, offering solutions, and testing all these updates! We're so excited to see what amazing creations that everyone comes up with! If you haven't already, come join the [official Filament discord](https://filamentphp.com/discord)–it's the perfect place to ask for help, show off your cool projects, or chat with the fine folks of the Filament community. And make sure to drop by and tell us what you think of the 3.1 release! What's _your_ favorite new feature?
