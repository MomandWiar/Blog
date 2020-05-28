<?php

/*
 * All the routes for this project
 */
$router->get('/', 'PagesController@getHome');
$router->get('/about', 'PagesController@getAbout');
$router->get('/contact', 'PagesController@getContact');
$router->get('/login', 'PagesController@getLogin');
$router->get('/register', 'PagesController@getRegister');
$router->get('/posts', 'PagesController@getPosts');

# post
$router->post('/login-user', 'UserController@login');
$router->get('/logout-user', 'UserController@logout');
$router->post('/register-user', 'UserController@register');
