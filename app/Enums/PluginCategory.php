<?php

namespace App\Enums;

enum PluginCategory: string
{
    case Action = 'action';
    case Admin = 'admin';
    case Analytics = 'analytics';
    case Authentication = 'authentication';
    case Authorization = 'authorization';
    case Column = 'column';
    case DeveloperTool = 'developer_tool';
    case Editor = 'editor';
    case Field = 'field';
    case Forms = 'forms';
    case Kit = 'kit';
    case Layout = 'layout';
    case Spatie = 'spatie';
    case Tables = 'tables';
    case Widget = 'widget';

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
