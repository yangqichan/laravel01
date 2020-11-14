<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table="brand";
    protected $primaryKey="brand_id";
    public $timestamps=false;
    protected $guarded=[];
}
