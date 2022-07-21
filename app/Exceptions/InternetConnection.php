<?php

namespace App\Exceptions;
use Exception;
class InternetConnection extends Exception
{
    public function render()
    {
        return view('errors.offline');
    }
}
