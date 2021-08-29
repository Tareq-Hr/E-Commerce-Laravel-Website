<?php

Route::get('/checkout-form', function(){
	return view('checkout');
})->name('checkout');