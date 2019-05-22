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
$router->get('/querygen', 'DatabaseController@queryGeneration');

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/v1/sdmx/dataflow', ['middleware' => ['throttle:2,1'], 'uses' => 'MetadataController@dataflow']);
    $router->get('/v1/sdmx/datastructure', 'MetadataController@datastructure');
    $router->get('/v1/sdmx/conceptscheme', 'MetadataController@conceptscheme');
    $router->get('/v1/sdmx/codelist', 'MetadataController@getCodeList');
    $router->get('/v1/sdmx/{sdmx_code}', 'DatabaseController@querydata');
});