---
title: Navigating Filament Pages with Previous and Next Buttons
slug: navigating-filament-pages-with-previous-and-next-buttons
author_slug: leandrocfe
publish_date: 2024-05-01
categories: [livewire, panel-builder]
type_slug: article
---

![example](https://github.com/filament-br/infolist-example/blob/page-actions/screenshots/example-1.gif?raw=true)


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

```php
namespace App\Filament\Resources\Pages\Concerns;

use App\Filament\Resources\Actions\NextAction;
use App\Filament\Resources\Actions\PreviousAction;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\RestoreAction;
use Illuminate\Database\Eloquent\Model;

trait CanPaginateViewRecord
{
    protected function configureAction(Action $action): void
    {
        $this->configureActionRecord($action);

        match (true) {
            $action instanceof DeleteAction => $this->configureDeleteAction($action),
            $action instanceof EditAction => $this->configureEditAction($action),
            $action instanceof ForceDeleteAction => $this->configureForceDeleteAction($action),
            $action instanceof ReplicateAction => $this->configureReplicateAction($action),
            $action instanceof RestoreAction => $this->configureRestoreAction($action),

            //new actions
            $action instanceof PreviousAction => $this->configurePreviousAction($action),
            $action instanceof NextAction => $this->configureNextAction($action),
            
            default => null,
        };
    }

    protected function configurePreviousAction(Action $action): void
    {
        if ($this->getPreviousRecord()) {
            $action->url(fn (): string => static::getResource()::getUrl('view', ['record' => $this->getPreviousRecord()]));
        } else {
            $action
                ->disabled()
                ->color('gray');
        }
    }

    protected function configureNextAction(Action $action): void
    {
        if ($this->getNextRecord()) {
            $action->url(fn (): string => static::getResource()::getUrl('view', ['record' => $this->getNextRecord()]));
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
            PreviousAction::make(),
            NextAction::make(),
            Actions\EditAction::make(),
        ];
    }
}
```
## Conclusion

This project, including all the provided code, is available on [GitHub](https://github.com/filament-br/infolist-example/tree/page-actions).

![example](https://raw.githubusercontent.com/filament-br/infolist-example/page-actions/screenshots/example-1.png)

We hope you find this tutorial helpful in enhancing navigation within your Filament pages. Happy coding!