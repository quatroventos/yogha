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
Route::get('/countries', 'App\Http\Controllers\WorldController@countries');
Route::get('/states/{country_id}', 'App\Http\Controllers\WorldController@states');
Route::get('/cities/{state_id}', 'App\Http\Controllers\WorldController@cities');
Route::post('/sendcontactmail', 'App\Http\Controllers\ContactMailController@sendContactMail')->name('send.contactmail');

Route::namespace('App\Http\Controllers\Site')->group(function(){
    //home
    Route::get('/', 'HomeController')->name('home');
    //accommodation
    Route::get('/aluguel/{accommodationslug}/{startdate?}/{enddate?}/{adults?}/{children?}/{ages?}', 'AccommodationController@index');
    //search
    Route::get('/autocomplete-search-query', 'SearchController@query');
    Route::get('/searchfilter/{district?}/{startdate?}/{enddate?}/{adults?}/{children?}/{ages?}', 'SearchController@filter');
    Route::get('/searchbydistrict/{district}/{startdate?}/{enddate?}/{adults?}/{children?}/{ages?}', 'SearchController@searchbydistrict')->name('search.district');
    //services
    //Route::get('/service_details/{serviceid}', 'ServicesController@show_details');

    Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
        //checkout
        Route::get('/check_availability/{accommodationid}/{startdate?}/{enddate?}/{adults?}/{children?}/{ages?}', 'CheckoutController@check_availability');
        Route::get('/checkout/{accommodationid}/{startdate}/{enddate}/{adults?}/{children?}/{ages?}', 'CheckoutController@index')->name('checkout');
        Route::post('/checkout/billet', 'CheckoutController@generatebillet')->name('generate.billet');
        Route::post('/checkout/pix', 'CheckoutController@generatepix')->name('generate.pix');
        Route::post('/checkout/card', 'CheckoutController@generatecard')->name('generate.card');
        Route::get('/cancel/{bookingcode}/{localizator}/{hash}', 'CheckoutController@cancelbooking');
        Route::get('/checkoutaddtocart/{id}', 'ServicesController@add_to_cart_via_checkout');
        Route::get('/addtocart/{id}', 'ServicesController@add_to_cart');
        Route::get('/removefromcart/{id}', 'ServicesController@remove_from_cart');
        Route::get('/check_availability/{accommodationid}/{startdate?}/{enddate?}/{adults?}/{children?}/{ages?}', 'CheckoutController@check_availability');

        //favorites
        Route::get('/favorite/{accommodationid}/{userid}', 'FavoritesController@fav');
        Route::get('/unfavorite/{accommodationid}/{userid}', 'FavoritesController@unfav');

        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Backend\ProfileController@edit']);

        Route::get('/user/delete/{user_id}', 'UserController@delete')->name('frontend.user.delete');
        Route::post('/user/update', 'UserController@update')->name('frontend.user.update');
        Route::post('/user/password', 'UserController@password')->name('frontend.user.password');
    });
});


Auth::routes();

//Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/importxml', 'App\Http\Controllers\ReadXMLController@index');
    Route::get('/importpics', 'App\Http\Controllers\ImportImagesController@index');
    Route::get('/clear-cache', function () {
        Cache::flush();
        echo "cache limpo";
    });
//});

Route::namespace('App\Http\Controllers\Backend')->group(function() {

    Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
        Route::get('/admin', 'AdminController@index')->name('dashboard');

        //home
        Route::get('/admin/home', 'HomeController@index')->name('admin.home.edit');
        Route::post('/admin/home/', 'HomeController@update')->name('admin.home.update');

        Route::get('/admin/services', 'ServicesController@index')->name('services');
        Route::get('/admin/services/edit', 'ServicesController@edit')->name('service.edit');
        Route::get('/admin/services/update', 'ServicesController@update')->name('service.update');
        Route::post('/admin/services/create', 'ServicesController@create')->name('service.create');

        Route::get('/admin/user', 'UserController@index')->name('user.index');
        Route::get('/admin/user/edit/{user_id?}', 'UserController@edit')->name('user.edit');
        Route::get('/admin/user/delete/{user_id}', 'UserController@delete')->name('user.delete');
        Route::post('/admin/user/update', 'UserController@update')->name('user.update');
        Route::post('/admin/user/password', 'UserController@password')->name('user.password');
        Route::post('/admin/user/create', 'UserController@create')->name('user.create');

        //Route::get('user', 'App\Http\Controllers\Backend\UserController', ['except' => ['show']]);
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Backend\ProfileController@edit']);
        Route::post('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Backend\ProfileController@update']);
        Route::post('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Backend\@password']);

    });
});

Route::get('/{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
