<?php

function randomArray(int $nbInt):array{
    $arrayInt = array();
    for ($i = 0; $i < $nbInt; $i++){
        $tempInt = random_int(0, $nbInt);
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

//INIT DU TABLEAU

$originalArray = randomArray(10005);
$theFive = array_splice($originalArray, count($originalArray)-5, 5);
sort($originalArray);

// PREMIÈRE FONCTION : SELECTIVE SEARCH

function selectiveSearch(int $nb, array $arrayInt):bool{
    $start = microtime(true);
    
    foreach ($arrayInt as $key => $value) {
        if ($value == $nb ){
            $end = microtime(true);
            echo "\n Le temps du selective en microsecondes ". round(($end - $start)* 1000000 )." µs \n";
            return true;
        }
    }
    $end = microtime(true);
    echo "\n Le temps du selective en microsecondes ". round(($end - $start)* 1000000 )." µs \n";
    return false;
}

// DEUXIÈME FONCTION : DICHOTOMIE SEARCH

function dichoSearch(int $nb, array $arrayInt){
    $start = microtime(true);
    $middleArray = round(count($arrayInt) / 2) - 1;
    
    if (count($arrayInt) == 0 || count($arrayInt) === 1 && $arrayInt[$middleArray] !== $nb) {
        echo "PAS TROUVÉ ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡";
        $end = microtime(true);
        echo "\n Le temps du dichotomie en microsecondes ". round(($end - $start)* 1000000 )." µs \n";
        return false;
    }

    if ($nb > $arrayInt[$middleArray]) {
        $newArray = array_slice($arrayInt, $middleArray + 1);
        return dichoSearch($nb, $newArray);
    }
    else if ($nb < $arrayInt[$middleArray]){
        $newArray = array_slice($arrayInt,0, $middleArray);
        return dichoSearch($nb, $newArray);
    }
    else if($nb ===  $arrayInt[$middleArray]){
        echo "TROUVÉ !!!!!!!!!!!!!!!!!!!!!!!!!!!!";
        $end = microtime(true);
        echo "\n Le temps du dichotomie en microsecondes ". round(($end - $start)* 1000000 )." µs \n";
        return true;
    }
}

// ON TEST LES FONCTIONS

print_r($theFive);

print_r(array_search($originalArray[random_int(0, count($originalArray)-1)], $originalArray));
echo "\n";

// TEST selectiveSearch 
echo "Selective in : ";
echo "\n";
for ($i = 0; $i < 5; $i++){
    print_r(selectiveSearch($originalArray[random_int(0, count($originalArray)-1)], $originalArray));
    echo "\n";
}
echo "Selective not in : ";
echo "\n";
for ($i = 0; $i < 5; $i++){
    print_r(selectiveSearch($theFive[$i], $originalArray));
    echo "\n";
}

// TEST dichotomie Search
echo "Dichotomie in : ";
echo "\n";
for ($i = 0; $i < 5; $i++){
    print_r(dichoSearch($originalArray[random_int(0, count($originalArray)-1)], $originalArray));
    echo "\n";
}
echo "Dichotomie not in : ";
echo "\n";
for ($i = 0; $i < 5; $i++){
    print_r(dichoSearch($theFive[$i], $originalArray));
    echo "\n";
}