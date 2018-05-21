<?php

declare(strict_types=1);


namespace Afk11\Sbs1;

class Helper
{
    public static function decodeTimeSegments(string $datePart, string $timePart)
    {
        return \DateTime::createFromFormat('Y/m/d H:i:s.u', "{$datePart} {$timePart}");
    }

    public static function parseBool(string $value)
    {
        switch (strtolower($value)) {
            case 'true':
            case 'y':
            case 'yes':
            case 'on':
            case '1':
                return true;
            case 'false':
            case 'n':
            case 'no':
            case 'off':
            case '0':
                return false;
        }
        return null;
    }
}
