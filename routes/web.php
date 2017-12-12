<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth:web']], function ($route) {
    $route->get('/', 'TaskController@index')->name('home');
    $route->get('/home', 'TaskController@index')->name('home');
    
    $route->get('/tasks', 'TaskController@index')->name('tasks');
    $route->get('/task/add', 'TaskController@add')->name('task_add');
    $route->get('/task/edit/{id}', 'TaskController@edit')->where('id', '[0-9]+')->name('task_edit');
    $route->post('/task/save', 'TaskController@save')->name('task_save');
    $route->post('/task/complete', 'TaskController@complete')->name('task_complete');
});

