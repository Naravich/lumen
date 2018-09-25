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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/hello/world', function () use ($app) {
    return "HELLO SEAGAME WORLD";
});

$app->get('/hello/{name}', ['middleware' => 'hello', function ($name) use ($app) {
    return "HELLO MR.{$name}";
}]);

$app->get('/request', function (Illuminate\Http\Request $request) {
    return "Hello " . $request->get('name', 'stranger');
});

// $app->get('/response', function (Illuminate\Http\Request $request) {
//     return (new Illuminate\Http\Response('Hello stranger', 200))
//     ->header('Content-Type', 'text/plain');
// });

$app->get('/response', function (Illuminate\Http\Request $request) {
    if ($request->wantsJson()) {
        return response()->json(['greeting' => 'Hello Stranger Res']);
    }
    return (new Illuminate\Http\Response('Hello stranger', 200))
    ->header('Content-Type', 'text/plain');
});
    