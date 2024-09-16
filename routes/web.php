<?php

use App\Http\Middleware\AdminPanelAccessMiddleware;
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

Route::prefix('/admin')->middleware(AdminPanelAccessMiddleware::class)->group(function () {

//Test
Route::get('/test', 'App\Http\Controllers\Admin\TestController@test')
->name('test');
//
Route::get('/', 'App\Http\Controllers\Admin\IndexController')
->name('admin.index');
//Shops
Route::get('/shops', 'App\Http\Controllers\Admin\ShopController@index')
->name('shops');

Route::get('/addShop', 'App\Http\Controllers\Admin\ShopController@addShopView');
Route::post('/addShop', 'App\Http\Controllers\Admin\ShopController@addShop');

Route::get('/deleteShop/{shop_id}', 'App\Http\Controllers\Admin\ShopController@confirmDeleteShop')
->name('confirm_delete');
Route::post('/deleteShop/{shop_id}', 'App\Http\Controllers\Admin\ShopController@deleteShop')
->name('delete');

Route::get('/editShop/{shop_id}', 'App\Http\Controllers\Admin\ShopController@editShopView')
->name('edit_shop');
Route::post('/editShop/{shop_id}', 'App\Http\Controllers\Admin\ShopController@editShop');

//Categories
Route::get('/categories', 'App\Http\Controllers\Admin\CategoriesController@index')
->name('categories');

Route::get('/addCategory', 'App\Http\Controllers\Admin\CategoriesController@addCategoryView');
Route::post('/addCategory', 'App\Http\Controllers\Admin\CategoriesController@addCategory');

Route::get('/editCategory/{category_id}', 'App\Http\Controllers\Admin\CategoriesController@editCategoryView')
->name('edit_category');
Route::post('/editCategory/{category_id}', 'App\Http\Controllers\Admin\CategoriesController@editCategory');

Route::get('/deleteCategory/{category_id}', 'App\Http\Controllers\Admin\CategoriesController@deleteCategory')
->name('deleteCategory');

//UpdateLinks
Route::get('/updateLinks', 'App\Http\Controllers\Admin\UpdateLinksController@index')
->name('update_links');

Route::get('/addUpdateLink', 'App\Http\Controllers\Admin\UpdateLinksController@addUpdateLinkView')
->name('add_update_link');
Route::post('/addUpdateLink', 'App\Http\Controllers\Admin\UpdateLinksController@addUpdateLink');

Route::get('/editUpdateLinks{update_link_id}', 'App\Http\Controllers\Admin\UpdateLinksController@editUpdateLinkView')
->name('edit_update_link');
Route::post('/editUpdateLinks{update_link_id}', 'App\Http\Controllers\Admin\UpdateLinksController@editUpdateLink');

Route::get('/deleteUpdateLinks', 'App\Http\Controllers\Admin\UpdateLinksController@deleteUpdateLink')
->name('delete_update_link');

Route::get('/showAllUpdateLinks', 'App\Http\Controllers\Admin\UpdateLinksController@showAllUpdateLinks')
->name('show_all_update_links');

    //Updating products/Parsing
    Route::get('/updateProducts', 'App\Http\Controllers\Admin\UpdateProductsController')
        ->name('update_products');
});
