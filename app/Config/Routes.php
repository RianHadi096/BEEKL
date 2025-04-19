<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//GET ROUTES ONLY FROM THEIR CONTROLLERS
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('/login', 'Login::index');
$routes->get('/register', 'Register::index');

//POST ROUTES ONLY FROM THEIR CONTROLLERS
$routes->post('/register/save', 'Register::save');
$routes->post('/login/auth', 'Login::auth');