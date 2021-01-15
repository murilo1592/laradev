<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imoveis', 'PropertyController@index');

Route::get('/imoveis/novo', 'PropertyController@create');
Route::post('/imoveis/store', 'PropertyController@store');

Route::get('imoveis/{name}', 'PropertyController@show');

Route::get('imoveis/editar/{name}', 'PropertyController@edit');
Route::put('imoveis/update/{id}', 'PropertyController@update');

Route::get('imoveis/remover/{id}', 'PropertyController@destroy');
