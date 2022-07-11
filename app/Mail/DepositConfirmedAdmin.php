<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositConfirmedAdmin extends Mailable
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
        return $this->markdown('mail.deposit-confirmed-admin', [
            'depositorName'=>'',
            'amountInvested'=>'',
            'planType'=>'',
            'planDuration'=>'',
            'planRoi'=>'',
            'messageText'=>'You have successfully confirmed a deposit of $ '. $this->data['amountInvested']
        ]);
    }
}
