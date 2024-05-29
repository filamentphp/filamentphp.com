---
title: Make components globally translatable
slug: codewithdennis-make-components-globally-translatable
author_slug: codewithdennis
publish_date: 2024-05-29
categories: [general]
type_slug: trick
---

### Introduction

Translating components can often be a repetitive task, requiring you to individually add `translateLabel` or `__()` to each component. Fortunately, there's a neat trick to automate this process, making your components instantly translatable. By modifying your `AppServiceProvider.php`, you can apply a global translation configuration to all relevant components. Here's how to do it:

## AppServiceProvider
In this example we will make the following components translatable by default if you would like to add more components you can do so by adding them to the array
- **Filament\Forms\Components\Field**
- **Filament\Tables\Filters\BaseFilter**
- **Filament\Forms\Components\Placeholder**
- **Filament\Tables\Columns\Column**
- **Filament\Infolists\Components\Entry**

### Boot
Navigate to your `AppServiceProvider.php` file located in the `app/Providers` directory of your Laravel project and add the following to your boot method:
```php
foreach ([Field::class, BaseFilter::class, Placeholder::class, Column::class, Entry::class] as $component) {
    /* @var Configurable $component */
    $component::configureUsing(function (Component $translatable): void {
        $translatable->translateLabel();
    });
}
```

### Imports
Make sure you import the necessary classes at the top of your `AppServiceProvider.php` file:
```php
use Filament\Forms\Components\Placeholder;
use Filament\Support\Components\Component;
use Filament\Infolists\Components\Entry;
use Filament\Tables\Filters\BaseFilter;
use Filament\Forms\Components\Field;
use Filament\Tables\Columns\Column;
```

I hope this trick helps you save time and effort when translating components in your Laravel project. If you have any questions or need further assistance, feel free to reach out to me. Happy coding!