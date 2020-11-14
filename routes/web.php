<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdministratorController;//RBAC

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
    Route::view('/', 'admin.adminmain.index');
});
//后台模块
Route::domain('admin.yqc.ink')->group(function(){
	//后台首页
    Route::view('/', 'admin.adminmain.index');
    //RBAC 后台管理员
    Route::get('/admin/Adminuser',[AdministratorController::class,'Adminuser']);
    //RBAC 后台管理员添加
    Route::post('/admin/InsertAdminuser',[AdministratorController::class,'InsertAdminuser']);
    //RBAC 后台管理员列表
    Route::get('/admin/ListAdminuser',[AdministratorController::class,'ListAdminuser']);
    //RBAC 后台角色
    Route::get('/admin/Adminrole',[AdministratorController::class,'Adminrole']);
    //RBAC 后台角色添加
    Route::post('/admin/InsertAdminrole',[AdministratorController::class,'InsertAdminrole']);
    //RBAC 后台角色列表
    Route::get('/admin/ListAdminrole',[AdministratorController::class,'ListAdminrole']);
    //RBAC 后台权限
    Route::get('/admin/Adminmenu',[AdministratorController::class,'Adminmenu']);
    //RBAC 后台权限添加
    Route::post('/admin/InsertAdminmenu',[AdministratorController::class,'InsertAdminmenu']);
    //RBAC 后台权限列表
    Route::get('/admin/ListAdminmenu',[AdministratorController::class,'ListAdminmenu']);
});



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


//前台模块



//商家模块
