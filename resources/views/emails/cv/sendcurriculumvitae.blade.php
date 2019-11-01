@component('mail::layout')

@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        Curriculum Vitae
    @endcomponent
@endslot


@component('mail::subcopy')

<?php 	$date = $curriculum_vitae_job_experiences->curriculum_vitae_sent_date;
		$date_formatted = date('l, jS \of F Y', strtotime ($date)); 
?>
 
 **CV Sent Date** : {{ $date_formatted }} 
      								
 **Candidate Name** : {{ $curriculum_vitae_job_experiences->name }}
 
 **Email** : {{ $curriculum_vitae_job_experiences->email }} 
      				
 **Age** : {{ $curriculum_vitae_job_experiences->age }}
 
 **Mobile Number** : {{ $curriculum_vitae_job_experiences->mobile_number }}  
   
 **Gender** : {{ $curriculum_vitae_job_experiences->gender }}
 
 **Address** : {{ $curriculum_vitae_job_experiences->address }}

@endcomponent

@component('mail::table')

| Job Title       | Company    | Years of Experience  |
|:-------------   | :--------:  | :-------------:     |
@foreach($curriculum_vitae_job_experiences->curriculum_vitae_job_experiences as $curriculum_vitae_job_experience)
| {{ $curriculum_vitae_job_experience->job_title }} |  {{ $curriculum_vitae_job_experience->company }}   | {{ $curriculum_vitae_job_experience->years_of_exp }} |
@endforeach


@endcomponent

@slot('footer')
    @component('mail::footer')
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    @endcomponent
@endslot

@endcomponent
