<?php

namespace Wiar\Core;
use \PDO;

/**
 * Class Connection
 *
 * makes connection with database
 */
Class Connection
{
    /**
     * make connection with database using the config array
     *
     * @param array $config
     * @return PDO
     */
    public static function make($config)
    {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch(Exception $e) {
            die("<b>Could not connect</b><br>" . $e->getMessage());
        }
    }
}