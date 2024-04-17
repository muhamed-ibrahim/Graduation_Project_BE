<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class DateBetweenRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $res_date = Carbon::parse($value);
        $today = now()->addDay();
        $oneYearFromNow = now()->addYear()->startOfDay();
        if ($res_date->lt($today) || $res_date->gte($oneYearFromNow)) {
            $fail("Please choose a date starting from tomorrow and within the next year.");
        }

    }
}
