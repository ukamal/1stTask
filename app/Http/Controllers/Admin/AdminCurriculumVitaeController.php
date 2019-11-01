<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminCurriculumVitaeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function cvJobList() {
    	
        $cv_list = \App\CurriculumVitae::all();

        return view('Admin/Curriculum Vitae/cv_job_list')->with('cv_list', $cv_list);
    }
	
	public function viewCvDetails($id) {
    	
        $curriculum_vitae = \App\CurriculumVitae::where('id',$id)->first();
		
		$curriculum_vitae_job_experiences = $curriculum_vitae->load('curriculum_vitae_job_experiences');

        return view('Admin/Curriculum Vitae/curriculum_vitae_details')->with('curriculum_vitae', $curriculum_vitae)->with('curriculum_vitae_job_experiences', $curriculum_vitae_job_experiences);
    }

}