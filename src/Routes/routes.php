<?php

Route::get('uber', '\Packages\Uber\Controllers\UberController@index');
Route::post('save', '\Packages\Uber\Controllers\UberController@save');
Route::get('show/{id}', '\Packages\Uber\Controllers\UberController@show');
Route::put('update/{id}', '\Packages\Uber\Controllers\UberController@update');