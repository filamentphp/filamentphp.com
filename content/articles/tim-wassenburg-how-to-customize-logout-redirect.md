---
title: How To Customize Logout Redirect
slug: tim-wassenburg-how-to-customize-logout-redirect
author_slug: tim-wassenburg
publish_date: 2023-10-07
categories: [general]
type_slug: trick
---

By default, when you logout from a Filament application, you will be redirected to the Filament login page. However, you may want to redirect to a different page after logout. For example, you may want to redirect to the homepage or to your own custom login page.

To do this, you can create a custom `LogoutResponse` class in `app\Http\Responses` that implements the `LogoutResponse` interface. This interface requires you to implement a `toResponse` method that returns a `RedirectResponse` instance.

```php
<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as Responsable;
use Illuminate\Http\RedirectResponse;

class LogoutResponse implements Responsable
{
    public function toResponse($request): RedirectResponse
    {
        // change this to your desired route
        return redirect()->route('home');
    }
}
```

Then, bind the `LogoutResponse` to the `LogoutResponseContract` in your `AppServiceProvider`:

```php
<?php

namespace App\Providers;

use App\Http\Responses\LogoutResponse;
use Illuminate\Support\ServiceProvider;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }
    
    ...
}
```

That's it! Now, when you logout, you will be redirected to the route you specified in the `LogoutResponse` class.