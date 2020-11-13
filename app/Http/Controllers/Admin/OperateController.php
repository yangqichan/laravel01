<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperateController extends Controller
{
    public function operate()
    {
        return view('admin.operate.operate');
    }
}
