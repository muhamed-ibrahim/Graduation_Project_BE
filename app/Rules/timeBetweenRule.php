<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class timeBetweenRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $res_date = Carbon::parse($value);
        $pickTime = Carbon::createFromTime($res_date->hour,$res_date->minute,$res_date->second);
        $startTime = Carbon::createFromTimeString('07:00:00');
        $endTime = Carbon::createFromTimeString('23:00:00');
        if(!($pickTime->between($startTime,$endTime))){
            $fail("Please choose a time between 07:00 AM and 11:00 PM.");
        }

    }
}
