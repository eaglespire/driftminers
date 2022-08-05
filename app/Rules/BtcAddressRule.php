<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BtcAddressRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ($value >= 26 && $value <= 35);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please input a valid BTC address. A BTC address has between 26 and 35 characters';
    }
}
