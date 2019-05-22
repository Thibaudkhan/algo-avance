<?php

function Fibonacci(int $number) {
    if ($number == 0) {
        return 0;
    } elseif ($number == 1) {
        return 1;
    } else {
        $number = Fibonacci($number - 1) + Fibonacci($number - 2);
        return $number;
    }
}

echo Fibonacci(10) . "\n";