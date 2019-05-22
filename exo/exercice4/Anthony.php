<?php
function getNbDigit(int $nbToCut):int {
	if($nbToCut < 10){
		return 1;
	} else{
		return 1 + getNbDigit(intdiv($nbToCut, 10));
	}
}

function powRec(int $nbToPow, int $pow):int{
	if($pow == 0){
		return 1;
	}else{
		return $nbToPow * powRec($nbToPow, $pow - 1);
	}
}

echo powRec(3,3);
  ?>