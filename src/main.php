<?php

namespace Flybuys;

/**
 * 1. Sum the digits in the even numbered positions from left to right
 * 2. Multiply each digit in the odd numbered positions (from left to right) by the number 2. If any results are 2 digits, sum the digits into one. Sum the digits from each multiplication into a final result.
 * 3. Add the final results of steps 1 and 2.
 * 4. Take the last digit of the result from step 3 and subtract from 10 to give the check digit.
 * 5. Take the last digit from the 16 Digit number and compare to the check digit
 * 6. if they are equal, it is valid
 */

/**
 * Validates a flybuys number provided as a string or array
 * @param array|string $number
 * @throws \InvalidArgumentException
 * @return bool
 */
function validate($number) {
    if (!is_string($number) && !is_array($number)) {
        throw new \InvalidArgumentException("Number passed to Flybuys\\validate must be an array or string");
    }
    
    if (is_string($number)) {
        $number = str_split($number);
    }

    $ints = array();
    
    // Prepare values so they are all ints and have the right keys
    foreach ($number as $val) {
        if (is_numeric($val)) {
            $ints[] = (int) $val;
        }
    }

    if (count($ints) !== 16) {
        return false;
    }

    $checkDigitSum = 0;

    for ($i = 0; $i < 15; $i++) {
        if ($i % 2 !== 0) {
            $val  = $ints[$i];
        } else {
            $val = $ints[$i] * 2;

            if ($val > 9) {
                $val = (string) $val;
                $val = $val[0] + $val[1];
            }
        }

        $checkDigitSum += $val;
    }

    return 10 - ($checkDigitSum % 10) === end($ints);
}