---
title: How to improve table pagination performance
slug: danharrin-fast-table-pagination
author_slug: danharrin
publish_date: 2023-08-01
categories: [table-builder, integration]
type_slug: trick
---

You may use the [`hammerstone/fast-paginate`](https://github.com/hammerstonedev/fast-paginate) package. The theory for this feature can be found [here](https://aaronfrancis.com/2022/efficient-pagination-using-deferred-joins).

You need to override the `paginateTableQuery` method. This should be on your Livewire component class. If you're using a [panel resource](/docs/panels/resources/getting-started), the Livewire component is your List or Manage page (in the `/Pages` directory of the resource). If you're using a [panel relation manager](/docs/panels/resources/relation-managers), this class is the Livewire component.

```php
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
 
protected function paginateTableQuery(Builder $query): Paginator
{
    return $query->fastPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
}
```
