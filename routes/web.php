<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\IndexController')
    ->name('index');

Route::prefix('/admin')->group(function () {

    //Test
    Route::get('/test', 'App\Http\Controllers\Admin\TestController@test')
        ->name('test');

    //Updating products/Parsing
    Route::get('/updateProducts', 'App\Http\Controllers\Admin\UpdateProductsController')
        ->name('update_products');
});
