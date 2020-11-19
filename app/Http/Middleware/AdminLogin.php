<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Admin_role;
use App\Models\Role_menu;
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $res = session('admin');
        foreach($res as $k=>$v){
            $add=Admin::where('admin_id',$v['admin_id'])->get();
        }
        foreach($add as $k=>$v){
                    $role_id=Admin_role::where('admin_id',$v->admin_id)->value('role_id');
                    $menu_id=Role_menu::where('role_id',$role_id)->get();
                    foreach ($menu_id as $key => $value) {
                        $id=$value->menu_id;
                        session([$id=>$id]);
                    }                    
                    dd(session("25"));
                    //dd(session('id'));
                }
        if(!$res){
            return redirect('login');
        }
        return $next($request);
    }
}
