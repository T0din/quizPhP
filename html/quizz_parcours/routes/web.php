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

$router->get('/', [
    'as' => 'home', //as : definition du nom de la route
    'uses' => 'MainController@home' // uses : ou doit pointer ma route MonController@MaFonction
]);

// route pour consulter un quizz (sans le commencer) -> à terme ça devra être /quiz/[id] en GET
// On pourra mettre sur cette page un bouton "Commencer ce quizz" et quand on click dessus, on enleve ce bouton, on fait apparaître les checkbox au niveau des réponses et un bouton de validation de fin de quizz (avec la route /qui[id] en POST)
// Claire : Dans la mesure ou nous avons des utilisateurs dans notre db, on pourrait considérer que si tu n'es pas connecté tu peux consulter ton quizz mais pas y jouer et que si tu es connecté tu peux y jouer

$router->get('/consulter', [
    'as' => 'consulter', 
    'uses' => 'QuizzController@consulter' 
]);

$router->get('/quizz/{id}', [
    'as' => 'quizzId',
    'uses' => 'QuizzController@quizzId',
    
]);

$router->post('/quizz/{id}', [
    'as' => 'quizzPostId', 
    'uses' => 'QuizzController@quizzPostId' 
]);

$router->get('/tags', [
    'as' => 'tags', 
    'uses' => 'QuizzController@tags' 
]);

$router->get('/tags/{id}/quiz', [
    'as' => 'listByTag', 
    'uses' => 'QuizzController@listByTag' 
]);


$router->get('/signup', [
    'as' => 'signup', 
    'uses' => 'UserController@signup' 
]);

$router->post('/signup', [
    'as' => 'signupPost', 
    'uses' => 'UserController@signupPost' 
]);

$router->get('/signin', [
    'as' => 'signin', 
    'uses' => 'UserController@signin' 
]);

$router->post('/signin', [
    'as' => 'signinPost', 
    'uses' => 'UserController@signinPost' 
]);

$router->get('/account', [
    'as' => 'account', 
    'uses' => 'UserController@account' 
]);

$router->get('/logout', [
    'as' => 'logout', 
    'uses' => 'UserController@logout' 
]);

$router->get('/admin', [
    'as' => 'admin', 
    'uses' => 'AdminController@admin' 
]);

$router->get('/admin/tags', [
    'as' => 'adminTag', 
    'uses' => 'AdminController@adminTag' 
]);

$router->get('/admin/Quizzes', [
    'as' => 'adminQuizz', 
    'uses' => 'AdminController@adminQuizz' 
]);

$router->get('/admin/Users', [
    'as' => 'adminUser', 
    'uses' => 'AdminController@adminUser' 
]);


$router->post('/admin/tags/add', [
    'as' => 'adminPostTagAdd', 
    'uses' => 'AdminController@adminPostTagAdd' 
]);
$router->post('/admin/tags/update', [
    'as' => 'adminPostTagUpdate', 
    'uses' => 'AdminController@adminPostTagUpdate' 
]);
$router->post('/admin/tags/delete', [
    'as' => 'adminPostTagDelete', 
    'uses' => 'AdminController@adminPostTagDelete' 
]);

$router->post('/admin/quizz/add', [
    'as' => 'adminPostQuizzAdd', 
    'uses' => 'AdminController@adminPostQuizzAdd' 
]);
$router->post('/admin/quizz/update', [
    'as' => 'adminPostQuizzUpdate', 
    'uses' => 'AdminController@adminPostQuizzUpdate' 
]);
$router->post('/admin/quizz/delete', [
    'as' => 'adminPostQuizzDelete', 
    'uses' => 'AdminController@adminPostQuizzDelete' 
]);


$router->post('/admin/user/add', [
    'as' => 'adminPostUserAdd', 
    'uses' => 'AdminController@adminPostUserAdd' 
]);
$router->post('/admin/user/update', [
    'as' => 'adminPostUserUpdate', 
    'uses' => 'AdminController@adminPostUserUpdate' 
]);
$router->post('/admin/user/delete', [
    'as' => 'adminPostUserDelete', 
    'uses' => 'AdminController@adminPostUserDelete' 
]);