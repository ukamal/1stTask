@component('mail::layout')

@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        Customer Query
    @endcomponent
@endslot


@component('mail::subcopy')

<?php 	$date = $query->query_sent_date;
		$date_formatted = date('l, jS \of F Y', strtotime ($date)); 
?>
 
 **Query Sent Date** : {{ $date_formatted }} 
      								
 **Customer Name** : {{ $query->name }}
 
 **Email** : {{ $query->email }} 
      				
 **Phone** : {{ $query->phone }}
 
 **Query** : {{ $query->message }}  

@endcomponent

@slot('footer')
    @component('mail::footer')
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    @endcomponent
@endslot

@endcomponent
