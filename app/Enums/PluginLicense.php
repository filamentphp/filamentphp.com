<?php

namespace App\Enums;

enum PluginLicense: string
{
    case MIT = 'mit';
    case GNU_APGLv3 = 'gnu_apglv3';
    case GNU_GPLv3 = 'gnu_gplv3';
    case GNU_LGPLv3 = 'gnu_lgplv3';
    case MOZILLA_PUBLIC_2_0 = 'mozilla_public_2.0';
    case APACHE_2_0 = 'apache_2.0';
    case BOOST_SOFTWARE_1_0 = 'boost_software_1.0';
    case UNLICENSE = 'unlicense';
    case CUSTOM = 'custom';

    public function getLabel(): string
    {
        return match ($this) {
            static::GNU_APGLv3 => 'GNU APGLv3',
            static::GNU_GPLv3 => 'GNU GPLv3',
            static::GNU_LGPLv3 => 'GNU LGPLv3',
            static::MOZILLA_PUBLIC_2_0 => 'Mozilla Public 2.0',
            static::APACHE_2_0 => 'Apache 2.0',
            static::BOOST_SOFTWARE_1_0 => 'Boost Software 1.0',
            static::UNLICENSE => 'Unlicense',
            static::MIT => 'MIT',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
