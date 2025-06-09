---
title: Filament v4 Beta - Feature Overview
slug: leandrocfe-filament-v4-beta-feature-overview
author_slug: leandrocfe
publish_date: 2025-06-09
categories: [general]
type_slug: article
versions: [3,4]
---

## Introduction
    
Filament v4 Beta is here — and it's packed with powerful new features that give developers more flexibility, improved architecture, and a smoother UI-building experience.

This article walks you through the key updates and how they can improve your workflow in Filament v4.

> You are currently viewing the features for Filament `4.x`, which is currently in `beta` and is not `stable`. Please report any issues you encounter on [GitHub]().

> Looking for the current stable version? Visit the [3.x documentation](../docs/3.x).

## General

### Performance
Rendering and interaction performance in Filament has significantly improved, especially for large tables.

### Filament v4 now uses Tailwind CSS v4

[Tailwind CSS v4](https://tailwindcss.com) is a major update focused on performance, flexibility, and modern web standards. It features a reworked configuration system, improved customization, and faster builds—making it easier to tailor your design system at scale.
For the latest features and release notes, visit the [Tailwind CSS blog](https://tailwindcss.com/blog).

### Authentication

#### [Multi-factor authentication](../docs/4.x/users/multi-factor-authentication)

[Multi-factor authentication (MFA)](../docs/4.x/users/multi-factor-authentication) in Filament adds an extra security step beyond the default email and password login.

Filament supports two built-in MFA methods:
- [App authentication](../docs/4.x/users/multi-factor-authentication#app-authentication) using a TOTP app like Google Authenticator, Authy, or Microsoft Authenticator apps.
- [Email authentication](../docs/4.x/users/multi-factor-authentication#email-authentication) which sends a one-time code to the user’s email.

### Heroicons

Filament includes the [Heroicons](https://heroicons.com/) icon set by default, so you can use icons without installing anything extra.
The [Heroicon enum class](../docs/4.x/styling/icons#using-heroicons-in-filament) provides IDE autocompletion to help you quickly find the icon you need.

Each icon is available in solid and outlined variants (`Heroicon::Star` vs. `Heroicon::OutlinedStar`). Filament automatically selects the appropriate size (`16px`, `20px`, or `24px`) based on context.

### Setting a default timezone with FilamentTimezone

The new `FilamentTimezone` facade lets you set a default timezone for Filament globally via the `FilamentTimezone::set()` method, simplifying timezone management across components.

## Resources

### Singular resources

[Singular resources](../docs/4.x/resources/singular) are ideal when you don't need a full table of records—just a single form for managing one item. If the record doesn't exist, it's created when the form is first submitted. If it does, it's loaded automatically on page load and updated when submitted.
This approach works well for pages like a `Homepage` editor, `Settings` screen, or a user `Profile.`

### Nested resources

[Relation managers]() and [relation pages]() make it easy to display and manage related records within a resource.
For example, in a `CourseResource`, you might use a relation manager or page to manage the lessons that belong to a course. This lets you create and edit lessons directly from a table using modals.
But if lessons are more complex, modals might not be enough. In that case, you can give lessons their own resource with full-page create and edit views — this is called a [nested resource](../docs/4.x/resources/nesting).

### Code quality tips

To keep your Filament code [clean and maintainable](../docs/4.x/resources/code-quality-tips):

- Use [schema and table classes](../docs/4.x/resources/code-quality-tips#using-schema-and-table-classes) to separate large `form()` and `table()` definitions into their own files. This helps avoid bloated methods and improves readability.
- Create [dedicated component classes](../docs/4.x/resources/code-quality-tips#using-component-classes) when individual form inputs, table columns, filters, or actions become complex. This keeps each piece of logic focused and reusable.
- Organize components by `type` and `purpose`, such as putting form inputs under `Schemas/Components` and table actions under `Actions`.

### Customizing page content

Each page in Filament now has its own [schema](../docs/4.x/schemas/overview), which defines its structure and content.

You can override the default page schema using the `content()` method to fully control the layout.  
This lets you add, remove, or reorder [schema components](../docs/4.x/schemas/overview) such as tables, tabs, and custom elements.

### Resource create page redirect

You can now configure the default redirect behavior after creating a resource.  
By using the [panel configuration](../docs/4.x/panel-configuration), you can choose whether users are redirected to the index page, the view page, or the edit page after creating a record.

This applies globally to all resources within the panel.

### Disabling search term splitting

The new `$shouldSplitGlobalSearchTerms` property allows you to disable splitting the global search term into individual words, improving search performance on large datasets.

### Relation Manager

#### Customizing the content tab

The Edit and View pages now support full customization of the main content tab.  
By overriding the `getContentTabComponent()` method, you can use any [tab customization](../docs/4.x/resources/managing-relationships#customizing-relation-manager-tabs) options, including changing the label, icon, or even adding custom behaviors.

Previously, only the icon could be customized. Now, the entire tab component is fully configurable.

## Navigation

### Sidebar / Topbar

The `Sidebar` and `Topbar` are now Livewire components, allowing them to be updated dynamically.
If you need to refresh them — for example, after a setting or permission change — you can dispatch a [`refresh-sidebar` or `refresh-topbar`](../docs/4.x/navigation/overview#reloading-the-sidebar-and-topbar) browser event to trigger a reload.

## Schemas

[Schemas](../docs/4.x/schemas/overview) form the foundation of Filament's Server-Driven UI approach.
They let you build user interfaces in PHP using structured configuration objects—no need to write `HTML` or `JavaScript` manually.
These schemas define how your UI looks and behaves, representing components such as [forms fields](../docs/4.x/forms/overview), [infolist entries](../docs/4.x/infolists/overview), [layout components](../docs/4.x/schemas/layouts) and [prime components](../docs/4.x/schemas/primes).

Every Filament UI component — whether it's a form field, a description list, or a static element like text or buttons — is configured through a [schema](../docs/4.x/schemas/overview).
Components are modular, nestable, and reusable, making your interfaces consistent and easy to maintain.

A schema is represented by a `Filament\Schemas\Schema` object, and you can pass an `array` of components to it in the `components()` method.

For a full list of available components, see the [Schemas documentation](../docs/4.x/schemas/overview#available-components).

## Forms

### Rich Editor

[Rich Editor](../docs/4.x/forms/rich-editor) is now using [Tiptap](https://tiptap.dev/), a modern, headless, and highly extensible open source editor framework.

Tiptap gives developers full control over the editing experience. Because it's headless, you decide how it looks — [Tiptap](https://tiptap.dev/) handles the logic.

#### Storing content as HTML or JSON

By default, the rich editor stores content as `HTML`. If you would like to store the content as `JSON` instead, you can use the [`json()` method](../docs/4.x/forms/rich-editor#storing-content-as-json).

#### Custom blocks

[Custom blocks](../docs/4.x/forms/rich-editor#using-custom-blocks) are elements that users can drag and drop into the [rich editor](../docs/4.x/forms/rich-editor).
You can define custom blocks that user can insert into the rich editor using the [`customBlocks()` method](../docs/4.x/forms/rich-editor#using-custom-blocks).

#### Merge tags

[Merge tags](../docs/4.x/forms/rich-editor#using-merge-tags) let users insert "placeholders" — like `{{ name }}` or `{{ today }}` — into rich content.
These tags are replaced with dynamic values when the content is rendered, making them useful for things like personalizing messages or displaying dates.

To enable [merge tags](../docs/4.x/forms/rich-editor#using-merge-tags), use the [`mergeTags()` method](../docs/4.x/forms/rich-editor#using-merge-tags) when configuring the editor.

Users can insert tags by typing `{{` to search, or by using the "merge tags" tool in the toolbar, which opens a panel of available tags for easy insertion.

#### Extending the rich editor

You can [extend the Rich Editor](../docs/4.x/forms/rich-editor#extending-the-rich-editor) in Filament by creating custom plugins. These plugins let you add your own [TipTap extensions](https://tiptap.dev/docs/editor/core-concepts/extensions), toolbar buttons, and rendering behavior.

### Slider

The [slider component](../docs/4.x/forms/slider) lets users select one or more numeric values by dragging a handle along a track — ideal for inputs like ranges, ratings, or percentages.

### Code editor

The [code editor component](../docs/4.x/forms/code-editor) lets users write and edit code directly in the interface.
It supports common languages including `HTML`, `CSS`, `JavaScript`, `PHP`, and `JSON`.

### Table repeaters

[Table repeaters](../docs/4.x/forms/repeater#table-repeaters) display [repeater]() items in a table layout using defined `columns`.
You can configure these columns with the `table()` method and `TableColumn` objects, which map to fields in the repeater's schema.

Each column can be customized:
- `hiddenHeaderLabel()` hides the label visually but keeps it accessible.
- `markAsRequired()` adds a red asterisk to indicate required fields.
- `wrapHeader()` enables line-wrapping for long labels.
- `alignment()` sets header alignment (`start`, `center`, or `end`).
- `width()` defines a fixed width for the column.

### Selecting options from a table in a modal

The [ModalTableSelect](../docs/4.x/forms/select#selecting-options-from-a-table-in-a-modal) component lets users select records from a modal that displays a full [Filament table](../docs/4.x/tables/overview) — ideal for relationships with many records that need advanced [search](../docs/4.x/tables/columns/overview#searching) and [filtering](../docs/4.x/tables/filters/overview).

### Using JavaScript

#### `hiddenJs()` and `visibleJs()`

You can conditionally `hide` or `show` fields using the [hidden()]() or [visible()]() methods with a PHP callback.
However, this triggers a full schema reload and a network request whenever the reactive field changes — potentially affecting performance.

For better efficiency, use [`hiddenJs()` or `visibleJs()`](../docs/4.x/forms/overview#hiding-a-field-using-javascript) instead. These methods evaluate JavaScript expressions on the client side, allowing you to toggle field visibility instantly without reloading the schema.

#### `JsContent`

You can dynamically set text content — like [labels](../docs/4.x/forms/overview#setting-a-fields-label) or [belowContent](../docs/4.x/forms/overview#adding-extra-content-to-a-field) — using [`JavaScript` by passing a `JsContent` object](../docs/4.x/forms/overview#using-javascript-to-determine-text-content).
This allows methods like `label()` and `Text::make()` to render `HTML` based on field values.

Inside the `JsContent`, you can use `$state` and `$get` to access the current field's state or other fields in the schema, enabling real-time, reactive text updates without server interaction.

#### `afterStateUpdatedJs()`
When you set the state of another field using `$set()` inside an `afterStateUpdated()` function, it modifies the state — but still triggers a network request to reload the schema.

To avoid this, you can use [`afterStateUpdatedJs()`](../docs/4.x/forms/overview#preventing-the-livewire-component-from-rendering-after-a-field-is-updated), which runs a `JavaScript` expression every time the field value changes.

This approach skips the network request entirely and updates fields instantly on the client side.

In this JavaScript context, you can use `$state`, `$get()`, and `$set()` to interact with field states efficiently.

### Fusing fields into a group

The [FusedGroup](../docs/4.x/forms/overview#fusing-fields-together-into-a-group) component lets you visually combine multiple fields into a single, compact group. 
It's best used with compatible field types like [text inputs](../docs/4.x/forms/text-input), [selects](../docs/4.x/forms/select), [date-time pickers](../docs/4.x/forms/date-time-picker) and [color pickers](../docs/4.x/forms/color-picker).

### Adding Extra Content to a Field

Fields contain [multiple slots](../docs/4.x/forms/overview#adding-extra-content-to-a-field) where content can be inserted in a child schema. Slots can accept text, [any schema components](../docs/4.x/schemas/overview), [actions](../docs/4.x/actions/overview), or [action groups](../docs/4.x/actions/grouping-actions) — typically with [prime components](../docs/4.x/schemas/primes).

Available slots include:
- `aboveLabel()`, `beforeLabel()`, `afterLabel()`, `belowLabel()`
- `aboveContent()`, `beforeContent()`, `afterContent()`, `belowContent()`
- `aboveErrorMessage()`, `belowErrorMessage()`

### Partial rendering

By default, using [live()](../docs/4.x/forms/overview#the-basics-of-reactivity) on a field re-renders the entire schema when its value changes.

Filament now offers [more efficient options](../docs/4.x/forms/overview#field-partial-rendering):
- `partiallyRenderComponentsAfterStateUpdated()` re-renders only specified fields after state updates.
- `partiallyRenderAfterStateUpdated()` re-renders just the field itself.
- `skipRenderAfterStateUpdated()`: prevents any re-rendering, useful when handling logic only.

These tools help optimize field interactions, especially when only part of the form needs to react to changes.

## Infolists

### Code entry

[Code entry](../docs/4.x/infolists/code-entry) allows you to present a highlighted code snippet in your [infolist](../docs/4.x/infolists). 
It uses [Phiki](https://github.com/phikiphp/phiki) for code highlighting on the server.

## Tables

### Tables with Static Data

[Filament tables](../docs/4.x/tables) are typically backed by [Eloquent models](), but that's not always ideal. 
When your data isn't stored in a database — or you want to render external or computed data — you can now use [static data](../docs/4.x/tables/static-data) as the data source.

To use [static data](../docs/4.x/tables/static-data), pass an `array` to the `records()` method. This lets you render simple datasets without a database, while still supporting features like [columns](../docs/4.x/tables/static-data#columns), [sorting](../docs/4.x/tables/static-data#sorting), [searching](../docs/4.x/tables/static-data#searching), [pagination](../docs/4.x/tables/static-data#pagination), and [actions](../docs/4.x/tables/static-data#actions).

You can also [fetch data from external APIs](../docs/4.x/tables/static-data#using-an-external-api-as-a-table-data-source). For example, use Laravel's HTTP client to pull data from a REST API and return it as an `array` in `records()`.
This is useful for integrating third-party services or remote backends.

> When working with APIs, make sure to implement proper authentication, error handling, and rate limiting.

### Toolbar actions

Tables now support a dedicated [toolbar actions](../docs/4.x/tables/actions#toolbar-actions) area.

You can place both regular actions and [bulk actions](../docs/4.x/tables/actions#bulk-actions) in the [`toolbarActions()`](../docs/4.x/tables/actions#toolbar-actions) method.

This is useful for actions like "create", which are not tied to a specific row, or for making bulk actions more visible and accessible in the table’s toolbar.

## Actions

### Unified actions

[Actions](../docs/4.x/actions/overview) are now fully unified across tables, forms, infolists and regular actions.

Instead of having separate `Action` classes for each context, all actions now use a single `Filament\Actions` namespace.

### Improving bulk action performance

Bulk actions now support the `chunkSelectedRecords()` method, allowing selected records to be processed in smaller batches instead of loading everything into memory at once — improving performance and reducing memory usage with large datasets.

## Widgets

### Making the chart collapsible

Charts can now be made collapsible by setting the `$isCollapsible` property to `true` on the widget class.

## Panel Configuration

### Sub-navigation position

By default, sub-navigation appears at the start of each page. You can override this globally for the entire panel using the [`subNavigationPosition()` method](..//docs/4.x/panel-configuration#setting-the-default-sub-navigation-position).

Available options are:
- `Start` – default position
- `End` – renders at the bottom
- `Top` – displays as tabs

### Strict authorization mode

By default, Filament allows access to a resource if no policy or policy method exists — assuming authorization isn't required.

To enforce stricter security, you can enable strict authorization mode using [`strictAuthorization()`](../docs/4.x/panel-configuration#strict-authorization-mode).
This will throw an exception if a policy or method is missing, ensuring all access is explicitly defined.

### Customizing error notifications

You can now customize how [error messages appear](../docs/4.x/panel-configuration#configuring-error-notifications) in your Filament panel.

When Laravel's debug mode is off, Filament replaces Livewire's full-screen error modals with flash notifications.
You can:
- Disable this behavior globally using `errorNotifications(false)`.
- Customize the default error message with `registerErrorNotification(title, body)`.
- Set custom messages for specific HTTP status codes using the `statusCode` parameter.
- Enable or disable error notifications on a per-page basis via the `$hasErrorNotifications` property.

This gives you full control over the user experience when something goes wrong.

## Conclusion

Filament v4 Beta brings a wide range of improvements designed to make your development experience faster, more consistent, and easier to maintain. Since it's still in `beta`, now is the perfect time to explore the new features and share feedback. 
If you need a `stable` version, refer to the [3.x documentation](../docs/3.x).

Special thanks to [Dan Harrin](https://github.com/danharrin) for his incredible work on Filament v4!

This article was written by [Leandro Ferreira](https://github.com/leandrocfe), with contributions from [André Domingues](https://github.com/andrefelipe18).
