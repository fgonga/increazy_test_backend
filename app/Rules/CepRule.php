<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\ImplicitRule;


class CepRule implements ImplicitRule
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
     * Valida se o formato de CEP está correto.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     * @link https://github.com/LaravelLegends/pt-br-validator/blob/master/src/pt-br-validator/Rules/FormatoCep.php
     */
    public function passes($attribute, $value): bool
    {
       return preg_match('/^\d{2}\.?\d{3}-\d{3}$/', $value) > 0;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'O campo :attribute não possui um formato válido de CEP.';
    }
}
