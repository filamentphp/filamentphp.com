<?php

namespace App\Enums;

enum LinkCategory: string
{
    case ADMIN = 'admin';
    case AGENCY = 'agency';
    case ARTICLE = 'article';
    case FORMS = 'forms';
    case NEWS = 'news';
    case PROJECT = 'project';
    case STREAM = 'steam';
    case TABLES = 'tables';
    case TUTORIAL = 'tutorial';
    case VIDEO = 'video';

    public function getLabel(): string
    {
        return match ($this) {
            static::ADMIN => 'Admin panel',
            static::FORMS => 'Form builder',
            static::TABLES => 'Table builder',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
