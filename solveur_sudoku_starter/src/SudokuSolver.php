<?php
require_once 'SudokuGrid.php';

/*$grid= SudokuGrid::loadFromFile("../grids/full.json");
echo count($grid->getBoard());
for ($m=0; $m < count($grid->getBoard()); $m++) { 
    echo count($grid->getSquareBoard($m)->getSquare());
}*/
class SudokuSolver //implements SolverInterface
{
    public static function solve(SudokuGrid $grid,int &$nbIte): ?SudokuGrid{
        if($grid->isFilled()){
                                echo "Complete \n";
                                return $grid;
                            }
        for ($i=0; $i < count($grid->getBoard())-1; $i++) { 
            for ($j=0; $j < count($grid->getSquareBoard($i)->getSquare())-1; $j++) { 
                echo "Parcours du tableau \n";
                if($grid->getCell($i,$j) == 0){
                    for ($x=1; $x < 10; $x++) { 
                        echo"getCell \n";
                        $newGrid = new SudokuGrid(turnGridInArrayOfArray($grid));
                        $newGrid->setCell($i,$j,$x);
                        //echo "NewGrid \n";
                        if($newGrid->verify(
                            $newGrid->getColumn($j)) 
                            && $newGrid->verify(
                                $newGrid->getRow($i)) 
                            && $newGrid->verify(
                                $newGrid->getSquareBoard($newGrid->getSquareId(intdiv($i, 3), intdiv($j, 3)))->getSquare())
                        ){
                            echo "Verified \n";
                            
                            echo "\n".$nbIte++."\n";
                            SudokuSolver::solve($newGrid,$nbIte);
                        }
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
        //array_push($arrayOfArray, $grid->getSquareBoard($i)->getSquare());
        $arrayOfArray[$i] = array();
        $arraySquare = array();
        foreach ($grid->getSquareBoard($i)->getSquare() as $value) {
            array_push($arrayOfArray[$i], $value);
        }
    }
    return $arrayOfArray;
}