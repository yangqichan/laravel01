<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table="goods";
    protected $primaryKey="goods_id";
    public $timestamps=false;
    protected $guarded=[];
}
