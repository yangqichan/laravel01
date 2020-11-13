<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdministratorController extends Controller
{
    //管理员
    public function Adminuser(){
        return view('admin\RBAC\Adminuser');
    }
    //添加管理员
    public  function InsertAdminuser(Request $request){
        $data=$request->except('_token');
        $admin_account=$request->admin_account;
        $admin_pwd=$request->admin_pwd;
        $data=Admin::insert(['admin_account'=>$admin_account,'admin_pwd'=>Hash::make($request->admin_pwd)]);
        if($data){
            return redirect('admin/ListAdminuser');
        }else{
            return redirect('admin/Adminuser');
        }
    }
    //管理员列表
    public function ListAdminuser(){
        $data=Admin::get();
        return view('admin.RBAC.ListAdminuser',['data'=>$data]);
    }
    //角色
    public function Adminrole(){
        $data=Menu::get();
        return view('admin\RBAC\Adminrole',['data'=>$data]);
    } 
    //添加角色
    public function InsertAdminrole(Request $request){
        $data=$request->except('_token');
        $data=Role::insert($data);
        if($data){
            return redirect('admin/ListAdminrole');
        }else{
            return redirect('admin/Adminrole');
        }
    }
    //角色列表
    public function ListAdminrole(){
        $data=Role::get();
        return view('admin.RBAC.ListAdminrole',['data'=>$data]);
    }
    //权限
    public function Adminmenu(){
        return view('admin\RBAC\Adminmenu');
    }
    //添加权限
    public function InsertAdminmenu(Request $request){
        $data=$request->except('_token');
        $data=Menu::insert($data);
        if($data){
            return redirect('admin.ListAdminmenu');
        }else{
            return redirect('admin.Adminmenu');
        }
    } 
    //权限列表
    public function ListAdminmenu(){
        $data=Menu::select();
        return view('admin.RBAC.ListAdminmenu',['data'=>$data]);
    }
}
