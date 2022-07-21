<?php

namespace App\Exceptions;
use Exception;
use Illuminate\Support\Facades\Log;


class SubscriptionException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $this->message = "Unable to subscribe";
        $this->code = 400;
    }

    public function report()
   {
       Log::debug('Subscription Error');
   }
   public function render()
   {
       return view('errors.offline');
   }
}
