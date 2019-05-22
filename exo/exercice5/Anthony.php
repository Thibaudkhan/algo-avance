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

function FibonacciRecAd(int $u, array &$values){
	if(array_key_exists($u, $values)){
		return $values[$u];
	}
	else{
		$values[$u] = FibonacciRecAd($u-1,$values) + FibonacciRecAd($u-2,$values);
		return $values[$u];
	}
}
$fibonacciSuiteValues = array(0 => 0, 1 => 1);
FibonacciRecAd(1000,$fibonacciSuiteValues);
print_r($fibonacciSuiteValues);