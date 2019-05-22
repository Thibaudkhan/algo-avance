<?php

function puissance($nb,$nbPuissance){

	if ($nbPuissance == 1) {
		return $nb;
	}else{
		return $nb * puissance($nb,$nbPuissance -1 );
	}
}

function cmbChiffre($nb){

	if ($nb <= 9) {
		return 1;
	}else{
		return cmbChiffre(intdiv($nb,10))+1;
	}
}

echo cmbChiffre(2910)."\n";
//echo puissance(7,5)."\n";