<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $fillable=['paymentname','note','status'];
  
  public function buysms()
    {
        return $this->hasMany('App\Models\Buysms');
    }
}
