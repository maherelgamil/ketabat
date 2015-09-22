<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', ['as' => 'home', 'uses' => 'ThemesController@home']);
Route::get('/home', 'ThemesController@home');*/

Route::get('/', ['as' => 'home', 'uses' => 'ThemesController@home']);
Route::get('/home', 'ThemesController@home');
Route::get('/products/{id}', 'ThemesController@singleProduct');

Route::get('articles/{slug}', ['as' => 'single', 'uses' => 'ThemesController@single']);
Route::get('tags/{slug}', ['as' => 'tags', 'uses' => 'ThemesController@tags']);
Route::get('ajax/validate/{email?}', 'AjaxController@validateEmail');
Route::get('ajax/cart/add/{id}/{name}/{qty}/{price}/{options?}', 'AjaxController@cartAdd');
Route::post('ajax/login', 'AjaxController@login');

/**
 * pages routes
 */
Route::get('contact', 'PagesController@contact');
Route::post('contact', 'PagesController@contact');
Route::get('about', 'PagesController@about');

/**
 * admin routes
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function()
{
	Route::get('/', 'PagesController@admin');

	Route::resource('articles', 'ArticlesController');

    Route::resource('tags', 'TagsController');

    Route::resource('uploads', 'UploadsController');

    Route::resource('attributes', 'AttributesController');

    Route::resource('products', 'ProductsController');

    Route::resource('users', 'UsersController');

});

/**
 * Shopping cart routes.
 */
Route::group(['prefix' => 'cart'], function(){

	Route::get('/add/{id}/{name}/{qty}/{price}/{options?}', 'ShopController@cartAdd')->where(['qty' => '[0-9]+', 'price' => '[0-9]+']);

	Route::get('/content', 'ShopController@cartContent');
	// TODO
	//Route::get('/cart/search')

});

Route::resource('profile', 'ProfileController', ['middleware' => 'auth']);


/**
 * User Routes
 */
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


/**
 * Search Routes
 */
Route::get('search/results/', 'SearchsController@results');
Route::get('search', 'SearchsController@form');


/**
 * Settings Routes
 */
Route::get('admin/settings/', 'PagesController@settings');
Route::get('admin/settings/backup', 'PagesController@backup');
Route::get('admin/settings/restore', 'PagesController@restore');
