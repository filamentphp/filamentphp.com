---
title: How to Close Navigation Groups by Default
slug: mostafa-hassan-how-to-close-navigation-groups-by-default
author_slug: mostafa-hassan
publish_date: 2023-11-26
categories: [ panel-builder]
type_slug: article
---


## Introduction

In this article, we will explore how to set navigation groups to be closed by default to achieve a simpler appearance for the sidebar.

## How To

In your AppServiceProvider's boot function add this code

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::serving(fn () => $this->addFilamentHooks());
    }
    
    private function addFilamentHooks(){
         FilamentView::registerRenderHook(
            'panels::body.end',
            fn (): string => <<<'HTML'
                <div x-data="" x-init="
                const menuItems = ['Group1','Group2','Group3','Group4'] 
                const activeSidebarItem = document.querySelector('.fi-sidebar-item-active')
                let activeDataGroupLabel = null

                if (activeSidebarItem) {
                        let parentElement = activeSidebarItem.parentElement;

                    while (parentElement) {
                        if (parentElement.tagName === 'LI' && parentElement.hasAttribute('data-group-label')) {
                            activeDataGroupLabel = parentElement.getAttribute('data-group-label');
                            break;
                        }

                        parentElement = parentElement.parentElement;
                    }
                 }
                menuItems.forEach(collapseMenu)
                function collapseMenu(label){
                    if(!$store.sidebar.groupIsCollapsed(label) && label != activeDataGroupLabel)
                      $store.sidebar.toggleCollapsedGroup(label)
                }
                "></div>
            HTML
        );
    }
    ...
}
```

Replace "Group1," "Group2," "Group3" with your actual navigation group names. If you want a navigation group to be open by default, just don't add it to the array.