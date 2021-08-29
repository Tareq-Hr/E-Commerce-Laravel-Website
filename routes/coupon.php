<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth','prefix' => '/admin/coupon/'], function () {


        Route::get('list', 'CouponController@index')
            ->name('coupon')
            ->middleware('Admin:Coupon');
        
        Route::get('create', 'CouponController@create')
            ->name('coupon_create')
            ->middleware('Admin:Coupon');
        
        Route::post('create', 'CouponController@store')
            ->name('coupon_store')
            ->middleware('Admin:Coupon');
        
        Route::get('{id}/delete', 'CouponController@destroy')
            ->name('coupon_delete')
            ->middleware('Admin:Coupon')
            ->where('id', '[0-9]+');
        
        /*Route::get('{id}', 'CouponController@show')
            ->name('coupon_show')
            ->middleware('Admin:Coupon')
            ->where('id', '[0-9]+');*/
        
        Route::get('{id}/edit', 'CouponController@edit')
            ->name('coupon_edit')
            ->middleware('Admin:Coupon')
            ->where('id', '[0-9]+');

        Route::get('{id}', 'CouponController@edit')
            ->name('coupon_show')
            ->middleware('Admin:Coupon')
            ->where('id', '[0-9]+');
        
        Route::post('{id}', 'CouponController@update')
            ->name('coupon_update')
            ->middleware('Admin:Coupon')
            ->where('id', '[0-9]+');
        
    });
});