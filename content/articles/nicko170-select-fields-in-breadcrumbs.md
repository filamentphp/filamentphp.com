---
title: Using a Select Field in breadcrumbs
slug: nicko170-select-fields-in-breadcrumbs
author_slug: nicko170
publish_date: 2023-11-28
categories: [ panel-builder ]
type_slug: trick
---

## Introduction

![select-field-in-breadcrumb-sample](/images/content/articles/nicko170-select-fields-in-breadcrumbs/select-field-in-breadcrumb-sample.webp)

This is a quick tip on how to use `Select` fields in breadcrumbs. This is useful if you have parent-child relationships
in your data and want to provide an easy way to navigate between parent records while viewing a child page.

We will use a trait that gets applied to all Livewire pages that builds breadcrumbs based on the current page. The trait
provides a `current_breadcrumb` and `selected_breadcrumb` property that are used to navigate between records.

A `Htmlable` class is used to build the `Select` field. It creates a `Form` with a single `Select` field that is
populated by the Resource. The `Select` field is configured to redirect to the selected record when the value is
changed with a simple `wire:change` event.

## The Select Field

Create a class that implements `Illuminate\Contracts\Support\Htmlable` and returns a `Form` with a `Select` field.
Laravel will render this correctly in the breadcrumbs without needing to override any of the default breadcrumb views
from filament. The on change event uses the livewire properties from the trait to redirect to the selected record using
the `window.location.href` property.

```php
<?php

namespace App\Filament;

use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\Support\Htmlable;

class BreadcrumbSelect implements Htmlable
{
    private HasForms $livewire;
    private array $options = [];


    public static function make(): static
    {
        return app(static::class);
    }

    public function options(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function livewire(HasForms $livewire): static
    {
        $this->livewire = $livewire;

        return $this;
    }

    public function toHtml()
    {
        return Form::make($this->livewire)
            ->schema([
                Select::make('selected_breadcrumb')
                    ->extraAlpineAttributes([
                        'x-on:change' => "window.location.href = window.location.href.replace(\$wire.get('current_breadcrumb'), \$event.target.value);"
                    ])
                    ->disableOptionWhen(fn($value) => $value === data_get($this->livewire, 'current_breadcrumb'))
                    ->hiddenLabel()
                    ->native(false)
                    ->selectablePlaceholder(false)
                    ->searchable()
                    ->options($this->options),
            ])->render();
    }
}
```

## The Trait

The trait is applied to all Livewire pages and provides the `getBreadcrumbs` method that is used to build the
breadcrumbs
for the current page.

If you have child pages, you can add additional logic to the `getBreadcrumbs` method to build the breadcrumbs for them.

```php
<?php

namespace App\Traits;

use Exception;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;

trait CanHaveBreadcrumbsWithSelect
{
    public Model|int|string|null $parent = null;

    public ?string $selected_breadcrumb = null;
    public ?string $current_breadcrumb = null;

    public function getBreadcrumbs(): array
    {
        $breadcrumbs = [
            '/customers' => 'Customers'
        ];
        
        $resource = static::getResource();
        
        if (method_exists($resource, 'getBreadcrumbSelect')) {
            $this->selected_breadcrumb = $this->record->getKey();
            $this->current_breadcrumb = $this->record->getKey();
            $breadcrumbs['#'] = $resource::getBreadcrumbSelect($this);    
        } else {
            $breadcrumbs['#'] = $resource::getRecordTitle($this->record);
        }
        
        // Add any child page breadcrumb logic here if needed.
        return $breadcrumbs;
    }
}
```

## Cleaning up the breadcrumbs

By default, `Select` fields are quite large and will take up a lot of space in the breadcrumbs. We can fix this with a
little bit of CSS. The following CSS will reduce the size of the `Select` field to match the size of the other
breadcrumbs. We can also fix the cursor pointers on the `Select` field options - it's still rendered in anchor tags.

```scss
header nav.fi-breadcrumbs {
    .choices__inner {
        @apply pt-0 pb-0;
    }

    a:has(.fi-fo-component-ctn) {
        @apply cursor-default;

        .choices__item {
            @apply cursor-pointer
        }
    }
}
```

## Putting it all together

The following example shows how to use the `Select` field in a `Resource` class. The `getBreadcrumbSelect` method is
used to build the `Select` field and provide the required options.

### CustomerResource.php

```php

namespace App\Filament\Resources;

use App\Filament\BreadcrumbSelect;

class CustomerResource extends Resource {

    public static function getBreadcrumbSelect(Forms\Contracts\HasForms $livewire): Htmlable
    {
        return BreadcrumbSelect::make()
            ->livewire($livewire)
            ->options(Customer::query()->pluck('name', 'id')->toArray());
    }
    
}
```

### EditCustomer.php

```php
namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;

class EditCustomer extends CustomerResource\Pages\EditCustomer
{
    use \App\Traits\CanHaveBreadcrumbsWithSelect;
    
    protected static string $resource = CustomerResource::class;
}
```
