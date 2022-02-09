<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentNo extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($data) {
            $this -> data = $data;
        }

    /**
     * Build the message.
     *
     * @return $this
     */


     public function build() {
               return $this -> from('example@gmail.com')
               -> subject('New doctor ')
                -> view('example_email_template')
                -> with('data', $this -> data);
           }

}
