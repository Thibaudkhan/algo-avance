<?php
require "SudokuSquare.php";

class SudokuGrid //implements GridInterface
{
	private $board;
	
	public function __construct(array $array){
		for ($i=0; $i < 8; $i++) { 
		 	$this->board[$i] = new SudokuSquare(array_chunk($array[$i], 3));
		 }
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
    
    public function getBoard(){
        return $this->board;
    }

    public function getSquareBoard(int $nb){
        return $this->board[$nb];
    }

    public function getCell(int $row, int $column) :int{
    	$rowSquare = intdiv($row, 3);
    	$columnSquare = intdiv($row,3);
    	return $this->board[$this->getSquareId($row,$column)]->getCellSquare($row%3,$column%3);
    }

    public function setCell(int $row, int $column, int $value){
    	$rowSquare = intdiv($row, 3);
    	$columnSquare = intdiv($column,3);
    	$this->board[$this->getSquareId($row,$column)]->setCellSquare($row%3,$column%3,$value);
    }
    public function getSquareId(int $row, int $column) : int{
    	return 3*$row + $column;
    }

    public function getColumn(int $columnIndex):array{
    	$columnSquare = $columnIndex%3;
    	$idSquare = intdiv($columnIndex, 3);
    	$columnValue = array();
    	for ($i=0; $i < 3; $i++) { 
    		$arraySquare = $this->board[$idSquare + ($i * 3)]->getColumnSquare($columnSquare);
    		foreach ($arraySquare as $value) {
    			array_push($columnValue, $value);
       		}
    	}
    	return $columnValue;
    }
}
 
