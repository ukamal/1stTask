<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumVitaeJobExperience extends Model
{
	
	protected $table = 'curriculum_vitae_job_experiences';
	
	protected $fillable = ['curriculum_vitae_id', 'company', 'job_title', 'years_of_exp'];
	
	public function curriculum_vitae()
    {
        return $this->belongsTo('App\CurriculumVitae');
    }
	
}
