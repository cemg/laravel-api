<?php

use App\User;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function() {
    return "Hello RESTful API";
});

Route::get('/users', function() {
    return factory(User::class, 10)->make();
});

//Route::apiResource('/users', 'Api\UserController');
//Route::apiResource('/products', 'Api\ProductController');
//Route::apiResource('/categories', 'Api\CategoryController');

Route::apiResources([
    'users' => 'Api\UserController',
    'products' => 'Api\ProductController',
    'categories' => 'Api\CategoryController'
]);
