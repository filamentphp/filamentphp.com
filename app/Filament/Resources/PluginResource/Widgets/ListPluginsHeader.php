<?php

namespace App\Filament\Resources\PluginResource\Widgets;

use Filament\Widgets\Widget;

class ListPluginsHeader extends Widget
{
    protected int|string|array $columnSpan = 'full';

    protected static string $view = 'filament.resources.plugin-resource.widgets.list-plugins-header';
}
