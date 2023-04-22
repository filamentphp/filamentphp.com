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
            self::Admin => 'Admin panel',
            self::Faq => 'FAQ',
            self::Forms => 'Form builder',
            self::Tables => 'Table builder',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
