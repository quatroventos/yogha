<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('App\Http\Controllers\Site')->group(function(){
    //home
    Route::get('/', 'HomeController');
    //accommodation
    Route::get('/accommodation/{accommodationid}/{startdate?}/{enddate?}', 'AccommodationController@index');
    //search
    Route::get('/autocomplete-search-query', 'SearchController@query')->name('autocomplete.search.query');
    Route::get('/searchfilter/{district?}/{startdate?}/{enddate?}', 'SearchController@filter');
    Route::get('/searchbydistrict/{district}/{startdate?}/{enddate?}/{adults?}/{children?}/{ages?}', 'SearchController@searchbydistrict')->name('search.district');
    //services
    Route::get('/service_details/{serviceid}', 'ServicesController@show_details');
    //blog
    Route::get('/blog/{category}/{slug}', 'BlogController@category')->name('blog.category');
    Route::get('/blog/{slug}', 'BlogController@post')->name('blog.post');
    Route::get('/blog', 'BlogController@index')->name('blog');
    //checkout
    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
});

Route::get('/importxml', 'App\Http\Controllers\ReadXMLController@index');

Auth::routes();

Route::namespace('App\Http\Controllers\Backend')->group(function() {
    Route::get('/admin', 'AdminController@index')->name('dashboard');
    Route::get('/admin/shelves', 'ShelvesController@index')->name('shelves');
    Route::get('/admin/shelves/edit', 'ShelvesController@edit')->name('shelf.edit');
    Route::get('/admin/shelves/update', 'ShelvesController@update')->name('shelf.update');
    Route::post('/admin/shelves/create', 'ShelvesController@create')->name('shelf.create');

    Route::get('/admin/services', 'ServicesController@index')->name('services');
    Route::get('/admin/services/edit', 'ServicesController@edit')->name('service.edit');
    Route::get('/admin/services/update', 'ServicesController@update')->name('service.update');
    Route::post('/admin/services/create', 'ServicesController@create')->name('service.create');

    Route::get('/admin/blog', 'BlogController@index')->name('blog');
    Route::get('/admin/blog/edit', 'BlogController@edit')->name('blog.edit');
    Route::get('/admin/blog/update', 'BlogController@update')->name('blog.update');
    Route::post('/admin/blog/create', 'BlogController@create')->name('blog.create');

    Route::get('/admin/blog_cat', 'BlogController@cat_index')->name('blog_cat');
    Route::get('/admin/blog_cat/edit', 'BlogController@edit_cat')->name('blog_cat.edit');
    Route::get('/admin/blog_cat/update', 'BlogController@update_cat')->name('blog_cat.update');
    Route::post('/admin/blog_cat/create', 'BlogController@create_cat')->name('blog_cat.create');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\Backend\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Backend\ProfileController@edit']);
	Route::post('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Backend\ProfileController@update']);
	Route::post('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Backend\@password']);
});

Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
