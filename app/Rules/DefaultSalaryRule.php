<?php

namespace App\Rules;

use App\Models\DefaultSalary;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DefaultSalaryRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value != -1 && !DefaultSalary::where('id', $value)->exists()) {
            $fail('The selected ' . $attribute . ' is invalid.');
        }
    }
}
