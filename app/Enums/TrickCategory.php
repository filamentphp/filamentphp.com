<?php

namespace App\Enums;

enum TrickCategory: string
{
    case Admin = 'admin';
    case Faq = 'FAQ';
    case Forms = 'forms';
    case Integration = 'integration';
    case Tables = 'tables';

    public function getLabel(): string
    {
        return match ($this) {
            static::Admin => 'Admin panel',
            static::Faq => 'FAQ',
            static::Forms => 'Form builder',
            static::Tables => 'Table builder',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
