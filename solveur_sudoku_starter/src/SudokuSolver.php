<?php
require_once 'SudokuGrid.php';

class SudokuSolver
{

	public static function solve(SudokuGrid $grid, array $testedValue = array()): ?SudokuGrid{
        if($grid->isFilled()){
            echo "Complete \n";
            return $grid;
        }
        if(is_null($grid)){
            echo "null \n";
            return null;
        }
        for ($i=0; $i < count($grid->getBoard()); $i++) { 
            for ($j=0; $j < count($grid->getSquareBoard($i)->getSquare()); $j++) {
                if($grid->getCell($i,$j) == 0){
                    for ($x=1; $x < 10; $x++) { 
                    	if(!in_array($x, $testedValue)){
                    		array_push($testedValue, $x);
	                        //echo $i.$j.$x;
	                        //echo"getCell \n";
	                        $newGrid = new SudokuGrid(self::turnGridInArrayOfArray($grid));
	                        $newGrid->setCell($i,$j,$x);
	                        if( $newGrid->verify($newGrid->getRow($i))
	                            && $newGrid->verify($newGrid->getColumn($j)) 
	                            && $newGrid->verify(
	                                $newGrid->getSquareBoard($newGrid->getSquareId(intdiv($i,3),intdiv($j,3)))->getSquare())
	                        ){
                                $testGrid = self::solve($newGrid);
                                if($testGrid != null){
                                    return $testGrid;
                                }
	                        }
	                    }
                    }
                }       
            }
        }
        return null;
    }

    public static function turnGridInArrayOfArray(SudokuGrid $grid):array{
        $arrayOfArray = array();
        for ($i=0; $i < 9; $i++) { 
            $arrayOfArray[$i] = array();
            foreach ($grid->getSquareBoard($i)->getSquare() as $value) {
                array_push($arrayOfArray[$i], $value);
            }
        }
        return $arrayOfArray;
    }
}