<?php
require_once 'SudokuGrid.php';

/*$grid= SudokuGrid::loadFromFile("../grids/full.json");
echo count($grid->getBoard());
for ($m=0; $m < count($grid->getBoard()); $m++) { 
    echo count($grid->getSquareBoard($m)->getSquare());
}*/
class SudokuSolver //implements SolverInterface
{
	/*public static function solve(SudokuGrid $grid, array $coords,int &$nbCall): ?SudokuGrid{
		if($coords[0] == 9 && $coords[1] == 9){
			return $grid;
		}
        if($grid->isFilled()){
            echo "Complete \n";
            $coords[0] = 9;
            $coords[1] = 9;
            return $grid;
        }
        if($grid->getCell($coords[0],$coords[1]) == 0){
        	for ($x=1; $x < 10; $x++) { 
	            $newGrid = new SudokuGrid(self::turnGridInArrayOfArray($grid));
	            echo "\nnouvel objet\n";
	            //print_r($coords);
	            $newGrid->setCell($coords[0],$coords[1],$x);
	            if( $newGrid->verify($newGrid->getRow($coords[0]))
                    && $newGrid->verify($newGrid->getColumn($coords[1])) 
                    && $newGrid->verify(
	                    $newGrid->getSquareBoard($newGrid->getSquareId(intdiv($coords[0],3),intdiv($coords[1],3)))->getSquare())
            	){
                	//echo "Verified \n";
                	//echo $i.$j.$x;
            		echo "\nappel\n".$nbCall."\n";
            		$nbCall++;
            		if(self::solve($newGrid,$newGrid->getNextCell($coords),$nbCall) === null && $x < 10){
            			continue;
            		}
                }
           	}
        } else if($coords[0] > 8 && $coords[1] > 8){
        	echo "Non solve";
        	return null;
        } else{
	        echo "\nappel sans modif\n".$nbCall."\n";
	        	$nbCall++;
	            //print_r($coords);
    			return self::solve($grid,$grid->getNextCell($coords),$nbCall);
	    }
	    if(self::solve($newGrid,$newGrid->getNextCell($coords),$nbCall) == null){
	    	return null;
	    }
	    return null;
	}*/

	public static function solve(SudokuGrid $grid, array $testedValue = array()): ?SudokuGrid{
        if($grid->isFilled()){
            echo "Complete \n";
            return $grid;
        }
        for ($i=0; $i < count($grid->getBoard()); $i++) { 
            for ($j=0; $j < count($grid->getSquareBoard($i)->getSquare()); $j++) {
                //echo "Parcours du tableau \n";
                if($grid->getCell($i,$j) == 0){
                    //echo $grid->getCell($i,$j);
                    for ($x=1; $x < 10; $x++) { 
                    	if(!in_array($x, $testedValue)){
                    		array_push($testedValue, $x);
	                        //echo $i.$j.$x;
	                        //echo"getCell \n";
	                        $newGrid = new SudokuGrid(self::turnGridInArrayOfArray($grid));
	                        $newGrid->setCell($i,$j,$x);
	                        //echo "NewGrid \n";
	                        //echo 'Column '.print_r($newGrid->getColumn($j));
	                        //echo 'Row '.print_r($newGrid->getRow($i));
	                        //echo 'Square '.print_r($newGrid->getSquareBoard($newGrid->getSquareId(intdiv($i, 3), intdiv($j, 3)))->getSquare());
	                        if( $newGrid->verify($newGrid->getRow($i))
	                            && $newGrid->verify($newGrid->getColumn($j)) 
	                            && $newGrid->verify(
	                                $newGrid->getSquareBoard($newGrid->getSquareId(intdiv($i,3),intdiv($j,3)))->getSquare())
	                        ){
	                            //echo "Verified \n";
	                            //echo $i.$j.$x;
	                            return self::solve($newGrid);
	                        }
	                    }
	                    else{
	                    	return $grid;
	                    }
                    }
                }       
            }
        }
    }

    public static function turnGridInArrayOfArray(SudokuGrid $grid):array{
        $arrayOfArray = array();
        for ($i=0; $i < 9; $i++) { 
            //array_push($arrayOfArray, $grid->getSquareBoard($i)->getSquare());
            $arrayOfArray[$i] = array();
            foreach ($grid->getSquareBoard($i)->getSquare() as $value) {
                array_push($arrayOfArray[$i], $value);
            }
        }
        return $arrayOfArray;
    }
}