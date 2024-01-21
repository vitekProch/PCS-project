<?php

namespace App\Services;

class TextShortener
{
    public static function textShortener(string $string, int $length = 50)
    {
        if (mb_strlen($string, 'UTF-8') > $length) {
            return mb_substr($string, 0, $length, 'UTF-8') . " ... ";
        }
        return $string;
    }
}
