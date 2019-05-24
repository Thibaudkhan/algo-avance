<?php
require_once 'SudokuGrid.php';

/*$grid= SudokuGrid::loadFromFile("../grids/full.json");
echo count($grid->getBoard());
for ($m=0; $m < count($grid->getBoard()); $m++) { 
    echo count($grid->getSquareBoard($m)->getSquare());
}*/
class SudokuSolver //implements SolverInterface
{
public static function solve(SudokuGrid $grid): ?SudokuGrid{
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
                }       
            }
        }
        return null;
    }
    public static function turnGridInArrayOfArray(SudokuGrid $grid):array{
        $arrayOfArray = array();
        for ($i=0; $i < 9; $i++) { 
            //array_push($arrayOfArray, $grid->getSquareBoard($i)->getSquare());
            $arrayOfArray[$i] = array();
            $arraySquare = array();
            foreach ($grid->getSquareBoard($i)->getSquare() as $value) {
                array_push($arrayOfArray[$i], $value);
            }
        }
        return $arrayOfArray;
    }
}