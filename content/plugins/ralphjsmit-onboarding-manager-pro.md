---
name: Onboarding Manager Pro
slug: ralphjsmit-onboarding-manager-pro
anystack_id: e543d70c-bd28-4d99-9fda-d5356878789c
author_slug: ralphjsmit
categories: [panel-builder, widget]
description: Beautiful onboarding experiences for Filament Admin.
discord_url: https://discord.com/channels/883083792112300104/993463038357274635
github_repository: ralphjsmit/laravel-filament-onboard
has_dark_theme: true
has_translations: true
image: ralphjsmit-onboarding-manager-pro.jpg
versions: [2, 3]
---

This package allows you to design beautiful and fully integrated onboarding experiences for Filament Admin. Make it painless for your users to start using your app or SaaS and prevent them from dropping off. The package provides easy syntax inspired by the [Spatie's and Caleb Porzio's Laravel Onboard](https://github.com/laravel-onboard).

### Features

- Prevent users from accessing Filament without first completing required parts of your onboarding.
- Add optional onboarding steps with the beautiful dashboard widget.
- Guide your users through one or multiple [wizards](https://filamentphp.com/docs/2.x/forms/layout#wizard).💫
- Redirect users to links (e.g. for an OAuth-process) or guide them through a multi-step wizard.
- Beautiful design & integration with Filament Admin.
- Advanced widget design with native support for columns and column spans.
- Support for dark mode. 🌚
- Can be easily translated with a language file.
  – Redirect to custom route after completing onboard flow.

[**View changelog**](https://changelog.anystack.sh/filament-onboarding-manager-pro)

### Screenshots

#### OAuth flow

You redirect users to a link. This is very handy for authorizing OAuth flows. Without completing this step, you users will not be able to access the dashboard.

![Filament Onboarding outside admin panel with OAuth flow](https://ralphjsmit.com/storage/media/174/FilamentOnboardingPro-Link.png)

#### Wizard

You can require users to complete one or multiple forms in a wizard. This is very useful for creating records and collecting required information. Your users will not be able to access the dashboard before completing the wizard either.

![Filament Onboarding with wizard](https://ralphjsmit.com/storage/media/181/FilamentOnboardingPro-Wizard--1.png)

![Filament Onboarding with large wizard](https://ralphjsmit.com/storage/media/184/FilamentOnboardingPro-Wizard--2.png)

#### Widget (simple design)

You can use the dashboard widget to nudge your users into completing certain steps. In this phase, your users will already have access to the dashboard.

![Filament Optional onboarding with widget (simple design)](https://ralphjsmit.com/storage/media/182/FilamentOnboardingPro-Widget-Simple--2.png)

#### Widget (advanced design)

The widget is responsive and you can create very advanced designs with it. It uses the same technique as the native [Grid](https://filamentphp.com/docs/2.x/forms/layout#grid) component in Filament.

![Filament Optional onboarding with widget (advanced design)](https://ralphjsmit.com/storage/media/177/FilamentOnboardingPro-Widget-Advanced--1.png)

#### Widget (compact design, less space between widgets)

There is also an option to reduce the space between the cards in the widget if that looks better to you:

![Filament Optional onboarding with widget (advanced compact design)](https://ralphjsmit.com/storage/media/178/FilamentOnboardingPro-Widget-Advanced--2.png)

#### Dark mode

There's also full support for a gorgeous dark mode:

![Filament Onboarding with dark mode](https://ralphjsmit.com/storage/media/175/FilamentOnboardingPro-Link-Dark.png)

![Filament Onboarding with dark mode for wizard](https://ralphjsmit.com/storage/media/179/FilamentOnboardingPro-Widget-Dark.png)

![Filament Onboarding with dark mode for widget](https://ralphjsmit.com/storage/media/183/FilamentOnboardingPro-Wizard-Dark.png)

#### Custom theme

The plugin integrates with any custom theme and of course the default theme. Here's an example of how the widget looks on the default theme:

![Filament Onboarding widget with default theme](https://ralphjsmit.com/storage/media/185/FilamentOnboardingPro-Default-Theme.png)

<br><br>

# Installation guide: Beautiful onboarding experiences with Filament Admin

Thank you for purchasing the Onboarding Manager Pro plugin for Filament Admin!

We tried to make the library as **easy-to-install** and **versatile** as possible. Nevertheless, if you still have a **question or a feature request**, please send an e-mail to **support@ralphjsmit.com**.

In this guide I'll show you **how to install the library**, so you **can start using it right away**.

## Installation

### Prerequisites

For these installation instructions to work, you'll need to have the [Filament Admin](https://filament-admin.com) package installed and configured.

The package is supported on both Laravel 8 and 9. Please be aware though that support for security fixes for Laravel 8 ends within a few months.

### Installation via Composer

To install the package you should add the package to your `composer.json` file in the `repositories` key:

```json
{
    "repositories": [
        {
            "type": "composer",
            "url": "https://filament-onboarding-manager-pro.composer.sh"
        }
    ]
}

```

Next, you should require the package via the command line. You will be prompted for your username (which is your e-mail) and your password (which is your license key plus a colon ':' + the domain on which you activated it, e.g. `8c21df8f-6273-4932-b4ba-8bcc723ef500:mydomain.com`).

```shell
composer require ralphjsmit/laravel-filament-onboard
```

After purchasing the plugin, you'll also be shown installation instructions with the appropriate credentials pre-filled.

Optionally, you can publish the config file.

```shell
php artisan vendor:publish --tag="filament-onboard-config"
```

### Custom themes

If you're using a [custom theme](https://filamentphp.com/docs/2.x/admin/appearance#building-themes), you'll need to instruct Tailwind to also purge the view-files for the plugin. Add the following key to the `content` key of your `tailwind.config.js` file:

```js
content: [
    // Your other files
    './vendor/ralphjsmit/laravel-filament-onboard/resources/**/*.blade.php'
],
```

Next, you'll also need to disable the loading of our default stylesheet, because we don't want to load unnecessary CSS. Set the `filament-onboard.register.default_css` to `false`.

## Usage

Configuring your onboarding is very simple. First, I'll show you how to configure the widget. Next, I'll show you how to prevent users from accessing the dashboard without completing certain onboarding and how to make wizards

### Technical details

It might be handy to know a little bit about how the package works. Two important concepts here are **tracks** and **steps**. Each track is a series of steps that a user has to complete. Your application typically has one or two tracks: one track for outside the admin panel and one track for the widget.

You can determine yourself using a closure when a step is viewed as "complete". If all steps in a track are complete, the track is deemed complete as well.

### Creating a track

The best place to create a track is in the `boot()` method of a service provider. You can use the `AppServiceProvider` for that, but it might be useful to create a separate `OnboardServiceProvider` that contains all the onboarding logic. There is no direct benefit, but it keeps your service providers clean and simple.

Create a track using the `Onboard::addTrack()` or `Onboard::make()->addTrack()` method. You should wrap all the logic in the `Filament::serving()` closure.

```php
use Filament\Facades\Filament;
use RalphJSmit\Filament\Onboard\Facades\Onboard;

public function boot(): void
{
    Filament::serving(function() {
        Onboard::addTrack(/** Your steps */)
    });
}
```

### Adding steps to a track

Next, you can **add steps** to a track by adding an array with steps. Create a single step by using the `Onboard::addStep()` method.

When using the admin widget, each step is represented by a nice card (see the images above).

The `Onboard::addStep()` method accepts two parameters:

1. The name of the step. This name is displayed to the user.
2. A unique identifier for the step. This identifier should be a string and is unique in your complete application.

```php
Onboard::addTrack([
    Onboard::addStep(name: 'Connect Notion', identifier: 'widget::connect-notion')
        /** Other configuration for the step... */
])
```

#### Adding a description

You can add a description for the step by adding the `->description()` method:

```php
Onboard::addStep(name: 'Connect Notion', identifier: 'widget::connect-notion')
    ->description('Sign in with Notion and grant access to your workspace.')
```

#### Adding an icon

You can add an icon to the step by using the `->icon()` method:

```php
Onboard::addStep(name: 'Connect Notion', identifier: 'widget::connect-notion')
    ->icon('heroicon-o-check-circle')
```

#### Adding a link

You can use the `->link()` method to add a link to the step. This link will be displayed to the user. You can use this to redirect to an OAuth provider or to a specific page in the dashboard:

```php
Onboard::addStep(name: 'Connect Notion', identifier: 'widget::connect-notion')
    ->link('Add workspace →', route('callbacks.notion.authorize'), shouldOpenInNewTab: true)
```

#### Determining if a step is complete

You can use the `->completeIf()` method to specify a closure that will determine whether this step is complete. This closure should return a boolean:

```php
Onboard::addStep(name: 'Connect Notion', identifier: 'widget::connect-notion')
    ->completeIf(fn () => auth()->user()->workspaces()->exists())
```

#### Adding a column span

You can use the `->columnSpan()` method to specify how many columns wide the card should be. You can use the `Onboard::addTrack(/** Your steps */)->columns(/** Nr of columns */)` to specify how many columns there should be in total.

You can even use an array to make the design responsive. It uses the same technique as the native [Grid](https://filamentphp.com/docs/2.x/forms/layout#grid), so you can use the same techniques here.

```php
Onboard::make()
    ->addTrack([
        Onboard::addStep(/** */)
            ->columnSpan(['default' => 1, 'md' => 1, 'lg' => 2, ])
        // Other steps..
    ])
    ->columns(['default' => 1, 'md' => 3, 'lg' => 6, ])
```

Cards will automatically wrap to the next row.

The final result might look something like this:

```php
use Filament\Facades\Filament;
use RalphJSmit\Filament\Onboard\Facades\Onboard;

public function boot(): void
{
    Filament::serving(function() {
        Onboard::addTrack([
            Onboard::addStep(name: 'Connect Notion', identifier: 'widget::connect-notion')
                ->description('Sign in with Notion and grant access to your workspace.')
                ->icon('heroicon-o-check-circle')
                ->link('Add workspace →', route('callbacks.notion.authorize'))
                ->completeIf(fn () => auth()->user()->workspaces()->exists())
                ->columnSpan(1),
            // Other steps
            // Onboard::addStep(/** */)...
            // Onboard::addStep(/** */)...
        ])->columns(3)
    });
}
```

#### Display the widget more compact

You can chain the `->compact()` method to the track that you created in order to make the design more compact.

### Using the widget

Now that we have defined our steps, we can register the widget class to use on the dashboard. You can also use the widget on resources and pages.

The widget class is `RalphJSmit\Filament\Onboard\Widgets\OnboardTrackWidget`.

You can register the widget by adding it to the `filament.widgets.register` config, or you can register it via a service provider.

Now your widget should be visible on the dashboard!

### Preventing users from accessing the dashboard

The package also provides easy functionality to prevent the users from accessing the dashboard. In order to force a user to complete a track, you can chain the `->completeBeforeAccess()` to the track:

```php
Onboard::make()
    ->addTrack([
        Onboard::addStep(name: 'Connect Notion', identifier: 'widget::connect-notion')
            ->description('Sign in with Notion and grant access to your workspace.')
            ->icon('heroicon-o-check-circle')
            ->link('Add workspace →', route('callbacks.notion.authorize'))
            ->completeIf(fn () => auth()->user()->workspaces()->exists())
            ->columnSpan(1),
        // Other steps
        // Onboard::addStep(/** */)...
        // Onboard::addStep(/** */)...
    ])
    ->completeBeforeAccess()
```

Next, you should register a middleware. Open your `filament` config and add the `\RalphJSmit\Filament\Onboard\Http\Middleware\OnboardMiddleware` class to the `filament.middleware.auth` key:

```php
use RalphJSmit\Filament\Onboard\Http\Middleware\OnboardMiddleware;

'middleware' => [
    'auth' => [
        Authenticate::class,
        OnboardMiddleware::class, // Add here.
    ],
    'base' => [
        // ...
    ],
],
```

Now, whenever a user visits a page and there is still a track with uncompleted steps, they will be automatically redirected to a page where they can complete that step.

#### Custom url when completing before access (NEW)

By default, this page will have the url path "/filament/onboard". You can change this url by updating the `filament-onboard.prefix` config to use a different path prefix:

```php
// This is the route prefix that will be used for the route(s) in the package.
// Currently, there is only one route, but this prefix would also be used for
// new routes if new routes would ever be added.
'prefix' => 'filament/onboard',
```

#### Forcing a user to visit a link

If you want your users to visit a link, e.g. for an OAuth app, you can use the exact same syntax as described earlier, without any changes.

#### Adding wizards

If you want your user to complete a wizard, you can use the `->wizard(/** Your wizard steps */)` method:

```php
use Filament\Forms\Components\TextInput;use Filament\Forms\Components\Wizard\Step;

Onboard::addStep('Your title', 'onboard::unique-identifier')
    ->wizard([
        Step::make("Your label")
            ->statePath('step_1') // It is recommended to keep the form data in a separate array key for each step. 
            ->schema([
                TextInput::make('name')
                    ->required(),
                Select::make('plan_id')
                    ->options([
                        'default' => 'Regular',
                        'pro' => 'Pro',
                        'unlimited' => 'Unlimited'
                    ])
                    ->required(),
                // More components...
            ])    
            // More steps...
    ])
```

For all the `Step` configuration options (adding an icon and description), see the [Filament documentation](https://filamentphp.com/docs/2.x/forms/layout#wizard).

#### Pre-filling the wizard form with data

You can use the `->wizardFillFormUsing()` method to specify data that will be pre-filled into the form. For example, this is useful if you want to retrieve information about an existing record.

```php
Onboard::addStep('Your title', 'onboard::unique-identifier')
    ->wizard([
        Step::make("Your label")
            ->statePath('step_1') // It is recommended to keep the form data separate for each step.
            ->schema([
                TextInput::make('name')
                    ->required(),
                // ...
            ])
            // ...
    ]) 
    ->wizardFillFormUsing(function() {
        return [
            'step_1' => [
                'name' => auth()->user()->name,
                // ...
            ],
            'step_2' => [
                // ...
            ]
        ];
    })         
```

#### Saving the data on form submit

You can use the `->wizardSubmitFormUsing()` method to pass a closure that will be executed when a user submits a form. The closure receives two parameters:

1. `array $state`. An array of the submitted form data. The data is already validated.
2. `\RalphJSmit\Filament\Onboard\Http\Livewire\Wizard $livewire`. The Livewire component that is used to render the wizard.

You can omit one of the parameters if you don't need it, but make sure to always use the parameter names `$state` and `$livewire`. Dependency injection is also supported.

Usually you will use this closure to save the data and then redirect. It is handy to redirect the user to the `filament.pages.dashboard` route, because if there are no steps left, the user will be redirected to the dashboard. And if there still are steps to complete, the middleware will automatically pick that up and redirect the user to the next step.

```php
Onboard::addStep('Your title', 'onboard::unique-identifier')
    ->wizard([
        Step::make("Your label")
            ->statePath('step_1') // It is recommended to keep the form data separate for each step.
            ->schema([
                TextInput::make('name')
                    ->required(),
                // ...
            ])
            // ...
    ])
    ->wizardFillFormUsing(function() {
        // ...
    })
    ->wizardSubmitFormUsing(function(array $state, \RalphJSmit\Filament\Onboard\Http\Livewire\Wizard $livewire) {
        auth()->user()->update($state['step_1']);
        // ...
        
        $livewire->redirectRoute('filament.pages.dashboard');
    })))         
```

#### Customizing the Wizard "submit" button

You can customize the "submit" button in the wizard by using the `->wizardSubmitButton("Your label")` method.

#### Marking the wizard as completed

Don't forget the use the `->completeIf()` method to specify when the wizardstep has been completed. Otherwise your users might be locked into the wizard forever.

```php
->completeIf(fn () => user()->plan_id !== null)
```

#### Changing the card width

You can use the `->cardWidth()` method to specify how wide the link or wizard should be rendered.

Possible values are: `xs`, `sm`, `md`, `lg`, `xl`, `2xl`, `3xl`, `4xl`, `5xl`, `6xl`, `7xl`.

### Customizing the redirect

By default, the package redirects the user to the admin dashboard after successfully completing the onboarding flow. However, you may customize the route that it used in the `filament-onboard.redirect-route` config.

> Make sure to add a *route* and not a url. Inputting a url won't work, only routes do.

```php
'redirect-route' => 'filament.resources.organisations.index',
```

### Advanced complete onboarding example

Below you can find a complete and more advanced onboarding example. This example is also used in the application from the [screenshots](#screenshots) above.

The below code is used to generate the cards in the onboarding widget:

```php
Onboard::addTrack([
    Onboard::addStep('Create list', 'widget::create-list')
        ->description("Create a list to gather your subscribers.")
        ->link('Add workspace →', route('callbacks.notion.authorize'))
        ->icon('tabler-list-check')
        ->columnSpan(2)
        ->completeIf(fn () => auth()->user()->workspaces()->exists()),
    Onboard::addStep('Connect Notion', 'widget::connect-notion')
        ->description("Sign in with Notion and grant access to your workspace.")
        ->link('Add workspace →', route('callbacks.notion.authorize'))
        ->icon('tabler-brand-notion')
        ->columnSpan(2)
        ->completeIf(fn () => auth()->user()->workspaces()->exists()),
    Onboard::addStep('Embed form on site', 'widget::embed-form')
        ->description("Collect subscribers via the form or API. Or import subscribers from other software.")
        ->link('Copy code', '#')
        ->icon('tabler-code')
        ->columnSpan(3)
        ->completeIf(fn () => auth()->user()->copied_embed_form !== null),
    Onboard::addStep('Tweak the design', 'widget::tweak-design')
        ->description("Make your newsletter completely personal.")
        ->link('Create a new design', '#')
        ->icon('tabler-color-swatch')
        ->columnSpan(3)
        ->completeIf(fn () => auth()->user()->designs->first->created_at->lt(auth()->user()->designs->first->updated_at)),
    Onboard::addStep('Send newsletters', 'widget::send-newsletters')
        ->description("Enjoy the stellar Notion writing experience and send beautifully-designed newsletters!")
        ->icon('tabler-send')
        ->columnSpan(4)
        ->completeIf(fn () => auth()->user()->created_at->lt(now()->subWeek(2))),
])->columns(7)->compact(false);
```

The below code is used for the onboarding part outside the admin panel:

```php
Onboard::make()
    ->addTrack([
        Onboard::addStep('Connect to Notion', 'onboard::connect-notion')
            ->description('Click the button below to give Newsly access to your workspace')
            ->link('Add workspace →', route('callbacks.notion.authorize'))
            ->icon('tabler-brand-notion')
            ->completeIf(fn () => user()->workspaces()->exists()),
        Onboard::addStep('Create email list', 'onboard::create-email-list')
            ->wizard([
                Step::make("Create list")
                    ->icon('tabler-list-check')
                    ->statePath('list')
                    ->schema([
                        TextInput::make('name')
                            ->columnSpan(2)
                            ->label("List name")
                            ->reactive()
                            ->required(),
                        TextInput::make('slug')
                            ->columnSpan(2)
                            ->helperText('NB.: Changing the slug will also change the URL of your subscribe page.')
                            ->required(),
                    ]),
                Step::make("Configure design")
                    ->icon('tabler-color-swatch')
                    ->statePath('design')
                    ->schema(DesignResource::form(Form::make())->getSchema()),
            ])
            ->wizardFillFormUsing(fn () => [
                'list' => [
                    'name' => auth()->user()->defaultList?->name,
                    'slug' => auth()->user()->defaultList?->slug,
                ],
                'design' => [
                    'user_id' => auth()->id(),
                    'name' => 'Main design',
                    'accent_color' => '#666EE8',
                    'brand_color' => '#FFFFFF',
                    'accent_color_text' => 'light',
                    'font_family' => 'sans',
                ],
            ])
            ->wizardSubmitFormUsing(function (array $state, \RalphJSmit\Filament\Onboard\Http\Livewire\Wizard $livewire) {
                auth()->user()->defaultList->update($state['list'] ?? []);

                $design = auth()->user()->designs()->create($state['design'] ?? []);

                $livewire->redirectRoute('filament.pages.dashboard');
            })
            ->wizardSubmitButton('Submit')
            ->completeIf(fn () => user()->designs()->exists())
            ->cardWidth('2xl'),
    ])
    ->completeBeforeAccess();`
```


## Support

If you have a question, bug or feature request, please e-mail me at support@ralphjsmit.com or tag @ralphjsmit on [#onboarding-manager-pro](https://discord.com/channels/883083792112300104/993463038357274635) on Discord. Love to hear from you!

🙋‍♂️ [Ralph J. Smit](https://ralphjsmit.com)
