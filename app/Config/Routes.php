<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$session = session();

//GET DATA IN ROUTES FROM THEIR CONTROLLERS
    $routes->get('/home', 'Home::index');
    //$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
//Login
    $routes->get('/login', 'Login::index');
//Logout
    $routes->get('/logout', 'Logout::index');
    $routes->get('/profile/logout', 'Logout::index');
    $routes->get('/profile/genre/logout', 'Logout::index');
    $routes->get('/genre/logout', 'Logout::index');

//Register Page
    $routes->get('/register', 'Register::index');
//Profile Page
    $routes->get('/profile/(:segment)', 'Home::profile');

//Sidemenu
    $routes->get('/likePost_atHomePage/(:num)', 'SideMenu::likePost_atHomePage/$1');
    $routes->get('/likePost/(:num)', 'SideMenu::likePost/$1');
    $routes->get('/unlikePost/(:num)', 'SideMenu::unlikePost/$1');
    $routes->get('/unlikePost_atHomePage/(:num)', 'SideMenu::unlikePost_atHomePage/$1');
    $routes->get('/deletePost/(:num)', 'SideMenu::deletePost/$1');

//Comment
    $routes->get('/deleteComment_atHomePage/(:num)', 'Comment::deleteComment_atHomePage/$1');
    $routes->get('/deleteComment/(:num)', 'Comment::deleteComment/$1');
    //$routes->get('/loadComments/(:num)', 'Comment::loadComments/$1');

//Sort by genre
    $routes->get('/genre/(:segment)', 'Sort::sortByGenre_atHomePage/$1');
// Sort by genre at profile page
    $routes->get('/profile/genre/(:segment)', 'Sort::sortByGenre/$1');

//Sort by genre
    $routes->get('/post/genre/(:segment)', 'Sort::sortByGenre/$1');


//Notifications
    $routes->get('/notifications', 'Notifications::index');
    //$routes->get('/notifications/markAsRead/(:num)', 'Notifications::markAsRead/$1');
    //$routes->get('/notifications/delete/(:num)', 'Notifications::delete/$1');

//View the post
    $routes->get('/post/(:segment)', 'Home::viewPost/$1');

//POST DATA IN ROUTES FROM VIEWS AND THEN DIRECTLY TO THEIR CONTROLLERS
    $routes->post('/postfromhomepage', 'Post::createPostfromHomePage');
    $routes->post('/postfromprofilepage', 'Post::createPostfromProfilePage');
    $routes->post('/register/save', 'Register::save');
    $routes->post('/login/auth', 'Login::auth');

//comment
    $routes->post('/addComment_atHomePage/(:num)', 'Comment::addComment_atHomePage/$1');
    $routes->post('/addComment/(:num)', 'Comment::addComment/$1');

//Search
    //ByWords
    $routes->post('/search', 'Search::searchAll_ByWords');
    //ByTrendings
    $routes->get('/search/trendings/(:segment)', 'Search::searchAll_ByTrendings/$1');