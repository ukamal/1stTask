<?php

namespace App\Mail;

use App\Queries;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendCustomerQuery extends Mailable
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
    public $query = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Queries $query)
    {
        $this->query = $query;
    }
     
    public function build()
    {
    	$query = $this->query;
        return $this->markdown('emails.customer.sendcustomerquery')->with('query',$query);
    }
}
