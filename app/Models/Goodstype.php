<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goodstype extends Model
{
    protected $table="goods_type";
    protected $primaryKey="type_id";
    public $timestamps=false;
    protected $guarded=[];
}
