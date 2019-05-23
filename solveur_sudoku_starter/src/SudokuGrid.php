<?php

class SudokuGrid //implements GridInterface
{
	public $board;
	

	public function __construct(array $array){
		$this->board = $array;

	}

	public static function loadFromFile(string $filepath): SudokuGrid{

		$arrayOfArrays = array();

    	for ($i=0; $i < 9; $i++) { 
    		 $arrayOfArrays[$i] = array();
   		}
		$stream = fopen($filepath, "r");
		$jsonString = fread($stream, filesize($filepath));
		$jsonArray = json_decode($jsonString);

	    for ($i = 0; $i <= 8; $i ++) {
	        for ($j = 0; $j <= 8; $j ++) {
	            if ($j <= 2) {
	                array_push($arrayOfArrays[intdiv($i, 3) * 3], $jsonArray[$i][$j]);
	            } elseif ($j > 2 and $j <= 5) {
	                array_push($arrayOfArrays[intdiv($i, 3) * 3 + 1], $jsonArray[$i][$j]);
	            } else {
	                array_push($arrayOfArrays[intdiv($i, 3) * 3 + 2], $jsonArray[$i][$j]);
	            }
	        }
	    }

		$grid = new SudokuGrid($arrayOfArrays);
		return $grid;
	}
}
 
//Test lecture Json + découpage tableau (Anthony)
print_r(SudokuGrid::loadFromFile("../grids/full.json"));
