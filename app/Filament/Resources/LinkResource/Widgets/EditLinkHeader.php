<?php

namespace App\Filament\Resources\LinkResource\Widgets;

use App\Models\Link;
use Filament\Widgets\Widget;

class EditLinkHeader extends Widget
{
    public Link $record;

    protected $listeners = [
        'linkUpdated' => '$refresh',
    ];

    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.resources.link-resource.widgets.edit-link-header';
}
