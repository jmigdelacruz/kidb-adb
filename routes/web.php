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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
$router->get('/', 'DatabaseController@apiHome');
$router->get('/test', 'DatabaseController@test');

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('/sdmx/dataflow', 'MetadataController@dataflow');
    $router->get('/sdmx/datastructure', 'MetadataController@datastructure');
    $router->get('/sdmx/conceptscheme', 'MetadataController@conceptscheme');
    $router->get('/sdmx/codelist', 'MetadataController@getCodeList');
    $router->get('/sdmx/rawquery', 'DatabaseController@rawQuery');
    $router->get('/sdmx/{sdmx_code}', ['middleware' => ['throttle:30,1'], 'uses' => 'DatabaseController@querydata']);
});
