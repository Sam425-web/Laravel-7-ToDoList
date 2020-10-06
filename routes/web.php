<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('index');
});

Auth::routes();

Route::get('/home', function(){
return abort(404);
});


Route::resource('/todo', 'TodoController');

Route::put('/todo/{id}/complete', 'TodoController@complete')->name('todo.complete');
Route::delete('/todo/{id}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
