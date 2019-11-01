<?php

namespace App\Mail;

use App\CurriculumVitae;
use App\CurriculumVitaeJobExperience;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendCurriculumVitae extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public $curriculum_vitae = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CurriculumVitae $curriculum_vitae)
    {
        $this->curriculum_vitae = $curriculum_vitae;
    }
     
    public function build()
    {
    	$curriculum_vitae = $this->curriculum_vitae;
		$curriculum_vitae_job_experiences = $curriculum_vitae->load('curriculum_vitae_job_experiences');
        return $this->markdown('emails.cv.sendcurriculumvitae')->with('curriculum_vitae_job_experiences',$curriculum_vitae_job_experiences);
    }
}
