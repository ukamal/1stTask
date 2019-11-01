<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queries extends Model
{
	
	protected $table = 'queries';
	
	protected $fillable = [ 'query_sent_date', 'name', 'email', 'phone', 'message'];
	
}
