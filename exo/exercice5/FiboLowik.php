<?php

function Fibonacci(int $number) {
    if ($number < 2) {
        return $number;
    } else {
        $number = Fibonacci($number - 1) + Fibonacci($number - 2);
        return $number;
    }
}


function FibonacciOpti() {
    $array = [];
    if (array_key_exists($key, $array)) {
        return;
    } else {
        return;
    }
}

// Stocker les résultats dans un tableau dans lequel on peut écrire mais aussi appeler, utiliser un appel par référence.
// Pas de boucle.

echo Fibonacci(10) . "\n";
echo FibonacciOpti() . "\n";