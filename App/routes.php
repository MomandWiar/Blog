<?php

/*
 * All the routes for this project
 */
$router->get('/', 'PagesController@getHome');
$router->get('/about', 'PagesController@getAbout');
$router->get('/contact', 'PagesController@getContact');
$router->post('/names', 'NameController@insertName');