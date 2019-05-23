<?php
require_once 'SudokuGrid.php';

/*$grid= SudokuGrid::loadFromFile("./grids/grid4.json");
echo count($grid->getBoard());
for ($m=0; $m < count($grid->getBoard()); $m++) { 
    echo count($grid->getSquareBoard($m)->getSquare());
}*/
class SudokuSolver //implements SolverInterface
{
    public static function solve(SudokuGrid $grid): ?SudokuGrid{
        for ($i=0; $i < count($grid->getBoard())-1; $i++) { 
            for ($j=0; $j < count($grid->getSquareBoard($i)->getSquare())-1; $j++) { 
                //echo "Parcours du tableau \n";
                for ($x=1; $x < 10; $x++) { 
                    if ($grid->getCell($i,$j)==0) {
                        //echo"getCell \n";
                        $newGrid = new SudokuGrid(turnGridInArrayOfArray($grid));
                        $newGrid->setCell($i,$j,$x);
                        //echo "NewGrid \n";
                        if($newGrid->verify(
                            $newGrid->getColumn($j)) 
                            && $newGrid->verify(
                                $newGrid->getRow($i)) 
                            && $newGrid->verify(
                                $newGrid->getSquareBoard(($newGrid->getSquareId(intdiv($i, 3), intdiv($j, 3))))->getSquare())
                        ){
                            //echo "Verified \n";
                            if($newGrid->isFilled()){
                                return $newGrid;
                            }
                            return self::solve($newGrid);
                        }
                        else{
                            $newGrid = null;
                            continue;
                        }
                    }
                    else {
                        continue;
                    }
                }
            }
        }
        return null;
    }

}
function turnGridInArrayOfArray(SudokuGrid $grid):array{
        $arrayOfArray = array();
        for ($i=0; $i < 9; $i++) { 
            array_push($arrayOfArray, $grid->getSquareBoard($i)->getSquare());
        }
        return $arrayOfArray;
    }