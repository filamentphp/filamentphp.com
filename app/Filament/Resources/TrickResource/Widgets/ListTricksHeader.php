<?php

namespace App\Filament\Resources\TrickResource\Widgets;

use Filament\Widgets\Widget;

class ListTricksHeader extends Widget
{
    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.resources.trick-resource.widgets.list-tricks-header';
}
