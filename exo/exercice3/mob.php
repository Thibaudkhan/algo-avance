<?php

function randomArray(int $nbInt):array{
    $arrayInt = array();
    for ($i = 0; $i < $nbInt; $i++){
        $tempInt = random_int(0, PHP_INT_MAX);
        if(!in_array($tempInt, $arrayInt)){
            array_push($arrayInt, $tempInt);
        }
        else{
            $i--;
        }
    }
    return $arrayInt;
}

function bubbleSort($arrayInt):array{
    
}

$arrayOriginal = randomArray(10);
$arrayCopy = $arrayOriginal;
sort($arrayCopy);
print_r($arrayOriginal);
print_r($arrayCopy);

?>