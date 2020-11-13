<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;

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
Route::domain('www.yqc.ink')->group(function(){

});
// 后台域名分组
Route::domain('admin.yqc.ink')->group(function(){
    Route::view('/admin', 'admin.layout.main');
    //品牌
    Route::prefix('brand')->namespace('Admin')->group(function(){
        Route::get('/create',[BrandController::class, 'create']);
        Route::get('store',[BrandController::class, 'store']);
    });
    
});