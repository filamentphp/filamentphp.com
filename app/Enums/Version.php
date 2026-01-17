<?php

namespace App\Enums;

enum Version: string
{
    case Five = '5.x';
    case Four = '4.x';
    case Three = '3.x';
    case Two = '2.x';
    case One = '1.x';

    public static function getLatest(): self
    {
        return self::Five;
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::Five => 'v5',
            self::Four => 'v4',
            self::Three => 'v3',
            self::Two => 'v2',
            self::One => 'v1',
        };
    }
}
