<?php

namespace App\Enums;

enum LinkCategory: string
{
    case Admin = 'admin';
    case Agency = 'agency';
    case Article = 'article';
    case Forms = 'forms';
    case News = 'news';
    case Project = 'project';
    case Stream = 'steam';
    case Tables = 'tables';
    case Tutorial = 'tutorial';
    case Video = 'video';

    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => 'Admin panel',
            self::Forms => 'Form builder',
            self::Tables => 'Table builder',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
