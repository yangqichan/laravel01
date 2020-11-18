<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Admin_role;
use App\Models\Role_menu;
class LoginController extends Controller
{
    // 登录界面
    public function login()
    {
        return view('admin.login');
    }
    // 登录
    public function logindo(Request $request)
    {
        // 接值
        $data = $request->except('_token');
        if (!$data['usernem'] || !$data['pwd']) {
            return redirect('/login')->with('error','用户名或密码不能为空');
        }
        $res = Admin::where('admin_account',$data['usernem'])->get();
        if(count($res)!=0){
            // 验证密码        // 文本        // 哈希密码
            if (Hash::check($data['pwd'], $res[0]->admin_pwd)) {
                session(['admin'=>$res[0]]);
                foreach($res as $k=>$v){
                    $role_id=Admin_role::where('admin_id',$v->admin_id)->value('role_id');
                    $menu_id=Role_menu::where('role_id',$role_id)->get();
                    foreach ($menu_id as $key => $value) {
                        $id=$value->menu_id;
                        session([$id=>$id]);
                    }                    
                    //dd(session("25"));
                    //dd(session('id'));
                }
                // 验证通过重定向
                return redirect('/');
            }
        }
        // 验证失败重定向
        return redirect('/login')->with('error','用户名或密码错误');
    }
    // 退出登录
    public function unlogin()
    {
        session(['admin'=>null]);
        return redirect('/login');
    }
}
