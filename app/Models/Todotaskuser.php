<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todotaskuser extends Model
{
    protected $fillable = [
        'id','todotask_id','user_id'
     ];

     public function todotask()
     {
         return $this->belongsTo('App\Models\Todotask');
     } 
      public function user()
     {
         return $this->belongsTo('App\Models\User');
     }

}
