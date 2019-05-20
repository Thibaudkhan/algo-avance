<?php

<<<<<<< HEAD:exo/exercice1.php
$n = 10;
=======
$n = 0;
>>>>>>> master:exo/exercice1/figoThibaud.php

function fibo($n){

    $u0 = 0;
    $u1 = 1;

    for ($i = 2; $i <= $n; $i ++) {
        $result = $u0 + $u1;
        $u0 = $u1;
        $u1 = $result;
    }
    echo $result . PHP_EOL;
}

fibo($n);