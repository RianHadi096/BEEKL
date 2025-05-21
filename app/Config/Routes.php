<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$session = session();

//GET DATA IN ROUTES FROM THEIR CONTROLLERS
$routes->get('/', 'Home::index');
//$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Logout::index');
$routes->get('/profile/logout', 'Logout::index');
$routes->get('/register', 'Register::index');
$routes->get('/profile/(:segment)', 'Home::profile');
$routes->get('/likePost_atHomePage/(:num)', 'SideMenu::likePost_atHomePage/$1');
$routes->get('/likePost/(:num)', 'SideMenu::likePost/$1');
$routes->get('/unlikePost/(:num)', 'SideMenu::unlikePost/$1');
$routes->get('/unlikePost_atHomePage/(:num)', 'SideMenu::unlikePost_atHomePage/$1');
$routes->get('/deletePost/(:num)', 'SideMenu::deletePost/$1');

//POST DATA IN ROUTES FROM VIEWS AND THEN DIRECTLY TO THEIR CONTROLLERS
$routes->post('/postfromhomepage', 'Post::createPostfromHomePage');
$routes->post('/postfromprofilepage', 'Post::createPostfromProfilePage');
$routes->post('/register/save', 'Register::save');
$routes->post('/login/auth', 'Login::auth');