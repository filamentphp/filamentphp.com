---
name: Filter Sets
slug: kenneth-sese-filter-sets
anystack_id: 98d460ab-17ca-432b-b287-087e8f1a8ec7
author_slug: kenneth-sese
categories: [table-builder, panel-builder]
description: Let your users combine their filters, searches, column order, and more into convenient and easily accessible filter sets.
discord_url: https://discord.com/channels/883083792112300104/1093480983988281394
github_repository: archilex/filament-filter-sets
has_dark_theme: true
has_translations: true
image: kenneth-sese-filter-sets.png
versions: [2, 3]
---

# Filter Sets
![Example with link favorite bar](https://user-images.githubusercontent.com/6097099/257302665-3a51440f-0790-4433-9c77-d7849a76845b.png)

## Introduction

Filter Sets is a powerful plugin for [Filament](https://filamentphp.com/) that lets your users save their filters, search query, column order, column search queries, and toggled columns, and more into convenient and easily accessible Filter Sets. Filter Sets are accessed through the normal Filament filter dropdown.

Developers can also programmatically create Filter Sets for their end users, combining complex eloquent queries, with toggled columns, sorting, and more. 

Filter Sets also features the **Favorites Bar** which can displayed above your table for easy access to your favorite Filter Sets. 

### Example

Let's say a user regularly needs to view their data using multiple filters. For example, they need to see all of their `high cost products`, that are `active`, `low in quantity`, and were published in the `last four months`. Each time they need this view they would need to perform **15+ clicks**! This plugin allows them to combine those filters into just **one** Filter Set and have it one click away in the Favorites bar! 🥳

#### Video

Check out a short demonstration of how Filter Sets works.
[![Youtube video](https://user-images.githubusercontent.com/6097099/257350909-30682a46-8e69-453b-b760-31677a805cfe.png)](https://www.youtube.com/watch?v=4Z4xcYAsdgg&list=PLmA3_LEzgIQ0f-Y4qurWY53mETjUJ4VUL)

And Filter Sets don't have to be that complicated to be extremely useful. Even a single filter added to your Favorites Bar puts data **one click away** as opposed to as many as four.

### Features

- Combine one or more of your filters into one easy-to-access Filter Set
- Make your favorite Filters Sets **one click away** with the Favorites Bar
- Store filter settings, searching, column ordering, column searching, and toggled columns
- Includes four separate themes for the Favorites Bar
- Includes a Filter Set Resource to easily manage Filter Sets
- Users can make their Filter Sets publicly available to all users
- Admins can create global Filter Set Favorites that will appear for all users
- Powerful policy integration allows you to limit who can make filters public or global
- Full support for [Filament Tables](https://filamentphp.com/docs/2.x/tables/installation) (without Admin panel)
- Developers can programmatically create Filter Sets in code
- Full support for dark mode
- Support for translated filter [indicators](https://filamentphp.com/docs/2.x/tables/filters#active-indicators)
- Supports [AdvancedFilter](https://filamentphp.com/plugins/advancedfilter) by Danilo Andrade

### Screenshots

#### Example (with favorite bar link theme)

![Example with link favorite bar](https://user-images.githubusercontent.com/6097099/257302665-3a51440f-0790-4433-9c77-d7849a76845b.png)

#### Filter Set filter selection

![Filter Set filter selection](https://user-images.githubusercontent.com/6097099/257302403-1be9d94c-10d9-428b-895f-4b0764bc405a.png)

#### Filter Set creation

![Filter Set creation](https://user-images.githubusercontent.com/6097099/257302399-61129b3b-e978-417b-a37b-8403d6426e5e.png)

#### Developer-created Filter Sets in a dropdown

![Developer created filter sets in Dropdown](https://user-images.githubusercontent.com/6097099/257306535-2e871824-40e1-41a8-9e9b-9f7f08f3f0aa.png)

#### Filter Set Resource

![Filter Set resource](https://user-images.githubusercontent.com/6097099/257302397-143171fb-1b1e-4e1d-b2b8-7e999b6ff969.png)

#### Other Favorite Bar themes

![Favorite bar simple link](https://user-images.githubusercontent.com/6097099/257302392-809541bb-bb8c-4b52-ac31-0b631b1afdfc.png)
![Favorite bar tab](https://user-images.githubusercontent.com/6097099/257302387-0b11a08a-b556-4bcd-8e50-0609c0aa6ba6.png)
![Favorite bar branded tab](https://user-images.githubusercontent.com/6097099/257302375-34d5e5c8-9e85-41c2-bb03-ee7aa96319f6.png)

#### Dark mode

![Dark mode](https://user-images.githubusercontent.com/6097099/257302367-43c4c8ab-d690-4c48-bb37-4535df6fa351.png)

## Installation

Thanks for purchasing Filament Filter Sets!

Below you'll find extensive documentation on installing and using this plugin. Of course, if you have any questions, find a bug, need support, or have a feature request, please don't hesitate to reach out to me at filamentfiltersets@gmail.com.

Let's get started!

### Requirements

Filter Sets requires `PHP 8.1+`, `MySQL 5.7.8+`, and `Filament 3.0+`.

*Please refer to v1 docs for installing Filter Sets into `Filament 2.17.37+`.*

Finally, you also need at least one filter already set up in a `Resource` in your project. [Learn more](https://filamentphp.com/docs/2.x/tables/filters) about making filters.

### Installation steps

1. Install with Composer

    To install Filter Sets you'll need to add the package to your `composer.json` file:

    ```bash
    {
        "repositories": [
            {
                "type": "composer",
                "url": "https://filament-filter-sets.composer.sh"
            }
        ],
    }
    ```

    Once the repository has been added to your composer.json file, you can install Filament Filter Sets like any other composer package using the composer require command:

    ```bash
    composer require archilex/filament-filter-sets
    ```

    Next, you will be prompted to provide your username and password. 

    ```bash
    Loading composer repositories with package information
    Authentication required (filament-filter-sets.composer.sh):
    Username: [licensee-email]
    Password: [license-key]
    ```

    Your username will be your email address and the password will is your license key, followed by a colon (:), followed by the domain you are activating. For example, let's say we have the following licensee and license activation:

    - Contact email: **my_email@gmail.com**
    - License key: **8c21df8f-6273-4932-b4ba-8bcc723ef500**
    - Activation fingerprint: **my_domain.com**

    You will need to enter the above information as follows when prompted for your credentials:

    ```bash
    Loading composer repositories with package information
    Authentication required (filament-filter-sets.composer.sh):
    Username: my_email@gmail.com
    Password: 8c21df8f-6273-4932-b4ba-8bcc723ef500:my_domain.com
    ```

    The license key and fingerprint should be separated by a colon (:). 

2. Publish the config files

    Publishing the config file is optional, but recommended as it contains options like changing the theme for the Favorites Bar. However, if you use a `User::class` other than Laravel's default you **must** publish the config file and update it **before** migrating. 

    ```bash
    php artisan vendor:publish --tag="filament-filter-sets-config"
    ```

    You can optionally, publish the language files:

    ```bash
    php artisan vendor:publish --tag="filament-filter-sets-translations"
    ```

3. Publish and run the migrations

    ```bash
    php artisan vendor:publish --tag="filament-filter-sets-migrations"
    php artisan migrate
    ```
4. Add Filter Sets to your Filament Panel

    Add Filter Sets to a panel by instantiating the plugin class and passing it to the plugin() method of the configuration:

    ```php
    use Archilex\FilamentFilterSets\FilterSetsPlugin;
    
    public function panel(Panel $panel): Panel
    {
        return $panel
            // ...
            ->plugin(new FilterSetsPlugin());
    }
    ```

5. Integrate Filter Set's tailwind and css files

    Filament v3 requires developers generate a custom theme to better support a plugin's additional tailwind classes.

    After you have [created your custom theme](https://github.com/filamentphp/filament/blob/3.x/packages/panels/docs/11-themes.md), add Filter Set's views to your theme's `tailwind.config.js` file:

    ```js
    content: [
        ...
        './vendor/archilex/filament-filter-sets/**/*.php',
    ],
    ```

    Next, import Filter Set's custom `choices.js` stylesheet into your theme's css file:

    ```css
    @import '../../../../vendor/archilex/filament-filter-sets/resources/css/plugin.css';
    ```

    Then, compile your theme:

    ```bash 
    npm run build
    ```

    Finally, run the Filament upgrade command:

    ```bash
    php artisan filament:upgrade
    ```

#### Deploying
It is not advised to store your auth.json file inside your project's version control repository. To store your credentials on your deployment server you may create a [Composer auth.json file](https://getcomposer.org/doc/articles/http-basic-authentication.md) in your project directory using the following command: 

```bash
composer config http-basic.filament-filter-sets.composer.sh your_account_email your_license_key_including_your_fingerprint_domain
```

Don't forget to append your fingerprint domain to your password. 

You can see your credentials in your [Anystack account](https://account.anystack.sh/transactions): Anystack > Transactions > View details next to Filament Filter Sets. 

**Note:** Make sure the auth.json file is in .gitignore to avoid leaking credentials into your git history.

If you are using Laravel Forge, you don't need to create the auth.json file manually. Instead, you can set the credentials on the Composer Package Authentication screen of your server. 

### Upgrading to v2

Filter Sets v2 is mostly a compatibility update to support Filament v3. Follow these instructions to upgrade to v2.

1. Add Filter Sets to your Filament Panel

    Add Filter Sets to a panel by instantiating the plugin class and passing it to the plugin() method of the configuration:

    ```php
    use Archilex\FilamentFilterSets\FilterSetsPlugin;
 
    public function panel(Panel $panel): Panel
    {
        return $panel
            // ...
            ->plugin(new FilterSetsPlugin());
    }
    ```

2. Integrate Filter Set’s tailwind and css files

    Filament v3 requires developers generate a custom theme to better support a plugin’s additional tailwind classes.

    After you have [created your custom theme](https://github.com/filamentphp/filament/blob/3.x/packages/panels/docs/11-themes.md), add Filter Set’s views to your theme’s `tailwind.config.js` file:

    ```js
    content: [
        ...
        './vendor/archilex/filament-filter-sets/**/*.php',
    ],
    ```

    Next, import Filter Set’s custom `choices.js` stylesheet into your theme’s css file:

    ```css
    @import '../../../../vendor/archilex/filament-filter-sets/resources/css/plugin.css';
    ```

3. If you have already published your config file you need to make the following changes. 

    **Note:** If you had previously published your config file but didn't make any changes, the easiest path is to just delete your previous config file and republish it using: `php artisan vendor:publish --tag="filament-filter-sets-config"`

    ```php
    'models' => [
            'user' => App\Models\User::class,
            // 'filter_set' => null, <- change 'filterSet' to 'filter_set'
            // 'filter_set_user => null, <- change 'filterSetUser' to 'filter_set_user'
        ],

    'user_table_name_column' => 'name', // <- add

    'filter_set_resource' => [ // <- change 'filter-set-resource' to 'filter_set_resource'
        'enabled' => true,
    ],

    'colors' => [  // <-- Add array
        'primary' => true,
        'success' => true,
        'info' => true, // <-- Add
        'warning' => false,
        'danger' => true,
        'secondary' => true,
    ],
    ```

    **Note:** Please take a look at the original config file to see additional notes and instructions. 

4. Publish and run the migrations:

    ```bash
    php artisan vendor:publish --tag="filament-filter-sets-migrations"
    php artisan migrate
    ```

5. If you have published the language files, add the new translation strings:

    ```php
    'forms' => [
            ...
            'icon' => [ // <-- Add array
                'label' => 'Icon',
                'placeholder' => 'Select an icon',
            ],

            'color' => [ // <-- Add array
                'label' => 'Color',
            ],
    ],

    'tables' => [
            ...
            'columns' => [
                ...
                'icon' => 'Icon', // <-- Add
                'color' => 'Color', // <-- Add
    ```

6. If you are using policies to manage access to the app, v2 adds two new policies: `selectIcon` and `selectColor`. You can look at Filter Set's example policy for reference.

7. Table Builder Users: If you are using the Table Builder you will also need to update your view component and your `ListFilterSets` component. Admin panel users can skip this step and continue to Step 8.

    7.1 Update your view components:

    ```php
    <x-filament-filter-sets::favorites-bar />
    ```
    
    7.2 Add the following line to the top of your `app.css` file:

    ```css
    @import '../../vendor/archilex/filament-filter-sets/resources/dist/filament-filter-sets.css';
    ```

    7.3 Add the following line to the top of your `app.js` file:

    ```js
    import '../../vendor/archilex/filament-filter-sets/resources/dist/filament-filter-sets.js';
    ```

    7.4 Update your `ListFilterSets` component:

    Locate the updated ListFilterSets.php.stub file in the vendor\archilex\src\Http\Livewire folder and copy the changes into your `ListFilterSets` component. If you hadn't created a ListFilterSets component you can create one following the instructions in [Managing FilterSets](#managing-filter-sets).


8. Compile your assets:

    ```bash
    npm run build
    ```

9. Upgrade Filament:

    ```bash
    php artisan filament:upgrade
    ```

#### Next steps

Depending on which version you were previously using, you might have missed some of the new features introduced in previous releases. Be sure to check out:
1. [Developer-created Filter Sets](#developer-created-filter-sets-new)
2. [Dropdown menu in the favorites bar](#combining-developer-created-filter-sets-into-a-dropdown)
3. [Icons](#adding-an-icon)
4. [Colors](#adding-colors)
5. [Sizes](#setting-the-button-size)
6. [Custom themes](#use-a-custom-theme)

## Setup

### Setup: Filter Set Filter

To get started, you'll want to add the `FilterSetFilter` to your `Resource's` filter array. Of course you'll need to have your other filters created and ready to go. You can place Filter Sets anywhere in the `Filters` array, but it's recommended to be first to make it easily accessible for your users. 

```php
use Archilex\FilamentFilterSets\Filters\FilterSetFilter;

class ProductResource extends Resource
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            ])
            ->filters([
                FilterSetFilter::make(),
                // Your other filters
            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
}
```

### Setup: Favorites Bar

The Favorites Bar is not required, but is recommended since it gives your users easy access to their favorite Filter Sets. To display it, you'll need to use the `Archilex\FilamentFilterSets\Concerns\HasFavorites` trait in the `List*` class (or `Manage*` class if you're using a [simple](https://filamentphp.com/docs/2.x/admin/resources/getting-started#simple-modal-resources) modal resource) of your `Resource`.

```php
use Archilex\FilamentFilterSets\Concerns\HasFavorites;

class ListProducts extends ListRecords
{
    use HasFavorites;
```

### Setup: Filter Set Resource

The Filter Set Resource is where admins and users can manage their Filter Sets. It is automatically registered and added to the sidebar of Filament Admin. We'll cover later on how to change it's name, sidebar location, etc. by [extending it](#customizing-filter-set-resource).


## User-created filter sets vs Developer-created filter sets

Filter Sets supports *user-created* and *developer-created* filter sets. 

**User-created** filter sets are filter sets that are created by your users using your application's UI. By using the Filter Set Filter your end-users can create their own views into the data. Since each user has different needs, this allows for infinite customization within your application. (And less work for developers!)

**Developer-created** filter sets are filter sets that you the developer write in code and are then available to all your users, (or the users you authorize).

You can use them independently or together depending on your needs.

There is a fundamental difference between the two that is important to understand. With developer-created Filter Sets you are filtering your ***eloquent query*** using scopes and conditionals. With user-created Filter Sets you users are filtering the table using whatever ***Filament filters*** you have set up on the table. This means you can "filter" your data using a developer-created filter set ***without*** needing to have that filter on your table. User-created filter sets ***require*** a filter to be present on the table to work. 

Modifying the eloquent query with a developer-created Filter Set also allows you to create more complex ***relative*** queries that would be hard to create in a filter or would require you code a custom filter. For example you could create a relative "Sales this month" Filter Set:
```php
FilterSet::make('Sales this month')
    ->query(fn ($query) => $query->whereBetween('created_at', [now()->startOfMonth, now()->endOfMonth()] )),
```
This is hard to create out of the box since the DateFilter requires you to specify the dates. (You could also use [AdvancedFilter](https://filamentphp.com/plugins/advancedfilter) for this.)

Once you have a "Sales this month" developer-created Filter Set, your users can then use that as a base to create a user-created Filter Set that maybe filters by location, or sorts by customer name, or filters by largest amount.

However, this is also why you don't see filter indicators when filtering with a developer-created filter sets: you aren't using filters, you're using the query. Be sure to read [distinguishing between developer and user filter set](#distinguishing-between-developer-created-filter-set-and-user-created-filter-set) to help your users distinguish between user-created and developer-created Filter Sets. 

## User-created Filter Sets
User-created Filter Sets are filter sets that are created using your application's UI. It allows your end-users to create their own views into the data. Since each user has different needs, user-created filter sets allow for infinite customization within your application. 

**Note:** Be sure to check out the [tutorial](#tutorial) to quickly learn how to create a user-created Filter Set. You can even adapt the tutorial to help your end users create their own Filter Sets. 

### Using the Filter Set Filter

#### Creating a Filter Set

To create a Filter Set:
1. On your resource table, filter your data using whatever combination of filters and searches you like. (You did create filters right?!).
2. After filtering your data, click the `+` sign next to Filter Sets to open the `Create Filter Set` modal.
3. Name the Filter Set and choose if you want the filter to be `public`, `favorite`, and/or `global`.
4. Save the filter
5. 🎉

When saving a Filter Set the following configurations will be saved:
- current filters, 
- table search query, 
- column search queries (if enabled)
- column sort order
- and toggled columns will be saved.

#### Applying Filter Sets

Saved Filter Sets are available in the Filter Set dropdown. Choose the desired Filter Sets and all the saved filters will be applied to your data! 

##### Filter Set order

Filter sets will be listed in the following order in the dropdown:
1. Any global favorite filters
2. Your favorite filters
3. All the other filters including public filters

##### Persist Filters Sets to Session

If you would like your Filter Sets to persist in the user's session, you should add the `persistsTableFiltersInSession()` method to your `ListXYZ` or `ManageXYZ` resource.

```php
protected function persistsTableFiltersInSession(): bool
{
    return true;
}
```

Persisting filters to the session will also persist your toggled columns. 

#### Editing Filter Sets

To edit a Filter Set:
1. Select the Filter Set from the dropdown. This will apply your filters to the table.
2. Make the changes you need to the filters, search query, and/or column sorting.
3. Click the `+` sign to bring up the Create Filter Set modal. 
4. Name the Filter Set the **same** as the set which you want to replace.
5. Apply any of the public, favorite, and/or global settings.
6. Save the filter.

Saving a filter with the same name will overwrite the existing filter, effectively editing the previous filter. 

### Using the Filter Set Resource

The Filter Set Resource is where admins and users can manage their Filter Sets. To rename, delete, favorite another user's Filter Set, etc. head over to `Filter Sets` in your side bar. Depending on your policies this is where you can view and manage all your Filter Sets. We'll discuss [setting up policies](#policy-methods) later.

**IMPORTANT** If you don't apply policies, ANY user can rename, modify, or delete ANY Filter Set. Be sure to follow the instructions on how to [add policies](#policy-methods) if this is not the desired behavior.

#### Rename a Filter Set

You can easily rename and edit a Filter Set's setting by clicking on it and then making the desired changes in the modal.

#### Change the order of the Filter Sets in the Favorites Bar

If you would like to change the order of the Filter Sets in favorites bar you can do so by enabling table reordering in the Filter Set Resource table. This will hide all other Filter Sets that aren't yours so you can reorder them. Note, this will show all your favorite filters sets across all of your resources. It is recommended that you also filter the table by the resource before sorting.

A few things to note on sorting:
1. Sorting only applies to a user's favorite Filter Sets.
2. Admin cannot currently sort other user's favorite Filter Sets.
3. Sorting the order of global filters is not currently implemented.
4. While sorting through the Filter Set Resource works, it's not the ideal UX implementation. A better implementation that allows sorting on the actual resource will be developed and released in the future.

#### Delete a Filter Set

Click on the `Action` button on the far right (you may need to scroll to the right to see it) and choose `Delete`. 

#### Bulk delete a Filter Set

Click on the checkbox to the left of to the filters you want to bulk delete and then click the `Bulk Action icon` in the top right.

#### Easily toggling a filter's favorite, public, or global setting

The icons in the rows are actionable and can be clicked to quickly toggle the setting. 

### Authorization

Depending on your application, you may not want to give all of your users the ability to use all the functions. Here are a few example situations:
- You only want the administrator to be able to create global Filter Sets. Users can only apply the Filter Sets created by the administrator.
- You want your users to be able to create their own filters sets, but not make them globally or publicly available to other users. 
- You want your users to be able to create their own Filter Sets, but the shouldn't be able to update or delete other user's Filter Sets. 

Filter Sets handles authorization through [Laravel's policies](https://laravel.com/docs/10.x/authorization#creating-policies). Beyond Filament's normal [policy methods](https://filamentphp.com/docs/2.x/admin/resources/getting-started#authorization), Filter Sets includes the following methods:

#### Policy methods

- `viewAll()` is used to control who can view **all** of the users Filter Sets. If excluded, a user won't be able to view other user's private Filter Sets, just their own.
- `makePublic()` is used to control who can make a Filter Set publicly available to the other users. 
- `makeFavorite()` is used to control who can add a Filter Set to their favorites. Usually this will be enabled for all users.
- `makeGlobal()` is used to control who can make a Filter Set a global favorite for all users. Usually this would only be the admin.
- `selectIcon()` is used to control if you want to allow your users to select an icon for a filter set.
- `selectColor()` is used to control if you want to allow your users to select colors for a filter set. 

#### Policy example

To make setting up these policies easy below we've included a sample `Filter Set Policy`. To implement this policy, first create your own policy:

```bash
php artisan make:policy FilterSetPolicy
```

**Note:** Even though Laravel should automatically detect your policy, it may be necessary to register it in `App\Providers\AuthServiceProvider`:

```php
use App\Policies\FilterSetPolicy;
use Archilex\FilamentFilterSets\Models\FilterSet;

protected $policies = [
    FilterSet::class => FilterSetPolicy::class,
];
```

Locate the FilterSetPolicy that was created and replace the code inside with the code below. A few things to consider:

##### Assumptions

1. This code assumes you are using the default User model and that it's located in the `App\Models\` directory as has been default since Laravel 8.
2. This code assumes you have a `isAdmin()` method on your user model. Modify as needed.
3. Finally this sample policy code will apply the following policies:

###### Policies applied by sample code. 

1. All users will be able to access the `Filter Set Resource` in the sidebar so they can manage their filters.
2. Only the admin(s) will be able to view **all** user's Filter Sets. Other users will only be able to see their own filters, and other user's public and global filters.
3. All users can create Filter Sets.
4. Only the admin(s) or the owner of the Filter set can view, update, or delete that Filter Set.
5. Only the admin(s) can bulk delete Filter Sets.
6. All users can make their Filter Sets public.
7. All users can favorite their Filter Sets or other user's public Filter Sets.
8. Finally, only the admin(s) can make a Filter Set a global favorite.

Adjust accordingly

##### Filter policy example

```php
<?php

namespace App\Policies;

use App\Models\User;
use Archilex\FilamentFilterSets\Models\FilterSet;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilterSetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the Filter Set resource.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view other user's Filter Sets.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAll(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the Filter Set.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FilterSet $filterSet)
    {
        return $user->isAdmin() || $user->id === $filterSet->user_id || $filterSet->is_public;
    }

    /**
     * Determine whether the user can create Filter Sets.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Filter Set.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FilterSet $filterSet)
    {
        return $user->isAdmin() || $user->id === $filterSet->user_id;
    }

    /**
     * Determine whether the user can delete the Filter Set.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, FilterSet $filterSet)
    {
        return $user->isAdmin() || $user->id === $filterSet->user_id;
    }

    /**
     * Determine whether the user can delete the Filter Set.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can make filters sets public.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function makePublic(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can add Filter Sets to the favorites bar.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function makeFavorite(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can create global filters sets.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function makeGlobalFavorite(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can add icons to a filter set.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function selectIcon(Model $user)
    {
        return true;
    }

    /**
     * Determine whether the user can add colors to a filter set.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function selectColor(Model $user)
    {
        return true;
    }
}
```

### Customization

Filter Sets offers multiple way to customize the plugin to suit your needs. We've already discussed policies above, but here are a few other ways to customize Filter Sets.

#### Filter Sets Filter
You can change some of the Filter Sets filter setting using any of the following methods:

```php
FilterSetFilter::make()
    ->label('Filter group') // default is 'Filter sets'
    ->placeholder('Select filter group') // default is 'Select filter set'
    ->optionsLimit(10) // default is 50
    ->createOptionModalHeading('New filter group') // default is 'New filter set'
```

#### Favorites Bar

##### Themes
Filter Sets ships with four different Favorite Bar themes [see screenshots](#screenshots):
1. Links
2. Simple links (without the bottom border)
3. Branded tabs (determined by your theme's `primary` color)
4. Tabs (gray)

To switch between them, edit your config file:

```php
'favorites' => [
    /*
     * Select the theme you would like to use for your favorites bar.
     * Option are:
     * 1. links (default)
     * 2. links-simple
     * 3. tabs-brand
     * 4. tabs
     */
    'view' => 'tabs',
],
```

**Note:** Since `links-simple` only has color to visually distinguish between active and in-active states, it is recommended you do not allow your users to select a color for their filter sets since it becomes difficult to know which tab/link is active.  

##### Programmatically hide the favorites bar

If you would like to programmatically hide the favorite bar you can do so by overwriting the `showFavorites()` method in the `List*` class:

```php
class ListProducts extends ListRecords
{

    use HasFavorites;

    protected function showFavorites(): bool
    {
        return true;
    }
```

##### Hide the All tab

If you would like to programmatically hide All tab from the Favorites bar you can do so by overwriting the `ShowAllTabInFavorites()` method in the `List*` class:

```php
class ListProducts extends ListRecords
{

    use HasFavorites;
    
    protected function showAllTabInFavorites(): bool
    {
        return true;
    }
```

##### Setting an icon for the All tab/link

You can globally configure the icon for the `All` tab/link in the config file:

```php
'favorites' => [
    'view' => 'links',
    'all_icon' => 'heroicon-o-view-list',
],
```

Alternatively, you can define your All icon independently in each resource by overriding `getAllIcon()` in your `List` or `Manage` pages:

```php
protected function getAllIcon(): ?string
{
    return 'heroicon-o-collection';
}
```

##### Setting the icon position

You can globally configure whether your icons are `before` or `after` the label in the config file:

```php
'favorites' => [
    'icon_position' => 'after', // default is 'before'
],
```

Alternatively, you can define the icon position independently in each resource by overriding `getFavoriteIconPosition()` in your `List` or `Manage` pages:

```php
protected function getFavoriteIconPosition(): ?string
{
    return 'after';
}
```

##### Setting the button size

You can globally configure the size of the links/button in the config file. Options are `xs`, `sm`, `md`, or `lg`

```php
'favorites' => [
    'size' => 'sm', // default is 'md'
],
```

Alternatively, you can define the button size independently in each resource by overriding `getSize()` in your `List` or `Manage` pages:

```php
protected function getSize(): ?string
{
    return 'sm';
}
```

##### Use a custom theme
Filter Sets compiles its CSS using Filament's default color scheme for its 'primary', 'success', 'warning', and 'danger' classes. If you have customized those colors in your app, set 'use_custom_theme` to `true` in the config file:

```php
'use_custom_theme' => true, // default false
```

Next you need to add the path to Filter Sets view resources to your `tailwind.config.js` file:

```js
content: [
    ...
    './vendor/archilex/filament-filter-sets/**/*.php',
],
```

Next, import Filter Set's custom icon picker css to your `filament.css` file:

```css
@import '../../vendor/filament/filament/resources/css/app.css';
@import '../../vendor/archilex/filament-filter-sets/resources/css/plugin.css'; <-- add this
```

Finally, run `npm run dev` or `npm run build` to compile your css file with Filter Sets additional classes. 

##### Enabling or disabling colors from the color picker

Filter Set's color picker allows users to pick one of Filament's colors: `primary`, `success`, `info`, `warning`, and `danger` as well a `secondary` (gray) color. You can enable and disable these colors as you need. For example, out of the box Filament uses Tailwind's `amber` color for both `primary` and `warning` therefore `warning` is disabled by default so that users don't see the same color twice. If you are using a custom theme with different `primary` and `warning` colors, you probably want to enable the `warning` color in the config file.

```php
'colors' => [
    'primary' => true,
    'success' => true,
    'info' => true,
    'warning' => false,
    'danger' => true,
    'secondary' => true,
],
```

##### Disabling the color picker

You may disable the color picker in Filter Set's config file:

```php
'forms' => [
    'display_color_picker' => false,
],
```

or through a policy:

```php
public function selectColor(Model $user)
{
    return $user->isAdmin();
}
```

##### Disabling the icon select picker

You may disable the icon select picker in Filter Set's config file:

```php
'forms' => [
    'display_icon_select' => false,
],
```

or through a policy:

```php
public function selectIcon(Model $user)
{
    return $user->isAdmin();
}
```

#### Helper Text Display

The Filter Set creation modal's inputs have `helperText` to help guide your users. By default, the helper text for the `Name` and `Filters` fields are turned off, and the helper text for the toggle switches are turned on. To modify this, edit your config file:

```php
'forms' => [
        /*
         * The filter forms include helper text for each input. If you prefer not
         * to display them you can do that here. You can edit the text by
         * publishing the lang files.
         */
        'display_helper_text' => [
            'name' => false, // default false
            'filters' => false, // default false
            'public' => true, // default true
            'favorite' => true, // default true
            'global_favorite' => true, // default true
        ],
    ],
```

#### Language Files

Each text field in Filter Sets has been added to the language file offering you even more control of the plugin. You can publish the language files with:

```bash
php artisan vendor:publish --tag=filament-filter-sets-translations
```

This will copy the language files to your `lang\vendor\filament-filter-sets` directory. Currently 🇺🇸 English and 🇲🇽 Spanish are translated.

#### Customizing the Filter Set Resource

You can customize the Filter Set Resource by extending the the plugins `FilterSetResource` class. This will give you full access to all the [methods and customizations](https://filamentphp.com/docs/2.x/admin/resources/getting-started#model-labels) such as navigation naming, grouping, etc., normally found on Filament's Resources. 

To do customize the Filter Set Resource create a new class in your `App\Filament\Resources` called `FilterSetResource` which should then `extend` `\Archilex\FilamentFilterSets\Resources\FilterSetResource`. Then disable the package’s resource in the `config` file:


```php
'filter-set-resource' => [
   'enabled' => false,
],
```

Some of the adjustments you can make by extending our Resource are:

```php
<?php

namespace App\Filament\Resources;

class FilterSetResource extends \Archilex\FilamentFilterSets\Resources\FilterSetResource
{
    protected static ?string $navigationLabel = 'Filters';

    protected static ?string $navigationIcon = 'heroicon-o-adjustments';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;
}
```

**Note:** If you would like to change the `Model` name that appears above the table, you should modify the language file:

```php
'resources' => [

    'label' => 'Filter group', // default is Filter set
    'plural_label' => 'Filters groups', // default is Filter sets

],
```

## Developer-created Filter Sets

In addition to user-created Filter Sets, developers can also programmatically create Filter Sets that can be deployed to all users. These developer-created Filter Sets live side by side with user-created Filter Sets in the Favorites Bar and are always visible to your users. 

For more information on the difference between user-created and developer-created Filter Sets please refer to the section [User-created vs Developer-created Filter Sets](#user-created-filter-sets-vs-developer-created-filter-sets)

**Note:** Filament v3 introduced Tabs which also allows developers to programmatically create views. While similar, developer-created Filter Sets offers multiple additional features:

1. Combine with user-created Filter Sets for one consistent UI
2. Multiple themes
3. Color options
4. Visibility options
5. Include toggled columns
6. Include sorting column and direction
7. Make a filter set default
8. Persist filter sets to session
9. Combine into a dropdown
10. Preserve selected filters, columns, sorting
11. Relation manager support
12. Table builder support

#### Programmatically creating a Filter Set

To programmatically create a Filter Set, add the `getFilterSets()` method to your `List*` or `Manage*` resource. Since developer-created Filter Sets display in the Favorites Bar, be sure to include `use HasFavorites` as well.

```php
use Archilex\FilamentFilterSets\Components\FilterSet;
use Archilex\FilamentFilterSets\Concerns\HasFavorites;

class ListOrders extends ListRecords
{
    use HasFavorites;

    public function getFilterSets(): array
    {
        return [
            FilterSet::make('processing')
                ->query(fn ($query) => $query->where('status', 'processing')),
        ];
    }
}
```

The Filter Set query modifies your original eloquent query by applying whatever scopes and conditions you need. 

#### Table Builder: Programmatically creating a Filter Set

If you are only using Table Builder you need to adapt `getTableQuery()` so it will work with the new developer-created Filter Sets:

```php
protected function getTableQuery(): Builder
{
    // return YourModel::query();
    $query = YourModel::query(); // <- Assign your table query to a variable...

    return $this->applyFilterSets($query); // <- ...and return it here.
}
```

#### Location, position, and order

Developer-created Filter Sets are shown as tabs/links in the Favorites Bar. They appear before any user-created Filter Sets and cannot be sorted by the end user. The sort order is determined by the order the developer lists them in code. 

#### Adding an icon

Just like user-created Filter Sets, developer-created Filter-Sets may have icons:

```php
FilterSet::make('processing')
    ->query(fn ($query) => $query->where('status', 'processing'))
    ->icon('heroicon-o-refresh'),
```

#### Adding colors

Just like user-created Filter Sets, developer-created Filter-Sets may have colors. It may be either primary, secondary, success, warning or danger:

```php
FilterSet::make('processing')
    ->query(fn ($query) => $query->where('status', 'processing'))
    ->color('warning'),
```

The icon position will follow the position you have set in your config file.

#### Showing or hiding

You may conditionally show or hide Filter Sets for certain users using either the `visible()` or `hidden()` methods, passing a closure:

```php
FilterSet::make('processing')
    ->query(fn ($query) => $query->where('status', 'processing'))
    ->visible(fn (): bool => auth()->isAdmin())
```

You can also set up policies to manage visibility

```php
FilterSet::make('processing')
    ->query(fn ($query) => $query->where('status', 'processing'))
    ->visible(fn (Order $record): bool => auth()->user()->can('viewProcessing', $record)),
```

And then in `OrderPolicy`:

```php
public function viewNotProcessing(User $user)
{
    return $user->isAdmin();
}
```

If your policy is not working, be sure to register it in `AuthServiceProvider` as sometimes Laravel does not successfully auto-register policies.

#### Toggled columns

Just like user-created Filter Sets, developer-created Filter Sets can toggle columns to display only the information you need. Any column not in the `toggledColumns` array will be toggled off.

```php
FilterSet::make('processing')
    ->query(fn ($query) => $query->where('status', 'processing'))
    ->toggledColumns(['id', 'status', 'customer.name', 'created_at'])
```

Only columns that are `toggleable` in the resource can be toggled on or off.

#### Sorting

If a column is sortable(), you may choose it as the default sort column for your Filter Set:

```php
FilterSet::make('processing')
    ->query(fn ($query) => $query->where('status', 'processing'))
    ->defaultSort('total_price')
```

By default, sorting is ascending, but you may choose descending as well `->defaultSort('total_price', 'desc')`. 

While it is possible to add `orderBy()` to your query to sort your table, using `defaultSort()` will correctly show the sorting indicator.

#### Loading a default developer-created Filter Set

You may load one of your developer-created Filter Sets as the default view when loading the page by using `default()`:

```php
FilterSet::make('sales_today')
    ->query(fn ($query) => $query->whereDate('created_at', Carbon::today())
    ->default()
```

`default()` can take a callback which can allow you to dynamically choose which filter set is the default based on the conditions you choose. The first filter set that return `true` will be what is loaded by default. 

**Note:** Currently, this feature is limited to developer-created Filter Sets. 

#### Persist the active developer-created Filter Set to Session

If you would like the currently **active** developer-created Filter Set to persist in the user's session, you should add the `shouldPersistActiveSetInSession()` method to your `List*` or `Manage*` resource.

```php
protected function shouldPersistActiveSetInSession(): bool
{
    return true;
}
```

#### Combining developer-created Filter Sets into a dropdown

![Dropdown](https://user-images.githubusercontent.com/6097099/257306535-2e871824-40e1-41a8-9e9b-9f7f08f3f0aa.png)

If you have several developer-created Filter Sets you may combine them into a dropdown by adding `showDeveloperFilterSetsAsDropdown()` to your ListResource:

```php
protected function showDeveloperFilterSetsAsDropdown(): bool
{
    return true;
}
```

You may still choose to show some of your developer-created Filter Sets in the Favorites bar by adding `favorite()` to your Filter Set:

```php
FilterSet::make('delivered')
    ->query(fn ($query) => $query->where('status', 'delivered'))
    ->favorite()
```

**Note:** `favorite()` has no effect if you are not using the dropdown. 

**Note:** At the moment the dropdown only supports developer-created Filter Sets as user-created Filter Sets can be chosen from the filter dropdown.

#### Preserving user selected filters, toggled columns, sort column, and sort direction

By default, when you click a developer-created Filter Set, the filters, toggled columns, sort column, and sort direction that a user has applied will be removed so that the view the developer has created will be applied. This is usually the desired behavior as developer-created Filter Sets are meant to be customized views into data. However in some instances, you may wish to preserve the users selected filters, columns, etc. To do this you may use `preserveAll()`. 

```php
FilterSet::make('processing')
    ->query(fn ($query) => $query->where('status', 'processing'))
    ->preserveAll()
```

If you need more fine-grained control you may use the individual methods:

```php
FilterSet::make('processing')
    ->query(fn ($query) => $query->where('status', 'processing'))
    ->preserveFilters()
    ->preserveToggledColumns()
    ->preserveSortColumn()
    ->preserveSortDirection()
```

**Note:** By preserving a user's selection you are in turn removing the option for a developer-created Filter Set to always take a user to a predefined view as that view is now affected by the user.

#### Distinguishing between developer-created Filter Set and user-created Filter Set

Combining developer-created (predefined) filter sets with user-created filter sets has the potential of causing confusion with end-users if they build a filter set on top of a developer filter set. This is because a developer-created filter set applies "filters" in the query which then cannot be "turned off" by end-users. This plugin has multiple options you can use to mitigate these potential issues. These options can be enabled or disabled in the config file.

##### Disable filter set creation

You can disable the creation of filter sets all together when a developer-created Filter Set is selected. If you disable the creation, when a user clicks the button to create a Filter Set a Filament Notification will be displayed explaining that this action is not possible. The text of the notification can be configured in the `lang` file.

```php
'can_create_using_developer_filter_sets' => true, // boolean, default is true
```

##### Display a divider line

You can optionally display a divider line between developer-created Filter Sets and user-created Filter Sets to help visually distinguish between the two. 

```php
'display_divider_in_favorites' => false, // boolean, default is false
```

##### Display a lock icon

You can optionally display an icon on the other side of a developer-created Filter Sets to help visually distinguish between the two. 

```php
'lock_icon' => null, // default is null, can be any heroicon such as 'heroicon-o-lock-closed'
```

##### Display helper text in the modal

Finally, you can display helper text in the modal that explains that the user has chosen a developer-created Filter Set as they base for their Filter Set and that the filtering applied in the developer-created set cannot be removed. This text can be configured in the `lang` file.

```php
'display_helper_text' => false, // bool. default is false
```

## Relation Managers

The Filter Sets now has full support for [Relation Managers](https://filamentphp.com/docs/2.x/admin/resources/relation-managers), including the Favorites Bar.

Just like a Resource, add the FilterSetFilter to your `RelationManager`

```php
->filters([
    FilterSetFilter::make(),
    // Your other filters
])
```

If you want to display the Favorites Bar above your Relation Manager table you should include the `HasFavorites` trait.

```php
use Archilex\FilamentFilterSets\Concerns\HasFavorites;

class CommentsRelationManager extends RelationManager
{
    use HasFavorites;
```

## Filament Table Builder

Filter Sets now has full support for [Filament Table Builder](https://filamentphp.com/docs/2.x/tables/installation). 

### Filament Table Builder Requirements
Beyond the [normal requirements](#requirements), you must also have some type of user authentication system such as [Laravel Breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze) since each Filter Set belongs to the currently authenticated user. 

### Setting up Filament Filter Sets with Filament Table Builder
Following the [installation instructions](#installation) (excluding Setup).

Add the following line to the top of your `app.css` file:
```css
@import '../../vendor/archilex/filament-filter-sets/resources/dist/filament-filter-sets.css';
```

Add the following line to the top of your `app.js` file:
```js
import '../../vendor/archilex/filament-filter-sets/resources/dist/filament-filter-sets.js';
```

In the Filament Table where you want to use Filter Sets add `FilterSetFilter` to your `getTableFilters` method

```php
use Archilex\FilamentFilterSets\Filters\FilterSetFilter;

protected function getTableFilters(): array
{
    return [ 
        FilterSetFilter::make(),
        // your other filters
    ]; 
}
```

### Setting up the Favorites Bar with Filament Tables

To use the Favorites Bar include it in your Filament Table component

```php
use Archilex\FilamentFilterSets\Concerns\HasFavorites;

class ListUsers extends Component implements HasTable
{
    use HasFavorites;
```

You also need to add the view component to your blade file:

```html
<div class="space-y-6">
    
    <x-filament-filter-sets::favorites-bar />

    {{ $this->table }}
</div>
```

### Setting up Developer-created Filter Set with Filament Tables

If you are using Table Builder you need to adapt `getTableQuery()` so it will work with the developer-created Filter Sets:

```php
protected function getTableQuery(): Builder
{
    // return YourModel::query();
    $query = YourModel::query(); // <- Assign your table query to a variable...

    return $this->applyFilterSets($query); // <- ...and return it here.
}
```

### Managing Filter Sets
If you are using the admin panel, Filament Filter Sets comes with a `FilterSetResource` to easily manage all of your Filter Sets. If you are just using Filament Tables, you can recreate this table:

Create a new Livewire component

```bash
php artisan make:livewire ListFilterSets
```

Locate the `ListFilterSets.php.stub` file in the `vendor\archilex\src\Http\Livewire` folder and copy and paste its contents into your newly created `ListFilterSets` component

Next, add the `getPluralModelLabel()` method to the component. This will set the display name to easily identify which filters belong to which components. This method should also be added to all other components where you are using the `FilterSetFilter`

```php
public static function getPluralModelLabel(): string
{
    return 'Filter sets';
}
```

If you are going to be using the Favorites Bar, add the Favorites Bar view component to your component's blade view

```html
<div class="space-y-6">
    
    <x-filament-filter-sets::favorites-bar />

    {{ $this->table }}
</div>
```

Finally add the route to `routes/web.php`.
```php
Route::get('/filter-sets', App\Http\Livewire\ListFilterSets::class)->middleware(['auth', 'verified']);
```

## Tutorial

### Create a My Favorites tab for your users

To walk through the process of creating and managing Filter Sets, we'll create a My Favorites filter for the plugin's Filter Set Resource. Not only will this give you an overview of the plugin, but you'll also be creating a useful **My Favorites** tab so all your users can easily view and manage their favorited Filters Sets. (Not to mention you'll get some Inception-like vibes as we create a favorite Filter Set for the same Filter Set Resource 🤯)

#### Create the Filter Set

1. Head over to `Filter Sets` in your sidebar. Right now there's just an empty table. Let's change that.
2. Select the `Filter icon` in the table to open the Filter window.
3. In the `Is my favorite` dropdown choose `Yes` to only show `My favorites`. Still nothing to show since we don't have any filters, but that's ok.
4. Still in the Filter dropdown, Click the `+` icon next to `Filter Sets`.
5. In the modal window, name the Filter Set "My favorites" and toggle on "Add to favorites". **Leave the other settings off for now.**
6. Save the filter and now you have your first Filter Set! 👏

#### Make it global

7. You'll notice that now you can see the `Favorites Bar`. Click the `All` tab to show all your filters. (Still just one though).
8. It'll be nice for ALL users to have a `My favorites` tab in their Filter Set Resource. Click on the `Globe icon` under Global to toggle it on.
9. By toggling on "Global" you just enabled this `My favorites` tab for all your users. Global favorites show up first in every user's favorite bar and they can't be turned off by the user, so use them sparingly. (If you're wondering, this filter is scoped to the individual user so they'll only see their favorites.)

#### Make it public

10. Let's say you didn't want to force the `My favorites` tab on all your users but rather just make it available to them. To do this go and and toggle off `Global` and toggle on `Public`. By making a Filter Set public it will show up in other user's Filter Set Filter dropdown menu, where they can select and apply it if they wish. 
11. If you can log in as another user, log in and go to `Filter Sets` in the sidebar. You'll see this same filter, but you'll notice that My favorite is not toggled on since it's not a global favorite. In fact you won't see the Favorites Bar at all since this user doesn't have any favorites yet.
12. Go to Filter dropdown and then the in the Filter Sets dropdown you'll see "My favorites" as a public Filter Set option. DON'T select it yet since this will filter the table to only show this user's favorite filters, which they don't have. This was just to show that `Public` filters show up in the `Filter sets` dropdown menu.
12. Now, click the `Star icon` in the `My favorite` column of the table to make it a favorite of this user. Now the Favorites Bar will pop in and `My favorites` will be displayed. 
13. Click the `My favorites` tab and now it will filter the table by just that user's favorite filters. 

#### Make it global again

14. Since this is a useful favorites for your users, log back in as yourself and turn the `Global` setting back on.

🎉 Congratulations! You just created your first Filter Set!

## Support

Question? Bug? Feature request? Comment or suggestion? Email me at filamentfiltersets@gmail.com or join us on [#filter-sets on Discord]( https://discord.com/channels/883083792112300104/1093480983988281394). I'd love to hear from you.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kenneth Sese](https://github.com/archilex)
- [All Contributors](../../contributors)

## License

### Single License
The Single License grants the Licensee permission to use Filament Filter Sets in a single project hosted on a single domain or subdomain. Examples include a personal website or a website for a single client.

If you would like to implement Filament Filter Sets in a SaaS application, you will need an unlimited license.

The single license grants permission for up to 5 Employees and Contractors of the Licensee to access and use Filament Filter Sets.

### Unlimited License
The Unlimited License grants the Licensee permission to use Filament Filter Sets on **unlimited** domains and subdomains, including SaaS applications. 

The unlimited license grants permission for up to 25 Employees and Contractors of the Licensee to access and use Filament Filter Sets.

### Code Distribution
Filter Sets's licenses do not allow the public distribution of its source code. So, you may not build an application using Filter Sets and distribute that application publicly via open source repository hosting platforms or any other code distribution platform.

### Questions?
Unsure which license you need? Email us at filamentfiltersets@gmail.com with your questions.
