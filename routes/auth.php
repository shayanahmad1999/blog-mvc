<?php
// Authentication Routes

$router->get('/login', 'UserController@showLogin');
$router->post('/login', 'UserController@login');
$router->get('/register', 'UserController@showRegister');
$router->post('/register', 'UserController@register');
$router->get('/logout', 'UserController@logout');