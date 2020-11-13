<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdministratorController;

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

