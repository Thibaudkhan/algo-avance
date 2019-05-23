<?php

require_once 'src/SudokuSolver.php';

$solver = SudokuSolver::solve($grid);
if(null == $solver){
    echo "Insolvable";
}
else {
    print_r($solver);
}



/*;
print_r($grid->getColumn(3));
$array = $grid->getRow(3);
$arraySquare = $grid->getSquareBoard(3)->getSquare();
print_r($arraySquare);
if($grid->verify($arraySquare)){
    echo "Valide";
}
else {
    echo "Non valide";
}
print_r($array);
if($grid->verify($array)){
    echo "Valide";
}
else {
    echo "Non valide";
}
if($grid->isFilled()){
   echo "C'est plein";
}
else{
    echo "C'est pos plein";
}

//print_r($grid->$board);
print_r($square->getSquare());
//print_r($square->setCellSquare(1,2, 15));
//print_r($square->getRowSquare(1));
//print_r($square->getColumnSquare(1));
//print_r($square->getCellSquare(1,2));
//print_r($square->getSquare());
if($square->verifySquare()){
    echo "Il est bon";
}
else {
    echo "Pas bon";
}*/
