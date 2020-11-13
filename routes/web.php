<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OperateController;
use App\Http\Controllers\Admin\LoginController;
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
    Route::view('/', 'admin.adminmain.index');
    Route::any('/login', [LoginController::class, 'login']);
    Route::any('/logindo', [LoginController::class, 'logindo']);
    // 运营模块
    Route::prefix('operate')->group(function(){
        Route::any('/',[OperateController::class , 'operate'])->name('operate');
    });
});