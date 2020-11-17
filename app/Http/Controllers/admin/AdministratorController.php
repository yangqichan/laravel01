<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Admin_role;
use App\Models\Role_menu;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdministratorController extends Controller
{
    //登录
    public function AdminLogin()
    {
        return view('admin.AdminLogin');
    }
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
        foreach($data as $k=>$v){
            $id=Admin_role::where('admin_id',$v->admin_id)->value('role_id');
            $data[$k]['role_name']=Role::where('role_id',$id)->value('role_name');
        }
        return view('admin.RBAC.ListAdminuser',['data'=>$data]);
    }
    //后台管理员添加角色页面
    public function Adminuserrole($id){
        $data=Role::get();
        $name=Admin::where('admin_id',$id)->value('admin_account');
        return view('admin/RBAC/InsertAdminuserrole',['data'=>$data,'id'=>$id,'name'=>$name]); 
    }
    //后台管理员添加角色
    public function InsertAdminuserrole(Request $request){
        $data=$request->except('_token');
        $rr=Admin_role::where($data)->first();
        if($rr){
            return redirect('admin/Adminuser');
        }
        $arr=Admin_role::insert($data);
        if($arr){
            return redirect('admin/ListAdminuser');
        }else{
            return redirect('admin/Adminuser');
        }
    }
    //后台管理员删除
    public function DeleteAdminuser($id){
        DB::beginTransaction();
        try {  
            $arr=Admin_role::where('admin_id','=',$id)->delete();
            $data=Admin::where('admin_id','=',$id)->delete(); 
            DB::commit();  
            return redirect('admin/ListAdminuser');
        } catch (PDOException $e) {  
            return redirect('admin/Adminuser');
        }
       
        
    }
    //后台管理员修改页面
    public function UpdateAdminuser($id){
        $admin_account=Admin::where('admin_id',$id)->value('admin_account');
        $role_id=Admin_role::where('admin_id',$id)->value('role_id');
        $role=Role::get();
        return view('admin\RBAC\UpdateAdminuser',['role'=>$role,'admin_account'=>$admin_account,'role_id'=>$role_id,'id'=>$id]);
    }
    //后台管理员修改
    public function UpdateAdminsuser(Request $request){
        $admin_id=$request->admin_id;
        $admin_account=$request->admin_account;
        $role_id=$request->role_id;
        //dd($role_id);
        DB::beginTransaction();
        try {  
            $arr=Admin::where('admin_id',$admin_id)->update(['admin_account'=>$admin_account]);
            $data=Admin_role::where('admin_id',$admin_id)->update(['role_id'=>$role_id]); 
            DB::commit();  
            return redirect('admin/ListAdminuser');
        } catch (PDOException $e) {  
            return redirect('admin/Adminuser');
        }
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
        
        foreach($data as $k=>$v){
            $arr=[];
            $menu=Role_menu::where('role_id',$v->role_id)->get();
            foreach($menu as $q=>$a){
                $arr[]=Menu::where('menu_id',$a->menu_id)->get();
            }
            // foreach($arr as $e=>$c){
            //     foreach($c as $s=>$g){
            //         dd($g);
            //     }
            // }
            $data[$k]['gg']=$arr;
            //$data[$k][$v]['menu']=Menu::whereIn('menu_id',$menu)->get();
        }

        return view('admin.RBAC.ListAdminrole',['data'=>$data]);
    }
    //后台角色添加权限页面@foreach($menu as $q=>$a) checked="{{$v->menu_id}}==$a->menu_id?'"checked":''" @endforeach 
    public function Adminrolemenu($id){
        $data=Menu::where('pid',0)->get();
        $menu_id=Role_menu::where('role_id',$id)->get();
        $name=Role::where('role_id',$id)->value('role_name');
        //$menu_id=$menu_id;
        //dd($data);
        return view('admin/RBAC/InsertAdminrolemenu',['data'=>$data,'id'=>$id,'name'=>$name,'menu'=>$menu_id]); 
    }
    //后台角色添加权限
    public function InsertAdminrolemenu(Request $request){
        $data=$request->except('_token');
        $rr=Role_menu::where($data)->first();
        if($rr){
            return redirect('admin/Adminrole');
        }
        $arr=Role_menu::insert($data);
        if($arr){
            return redirect('admin/ListAdminrole');
        }else{
            return redirect('admin/Adminrole');
        }
    }
    //后台角色删除
    public function DeleteAdminrole($id){
        DB::beginTransaction();
        try {  
            $arr=Role_menu::where('role_id','=',$id)->delete();
            $data=Role::where('role_id','=',$id)->delete();
            $add=Admin_role::where('role_id',$id)->delete(); 
            DB::commit();  
            return redirect('admin/ListAdminrole');
        } catch (PDOException $e) {  
            return redirect('admin/Adminrole');
        }
       
        
    }
    //后台角色修改页面
    public function UpdateAdminrole($id){
        $role_name=Role::where('role_id',$id)->value('role_name');
        $menu_id=Role_menu::where('menu_id',$id)->value('menu_id');
        $menu=Menu::where('pid',0)->get();
        return view('admin\RBAC\UpdateAdminrole',['menu'=>$menu,'role_name'=>$role_name,'menu_id'=>$menu_id,'id'=>$id]);
    }
    //后台角色修改
    public function UpdateAdminsrole(Request $request){
        //dd($request->商品管理);
        $role_id=$request->role_id;
        $role_name=$request->role_name;
        //dd($role_id);
        DB::beginTransaction();
        try {  
            if($request->商品管理){
                $arr1=Role_menu::where('role_id',$role_id)->update(['menu_id'=>$request->商品管理]);
                if($arr1){
                    
                }else{
                    Role_menu::insert([['role_id'=>$role_id],['menu_id'=>$menu_id]]);
                }
            }
            if($request->后台统计){
                $arr1=Role_menu::where('role_id',$role_id)->update(['menu_id'=>$request->后台统计]);
                if($arr1){
                    
                }else{
                    Role_menu::insert([['role_id'=>$role_id],['menu_id'=>$request->后台统计]]);
                }
            }
            if($request->优惠管理){
                $arr1=Role_menu::where('role_id',$role_id)->update(['menu_id'=>$request->优惠管理]);
                if($arr1){
                    
                }else{
                    Role_menu::insert([['role_id'=>$role_id],['menu_id'=>$request->优惠管理]]);
                }
            }
            if($request->商品品牌){
                $arr1=Role_menu::where('role_id',$role_id)->update(['menu_id'=>$request->商品品牌]);
                if($arr1){
                    
                }else{
                    Role_menu::insert([['role_id'=>$role_id],['menu_id'=>$request->商品品牌]]);
                }
            }
            if($request->商品分类){
                $arr1=Role_menu::where('role_id',$role_id)->update(['menu_id'=>$request->商品分类]);
                if($arr1){
                    
                }else{
                    Role_menu::insert([['role_id'=>$role_id],['menu_id'=>$request->商品分类]]);
                }
            }
            if($request->商品类型){
                $arr1=Role_menu::where('role_id',$role_id)->update(['menu_id'=>$request->商品类型]);
                if($arr1){
                    
                }else{
                    Role_menu::insert([['role_id'=>$role_id],['menu_id'=>$request->商品类型]]);
                }
            }
            if($request->管理员管理){
                $arr1=Role_menu::where('role_id',$role_id)->update(['menu_id'=>$request->管理员管理]);
                if($arr1){
                    
                }else{
                    Role_menu::insert([['role_id'=>$role_id],['menu_id'=>$request->管理员管理]]);
                }
            }
            $arr=Role::where('role_id',$role_id)->update(['role_name'=>$role_name]);
            $data=Role_menu::where('role_id',$role_id)->update(['menu_id'=>$menu_id]); 
            DB::commit();  
            return redirect('admin/ListAdminrole');
        } catch (PDOException $e) {  
            return redirect('admin/Adminuser');
        }
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
            return redirect('admin/ListAdminmenu');
        }else{
            return redirect('admin/Adminmenu');
        }
    } 
    //权限列表
    public function ListAdminmenu(){
        $data=Menu::get();
        return view('admin.RBAC.ListAdminmenu',['data'=>$data]);
    }
}
