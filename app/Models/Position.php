<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
   // 声明表名
    protected $table = "position";
    // 声明主键 
    protected $primaryKey = "position_id";
    // 时间戳管理
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
