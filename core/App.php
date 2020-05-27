<?php

namespace Wiar\Core;

/**
 * Class App
 *
 * Dependency Injection Container
 */
class App
{
    protected static $data = [];

    /**
     * binds the anything with a key
     *
     * @param String $key
     * @param mixed $value
     */
    public static function bind($key, $value)
    {
        static::$data[$key] = $value;
    }

    /**
     * gets the value by key
     *
     * @param String $key
     * @return mixed value
     * @throws Exception missing
     */
    public static function get($key)
    {
        if (!array_key_exists($key, static::$data)) {
            throw new Exception("No {$key} found..");
        }
        return static::$data[$key];
    }
}