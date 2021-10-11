<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospectivecustomer extends Model
{
  protected $fillable=['admin_id','user_id','user_id','thana_id','area_id','name','phone','message','replymessage','status'];

  public function thana()
  {
      return $this->belongsTo('App\Models\Thana');
  }
  public function area()
  {
      return $this->belongsTo('App\Models\Area','area_id','id');
  }
	protected $casts = [
		'created_at' => 'datetime:M d Y',
	];
}
