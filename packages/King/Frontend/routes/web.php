<?php

Route::group(['namespace' => 'King\Frontend\Http\Controllers'], function($route) {
    $route->group(['middleware' => 'web'], function($route) {
        
//        $route->get('/', 'IndexController@index');
//        
//        // Authentication Routes.
//        $route->get('login', 'Auth\LoginController@showLoginForm')->name('front_login');
//        $route->post('login', 'Auth\LoginController@login')->name('front_login_post');
//        $route->get('logout', 'Auth\LoginController@logout')->name('front_logout');
    });
});