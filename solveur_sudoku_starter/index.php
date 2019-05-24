<?php
require "./src/SudokuGrid.php";
require_once 'src/SudokuSolver.php';

$grid1 = SudokuGrid::loadFromFile("./grids/grid1.json");
$grid2 = SudokuGrid::loadFromFile("./grids/grid2.json");
$grid3 = SudokuGrid::loadFromFile("./grids/grid3.json");
$grid4 = SudokuGrid::loadFromFile("./grids/grid4.json");
$grid5 = SudokuGrid::loadFromFile("./grids/grid5.json");
$grid = SudokuGrid::loadFromFile("./grids/full.json");

/*$nbIte = 0;
if($grid->isFilled()){
    echo "Filled \n";
}
else {
    echo "Non filled";
}*/
$solver = SudokuSolver::solve($grid);
$solver1 = SudokuSolver::solve($grid1);
$solver2 = SudokuSolver::solve($grid2);
$solver3 = SudokuSolver::solve($grid3);
$solver4 = SudokuSolver::solve($grid4);
$solver5 = SudokuSolver::solve($grid5);
if(null == $solver){
    echo "Insolvable \n";
}
else {
    display($solver);
}
if(null == $solver1){
    echo "Insolvable \n";
}
else {
    display($solver1);
}
if(null == $solver2){
    echo "Insolvable \n";
}
else {
    display($solver2);
}
if(null == $solver3){
    echo "Insolvable \n";
}
else {
    display($solver3);
}
if(null == $solver4){
    echo "Insolvable \n";
}
else {
    display($solver4);
}
if(null == $solver5){
    echo "Insolvable \n";
}
else {
    display($solver5);
}

//$grid = SudokuGrid::loadFromFile("./grids/full.json");
//print_r($grid->getColumn(0));
//print_r($grid->getColumn(8));
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

//$nbIte = 0;
//print_r(SudokuSolver::solve($grid,$nbIte));
		