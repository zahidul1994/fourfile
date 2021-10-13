<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Todotask extends Model
{
    protected $fillable = [
        'id','title','admin_id'
     ];
     
	protected $casts = [
		'created_at' => 'datetime:M d Y',
	];

    public function todotaskdetails()
    {
        return $this->hasMany('App\Models\Todotaskdetails');
    }  public function todotaskuser()
    {
        return $this->hasMany('App\Models\Todotaskuser');
    }



}
