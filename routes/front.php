<?php

Route::get('/', 'HomeController@index')->name('front_home');

Route::get('/page/{id}', 'HomeController@Pages')->name('page_front');

Route::get('/checkout', 'HomeController@applyCoupon')->name('apply_coupon');