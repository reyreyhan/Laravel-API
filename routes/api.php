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

Route::prefix('soldier')->group(function () {
    Route::prefix('/gun')->group(function () {
        Route::get('', 'Soldier\GunController@index');
        Route::post('', 'Soldier\GunController@store');
        Route::get('/{id}', 'Soldier\GunController@show');
        Route::put('/{id}', 'Soldier\GunController@update');
        Route::delete('/{id}', 'Soldier\GunController@delete');
    });

    Route::prefix('/magazine')->group(function () {
        Route::post('/{gun_id}', 'Soldier\MagazineController@store');
        Route::delete('/{id}', 'Soldier\MagazineController@delete');
    });
});

Route::prefix('store')->group(function () {
    Route::prefix('/product')->group(function () {
        Route::get('', 'Store\ProductController@index');
        Route::post('', 'Store\ProductController@store');
        Route::get('/{id}', 'Store\ProductController@show');
        Route::put('/{id}', 'Store\ProductController@update');
        Route::delete('/{id}', 'Store\ProductController@delete');
    });

    Route::prefix('/transaction')->group(function () {
        Route::get('', 'Store\TransactionController@index');
        Route::post('/{product_id}', 'Store\TransactionController@store');
    });
});

