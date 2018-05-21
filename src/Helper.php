<?php

declare(strict_types=1);

namespace Afk11\Sbs1;

class Helper
{
    public static function decodeTimeSegments(string $datePart, string $timePart): \DateTime
    {
        $result = \DateTime::createFromFormat('Y/m/d H:i:s.u', "{$datePart} {$timePart}");
        if (!($result instanceof \DateTime)) {
            throw new \RuntimeException("Unable to parse date");
        }
        return $result;
    }

    public static function formatDate(\DateTimeInterface $dateTime): string
    {
        return $dateTime->format("Y/m/d");
    }

    public static function formatTime(\DateTimeInterface $dateTime): string
    {
        return $dateTime->format("H:m:s") . sprintf(".%3d", $dateTime->format("v"));
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
            case '-1':
                return false;
        }
        return null;
    }
}
