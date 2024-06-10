<?php

if(!function_exists("truncateString")) {
    /**
     * Cutting a string longer than $length will add a mark...
     *
     * @param string $string
     * @param int $length
     * @param string $ellipsis
     * @return string
     */
    function truncateString(string $string, int $length = 20, string $ellipsis = '...'): string
    {
        if (Str::length($string) <= $length) {
            return $string;
        }

        return Str::substr($string, 0, $length) . $ellipsis;
    }
}

if (!function_exists('getFileName')) {
    /**
     * Get filename from path.
     *
     * @param string|null $path
     * @return string
     */
    function getFileName(string $path = null): string
    {
        if (empty($path)) {
            return '';
        }
        return basename($path);
    }
}

if(!function_exists('number_shorten')){
    function number_shorten($number, $precision = 3, $divisors = null) {

        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => 'M', // Million
                pow(1000, 3) => 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            );
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        return (int)number_format($number / $divisor, $precision) . $shorthand;
    }

    if(!function_exists('price_format')){
        function price_format($price): string
        {
            return number_format($price, 0, '.', ',');
        }
    }
}

if (! function_exists('format_day')) {
    /**
     * Định dạng ngày thành chuỗi 'd-m-Y'.
     *
     * @param mixed | null $date
     * @return string
     * @throws Exception
     */
    function format_day($date)
    {
        if (empty($date)) {
            return '';
        }
        if (!($date instanceof \DateTime)) {
            $date = new \DateTime($date);
        }

        return $date->format('d-m-Y');
    }
}
