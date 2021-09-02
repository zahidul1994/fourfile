<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smstype extends Model
{
   protected $fillable=['maskingnonmasking','charge'];
   public function smssent()
   {
       return $this->hasOne('App\Models\Smssent');
   }

}
