<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paybill extends Model
{
    protected $fillable=[
        'customer_id',
        'admin_id',
        'bill_id',
        'user_id',
        'payby_id',
        'paid',
        'paymentnumber',
        'transection',
         'status',
    ];
    protected $casts = [
		'created_at' => 'datetime:M d Y',
	];
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    public function payby()
    {
        return $this->belongsTo('App\Models\Payby');
    }
    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }
}
