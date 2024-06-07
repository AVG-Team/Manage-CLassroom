<?php

if(!function_exists("truncateString")) {
    function truncateString($string, $length = 20, $ellipsis = '...')
    {
        if (Str::length($string) <= $length) {
            return $string;
        }

        return Str::substr($string, 0, $length) . $ellipsis;
    }
}
