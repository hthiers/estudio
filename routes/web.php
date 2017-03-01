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

Route::group(['middleware' => 'auth'], function()
{

    Route::get('/', 'EstudioController@index')->name('inicio');
    Route::get('agenda',  [
        'as' => 'agenda', 'uses' => 'AgendaController@index'
    ])->name('agenda');
    Route::get('clientes', 'ClientesController@index')->name('clientes');
    Route::post('clientes', 'ClientesController@add');
    Route::get('clientes/{id}', 'ClientesController@getAjax')->where('id', '[0-9]+');
    Route::get('clientes/{slug}', 'ClientesController@get')->name('cliente');
    Route::post('clientes/edit', 'ClientesController@edit');
    Route::post('clientes/borrar', 'ClientesController@delete');
    Route::get('expedientes', 'ExpedientesController@index')->name('expedientes');
    Route::get('api/clientes', function()
    {
        $clientes = Cliente::get();
        return Datatables::of($clientes)->make(true);
    });
    Route::get('api/prueba', function(){
        $clientes = Cliente::get()->with($this->attributes['fullname']);
        return Datatables::of($clientes)->make(true);
    });
});

