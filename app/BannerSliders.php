<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerSliders extends Model
{
	
	protected $table = 'banner_sliders';
	
	protected $fillable = ['banner_slider_image', 'banner_slider_name'];
	
}
