<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todotaskdetails extends Model
{ 
    protected $fillable = [
    'id','todotask_id','user_id','description','comment'
 ];

 public function todotask()
 {
     return $this->belongsTo('App\Models\Todotask');
 }
}
