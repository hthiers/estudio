<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', 'EstudioController@index')->name('inicio');
    Route::get('agenda',  [
        'as' => 'agenda', 'uses' => 'AgendaController@index'
    ])->name('agenda');
    Route::get('clientes', 'ClientesController@index')->name('clientes');
    Route::get('clientes/{id}', 'ClientesController@getAjax')->where('id', '[0-9]+');
    Route::get('clientes/{slug}', 'ClientesController@get')->name('cliente');
    Route::post('clientes/addOrUpdate', 'ClientesController@addOrUpdate');
    Route::post('clientes/borrar', 'ClientesController@delete');
    Route::get('expedientes', 'ExpedientesController@index')->name('expedientes');
});

