---
title: How to use Laravel Scout on Table Builder
slug: francoism90-laravel-scout-table-builder
author_slug: francoism90
publish_date: 2023-09-10
categories: [table-builder, integration]
type_slug: trick
---

While Filament doesn't provide a direct integration with [Laravel Scout](https://laravel.com/docs/scout), it is still possible to add custom support for this.

The most friendly solution, is to create a custom trait, so the same logic can be reused on other resources:

```php
namespace App\Filament\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait InteractsWithScout
{
    protected function applySearchToTableQuery(Builder $query): Builder
    {
        $this->applyColumnSearchesToTableQuery($query);

        $search = $this->getTableSearch();

        if (blank($search)) {
            return $query;
        }

        $keys = $this->getModel()::search($search)->keys();

        return $query
            ->whereIn('id', $keys)
            ->when(blank($this->getTableSortColumn()), fn (Builder $query) => $query
                ->orderByRaw('FIND_IN_SET (id, ?)', [$keys->implode(',')])
            );
    }
}

```

The `applyColumnSearchesToTableQuery()` method ensures that searching individual columns will still work.
You can replace that method with your own implementation if you want to use Laravel Scout for those search inputs as well.

To apply Laravel Scout on a resource, implement the `InteractsWithScout` trait on the `ListRecords` page:

```php
use App\Filament\Concerns\InteractsWithScout;

class ListBooks extends ListRecords
{
    use InteractsWithScout;
}
```
