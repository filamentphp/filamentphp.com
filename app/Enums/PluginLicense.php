<?php

namespace App\Enums;

enum PluginLicense: string
{
    case MIT = 'mit';
    case CUSTOM = 'custom';

    public function getLabel(): string
    {
        return match ($this) {
            static::MIT => 'MIT',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
