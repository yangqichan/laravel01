<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Admin;
class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function logindo(Request $request)
    {
        // 接值
        $data = $request->except('_token');
        $res = Admin::where('admin_account',$data['usernem'])->get();
        if(!$res){
            // 验证密码        // 文本        // 哈希密码
            if (Hash::check($data['pwd'], $res->admin_pwd)) {
                session(['admin'=>$res]);
                // 验证通过重定向
                return redirect('/');
            }
        }
        // 验证失败重定向
        return redirect('/login')->with('error','用户名或密码错误');
    }
}
