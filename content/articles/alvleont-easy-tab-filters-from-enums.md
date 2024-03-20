---
title: Easy Tab Filters from Enums
slug: alvleont-easy-tab-filters-from-enums
author_slug: alvleont
publish_date: 2024-02-05
categories: [panel-builder]
type_slug: trick
---

There's a very interesting functionality within FilamentPHP that allows us to generate tabs at the top of the website for different states or types of records we have in our model, which is well-documented here ([Using Tabs to Filter the Records](https://filamentphp.com/docs/3.x/panels/resources/listing-records#using-tabs-to-filter-the-records)). One of the things that newer versions of PHP bring is enums, a type of class that can have cases and that for Filament allows extending some functionalities. Again, this is well-documented here ([Enums](https://filamentphp.com/docs/3.x/support/enums)).

It's very common for our filters to be similar among records if we're using the same enum, for example, for Status. That's why it would be very useful to create a trait that allows adding a method to enums that can then be reused in all scenarios where that enum is used. Below is an approach to what was explained:

1. Created a trait in `App\Traits\HasEnumFilters.php`, which has the following content:

```php
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

trait HasEnumFilters
{
    public static function getFilters(string $model, string $field): ?array
    {

        $filters = ['all' => Tab::make()
            ->label(__('ofi.all'))];
        $cases = self::cases();
        foreach ($cases as $case) {
            $filters[$case->name] = Tab::make($case->name)
                ->label($case->getLabel())
                ->modifyQueryUsing(fn (Builder $query) => $query->where($field, $case->value))
                ->badge(app($model)->where($field, $case->value)->count())
                ->badgeColor($case->getColor());
        }
        return $filters;
    }
}
```

This trait will attempt to create filters for the possible cases in the Enum along with their labels and colors (if any).

2. Added the trait to an Enum, in this case, I had a simple status system for my project, which was created in App\Enums\SimpleStatus.php, and it looks like this:
php


```php
namespace App\Enums;

use App\Traits\HasEnumFilters;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SimpleStatus: string implements HasColor, HasLabel
{

    use HasEnumFilters;

    case Draft = 'draft';
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Obsolete = 'obsolete';

    public function getLabel(): string
    {
        return __('ofi.simple_status_' . $this->name);
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Approved => 'success',
            self::Rejected => 'danger',
            self::Obsolete => 'secondary',
            default => 'primary',
        };
    }
}
```

As you can see, all that is done is using the trait within the file.

3. Using the filters in the List class of the resource. In this case, I'm not going to place a URL because the paths to the List.php files of each resource vary depending on the developer. However, what I will put is how the trait is resolved within it, which basically resolves like this:

```php
 public function getTabs(): array
    {
        return SimpleStatus::getFilters($this->getModel(), 'status');
    }
```

This way, I get the filters in the Tabs, without the need to rewrite the same code in many places, just changing the corresponding column and enum to be used.
