<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/* Route ayant un nom et utilisant un controller */
$router->get('/', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'home',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'MainController@homeAction'
]);

/* Route ayant un nom et utilisant un controller */
$router->get('/signup', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'signup',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'UserController@signupAction'
]);




$router->post('/signup', 'UserController@signupPost');




/* Route ayant un nom et utilisant un controller */
$router->get('/signin', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'signin',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'UserController@signinAction'
]);




$router->post('/signin', 'UserController@signinPost');




/* Route ayant un nom et utilisant un controller */
$router->get('/quiz/{id}', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'quiz',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'QuizController@quizAction'
]);

/* Route ayant un nom et utilisant un controller */
$router->get('/tag', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'list_tag',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'TagController@listTag'
]);

/* Route ayant un nom et utilisant un controller */
$router->get('/tag/{id}', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'tag',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'TagController@tagAction'
]);

$router->get('/loggout', [
    'uses'  => 'UserController@loggoutAction',
    'as'    => 'loggout'
]);

$router->get('/account', [
    'uses'  => 'UserController@accountAction',
    'as'    => 'account'
]);

$router->post('/quiz/{id}', [
    'uses'  => 'QuizController@quizPost',
    'as'    => 'results'
]);

