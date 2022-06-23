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
            static::Admin => 'Admin panel',
            static::AlpineJs => 'Alpine.js',
            static::Forms => 'Form builder',
            static::Tables => 'Table builder',
            static::TailwindCss => 'Tailwind CSS',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
