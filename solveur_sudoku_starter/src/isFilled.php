<?php

 function isFilled(){
	//$row= [];
	$a =[0,5,8];
	$b =[2,5,8];
	$c =[3,5,8];
 	$array = array(
 		$a,
 		$b,
 		$c
 	);
	/*for ($square=0; $square < 9; $square++) { 
		for ($case=0; $case < 9 ; $case++) { 
			array_push($row, random_int(0,8));
		}
		echo "\n";
	}*/

	print_r($row);
	for ($i=0; $i <= 2 ; $i++) { 
		if (in_array(0,$array[$i]) ) {
		echo "oui $i \n";
		//return false;
		}else{
			echo "non $i \n";
			//return true;
		}
	}
	

   }


isFilled();