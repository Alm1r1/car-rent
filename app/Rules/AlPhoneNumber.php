<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlPhoneNumber implements Rule
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
        $substr = substr($value,0,-7);

        if( preg_match("/[a-z]/i" , $value )) {
            return false;
        }
        elseif ( ($substr != "067") && ($substr != "068") && ($substr != "069") ) {
            return false;
        }
        elseif ( strlen($value) != 10){
            return false;
        }
        return true;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The phone number is invalid!';
    }
}
