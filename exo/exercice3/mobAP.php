<?php

function randomArray(int $nbInt):array{
    $arrayInt = array();
    for ($i = 0; $i < $nbInt; $i++){
        $tempInt = random_int(0, PHP_INT_MAX);
        //PHP_INT_MAX
        if(!in_array($tempInt, $arrayInt)){
            array_push($arrayInt, $tempInt);
        }
        else{
            $i--;
        }
    }
    return $arrayInt;
}

function classicSort($arrayInt):array{
    $start = microtime(true);
    sort($arrayInt);
    $end = microtime(true);
    echo "\n Le temps ". round(($end - $start)* 1000 )." ms \n";
    return $arrayInt;
}

function exchangeSort($arrayInt):array{
    $start = microtime(true);
    $arrayLength = count($arrayInt);
    for($i = 0; $i < $arrayLength - 1; $i ++){
        for($j=$i; $j < $arrayLength ;$j++){
            if($arrayInt[$j]<$arrayInt[$i] ){
                $temp = $arrayInt[$j];
                $arrayInt[$j] = $arrayInt[$i];
                $arrayInt[$i] = $temp;
            }
        }
    }
    $end = microtime(true);
    echo "\n Le temps échange ". round(($end - $start)* 1000 )." ms \n";
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
    $start = microtime(true);
    $arrayLength = count($arrayInt);
    for ($i=0; $i < $arrayLength - 1; $i++) { 
        $j = $i - 1;
        $tempo = $arrayInt[$i];
        while($tempo < $arrayInt[$j] && $j >= 0){
            $arrayInt[$j+1] = $arrayInt[$j];
            $j--;
        }
        $arrayInt[$j+1] = $tempo;
    }
    $end = microtime(true);
    echo "\n Le temps insertion ". round(($end - $start)* 1000 )." ms \n";
    return $arrayInt;
}

$arrayOriginal = randomArray(10000);
//print_r($arrayOriginal);
//print_r(classicSort($arrayOriginal));
//print_r(exchangeSort($arrayOriginal));
//print_r(bubbleSort($arrayOriginal));
//print_r(bubbleSortAd($arrayOriginal));
//print_r(insertionSort($arrayOriginal));
classicSort($arrayOriginal);
exchangeSort($arrayOriginal);
bubbleSort($arrayOriginal);
bubbleSortAd($arrayOriginal);
insertionSort($arrayOriginal);

?>
