<?php

// 后台laravel-admin的路由

Route::group(['prefix'=>'admin'],function(){

    Route::get('/','\App\Admin\Controllers\UserController@index');



});