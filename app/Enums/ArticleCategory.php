<?php

namespace App\Enums;

enum ArticleCategory: string
{
    case Admin = 'admin';
    case AlpineJs = 'alpine';
    case Forms = 'forms';
    case Laravel = 'laravel';
    case Livewire = 'livewire';
    case News = 'news';
    case Tables = 'tables';
    case TailwindCss = 'tailwind';

    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => 'Admin panel',
            self::AlpineJs => 'Alpine.js',
            self::Forms => 'Form builder',
            self::Tables => 'Table builder',
            self::TailwindCss => 'Tailwind CSS',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
