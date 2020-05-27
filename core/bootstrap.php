<?php

use Wiar\Core\App;
use Wiar\Core\Connection;
use Wiar\Core\QueryBuilder;

App::bind('config', require 'config.php');

# creates queryBuilder by passing a PDO instance using the config array
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));