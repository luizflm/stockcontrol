<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

$router->get('/signup', 'LoginController@signup');
$router->post('/signup', 'LoginController@signupAction');

$router->get('/logout', 'LoginController@logout');

$router->get('/add', 'ProductController@add');
$router->post('/add', 'ProductController@addAction');

$router->get('/search', 'SearchController@index');


$router->get('/edit_item/{id}', 'ProductController@editItem');
$router->post('/edit_item', 'ProductController@editItemAction');

$router->get('/delete_item/{id}', 'ProductController@delete');

$router->get('/edit_user/{id}', 'UserController@index');
$router->post('/edit_user', 'UserController@editUser');



