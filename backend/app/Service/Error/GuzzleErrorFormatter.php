<?php


namespace App\Service\Error;


class GuzzleErrorFormatter
{
    /**
     * @param  string  $message
     * @param  string  $default
     * @return string
     */
    public function format(string $message, $default = ''): string
    {
        preg_match('#"error_description":"(.+?)"#', $message, $matches);

        return $matches[1] ?? $default;
    }
}
