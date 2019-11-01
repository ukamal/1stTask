<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	
	protected $table = 'products';
	
	protected $fillable = ['category_id', 'product_name', 'product_price', 'product_description', 'product_rating', 'top_products'];
	
	public function category()
    {
        return $this->belongsTo('App\Category');
    }
	
	public function product_gallery_images()
    {
        return $this->hasMany('App\ProductGalleryImages');
    }
	
	public function package_products()
    {
        return $this->hasMany('App\PackageProducts');
    }
}
