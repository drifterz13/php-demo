<?php

namespace Core;

class Validator
{
    public static function string($val, $min = 1, $max = INF)
    {
        $str = trim($val);
        return strlen($str) >= $min && strlen($str) <= $max;
    }

    public static function email($val)
    {
        return filter_var($val, FILTER_VALIDATE_EMAIL);
    }
}
