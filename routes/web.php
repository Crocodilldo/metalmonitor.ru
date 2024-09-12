<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\IndexController')
    ->name('index');

//Search
Route::get('/search', 'App\Http\Controllers\SearchController@search')
    ->name('search');

//Filtration
Route::get('/apply_filters', 'App\Http\Controllers\SearchController@applyFilters')
    ->name('apply_filters');

Route::get('/reset_filters', 'App\Http\Controllers\SearchController@resetFilters')
    ->name('reset_filters');


//Admin routes

Route::prefix('/admin')->group(function () {

    //Test
    Route::get('/test', 'App\Http\Controllers\Admin\TestController@test')
        ->name('test');

    //Updating products/Parsing
    Route::get('/updateProducts', 'App\Http\Controllers\Admin\UpdateProductsController')
        ->name('update_products');
});
