<?php

namespace App\Enums;

enum Version: string
{
    case FOUR_X = '4.x';
    case THREE_X = '3.x';
    case TWO_X = '2.x';
    case ONE_X = '1.x';

    public static function latest(): self
    {
        return self::FOUR_X;
    }
}
