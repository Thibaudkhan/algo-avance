<?php

function fibo($nb){

	if ($nb == 1 ) {
		return 1;
	}else if($nb == 0){
		return 0;
	}
	else{
		return fibo($nb-1)+fibo($nb-2);
	}
}

function fiboAv($nb,array &$tab){
	if (array_key_exists($nb,$tab)) {
		return $tab[$nb];
	}else{
		 $tab[$nb] = fiboAv($nb-1,$tab)+fiboAv($nb-2,$tab);
		 return $tab[$nb];
	}
	 
}

$array = [0 => 0, 1=>1];
//echo fibo(10)."\n";
echo fiboAv(50,$array)."\n";