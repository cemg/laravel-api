<?php

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

Route::middleware('auth.basic')->get('/user-basic', function (Request $request) {
    return $request->user();
});

Route::get('categories/custom1', 'Api\CategoryController@custom1');
Route::get('products/custom1', 'Api\ProductController@custom1');
Route::get('products/custom2', 'Api\ProductController@custom2');
Route::get('categories/report1', 'Api\CategoryController@report1');
Route::get('users/custom1', 'Api\UserController@custom1');
Route::get('products/custom3', 'Api\ProductController@custom3');
Route::get('products/listwithcategories', 'Api\ProductController@listWithCategories');

Route::middleware(['auth:api', 'throttle:rate_limit,1'])->group(function() {

    Route::apiResources([
        'users'      => 'Api\UserController',
        'products'   => 'Api\ProductController',
        'categories' => 'Api\CategoryController'
    ]);

});

Route::middleware('throttle:5|rate_limit,1')->group(function() {
    Route::get('/throttle-guest', function () {
        echo "Throttle guest test...";
    });

    Route::get('/throttle-auth', function (Request $request) {
        echo "Throttle auth test...";
    })->middleware('auth:api');
});

Route::post('/auth/login', 'Api\AuthController@login');

Route::post('/upload', 'Api\UploadController@upload');

Route::middleware('api-token')->group(function () {

    Route::get('/auth/token', function (Request $request) {
        $user = $request->user();

        return response()->json([
            'name'         => $user->name,
            'access_token' => $user->api_token,
            'time'         => time()
        ]);
    });

});
