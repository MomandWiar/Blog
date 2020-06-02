<?php

/*
 * All the routes for this project
 */
# GET
$router->get('/', 'PagesController@getHome');
$router->get('/{page}', 'PagesController@getHome');

$router->get('/moreInfo', 'PagesController@getMoreInfoAbout');
$router->get('/moreInfo{about}', 'PagesController@getMoreInfoAbout');

$router->get('/comment/delete-comment', 'CommentController@deleteComment');
$router->get('/comment/delete-comment{where}', 'CommentController@deleteComment');

$router->get('/test2', 'CommentController@testGetAllComments2');

$router->get('/aboutUs', 'PagesController@getAbout');

$router->get('/contact', 'PagesController@getContact');

$router->get('/login', 'PagesController@getLogin');
$router->get('/logout-user', 'UserController@logout');
$router->get('/register', 'PagesController@getRegister');

$router->get('/post', 'PagesController@getPosts');
$router->get('/post{page}', 'PagesController@getPosts');
$router->get('/post/create-post', 'PagesController@getCreatePost');
$router->get('/post/edit-post', 'PagesController@getEditPost');
$router->get('/post/edit-post{pageId}', 'PagesController@getEditPost');

$router->get('/account', 'PagesController@getAccount');
$router->get('/account/profile', 'PagesController@getAccountProfile');
$router->get('/account/customize', 'PagesController@getAccountCustomize');

# POST
$router->post('/login-user', 'UserController@login');
$router->post('/register-user', 'UserController@register');

$router->post('/post/create-post', 'PostController@savePost');
$router->post('/post/edit-post', 'PostController@updatePost');

$router->post('/account/update-profile', 'AccountController@updateProfile');

$router->post('/comment/create-comment', 'CommentController@createComment');
$router->post('/test', 'CommentController@testCreateComment');