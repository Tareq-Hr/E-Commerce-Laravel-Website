<?php

Route::get('/cart', function(){
	return view('cart');
})->name('cart');