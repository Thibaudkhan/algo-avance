<?php

function countChiffres (int $n){
    if ($n>=10){
        return countChiffres(intdiv($n, 10))+1;
    }
    else {
        return 1;
    }
}

function puissance ($n, $nbPuissance){
    $nbPuissanceInf = $nbPuissance - 1;

    if ($nbPuissance>=1){
        return $n * puissance($n, $nbPuissanceInf );
    }
    
    else if($nbPuissance == 0){
        return 1;
    }

    else {
        return $n;
    }
}

print_r(puissance(78, 9));
echo "\n";
//print_r(pow(78, 9));
echo "\n";
print_r(countChiffres(509385789787987));
echo $nbChiffres;