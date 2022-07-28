<?php

namespace App\Actions;

use App\Enums\PluginStatus;
use App\Models\Plugin;

class PublishPlugin
{
    public function __invoke(Plugin $plugin): void
    {
        $plugin->update([
            'status' => PluginStatus::PUBLISHED,
        ]);
    }
}
