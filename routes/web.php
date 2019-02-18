<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SiteController@actionIndex');

Auth::routes();

Route::any('product/{id}', 'ProductController@actionIndex');

Route::get('catalog', 'CatalogController@actionIndex');

Route::get('category/{id}', 'CatalogController@actionCategory');


/*********************************************************************************************************************/

//CART BEGIN

Route::any('cart', 'CartController@actionIndex');

Route::any('/cart/addAjax/{id}', 'CartController@actionAddAjax');

Route::get('/cart/remove/{id}', 'CartController@actionRemove');

//CART END

/*********************************************************************************************************************/

//CHECKOUT BEGIN

Route::any('checkout', 'CheckOutController@actionIndex');

Route::get('add/{id}', 'CartController@actionAdd');

Route::get('deduct/{id}', 'CartController@actionDeduct');

//CHECKOUT END

/*********************************************************************************************************************/

//ACCOUNT BEGIN

Route::get('account', 'AccountController@actionIndex');

//ACCOUNT END

 /*********************************************************************************************************************/

//SEARCH BEGIN

Route::get('search', 'ProductController@actionSearch');

//SEARCH END


/*********************************************************************************************************************/

// ADMIN ROUTES

Route::get('admin', 'AdminController@actionIndex');

Route::get('admin/category', 'AdminController@actionCategory');

Route::any('admin/category/create', 'AdminController@actionCategoryCreate');

Route::any('admin/category/update/{id}', 'AdminController@actionCategoryUpdate');

Route::any('admin/category/delete/{id}', 'AdminController@actionCategoryDelete');

// ADMIN PRODUCTS

Route::get('admin/product', 'AdminProductController@actionProduct');

Route::get('admin/product/delete/{id}', 'AdminProductController@actionDelete');

Route::any('admin/product/create','AdminProductController@actionCreate');

Route::any('admin/product/update/{id}','AdminProductController@actionUpdate');

//END ADMIN PRODUCTS

// ADMIN ORDERS

Route::get('admin/order', 'AdminOrderController@actionIndex');

Route::get('admin/order/delete/{id}', 'AdminOrderController@actionDelete');

Route::any('admin/order/update/{id}', 'AdminOrderController@actionUpdate');

Route::get('admin/order/view/{id}', 'AdminOrderController@actionView');

// END ADMIN ORDERS

Route::any('admin/search', 'AdminSearchController@actionIndex');

// ADMIN ROUTES END
