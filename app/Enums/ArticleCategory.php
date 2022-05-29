<?php

namespace App\Enums;

enum ArticleCategory: string
{
    case Admin = 'admin';
    case Forms = 'forms';
    case News = 'news';
    case Tables = 'tables';

    public function getLabel(): string
    {
        return match ($this) {
            static::Admin => 'Admin panel',
            static::Forms => 'Form builder',
            static::Tables => 'Table builder',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
