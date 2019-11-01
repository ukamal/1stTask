<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageProducts extends Model
{
	
	protected $table = 'package_products';
	
	protected $fillable = ['package_id', 'product_id'];
	
	public function package()
    {
        return $this->belongsTo('App\Package');
    }
	
	public function product()
    {
        return $this->belongsTo('App\Product');
    }
	
}
