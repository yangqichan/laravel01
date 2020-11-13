<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Couponcontroller;  //优惠模块

use App\Http\Controllers\Admin\OperateController; //运营模块

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

    //优惠模块
    Route::prefix('coupon')->group(function(){
    	Route::any('create', [Couponcontroller::class, 'create'])->name('coupon.create');  //优惠添加
    	Route::any('/', [Couponcontroller::class, 'index'])->name('coupon.index');         //优惠展示
    	Route::any('del', [Couponcontroller::class, 'destroy'])->name('coupon.del');       //优惠删除
    	Route::any('update', [Couponcontroller::class, 'update'])->name('coupon.update');  //优惠修改
	});
    // 运营模块
    Route::prefix('operate')->group(function(){
        Route::any('/',[OperateController::class , 'operate'])->name('operate');
    });
});