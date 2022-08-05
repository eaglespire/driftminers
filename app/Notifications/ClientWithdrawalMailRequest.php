<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClientWithdrawalMailRequest extends Notification implements ShouldQueue
{
    use Queueable;
    public float $amount;
    public string $userName;
    public string $email;
    public float $currentBalance;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount,$email,$userName,$currentBalance)
    {
        $this->amount = $amount;
        $this->email = $email;
        $this->userName = $userName;
        $this->currentBalance = $currentBalance;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
