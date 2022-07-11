<?php

namespace App\Exceptions;

use Exception;

class UserNotAllowedException extends Exception
{
    public function report()
    {

    }
    public function render()
    {
        return response()->view('errors.rejected');
    }
}
