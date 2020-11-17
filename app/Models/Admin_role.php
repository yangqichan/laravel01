<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    protected $table='admin_role';
	//protected $primaryKey='admin_id';
	public $timestamps=false;
	protected $guaarded=[];
}
