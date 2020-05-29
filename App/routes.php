<?php

/*
 * All the routes for this project
 */
# GET
$router->get('/', 'PagesController@getHome');
$router->get('/{page}', 'PagesController@getHome');

$router->get('/about', 'PagesController@getAbout');

$router->get('/contact', 'PagesController@getContact');

$router->get('/login', 'PagesController@getLogin');
$router->get('/logout-user', 'UserController@logout');
$router->get('/register', 'PagesController@getRegister');

$router->get('/posts', 'PagesController@getPosts');
$router->get('/posts{page}', 'PagesController@getPosts');
$router->get('/posts/create-post', 'PagesController@getCreatePost');
$router->get('/posts/edit-post', 'PagesController@getEditPost');
$router->get('/posts/edit-post{pageId}', 'PagesController@getEditPost');

# POST
$router->post('/login-user', 'UserController@login');
$router->post('/register-user', 'UserController@register');
$router->post('/posts/save-post', 'PostController@updatePost');