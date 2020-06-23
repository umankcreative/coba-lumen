<?php
use Illuminate\Support\Str;
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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/generate', function () use ($router) {
    return Str::random(32);
});
$router->get('/api', function () use ($router) {
    return 'Api called';
});
$router->get('/user/{id}', function ($id) {
    return 'Api called '.$id;
});
$router->get('/post/{postId}/comments/{commentId}', function ($postId,$commentId) {
    return 'Post ID= '.$postId . ' Comments ID = '.$commentId;
});

$router->get('/test', function () {
    return response()->json([
        'message'=>'Hello World'
    ]);
   // return response('Hello Get World', 201)->header('Content-Type', 'text/plain');
});

$router->post('/test', function () {
    return response()->json([
        'message'=>'Hello World'
    ]);
});


$router->group(['prefix'=>'user'], function () use ($router) {
    $router->get('register',function(){
        return 'User Register';
    });
    $router->get('login',function(){
        return 'User Login';
    });
    $router->get('info',function(){
        return 'User Info';
    });

});

$router->group(['prefix'=>'admin'], function () use ($router) {
    $router->get('register',function(){
        return 'Admin Register';
    });
    $router->get('login',function(){
        return 'Admin Login';
    });
    $router->get('info',function(){
        return 'Admin Info';
    });

});
