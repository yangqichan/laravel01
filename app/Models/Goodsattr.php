<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goodsattr extends Model
{
    protected $table="goods_attr";
    protected $primaryKey="goods_attr_id";
    public $timestamps=false;
    protected $guarded=[];
}
