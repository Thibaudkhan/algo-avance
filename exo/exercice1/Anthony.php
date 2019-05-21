<?php

function FibonacciRec(int $u){
	if($u == 0){
		return 0;
	}else if ($u == 1){
		return 1;
	}
	else{
		return FibonacciRec($u-1) + FibonacciRec($u-2);
	}
}

function FibonacciIte(int $u){
	
	$nMinus = 0;
	$n = 1;
	$temp;
	$nMinus;
	for ($i=0; $i < $u; $i++) { 
		$n;
		$temp = $n;
		$n += $nMinus;
		$nMinus = $temp;
	}
	return $nMinus;
}

echo FibonacciRec(55)."\n";