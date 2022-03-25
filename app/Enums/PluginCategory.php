<?php

namespace App\Enums;

enum PluginCategory: string
{
    case ACTION = 'action';
    case ADMIN = 'admin';
    case ANALYTICS = 'analytics';
    case AUTHENTICATION = 'authentication';
    case AUTHORIZATION = 'authorization';
    case COLUMN = 'column';
    case DEVELOPER_TOOL = 'developer_tool';
    case EDITOR = 'editor';
    case FIELD = 'field';
    case FORMS = 'forms';
    case KIT = 'kit';
    case LAYOUT = 'layout';
    case SPATIE = 'spatie';
    case TABLES = 'tables';
    case WIDGET = 'widget';

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
