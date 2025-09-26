<?php

namespace App\Enums;

enum Version: string
{
    case Four = '4.x';
    case Three = '3.x';
    case Two = '2.x';
    case One = '1.x';

    public static function getLatest(): self
    {
        return self::Four;
    }
}
