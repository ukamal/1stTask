<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
	
	protected $fillable = ['user_id', 'cart', 'address', 'name', 'email', 'order_id', 'order_status', 'order_date_time'];
	
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
