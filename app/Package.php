<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	
	protected $table = 'packages';
	
	protected $fillable = ['program_id', 'package_unique_id', 'package_name', 'product_price', 'box_price', 'buffet_price'];
	
	public function program()
    {
        return $this->belongsTo('App\Program');
    }
	
	public function package_products()
    {
        return $this->hasMany('App\PackageProducts');
    }
	
}
