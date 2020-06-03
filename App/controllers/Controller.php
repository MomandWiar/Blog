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
    private $data = [];

    public function __construct()
    {
        session_start();
    }

    /**
     * assigns a variable to a associative array
     *
     * @param String $variable
     * @param String $value
     */
    public function assign($variable, $value) {
        $this->data[$variable] = $value;
    }

    /**
     * views the view.php by name
     *
     * @param String $name
     * @return void
     */
    public function view($fileName)
    {
        $data = $this->data;
        extract($data);
        return require "App/views/{$fileName}.view.php";
    }

    /**
     * redirects the traffic
     *
     * @param String $path
     */
    public function redirect($path, $message = false, $type = false)
    {
        if ($message == true) {
            if ($type == true) {
                header("Location: {$path}?success=" . $message);
                exit();
            }
            header("Location: {$path}?error=" . $message);
            exit();
        }
        header("Location: {$path}");
        exit();
    }
}