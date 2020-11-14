<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;//品牌
use App\Http\Controllers\Admin\CategoryController;//分类
use App\Http\Controllers\Admin\GoodsController;//商品
use App\Http\Controllers\Admin\GoodstypeController;//商品类型
use App\Http\Controllers\Admin\GoodsattrController;//商品属性
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

    //品牌
    Route::prefix('brand')->group(function(){
        Route::get('/create',[BrandController::class, 'create'])->name('brand.create');
        Route::post('/store',[BrandController::class, 'store'])->name('brand.store');
        Route::get('/index',[BrandController::class, 'index'])->name('brand.index');
        Route::any('/del/{id}',[BrandController::class, 'destroy'])->name('brand.del');
        Route::any('/edit/{id}',[BrandController::class, 'edit'])->name('brand.edit');
        Route::any('/update/{id}',[BrandController::class, 'update'])->name('brand.update');
    });
    //分类
    Route::prefix('category')->group(function(){
        Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
        Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
        Route::get('/index',[CategoryController::class, 'index'])->name('category.index');
        Route::any('/del/{id}',[CategoryController::class, 'destroy'])->name('category.del');
        Route::any('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
        Route::any('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    });
    //商品
    Route::prefix('goods')->group(function(){
        Route::get('/create',[GoodsController::class, 'create'])->name('goods.create');
        Route::post('/store',[GoodsController::class, 'store'])->name('goods.store');
        Route::get('/index',[GoodsController::class, 'index'])->name('goods.index');
        Route::any('/del/{id}',[GoodsController::class, 'destroy'])->name('goods.del');
        Route::any('/edit/{id}',[GoodsController::class, 'edit'])->name('goods.edit');
        Route::any('/update/{id}',[GoodsController::class, 'update'])->name('goods.update');
    });
    //商品类型
    Route::prefix('goodstype')->group(function(){
        Route::get('/create',[GoodstypeController::class, 'create'])->name('goodstype.create');
        Route::post('/store',[GoodstypeController::class, 'store'])->name('goodstype.store');
        Route::get('/index',[GoodstypeController::class, 'index'])->name('goodstype.index');
        Route::any('/del/{id}',[GoodstypeController::class, 'destroy'])->name('goodstype.del');//没写
        Route::any('/edit/{id}',[GoodstypeController::class, 'edit'])->name('goodstype.edit');//没写
        Route::any('/update/{id}',[GoodstypeController::class, 'update'])->name('goodstype.update');//没写
    });
    //商品属性
    Route::prefix('goodsattr')->group(function(){
        Route::get('/create/{type_id}',[GoodsattrController::class, 'create'])->name('goodsattr.create');
        Route::post('/store',[GoodsattrController::class, 'store'])->name('goodsattr.store');
        Route::get('/index/{type_id}',[GoodsattrController::class, 'index'])->name('goodsattr.index');
        Route::any('/del/{id}',[GoodsattrController::class, 'destroy'])->name('goodsattr.del');//没写
        Route::any('/edit/{id}',[GoodsattrController::class, 'edit'])->name('goodsattr.edit');//没写
        Route::any('/update/{id}',[GoodsattrController::class, 'update'])->name('goodsattr.update');//没写
    });
    Route::view('/', 'admin.adminmain.index');
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