<?php

class SudokuGrid //implements GridInterface
{

}
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