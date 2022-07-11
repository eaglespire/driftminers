<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewDepositMail extends Mailable
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
//        return $this->markdown('mail.new-deposit-mail',[
//            'depositorName'=>$this->data['depositorName'],
//            'depositorEmail'=>$this->data['depositorEmail'],
//            'amount'=>$this->data['amountDeposited'],
//            'planType'=>$this->data['planType'],
//            'planDuration'=>$this->data['planDuration'],
//            'planRoi'=>$this->data['planRoi'],
//        ]);
         $data = [
              'msg'=>'You have successfully notified the admin that you will deposit the said sum. Go ahead to send bitcoin to this wallet address',
             'walletAddress'=>'23458905028404022',
             'duration'=>$this->data['planDuration'],
             'amount'=>$this->data['amountDeposited'],
             'roi'=>$this->data['planRoi'],
             'plan'=> $this->data['planType']
         ];
        return $this->markdown('mail.new-deposit-mail',$data);
    }
}
