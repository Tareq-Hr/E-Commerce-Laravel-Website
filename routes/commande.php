<?php

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth','prefix' => '/admin/commande/'], function () {

        Route::get('list', 'CommandeController@index')
            ->name('commande')
            ->middleware('Admin:Commande');
        
        Route::get('create', 'CommandeController@create')
            ->name('commande_create')
            ->middleware('Admin:Commande');
        
        Route::post('create', 'CommandeController@store')
            ->name('commande_store')
            ->middleware('Admin:Commande');
        
        Route::get('{id}/delete', 'CommandeController@destroy')
            ->name('commande_delete')
            ->middleware('Admin:Commande')
            ->where('id', '[0-9]+');
        
        /*Route::get('{id}', 'CommandeController@show')
            ->name('commande_show')
            ->middleware('Admin:Commande')
            ->where('id', '[0-9]+');*/
        
        Route::get('{id}/edit', 'CommandeController@edit')
            ->name('commande_edit')
            ->middleware('Admin:Commande')
            ->where('id', '[0-9]+');

        Route::get('{id}', 'CommandeController@edit')
            ->name('commande_show')
            ->middleware('Admin:Commande')
            ->where('id', '[0-9]+');
        
        Route::post('{id}', 'CommandeController@update')
            ->name('commande_update')
            ->middleware('Admin:Commande')
            ->where('id', '[0-9]+');

        Route::get('{id}/afficher','CommandeController@afficherCommande')->name('afficher_commande');
        
    });
});