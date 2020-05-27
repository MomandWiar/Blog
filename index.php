<?php

require 'vendor/autoload.php';
require_once 'core/bootstrap.php';

use Wiar\Core\{Router, Request};

# loads all the routes and directs them
# with the current uri and request type
Router::load('App/routes.php')
    ->direct(Request::uri(), Request::method());