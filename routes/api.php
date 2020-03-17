<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'v1'

], function ($router) {

    Route::apiResource('state', 'StateController');

});

Route::group([
    'prefix' => 'v1'
], function ($router) {

    Route::get('/', function(){
        $base_url =  "http://localhost/api/v1/";

        return response()->json([
            'api' => "Api labnote",
            "version" => "v1",
            'base_url' => "http://localhost",
            'prefix' => "/api/v1",
            "state" => ["GET" => $base_url."state", "POST" => $base_url."state", "PUT" => $base_url."state/{id}", "DELETE" => $base_url."state/{id}", "_GET" => "$base_url.state/{id}"]
        ], 200);
    });

});