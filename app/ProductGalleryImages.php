<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGalleryImages extends Model
{
	
	protected $table = 'product_gallery_images';
	
	protected $fillable = ['product_id', 'gallery_image'];
	
	public function product()
    {
        return $this->belongsTo('App\Product');
    }
	
}
