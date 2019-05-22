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
$arrayValeur = array();

function fibonacciAd(int $nbIteration, &$arrayValeur):int{
    if($nbIteration > 1){
        if(!array_key_exists($nbIteration, $arrayValeur)){
            $arrayValeur[$nbIteration] = fibonacci($nbIteration - 1, $nbMemory) + fibonacci($nbIteration - 2, $nbMemory); 
        }  
        return $arrayValeur[$nbIteration]; 
    }
    else {
        return $nbIteration;
    }
}

print_r(fibonacciAd(40, $arrayValeur));