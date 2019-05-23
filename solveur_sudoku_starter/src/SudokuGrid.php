<?php

class SudokuGrid { // implements GridInterface
    function createSudokuGrid(array $grid): array {
        private $arrayOfArrays[] = array();
        for ($i = 0; $i <= 8; $i ++) {
            for ($j = 0; $j <= 8; $j ++) {
                if ($j <= 2) {
                    array_push($arrayOfArrays[intdiv($i, 3) * 3], $grid[$i][$j]);
                } elseif ($j > 2 and $j <= 5) {
                    array_push($arrayOfArrays[intdiv($i, 3) * 3 + 1], $grid[$i][$j]);
                } else {
                    array_push($arrayOfArrays[intdiv($i, 3) * 3 + 2], $grid[$i][$j]);
                }
            }
        }
        return $arrayOfArrays;
    }
}

// CREATION DE LA SUDOKU GRID
// 9 tableaux (9 lignes) contenants chacuns 9 éléments (chiffres)
// Récupérer 3 tableaux pour les découper en 3 carrés
// Les carrés devront contenir chacuns 3 lignes contenant chacunes 3 éléments (chiffres)

function jsonToArrays($filepath) : array{
	$stream = fopen($filepath, "r");
	$jsonString = fread($stream, filesize($filepath));
	$jsonString = json_decode($jsonString);
	return $jsonString;
}

function arrayToArrays(array $bigArray) : array{
	return array_chunk($bigArray, 3);
}

//Test lecture Json + découpage tableau (Anthony)
foreach (jsonToArrays("../grids/full.json") as $array) {
 	print_r(arrayToArrays($array));
 } 
