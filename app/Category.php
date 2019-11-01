<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
	protected $table = 'categories';
	
	protected $fillable = ['category_image', 'category_name', 'category_slug', 'parent_id'];
	
	public function products()
    {
        return $this->hasMany('App\Product');
    }
	
}
