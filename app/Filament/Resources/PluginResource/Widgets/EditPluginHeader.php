<?php

namespace App\Filament\Resources\PluginResource\Widgets;

use App\Models\Plugin;
use Filament\Widgets\Widget;

class EditPluginHeader extends Widget
{
    public Plugin $record;

    protected $listeners = [
        'pluginUpdated' => '$refresh',
    ];

    protected int|string|array $columnSpan = 'full';

    protected static string $view = 'filament.resources.plugin-resource.widgets.edit-plugin-header';
}
