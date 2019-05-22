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
    $start = microtime(true);
    do {
        $nbChange = 0;
        for ($i = 0; $i < count($arrayInt) - 1; $i++) {
            if ($arrayInt[$i] > $arrayInt[$i + 1]) {
                $temp = $arrayInt[$i + 1];
                $arrayInt[$i + 1] = $arrayInt[$i];
                $arrayInt[$i] = $temp;
                $nbChange ++;
            }
        }
    } while ($nbChange != 0);
    $end = microtime(true);
    echo "\n Le temps bubble  ". round(($end - $start)* 1000 )." ms \n";
    return $arrayInt;
}

function bubbleSortAd($arrayInt):array{
    $start = microtime(true);
    $arrayLength = count($arrayInt);
    do {
        $nbChange = 0;
        for ($i = 0; $i < $arrayLength - 1; $i++) {
            if ($arrayInt[$i] > $arrayInt[$i + 1]) {
                $temp = $arrayInt[$i + 1];
                $arrayInt[$i + 1] = $arrayInt[$i];
                $arrayInt[$i] = $temp;
                $nbChange ++;
            }
        }
        $arrayLength -= 1;
    } while ($nbChange != 0);
    $end = microtime(true);
    echo "\n Le temps bubble ad ". round(($end - $start)* 1000 )." ms \n";
    return $arrayInt;
}

function insertionSort($arrayInt):array{
    for ($i= 1; $i < count($arrayInt) ; $i++) { 
        $j = $i;
        $move = $arrayInt[$i];
        while ($j > 0 && $move < $arrayInt[$j - 1]) {
            $j--;
            $arrayInt[$j+1] = $arrayInt[$j];
        }
        $arrayInt[$j] = $move;        
    }
        return $arrayInt;
}



    /*$arrayLength = 0;
    $bouger;
    for ($i = $arrayLength; $i < count($arrayInt) ; $i++) { 
        $i = $j -1 ;
        while ($arrayInt[$j] < $bouger ) {
            if ($bouger > $arrayInt[$j]) {
                # code...
            }
            $bouger = $arrayInt[$i];
            $arrayInt[$i] = $arrayInt[$j];
            $arrayInt[$j] = $bouger;
            $j--;
        }
    }
    $arrayLength++; 
    return $arrayInt;
}*/


function classicSort($arrayInt):array{
    $start = microtime(true);
    sort($arrayInt);
    $end = microtime(true);
    echo "\n Le temps ". round(($end - $start)* 1000 )." ms \n";
    return $arrayInt;
}




$arrayOriginal = randomArray(10);
//classicSort($arrayOriginal);
//bubbleSort($arrayOriginal);
//bubbleSortAd($arrayOriginal);
print_r(insertionSort($arrayOriginal));

?>
