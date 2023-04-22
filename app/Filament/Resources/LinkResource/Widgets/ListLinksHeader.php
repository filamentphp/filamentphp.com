<?php

namespace App\Filament\Resources\LinkResource\Widgets;

use Filament\Widgets\Widget;

class ListLinksHeader extends Widget
{
    protected int|string|array $columnSpan = 'full';

    protected static string $view = 'filament.resources.link-resource.widgets.list-links-header';
}
