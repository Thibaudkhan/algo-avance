<?php

function howManyNb(int $dividend) {
    if ($dividend > 9) {
        return howManyNb(intdiv($dividend, 10)) + 1;
    } else {
        return 1;
    }
}


function calculatePower(int $number, int $power) {
    if ($power == 0) {
        return 1;
    } else {
        return $number * calculatePower($number, $power - 1);
    }
}

echo calculatePower(69, 1) . "\n";
echo howManyNb(3590) . "\n";