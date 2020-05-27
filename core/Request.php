<?php

namespace Wiar\Core;

/**
 * Class Request
 *
 * responsible for fetching information
 * about the current page
 */
class Request
{
    /**
     * returns the current URI
     *
     * @return string current URI
     */
    public static function uri()
    {
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    /**
     * return the current request method
     *
     * @return String current request method
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}