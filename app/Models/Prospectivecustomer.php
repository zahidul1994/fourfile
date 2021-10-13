<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospectivecustomer extends Model
{
  protected $fillable=['admin_id','user_id','name','comment','status','email','phone','address'];

  
	protected $casts = [
		'created_at' => 'datetime:M d Y',
	];
}
