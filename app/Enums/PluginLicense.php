<?php

namespace App\Enums;

enum PluginLicense: string
{
    case Mit = 'mit';
    case GnuAgplv3 = 'gnu_agplv3';
    case GnuGplv3 = 'gnu_gplv3';
    case GnuLgplv3 = 'gnu_lgplv3';
    case MozillaPublic20 = 'mozilla_public_2.0';
    case Apache20 = 'apache_2.0';
    case BoostSoftware10 = 'boost_software_1.0';
    case Unlicense = 'unlicense';
    case Custom = 'custom';

    public function getLabel(): string
    {
        return match ($this) {
            self::GnuAgplv3 => 'GNU AGPLv3',
            self::GnuGplv3 => 'GNU GPLv3',
            self::GnuLgplv3 => 'GNU LGPLv3',
            self::MozillaPublic20 => 'Mozilla Public 2.0',
            self::Apache20 => 'Apache 2.0',
            self::BoostSoftware10 => 'Boost Software 1.0',
            self::Unlicense => 'Unlicense',
            self::Mit => 'MIT',
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
