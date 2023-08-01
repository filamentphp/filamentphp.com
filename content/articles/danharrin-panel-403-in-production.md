---
title: Why is my panel showing a 403 error in production?
slug: danharrin-panel-403-in-production
author_slug: danharrin
publish_date: 2023-08-01
categories: [panel-builder]
type_slug: trick
---

If you've deployed your Filament admin panel to a non-local environment, and you're receiving `403 Forbidden` errors when you try to access it, it's likely that you've forgotten to set up your `User` model to access Filament.

You must implement the `FilamentUser` contract:

```php
<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    // ...

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }
}
```

The `canAccessPanel()` method returns `true` or `false` depending on whether the user is allowed to access the `$panel`. In this example, we check if the user's email ends with `@yourdomain.com` and if they have verified their email address.

> You can find this information in the [documentation](https://filamentphp.com/docs/panels/users#authorizing-access-to-the-panel).
