<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositConfirmed extends Mailable
{
    use Queueable, SerializesModels;
     protected array $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
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
        return $this->markdown('mail.deposit-confirmed', [
            'depositorName'=>'',
            'amountInvested'=>'',
            'planType'=>'',
            'planDuration'=>'',
            'planRoi'=>'',
            'messageText'=>'Your deposit of $ '. $this->data['amountInvested']. ' has been verified successfully'
        ]);
    }
}
