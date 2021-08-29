<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth','prefix' => '/admin/souscategorie/'], function () {

        Route::get('list', 'SousCategorieController@index')
            ->name('souscategorie')
            ->middleware('Admin:SousCategorie');
        
        Route::get('create', 'SousCategorieController@create')
            ->name('souscategorie_create')
            ->middleware('Admin:SousCategorie');
        
        Route::post('create', 'SousCategorieController@store')
            ->name('souscategorie_store')
            ->middleware('Admin:SousCategorie');
        
        Route::get('{id}/delete', 'SousCategorieController@destroy')
            ->name('souscategorie_delete')
            ->middleware('Admin:SousCategorie')
            ->where('id', '[0-9]+');
        
        /*Route::get('{id}', 'SousCategorieController@show')
            ->name('souscategorie_show')
            ->middleware('Admin:SousCategorie')
            ->where('id', '[0-9]+');*/
        
        Route::get('{id}/edit', 'SousCategorieController@edit')
            ->name('souscategorie_edit')
            ->middleware('Admin:SousCategorie')
            ->where('id', '[0-9]+');

        Route::get('{id}', 'SousCategorieController@edit')
            ->name('souscategorie_show')
            ->middleware('Admin:SousCategorie')
            ->where('id', '[0-9]+');
        
        Route::post('{id}', 'SousCategorieController@update')
            ->name('souscategorie_update')
            ->middleware('Admin:SousCategorie')
            ->where('id', '[0-9]+');
        
    });
});