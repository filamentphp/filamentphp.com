---
title: How to write tests for Filament admin panels
slug: leandrocfe-how-to-write-tests-for-filament-admin-panels
author_slug: leandrocfe
publish_date: 2022-11-06
categories: [laravel, livewire, panel-builder, table-builder, form-builder]
type_slug: article
---

![Example](https://raw.githubusercontent.com/leandrocfe/filament-tdd-example/master/screenshots/example.jpg)

## Introduction

For the purpose of this article, we will create a simple Post Resource to create, read, update and delete post posts. We will:

- Write a test
- Run the test — which will fail
- Make changes to code to make the test pass(refactor)
- Repeat

## Installation

To get started with the Filament 2.x, you can install a new Laravel project called filament-tdd-example:

```bash
laravel new filament-tdd-example
```

Now you can install Filament using the command:

```bash
cd filament-tdd-example
composer require filament/filament:"^2.0"
```

Filament recommends adding this to your composer.json's post-update-cmd:

```json
"post-update-cmd": [
    // ...
    "@php artisan filament:upgrade"
]
```
All examples in this article will be written using *Pest*. You can install Pest using the comand:

```bash
composer require pestphp/pest-plugin-laravel --dev
php artisan pest:install
```

Edit the User Migration File:

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->boolean('is_admin')->default(0);
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
```

You can add the new columns to your User Model:

```php
//app\Models\User.php
protected $fillable = [
    'name',
    'email',
    'password',
    'is_admin'
];
```

Edit the User Factory definition method:

```php
//database\factories\UserFactory.php
public function definition()
{
    return [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'is_admin' => fake()->boolean(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
}
```

Create the Post Model (with migration and factory files):

```bash
php artisan make:model Post -m -f
```

Edit the Post Migration File:

```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('content')->nullable();
    $table->timestamps();
});
```

Edit the Post Model:

```php
//app\Models\Post.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
```

Edit the Post Factory definition method:

```php
//database\factories\PostFactory.php
public function definition()
{
    return [
        'title' => fake()->sentence(4),
        'content' => fake()->text()
    ];
}
```

Edit the DatabaseSeeder run method:

```php
//database\seeders\DatabaseSeeder.php
public function run()
{
    \App\Models\User::factory(10)->create();
    \App\Models\Post::factory(10)->create();
}
```

Run the migrate command:

```bash
php artisan migrate --seed
```

## Test

Create and write the Post Test:

```bash
php artisan pest:test PostsTest
```

You may delete these files: **tests\Unit\ExampleTest.php**,  **tests\Feature\ExampleTest.php**

The next thing we need to do is write our actual test:

```php
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(
        User::where('is_admin', true)->first()
    );
});

it('has posts page', function () {
    Livewire::test()->assertCanSeeTableRecords(
        Post::limit(10)->get()
    );
});

it('can create posts', function () {
    Livewire::test()->assertPageActionExists('create');
});

it('can edit posts', function () {
    Livewire::test()->assertTableActionExists('edit');
});

it('can delete posts', function () {
    Livewire::test()->assertTableActionExists('delete');
});

it('cannot view posts', function () {
    $this->actingAs(
        User::where('is_admin', false)->first()
    );

    Livewire::test()->assertStatus(403);
});

```

Now we need to run our test:

```bash
./vendor/bin/pest
```

![Example](https://raw.githubusercontent.com/leandrocfe/filament-tdd-example/master/screenshots/1.jpg)

Our test FAILED! Ok. What we will be doing in this step is to make our test pass.

## Resources

You can create an User Resource and a Post Resource:

```bash
php artisan make:filament-resource User --simple
php artisan make:filament-resource Post --simple
```

Edit the User Resource form/table methods:

```php
//app\Filament\Resources\UserResource.php
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

public static function form(Form $form): Form
{
    return $form
        ->schema([

            //name
            TextInput::make('name')
                ->required()
                ->maxLength(255),

            //email
            TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),

            //is_admin
            Toggle::make('is_admin')
                ->inline(false)
                ->required(),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([

            //name
            TextColumn::make('name'),

            //email
            TextColumn::make('email'),

            //is_admin
            ToggleColumn::make('is_admin'),

            //created_at
            TextColumn::make('created_at')
                ->dateTime('d/m/y H:i'),

            //modified_at
            TextColumn::make('updated_at')
                ->dateTime('d/m/y H:i'),
        ])
        ->filters([
            //
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

Edit the Post Resource form/table methods:

```php
//app\Filament\Resources\PostResource.php

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

public static function form(Form $form): Form
{
    return $form
        ->schema([

            //title
            TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->columnSpan(2),

            //content
            RichEditor::make('content')
                ->maxLength(65535)
                ->columnSpan(2),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([

            //title
            TextColumn::make('title'),

            //content
            TextColumn::make('content')
                ->limit(30),

            //created_at
            TextColumn::make('created_at')
                ->dateTime('d/m/y H:i'),

            //updated_at
            TextColumn::make('updated_at')
                ->dateTime('d/m/y H:i'),
        ])
        ->filters([
            //
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

Now we can pass to the Livewire test method the *ManagePosts* class as an argument:

```php
use App\Filament\Resources\PostResource\Pages\ManagePosts;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(
        User::where('is_admin', true)->first()
    );
});

it('has posts page', function () {
    Livewire::test(ManagePosts::class)->assertCanSeeTableRecords(
        Post::limit(10)->get()
    );
});

it('can create posts', function () {
    Livewire::test(ManagePosts::class)->assertPageActionExists('create');
});

it('can edit posts', function () {
    Livewire::test(ManagePosts::class)->assertTableActionExists('edit');
});

it('can delete posts', function () {
    Livewire::test(ManagePosts::class)->assertTableActionExists('delete');
});

it('cannot view posts', function () {
    $this->actingAs(
        User::where('is_admin', false)->first()
    );

    Livewire::test(ManagePosts::class)->assertStatus(403);
});
```

Now we need to run our test again:

```bash
./vendor/bin/pest
```

![Example](https://raw.githubusercontent.com/leandrocfe/filament-tdd-example/master/screenshots/2.jpg)

Our test Failed again but this time it says that it cannot assert that 403 is identical to 200. It's because only *admin users* can manage posts. You may create a policy to control this behavior.

## Policy

Create the Post Policy File:

```bash
php artisan make:policy PostPolicy --model=Post
```

Edit all methods to return $user->is_admin:

```php
public function viewAny(User $user)
{
    return $user->is_admin;
}

public function view(User $user, Post $post)
{
    return $user->is_admin;
}
...
```

Once that is done, we will re-run our test.

```bash
./vendor/bin/pest
```

![Example](https://raw.githubusercontent.com/leandrocfe/filament-tdd-example/master/screenshots/3.jpg)


**WELL DONE!** You have made the test pass.

You can download this project on GitHub: [leandrocfe/filament-tdd-example](https://github.com/leandrocfe/filament-tdd-example)
