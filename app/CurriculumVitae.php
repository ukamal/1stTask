<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
	
	protected $table = 'curriculum_vitae';
	
	protected $fillable = [ 'curriculum_vitae_sent_date', 'name', 'email', 'age', 'mobile_number', 'gender', 'address', 'resume'];
	
	public function curriculum_vitae_job_experiences()
    {
        return $this->hasMany('App\CurriculumVitaeJobExperience');
    }
	
}
