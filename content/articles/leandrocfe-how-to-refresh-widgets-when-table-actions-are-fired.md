---
title: How to Refresh Widgets When Table Actions Are Fired
slug: leandrocfe-how-to-refresh-widgets-when-table-actions-are-fired
author_slug: leandrocfe
publish_date: 2023-03-04
categories: [livewire, panel-builder, table-builder]
type_slug: article
---

![screenshot](https://raw.githubusercontent.com/leandrocfe/filament-widget-examples/main/screenshots/example-1.png)

## Introduction

In this article, we will explore how to use Filament widgets to create statistic cards that display user statistics about the user table. We will also see how to refresh the widgets when the user table is changed, using Livewire lifecycle hooks and events.

## Installation

To get started with the Filament, you can install a new Laravel project called **filament-widget-examples**:

```bash
laravel new filament-widget-examples
```

Now you can install Filament using the command:

```bash
cd filament-widget-examples
composer require filament/filament
```

Filament recommends adding this to your composer.json's post-update-cmd:

```json
"post-update-cmd": [
    // ...
    "@php artisan filament:upgrade"
]
```

Edit the User Migration File:

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->boolean('is_admin');
    $table->boolean('is_active');
    $table->rememberToken();
    $table->timestamps();
});
```

Edit the User Factory definition method:

```php
//database\factories\UserFactory.php
public function definition()
{
    return [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'is_admin' => fake()->boolean(),
        'is_active' => fake()->boolean(),
    ];
}
```

Edit the DatabaseSeeder run method:

```php
//database\seeders\DatabaseSeeder.php
public function run()
{
    \App\Models\User::factory(100)->create();
}
```

Edit the User Model:

```php
//app/Models/User.php
protected $fillable = [
    'name',
    'email',
    'password',
    'is_active',
    'is_admin'
];
```

Run the migrate command:

```bash
php artisan migrate --seed
```

## User Resource

You can create a **User Resource** and a **Widget**:

```bash
php artisan make:filament-resource User --simple
php artisan make:filament-widget UserOverview --resource=UserResource --stats-overview
```

Edit the User Resource file:

Form:

```php
//app/Filament/Resources/UserResource.php
public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\Toggle::make('is_admin'),
            Forms\Components\Toggle::make('is_active'),
        ]);
}
```

Table:

```php
//app/Filament/Resources/UserResource.php
public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\IconColumn::make('is_admin')
                ->boolean(),
            Tables\Columns\IconColumn::make('is_active')
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')
                ->date(),
            Tables\Columns\TextColumn::make('updated_at')
                ->date(),
        ])
        ->filters([
            Tables\Filters\TernaryFilter::make('is_admin'),
            Tables\Filters\TernaryFilter::make('is_active'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}
```

## Including widgets

Add the getWidgets method:

```php
//app/Filament/Resources/UserResource.php
use App\Filament\Resources\UserResource\Widgets\UserOverview;
public static function getWidgets(): array
{
    return [
        UserOverview::class,
    ];
}
```

Add the getHeaderWidgets method:

```php
//app/Filament/Resources/UserResource/Pages/ManageUsers.php
protected function getHeaderWidgets(): array
{
    return [
        UserOverview::class,
    ];
}
```

## Widget cards

You can use the **Widget cards** to display a number of different stats in a single widget. Edit the Users Overview Widget to this:

```php
//app/Filament/Resources/UserResource/Widgets/UserOverview.php
class UserOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        $usersCount = User::selectRaw('
            COUNT(*) as total,
            SUM(CASE WHEN is_admin THEN 1 ELSE 0 END) AS admin,
            SUM(CASE WHEN is_active THEN 1 ELSE 0 END) AS active
        ')->first();

        return [
            Card::make('Total', $usersCount->total)
                ->color('primary')
                ->description('Total users'),

            Card::make('Admin', $usersCount->admin)
                ->color('danger')
                ->description('Admin users'),

            Card::make('Active', $usersCount->active)
                ->color('success')
                ->description('Active users'),
        ];
    }
}
```

Check the User Resource on your browser. We have three header widgets: *Total users*, *Admin users* and *Active users*.

![screenshot](https://raw.githubusercontent.com/leandrocfe/filament-widget-examples/main/screenshots/example-1.png)

You can delete users in the table, but these widgets **won't be updated, only the table**. You need to **refresh the page** to update the widgets.

## Refresh widgets automatically

### Livewire lifecycle

Each Livewire component undergoes a [lifecycle](https://laravel-livewire.com/docs/2.x/lifecycle-hooks). Lifecycle hooks allow you to run code at any part of the component's lifecyle.
We can use **the Updated hook** to runs after any update to the Livewire component's data.

### Livewire event listeners

[Listeners](https://laravel-livewire.com/docs/2.x/events#event-listeners) are a key->value pair where the key is the event to listen for, and the value is the method to call on the component.

We can use the **$refresh magic action** to re-render the component without firing any action.

Let's add a listener in the Users Overview Widget file:

```php
//app/Filament/Resources/UserResource/Widgets/UserOverview.php
protected $listeners = ['updateUserOverview' => '$refresh'];
```

The updated hook method provides two attributes:

-   **$name**: the name of the action that was fired.
-   **$value**: the value of the action that was fired.

We are going to use the $name attribute to listen to two table events:

-   **mountedTableAction**: executed after a single delete action is clicked.
-   **mountedTableBulkAction**: executed after a bulk delete action is clicked.

Then, we can check these names in the updated method and emit the updateUserOverview event:

```php
//app/Filament/Resources/UserResource/Pages/ManageUsers.php
public function updated($name)
{
    if (Str::of($name)->contains(['mountedTableAction', 'mountedTableBulkAction'])) {
        $this->emit('updateUserOverview');
    }
}
```

Now, the widgets **will always be updated** when the delete action is clicked.

![screenshot](https://raw.githubusercontent.com/leandrocfe/filament-widget-examples/main/screenshots/example-2.png)

You can also check other table events, for example:

```php

//text input in the top right of the table
if (Str::of($name)->contains('tableSearchQuery')) {
    ...
}

//the table filter form
if (Str::of($name)->contains('tableFilters')) {
    ...
}
```

This project is available on Github: [https://github.com/leandrocfe/filament-widget-examples](https://github.com/leandrocfe/filament-widget-examples)

I hope you enjoy it :)
