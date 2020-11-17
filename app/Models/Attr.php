<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected $table="attribute";
    protected $primaryKey="attr_id";
    public $timestamps=false;
    protected $guarded=[];
}
