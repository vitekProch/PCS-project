<?php

namespace App\Helpers;

class TextShortener
{
    public static function textShortener(string $string, int $length = 50): string
    {
        if (mb_strlen($string, 'UTF-8') > $length) {
            return mb_substr($string, 0, $length, 'UTF-8') . " ... ";
        }
        return $string;
    }
}
