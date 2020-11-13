<?php

namespace App\Http\Controllers\AdministratorController;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdministratorController extends Controller
{
    //登录
    public function AdminLogin()
    {
        return view('admin.AdminLogin');
    }
    //后台首页
    public function AdminHome(){
        return view('admin.');
    }
    //管理员
    public function Adminuser(){

    }
    //添加管理员
    public  function InsertAdminuser(){

    }
    //角色
    public function Adminrole(){

    } 
    //添加角色
    public function InsertAdminrole(){

    }
    //权限
    public function Adminmenu(){

    }
    //添加权限
    public function InsertAdminmenu(){
        
    } 
}
