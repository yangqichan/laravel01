<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	// 声明表名
    protected $table = "admin";
    // 声明主键 
    protected $primaryKey = "admin_id";
    // 时间戳管理
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
