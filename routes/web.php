<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;//品牌
use App\Http\Controllers\Admin\CategoryController;//分类
use App\Http\Controllers\Admin\GoodsController;//商品
use App\Http\Controllers\Admin\GoodstypeController;//商品类型
use App\Http\Controllers\Admin\GoodsattrController;//商品属性
use App\Http\Controllers\Admin\OperateController;       // 后台运营
use App\Http\Controllers\Admin\LoginController;         // 登录
use App\Http\Controllers\Admin\AdministratorController; // RBAC
use App\Http\Controllers\Admin\Couponcontroller;        // 优惠模块
use App\Http\Controllers\Admin\AdController;            //广告模块
use App\Http\Controllers\Admin\PositionController;      //广告位模块
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
    Route::view('/', 'index.indexmain.index');                        // 前台首页
    Route::view('/login', 'index.rl.login');                          // 前台登录
    Route::view('/reg', 'index.rl.reg');                     // 前台注册
});
//后台模块
Route::domain('admin.yqc.ink')->group(function(){

    Route::any('/login', [LoginController::class, 'login']);     // 登录界面
    Route::any('/logindo', [LoginController::class, 'logindo']); // 登录
    Route::any('/unlogin', [LoginController::class, 'unlogin']); // 退出登录

    Route::middleware('Admin')->group(function(){
        // 后台首页
        Route::view('/', 'admin.adminmain.index');
        // RBAC 后台管理员
        Route::prefix('admin')->group(function(){
            // 管理员添加
            Route::get('/Adminuser',[AdministratorController::class,'Adminuser']);
            // 管理员添加   #没加验证
            Route::any('/InsertAdminuser',[AdministratorController::class,'InsertAdminuser']);
            // 管理员列表
            Route::get('/ListAdminuser',[AdministratorController::class,'ListAdminuser']);
            // 后台角色添加
            Route::get('/Adminrole',[AdministratorController::class,'Adminrole']);
            // RBAC 后台角色添加
            Route::post('/InsertAdminrole',[AdministratorController::class,'InsertAdminrole']);
            // RBAC 后台角色列表
            Route::get('/ListAdminrole',[AdministratorController::class,'ListAdminrole']);
            // RBAC 后台菜单表单
            Route::get('/Adminmenu',[AdministratorController::class,'Adminmenu']);
            // RBAC 后台菜单添加
            Route::post('/InsertAdminmenu',[AdministratorController::class,'InsertAdminmenu']);
            // RBAC 后台菜单列表
            Route::get('/ListAdminmenu',[AdministratorController::class,'ListAdminmenu']);
        });

        //优惠模块
        Route::prefix('coupon')->group(function(){
        Route::any('create', [Couponcontroller::class, 'create'])->name('coupon.create');  //优惠添加
        Route::any('store', [Couponcontroller::class, 'store'])->name('coupon.store');  //优惠执行添加
        Route::any('/', [Couponcontroller::class, 'index'])->name('coupon.index');         //优惠展示
        Route::any('del/{id}', [Couponcontroller::class, 'destroy'])->name('coupon.del');       //优惠删除
        Route::any('edit/{id}', [Couponcontroller::class, 'edit'])->name('coupon.edit');  //优惠修改
        Route::any('update/{id}', [Couponcontroller::class, 'update'])->name('coupon.update');  //优惠修改
         });
        // 运营模块
        Route::prefix('operate')->group(function(){
            Route::any('/',[OperateController::class , 'operate'])->name('operate');
        });

        //广告模块
        Route::prefix('ad')->group(function(){
            Route::any('/',[AdController::class , 'index'])->name('ad');                   //广告展示
            Route::any('create',[AdController::class , 'create'])->name('ad.create');      //广告添加
            Route::any('store',[AdController::class , 'store'])->name('ad.store');         //广告执行添加
            Route::any('del/{id}',[AdController::class, 'destroy'])->name('ad.del');       //广告删除
            Route::any('edit/{id}',[AdController::class, 'edit'])->name('ad.edit');        //广告修改
            Route::any('update/{id}',[AdController::class , 'update'])->name('ad.update'); //广告执行修改
        });

        //广告位模块
        Route::prefix('position')->group(function(){
            Route::any('/',[PositionController::class , 'index'])->name('position');              //广告位展示
            Route::any('create',[PositionController::class , 'create'])->name('position.create'); //广告位添加
            Route::any('store',[PositionController::class , 'store'])->name('position.store');    //广告位执行添加
            Route::any('del/{id}',[PositionController::class, 'destroy'])->name('position.del');  //广告位删除
            Route::any('edit/{id}',[PositionController::class, 'edit'])->name('position.edit');   //广告位修改
            Route::any('update/{id}',[PositionController::class , 'update'])->name('position.update'); //广告位执行修改
            Route::any('show/{id}',[PositionController::class, 'show'])->name('position.edit');   //广告位查看广告
        });
    });

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
            Route::any('/goodsattr',[GoodsController::class, 'goodsattr'])->name('goods.goodsattr');
            Route::any('/product',[GoodsController::class, 'product'])->name('goods.product');
            Route::any('/del/{id}',[GoodsController::class, 'destroy'])->name('goods.del');
            Route::any('/edit/{id}',[GoodsController::class, 'edit'])->name('goods.edit');
            Route::any('/update/{id}',[GoodsController::class, 'update'])->name('goods.update');
        });
        //商品类型
        Route::prefix('goodstype')->group(function(){
            Route::get('/create',[GoodstypeController::class, 'create'])->name('type.create');
            Route::post('/store',[GoodstypeController::class, 'store'])->name('type.store');
            Route::get('/index',[GoodstypeController::class, 'index'])->name('type.index');
            Route::any('/del/{id}',[GoodstypeController::class, 'destroy'])->name('type.del');
            Route::any('/edit/{id}',[GoodstypeController::class, 'edit'])->name('type.edit');
            Route::any('/update/{id}',[GoodstypeController::class, 'update'])->name('type.update');
        });
        //商品属性
        Route::prefix('goodsattr')->group(function(){
            Route::get('/create/{type_id}',[GoodsattrController::class, 'create'])->name('attr.create');
            Route::post('/store',[GoodsattrController::class, 'store'])->name('sattr.store');
            Route::get('/index/{type_id}',[GoodsattrController::class, 'index'])->name('attr.index');
            Route::any('/del/{id}',[GoodsattrController::class, 'destroy'])->name('attr.del');
            Route::any('/edit/{id}',[GoodsattrController::class, 'edit'])->name('attr.edit');
            Route::any('/update/{id}',[GoodsattrController::class, 'update'])->name('attr.update');
        });
});

