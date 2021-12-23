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
Route::get('/importxml', 'App\Http\Controllers\ReadXMLController@index');
Route::get('/states/{country_id}', 'App\Http\Controllers\WorldController@states');
Route::get('/cities/{state_id}', 'App\Http\Controllers\WorldController@cities');

Route::namespace('App\Http\Controllers\Site')->group(function(){
    //home
    Route::get('/', 'HomeController')->name('home');
    //accommodation
    Route::get('/accommodation/{accommodationid}/{startdate?}/{enddate?}/{adults?}/{children?}/{ages?}', 'AccommodationController@index');
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

    Route::post('/user/create', 'Usercontroller@create')->name('frontend.user.create');
    Route::get('/user/edit/{user_id?}', 'Usercontroller@edit')->name('frontend.user.edit');

    Route::group(['middleware' => 'auth'], function () {
        //checkout
        Route::get('/checkout/{accommodationid}/{startdate}/{enddate}/{adults?}/{children?}/{ages?}', 'CheckoutController@index')->name('checkout');
        Route::get('/check_availability/{accommodationid}', 'CheckoutController@check_availability');
        Route::post('/checkout/billet', 'CheckoutController@generatebillet')->name('generate.billet');
        Route::post('/checkout/pix', 'CheckoutController@generatepix')->name('generate.pix');
        Route::post('/checkout/card', 'CheckoutController@generatecard')->name('generate.card');
        //favorites
        Route::get('/favorite/{accommodationid}/{userid}', 'FavoritesController@fav');
        Route::get('/favorite/{accommodationid}/{userid}', 'FavoritesController@unfav');

        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Backend\ProfileController@edit']);

        Route::get('/user/delete/{user_id}', 'Usercontroller@delete')->name('user.delete');
        Route::post('/user/update', 'Usercontroller@update')->name('user.update');
        Route::post('/user/password', 'Usercontroller@password')->name('user.password');

    });
});


Auth::routes();

Route::namespace('App\Http\Controllers\Backend')->group(function() {

    Route::group(['middleware' => 'auth'], function () {

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

        Route::get('/admin/user', 'Usercontroller@index')->name('user.index');
        Route::get('/admin/user/edit/{user_id?}', 'Usercontroller@edit')->name('user.edit');
        Route::get('/admin/user/delete/{user_id}', 'Usercontroller@delete')->name('user.delete');
        Route::post('/admin/user/update', 'Usercontroller@update')->name('user.update');
        Route::post('/admin/user/password', 'Usercontroller@password')->name('user.password');
        Route::post('/admin/user/create', 'Usercontroller@create')->name('user.create');

        //Route::get('user', 'App\Http\Controllers\Backend\UserController', ['except' => ['show']]);
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Backend\ProfileController@edit']);
        Route::post('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Backend\ProfileController@update']);
        Route::post('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Backend\@password']);

    });
});

Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
