<?php


$n = 0;


function fibo($n){

	$u = 0;
	$u1 = 1;

	while ($n < 28) {
		echo $result."\n";
		$result = $u + $u1 ;
		$u = $u1;
		$u1 = $result;
		$n++;	
	}
}

fibo($n);