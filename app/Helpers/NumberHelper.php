<?php
if (! function_exists('randomNumber')) {
    function randomNumber($nbDigits = null, $strict = false)
    {
        if (! is_bool($strict)) {
            throw new \InvalidArgumentException('randomNumber() generates numbers of fixed width. To generate numbers between two boundaries, use numberBetween() instead.');
        }
        if (null === $nbDigits) {
            $nbDigits = randomDigitNotNull();
        }
        $max = pow(10, $nbDigits) - 1;
        if ($max > mt_getrandmax()) {
            throw new \InvalidArgumentException('randomNumber() can only generate numbers up to mt_getrandmax()');
        }
        if ($strict) {
            return mt_rand(pow(10, $nbDigits - 1), $max);
        }

        return mt_rand(0, $max);
    }
}

if (! function_exists('randomDigitNotNull')) {
    function randomDigitNotNull()
    {
        return mt_rand(1, 9);
    }
}
