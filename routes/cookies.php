<?php

Route::post('/setcookie','CookiesController@setCookie')->name('setcookie');

Route::get('/removeAll', 'CookiesController@deleteAll')->name('remove_all');