<?php
// Blog Post Routes

$router->get('/posts', 'PostController@list');
$router->post('/posts', 'PostController@create');
$router->get('/post/{id}', 'PostController@show');
$router->get('/edit-post/{id}', 'PostController@edit');
$router->post('/edit-post/{id}', 'PostController@update');
$router->get('/delete-post/{id}', 'PostController@delete');