<?php

function randomArray(int $nbInt):array{
    $arrayInt = array();
    for ($i = 0; $i < $nbInt; $i++){
        $tempInt = random_int(0, 10);
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
    $start = microtime(true);
    for ($i=0; $i < count($arrayInt) - 1; $i++) { 
        $isMod = false;
        $valueToInsert = $arrayInt[$i +1];
        $j = $i;
        while ($valueToInsert < $arrayInt[$j] && $j >= 0) {
            $arrayInt[$j +1] = $arrayInt[$j];

            $j--;
            $isMod = true;
        }
        if($isMod == true){
            $arrayInt[$j+1] = $valueToInsert;            
        }
    }
    $end = microtime(true);
    echo "\n Le temps ". round(($end - $start)* 1000 )." ms \n";
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
    for ($i=0; $i < count($arrayInt)-1; $i++) { 
       for ($j=$i; $j < count($arrayInt); $j++) { 
           if($arrayInt[$i] > $arrayInt[$j]){
                $temp = $arrayInt[$i];
                $arrayInt[$i] = $arrayInt[$j];
                $arrayInt[$j] = $temp;
           }
       }
    }
    $end = microtime(true);
    echo "\n Me temps ". round(($end - $start) * 1000)."ms \n";
    return $arrayInt;
}


$arrayOriginal = randomArray(10);
//classicSort($arrayOriginal);
//bubbleSort($arrayOriginal);
//bubbleSortAd($arrayOriginal);
print_r(exchangeSort($arrayOriginal));
?>
