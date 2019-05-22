<?php

function fibo($nb,&$tab){

	if ($nb == 1 ) {
		return 1;
	}else if($nb == 0){
		return 0;
	}
	else{
		return fibo($nb-1)+fibo($nb-2);
	}
}

echo fibo(10)."\n";