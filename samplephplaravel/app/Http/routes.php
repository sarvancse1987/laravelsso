<?php
Route::get('/', function () {
   return view('welcome');
});

Route::get('role',[
   'middleware' => 'Role',
   'uses' => 'TestController@index',
]);