<?php
require "./src/SudokuGrid.php";


$grid = SudokuGrid::loadFromFile("./grids/full.json");
//print_r($grid->getColumn(0));
//print_r($grid->getColumn(8));

echo "-------------------------------  \n";
for ($i=0; $i < 9 ; $i++) { 
	for ($j=0; $j < 9; $j++) { 
	echo $grid->getCell($i,$j)."  ";
		if ($j == 2 || $j == 5 ) {
		echo " | ";
		}
	}echo "\n";
	if($i == 2 || $i == 5 ){
		echo "-------------------------------  \n";
	}
}
echo "-------------------------------  \n";