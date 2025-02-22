---
title: Navigating Filament Pages with Previous and Next Buttons
slug: leandrocfe-navigating-filament-pages-with-previous-and-next-buttons
author_slug: leandrocfe
publish_date: 2024-07-26
categories: [livewire, panel-builder]
type_slug: article
---

![Example](https://github.com/leandrocfe/article-fi-page-nav/blob/d36b3b7225adaace0aeb386455f6f1420f16f3d8/screenshots/example.gif?raw=true)


## Introduction

In this article, we will delve into the process of crafting previous and next navigation buttons within Filament pages. These buttons, designed as Filament Header Actions, can seamlessly navigate through ViewPages and EditPages.

## Implementing New Actions

To kick things off, we need to introduce two new actions: PreviousAction and NextAction. These actions will reside in the `app/Filament/Resources/Actions` folder.

**PreviousAction.php**

```php
//app/Filament/Resources/Actions/PreviousAction.php
namespace App\Filament\Resources\Actions;

use Filament\Actions\Action;

class PreviousAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'previous';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel()
            ->icon('heroicon-o-arrow-left')
            ->outlined()
            ->tooltip("Previous {$this->getRecordTitle()}");
    }
}
```

**NextAction.php**

```php
//app/Filament/Resources/Actions/NextAction.php
namespace App\Filament\Resources\Actions;

use Filament\Actions\Action;

class NextAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'next';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel()
            ->icon('heroicon-o-arrow-right')
            ->outlined()
            ->tooltip("Next {$this->getRecordTitle()}");
    }
}
```

## Configuring Actions in Pages

Next, we extend the capabilities of the ViewRecord and EditRecord classes by adding a `CanPaginateViewRecord` trait. This trait, residing in the `app/Filament/Resources/Pages/Concerns` folder, configures actions for pagination and provides methods to retrieve previous and next records based on the current record.

```bash
# Laravel 11 and higher
php artisan make:trait Filament/Resources/Pages/Concerns/CanPaginateViewRecord

# Laravel 10 create it manually
```

```php
namespace App\Filament\Resources\Pages\Concerns;

use App\Filament\Resources\Actions\NextAction;
use App\Filament\Resources\Actions\PreviousAction;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

trait CanPaginateViewRecord
{
    protected function configureAction(Action $action): void
    {
        $this->configureActionRecord($action);

        match (true) {
            $action instanceof PreviousAction => $this->configurePreviousAction($action),
            $action instanceof NextAction => $this->configureNextAction($action),
            default => parent::configureAction($action),
        };
    }

    protected function configurePreviousAction(Action $action): void
    {
        if ($this->getPreviousRecord()) {
            $action->url(fn (): string => static::getResource()::getUrl(static::getResourcePageName(), ['record' => $this->getPreviousRecord()]));
        } else {
            $action
                ->disabled()
                ->color('gray');
        }
    }

    protected function configureNextAction(Action $action): void
    {
        if ($this->getNextRecord()) {
            $action->url(fn (): string => static::getResource()::getUrl(static::getResourcePageName(), ['record' => $this->getNextRecord()]));
        } else {
            $action
                ->disabled()
                ->color('gray');
        }
    }

    protected function getPreviousRecord(): ?Model
    {
        return $this
            ->getRecord()
            ->where('id', '<', $this->getRecord()->id)
            ->orderBy('id', 'desc')
            ->first();
    }

    protected function getNextRecord(): ?Model
    {
        return $this
            ->getRecord()
            ->where('id', '>', $this->getRecord()->id)
            ->orderBy('id', 'asc')
            ->first();
    }
}
```

> **_NOTE:_** In this example, we use auto-incrementing IDs for the tables. If your tables are configured differently, you’ll need to adjust the `getPreviousRecord` and `getNextRecord` methods accordingly.

## Usage Example

Now, let's implement these actions in the **ViewRecord** and **EditRecord** pages. By including the `CanPaginateViewRecord` trait and registering the actions in the `getHeaderActions` array, you can enable previous and next navigation buttons. Below is an example using the ViewPost page:

```php
namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\Actions\NextAction;
use App\Filament\Resources\Actions\PreviousAction;
use App\Filament\Resources\Pages\Concerns\CanPaginateViewRecord;
use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPost extends ViewRecord
{
    use CanPaginateViewRecord;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            PreviousAction::make(),
            NextAction::make(),
        ];
    }
}
```
## Conclusion

This project, including all the provided code, is available on [GitHub](https://github.com/leandrocfe/article-fi-page-nav).

We hope you find this tutorial helpful in enhancing navigation within your Filament pages. Happy coding!
