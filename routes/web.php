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


Auth::routes();

//Route::get('/',function(){
//    return view('layouts.fronteend.app');
//});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::prefix('page')->group(function () {

    Route::get('banner/{id}', 'HomeController@getbanner')->name('page.banner');
    Route::post('email/','HomeController@postemail')->name('page.email');
    Route::get('setting/{name}','FrontendController@getsetting')->name('page.setting');
    Route::get('banner/{id}', 'HomeController@getbanner')->name('page.banner');

});

    Route::resource('gallery', 'GalleryController');
    Route::get('/gallery', 'GalleryController@index')->name('gallery.index');
    Route::get('/show/{slug}', 'GalleryController@show')->name('gallery.show');

    Route::resource('contact', 'ContactController');
    Route::get('/contact-us', 'ContactController@index')->name('contact.index');
    Route::post('contact/store', 'ContactController@store')->name('contact.store');

    Route::resource('about-us', 'AboutController');
    Route::get('/about','AboutController@index')->name('about-us.index');


    Route::resource('event','EventController');
    Route::get('/event-list','EventController@index')->name('event.index');
Route::get('/event-list/show/{slug}','EventController@show')->name('event.show');



    Route::get('content/{slug}/', 'ContentController@show')->name('content.show');
    Route::get('about', 'ContentController@about')->name('content.about');


    Route::resource('services','ServicesController');
    Route::get('/services/{category}', 'ServicesController@index')->name('services.index');
    Route::get('services/{slug}/', 'ServicesController@show')->name('services.show');
    Route::get('service/getsingle', array('as' => 'service.getsingle', 'uses' =>'ServicesController@getsingle'));
    Route::get('/servicescategory/{category}', 'ServicesController@category')->name('services.category');
    Route::resource('products','ProductsController');
    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::get('products/{slug}/', 'ProductsController@show')->name('products.show');

/*
 * Social Login Routes
 */

Route::group(['prefix' => 'admin', 'namespace' => 'Admin\Auth', 'middleware' => 'web'], function () {
    Route::get('/', array('as' => 'admin', 'uses' => 'AuthController@redirectLogin'));
    Route::get('login', array('as' => 'admin.login', 'uses' => 'AuthController@getLogin'));
    Route::post('login', array('as' => '', 'before' => 'csrf', 'uses' => 'AuthController@postLogin'));
    Route::get('logout', array('as' => 'admin.logout', 'uses' => 'AuthController@getLogout'));

});


Route::get('locale', function () {
    return \App::getLocale();
});

Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
});




Route::resource('blogs','BlogController');
Route::get('/blog', 'BlogController@index')->name('blogs.index');
Route::get('blog/show/{slug}', 'BlogController@show')->name('blogs.show');

;


Route::resource('faqs','FaqController');
Route::get('/faq', 'FaqController@index')->name('faqs.index');

Route::get('chairman-message/{id}','MessageController@show')->name('message.show');



Route::get('/board-of-directors', 'TeamController@index')->name('teams.index');
Route::get('/management','TeamController@list')->name('teams.list');
Route::get('/central-executive-board/{id}','TeamController@show')->name('teams.show');

