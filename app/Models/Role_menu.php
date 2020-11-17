<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_menu extends Model
{
    protected $table='role_menu';
	//protected $primaryKey='admin_id';
	public $timestamps=false;
	protected $guaarded=[];
}
