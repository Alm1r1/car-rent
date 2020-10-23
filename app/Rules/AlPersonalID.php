<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlPersonalID implements Rule
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
        $firstChar =  substr($value,0,-9);

        $lastChar = substr($value,-1);

        $middleNumbers = substr($value,1,-1);

        if ( strlen($value) != 10)
        {
            return false;
        }
        elseif ( !ctype_upper($firstChar) or !ctype_upper($lastChar) )
        {
            return false;
        }
        elseif ( preg_match("/[a-z]/i" , $middleNumbers ) )
        {
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
        return 'The personal id is invalid.';
    }
}
