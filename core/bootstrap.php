<?php

use Wiar\Core\App;
use Wiar\Core\Connection;
use Wiar\Core\QueryBuilder;

App::bind('config', require 'config.php');

# creates queryBuilder by passing a PDO instance using the config array
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function dd($expression = 'empty') {
    die(var_dump($expression));
}

function views($fileName, $data = [])
{
    extract($data);
    return require "App/views/{$fileName}.view.php";
}