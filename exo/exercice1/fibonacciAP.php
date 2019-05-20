<?php


function fibonacci (int $nbIteration){
    $nMinusOne = 0;
    $n = 1;
    $nPlusOne;

    for ($i = 2; $i <= $nbIteration; $i ++){
        $nPlusOne = $nMinusOne + $n;
        $nMinusOne = $n;
        $n = $nPlusOne; 
    }
    echo $nPlusOne;
}

fibonacci(10);