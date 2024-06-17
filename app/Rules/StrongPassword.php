<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class StrongPassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
    {
        // Define your password strength requirements here
        // Example requirements: at least 8 characters, one uppercase, one lowercase, one digit
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.';
    }
}
