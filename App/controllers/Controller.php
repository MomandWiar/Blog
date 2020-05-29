<?php

namespace Wiar\Controllers;
use Wiar\Core\App;

/**
 * Class Controller
 *
 * contains all helpers functions
 */
class Controller
{
    public function __construct()
    {
        session_start();
    }

    /**
     * views the view.php by name
     *
     * @param String $name
     * @return void
     */
    public function view($name, $data = [])
    {
        extract($data);
        return require "App/views/{$name}.view.php";
    }

    /**
     * redirects the traffic
     *
     * @param String $path
     */
    public function redirect($path)
    {
        header("Location: {$path}");
        exit();
    }
}