<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
	
	protected $table = 'programs';
	
	protected $fillable = ['program_image', 'program_name', 'program_slug'];
	
	public function packages()
    {
        return $this->hasMany('App\Package');
    }
	
}
