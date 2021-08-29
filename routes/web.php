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

Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('home', 'HomeController@admin')->name('home');
        Route::get('admin', 'HomeController@admin')->name('admin');
    });
});


Auth::routes();

Route::get('front_home', 'HomeController@getImagesByCategory')->name('get_images_by_category');

Route::get('/confidentiality', function(){
	return view('confidentiality');
})->name('confidentiality');

Route::post('/validate_command','HomeController@validateCommand')->name('valider');

include 'user.php';
include 'media.php';
include 'groupe.php';
include 'article.php';
include 'categorie.php';
include 'sous_categorie.php';
include 'front.php';
include 'detail.php';
include 'page.php';
include 'cart.php';
include 'checkout.php';
include 'thankyou.php';
include 'cookies.php';
include 'coupon.php';
include 'client.php';
include 'commande.php';