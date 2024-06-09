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
