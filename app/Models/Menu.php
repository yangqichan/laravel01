<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menu';
	protected $primaryKey='menu_id';
	public $timestamps=false;
	protected $guaarded=[];
}
