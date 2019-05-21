<?php

function Stairs(int $nbSteps, $tabSteps){
	$tabPossible = $tabSteps;
	while(count($tabPossible) != 0){
		$subPossible = array_shift($tabPossible); //$subPossible = $tabPossible[0]
		for($j = 0; $j < count($tabPossible); $j++){
			array_push($subPossible, $tabSteps[$j][0]);
			$actualStep = 0;
			for ($i=0; $i < count($subPossible); $i++) { 
				$actualStep += $subPossible[$i];
				echo "\n".$subPossible[$i];
			}
			//echo "\nsorie de boucle For";
			if($actualStep == $nbSteps){
				return $subPossible;
			} elseif($actualStep < $nbSteps){
				array_push($tabPossible, $subPossible);
			}
			array_pop($subPossible);
		}
	//echo "\nSortie 2eme boucle For";
	}
	return "Impossible";
}

echo(Stairs(19,array([2],[5])));