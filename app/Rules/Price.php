<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Price implements Rule
{
    public function passes($attribute, $value) 
    {
        // Match to max 8 digits and 2 decimal places
        return preg_match('/^(?!0\d)(\d{1,6}\.\d{2})$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid price with two decimal places and should not exceed the maximum value.';
    }
}