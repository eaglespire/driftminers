<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionActivatedMail extends Mailable
{
    use Queueable, SerializesModels;
    protected array $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
           'name'=>$this->data['name'],
           'email'=>$this->data['email'],
           'plan'=>$this->data['plan'],
           'start_date'=>$this->data['start_date'],
           'end_date'=>$this->data['end_date']
        ];
        return $this->markdown('mail.subscription-activated', $data);
    }
}
