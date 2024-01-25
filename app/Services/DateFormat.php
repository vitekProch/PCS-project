<?php

namespace App\Services;

use DateTime;

class DateFormat
{    
    public static function formatDate(string $date, bool $withTime): void
    {
        $format = 'Y-m-d H:i:s';
        $dateTime = DateTime::createFromFormat($format, $date);
        $outputFormat = 'd.m.Y';
        
        if ($withTime) {
            $outputFormat .= ' - H:i';
        }

        echo $dateTime->format($outputFormat);
    }

}
