<?php
// Comment Routes

$router->get('/comments', 'CommentController@list');
$router->post('/post/{id}', 'CommentController@add');
$router->get('/edit-comment/{id}', 'CommentController@edit');
$router->post('/edit-comment/{id}', 'CommentController@update');
$router->get('/delete-comment/{id}', 'CommentController@delete');