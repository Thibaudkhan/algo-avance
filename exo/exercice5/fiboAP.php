<?php

// A

function fibonacci(int $nbIteration){
    if($nbIteration > 1){
        return fibonacci($nbIteration - 1) + fibonacci($nbIteration - 2); 
    }
    else {
        return $nbIteration;
    }
}

print_r(fibonacci(10));

echo "\n";
// B
$arrayValeur = array(0 => 1, 1 => 1);

function fibonacciAd(int $nbIteration, array &$arrayValeur):float{
    if(!array_key_exists($nbIteration, $arrayValeur)){
        $arrayValeur[$nbIteration] = fibonacciAd($nbIteration - 1, $arrayValeur) + fibonacciAd($nbIteration - 2, $arrayValeur); 
    }  
    return $arrayValeur[$nbIteration]; 
}

print_r(fibonacciAd(5, $arrayValeur));
