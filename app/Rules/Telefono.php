<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Telefono implements Rule
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
        if (preg_match("/^[9|8|6|7][0-9]{8}$/", $value) || (preg_match("/^6[0-9]{8}$/", $value)) ) {
			return true;
		}else{
			return false;
		}
    }//

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('reglas.telefono');
    }
}
