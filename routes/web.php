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

// 文章
Route::get('articles','home\ArticleController@index'); // 文章列表



// 后台的laravel-admin
//require_once 'admin.php';


// 测试
Route::get('testBlade','test\TestBladeController@testBlade');
Route::get('testAssign','test\TestBladeController@testAssign');
Route::get('testEditor','test\EditorController@index');


