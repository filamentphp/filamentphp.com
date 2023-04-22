<?php

namespace App\Filament\Resources\TrickResource\Widgets;

use App\Models\Trick;
use Filament\Widgets\Widget;

class EditTrickHeader extends Widget
{
    public Trick $record;

    protected $listeners = [
        'trickUpdated' => '$refresh',
    ];

    protected int|string|array $columnSpan = 'full';

    protected static string $view = 'filament.resources.trick-resource.widgets.edit-trick-header';
}
