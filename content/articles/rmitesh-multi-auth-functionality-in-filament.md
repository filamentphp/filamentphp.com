---
title: Implement Multi-auth functionality in the Filament
slug: rmitesh-implement-multi-auth-functionality
author_slug: rmitesh
publish_date: 2023-09-24
categories: [panel-builder, general, laravel]
type_slug: article
---

The Filament v3 includes the Panel feature, allowing you to create an unlimited number of panels for your project. Additionally, it introduces the concept of Multi-auth functionality.

Implementing Multi-auth using guards is a straightforward process, following the same conventions as in Laravel. Let's get started with the creation of your model and the associated database migration:

### Creating the Model

Begin by generating a new model. For the purposes of this demo, I've created an `Employee` model with essential fields. We've customized the login system to use a combination of a username and password for authentication within the employee panel.

**Employee Table Schema:**

- name
- email
- username
- password

Once you've added these fields to your migration file, execute the `php artisan migrate` command. Afterward, open the `Employee.php` model file.

Extend the `Employee` model by inheriting from the `Authenticatable` class and implementing the `FilamentUser` interface. This will seamlessly integrate the necessary functionality into your `Employee` model.

```php
<?php

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable implements FilamentUser
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true; // you can add your own logic to access Employee users.
    }
}
```

Now, proceed by creating a new guard in the `config/auth.php` file.

```php
<?php

return [

    'guards' => [
        // ...

        'web:employees' => [
            'driver' => 'session',
            'provider' => 'employees',
        ],
    ],

    'providers' => [
        // ...
        
        'employees' => [
            'driver' => 'eloquent',
            'model' => App\Models\Employee::class,
        ],
    ],
];

```

> If you need to reset the password for the new guard, you can include the necessary details in the `passwords` section.

#### Creating a Filament Panel

Let's proceed to create a new Filament panel using the following command:

```bash
php artisan make:filament-panel Employee
```

This panel will be registered in the `app\Providers\Filament\EmployeePanelProvider.php` file.

Now, to implement authentication in your panel, you have the following options:

- `login()` - to add login functionality
- `registration()` - to add registration functionality
- `passwordReset()` - to add forgot password functionality
- `profile()` - to add profile functionality

For this guide, we'll focus on the `->login()` function. But before we delve into this aspect, let's create a login view and middleware.

#### Design a Custom Login Page

Continuing forward, let's design a custom login page by generating a new Filament page specifically for login:

```bash
php artisan make:filament-page Auth/Login
```

When prompted, select the `Employee` panel as the target.

```php
<?php

namespace App\Filament\Employee\Pages\Auth;

use App\Models\Employee;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Models\Contracts\FilamentUser;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\SimplePage;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;

class Login extends SimplePage implements HasForms
{
    use InteractsWithForms, InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.employee.pages.auth.login';

    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $this->form->fill();
    }

    public function getTitle(): string | Htmlable
    {
        return __('filament-panels::pages/auth/login.title');
    }

    public function getHeading(): string | Htmlable
    {
        return __('filament-panels::pages/auth/login.heading');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->autocomplete()
                    ->autofocus()
                    ->required()
                    ->extraInputAttributes(['tabindex' => 1]),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->autocomplete('current-password')
                    ->extraInputAttributes(['tabindex' => 2]),

                Forms\Components\Checkbox::make('remember')
                    ->label(__('filament-panels::pages/auth/login.form.remember.label'))
            ])
            ->statePath('data')
            ->model(Employee::class);
    }

    /**
     * @return array<Action | ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            $this->getAuthenticateFormAction(),
        ];
    }

    protected function getAuthenticateFormAction(): Action
    {
        return Action::make('authenticate')
            ->label(__('filament-panels::pages/auth/login.form.actions.authenticate.label'))
            ->submit('authenticate');
    }

    protected function hasFullWidthFormActions(): bool
    {
        return true;
    }

    public function authenticate()
    {
        $data = $this->form->getState();

        if (! Filament::auth()->attempt($this->getCredentialsFromFormData($data), $data['remember'] ?? false)) {
            $this->throwFailureValidationException();
        }

        $user = Filament::auth()->user();
        if (
            ($user instanceof Employee && $user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            Filament::auth()->logout();

            $this->throwFailureValidationException();
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'username' => $data['username'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.username' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }
}
```

and in the view file

```html
<x-filament-panels::page.simple>
    
    {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.before') }}

    <x-filament-panels::form wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.after') }}
</x-filament-panels::page.simple>

```

#### Creating Middleware

To restrict access exclusively to Employee users using the `web:employees` guard, we'll create a dedicated middleware for this purpose. This can be achieved with the following command:

```bash
php artisan make:middleware EmployeeAuthenticate
```

Within the created middleware, include the following content:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeAuthenticate extends Middleware
{
    /**
     * @param  array<string>  $guards
     */
    protected function authenticate($request, array $guards): void
    {
        $guard = Filament::auth();

        if (! $guard->check()) {
            $this->unauthenticated($request, $guards);

            return;
        }

        $this->auth->shouldUse(Filament::getAuthGuard());

        /** @var Model $user */
        $user = $guard->user();

        $panel = Filament::getCurrentPanel();

        abort_if(
            $user instanceof FilamentUser ?
                (! $user->canAccessPanel($panel)) :
                (config('app.env') !== 'local'),
            403,
        );
    }

    protected function redirectTo($request): ?string
    {
        return Filament::getLoginUrl();
    }
}
```

Finally, let's bring everything together and integrate it into the `EmployeePanelProvider.php` file.

```php

namespace App\Providers\Filament;

use App\Http\Middleware\EmployeeAuthenticate;
use App\Filament\Employee\Pages\Auth\Login;

class EmployeePanelProvider extends PanelProvider
{
	public function panel(Panel $panel): Panel
	{
		return $panel
		    ->id('employee')
		    ->path('employee')
		    ->login(Login::class) // Custom login page
		    ->authGuard('web:employees')
		    ->authMiddleware([
                EmployeeAuthenticate::class,
            ]);
	}
}
```

Congratulations! 🍾 you have implemented multi-auth functionality using guard.
