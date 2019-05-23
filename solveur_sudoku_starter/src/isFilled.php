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
	print_r($row);
	for ($i=0; $i <= 2 ; $i++) { 
		if (in_array(0,$array[$i]) ) {
		echo "oui $i  \n".$array[1][1];
		//return false;
		}else{
			echo "non $i \n";
			//return true;
		}
	}
	

   }


isFilled();