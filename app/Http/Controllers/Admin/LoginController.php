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
        // 验证密码        // 文本        // 哈希密码
        if (Hash::check($data['pwd'], $res->admin_pwd)) {
            // 验证通过重定向
            return redirect('/login');
        }
        // 验证失败重定向
        return redirect('/login');
    }
}
