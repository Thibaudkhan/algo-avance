<?php
require "./src/SudokuGrid.php";
require_once 'src/SudokuSolver.php';

$grid1 = SudokuGrid::loadFromFile("./grids/grid1.json");
$grid2 = SudokuGrid::loadFromFile("./grids/grid2.json");
$grid3 = SudokuGrid::loadFromFile("./grids/grid3.json");
$grid4 = SudokuGrid::loadFromFile("./grids/grid4.json");
$grid5 = SudokuGrid::loadFromFile("./grids/grid5.json");
$grid = SudokuGrid::loadFromFile("./grids/full.json");
$gridUn = SudokuGrid::loadFromFile("./grids/unsolvable.json");

$nbCall = 0;
$coords = array();
array_push($coords, 0);
array_push($coords, 0);
$solver = SudokuSolver::solve($grid);
if(null == $solver){
    echo "Insolvable \n";
}
else {
    display($solver);
}

$solver1 = SudokuSolver::solve($grid1);
if(null == $solver1){
    echo "Insolvable \n";
}
else {
    display($solver1);
}

$solver2 = SudokuSolver::solve($grid2);
if(null == $solver2){
    echo "Insolvable \n";
}
else {
    display($solver2);
}

$solver3 = SudokuSolver::solve($grid3,$coords);
if(null == $solver3){
    echo "Insolvable \n";
}
else {
    display($solver3);
}

$solver4 = SudokuSolver::solve($grid4,$coords);
if(null == $solver4){
    echo "Insolvable \n";
}
else {
    display($solver4);
}

$solver5 = SudokuSolver::solve($grid5);
if(null == $solver5){
    echo "Insolvable \n";
}
else {
    display($solver5);
}
$solverUn = SudokuSolver::solve($gridUn);
if(null == $solverUn){
    echo "Insolvable \n";
}
else {
    display($solverUn);
}

function display(SudokuGrid $grid){
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
}
		