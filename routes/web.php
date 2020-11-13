<?php

use Illuminate\Support\Facades\Route;

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

// 前台域名分组
Route::domain('laravel01.yqc.ink')->group(function(){

});
// 后台域名分组
Route::domain('admin.yqc.ink')->group(function(){
    Route::view('/', 'admin.layout.main');
});