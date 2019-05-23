<?php 

function printMicroTime (float $startTime, float $endTime){
	return round(($endTime - $startTime) * 1000000);
}

function randomArray(int $nbInt):array{
    $arrayInt = array();
    for ($i = 0; $i < $nbInt; $i++){
        $tempInt = random_int(0, 20);
        if(!in_array($tempInt, $arrayInt)){
            array_push($arrayInt, $tempInt);
        }
        else{
            $i--;
        }
    }
    return $arrayInt;
}

function phpSearch(array $arToSearch, int $findValue){
	$start = microtime(true);
	array_search($findValue, $arToSearch);
	$end = microtime(true);
	echo printMicroTime($start,$end) . " µs\n";
		
}

function sequenceSearch(array $arToSearch, int $findValue){
		$start = microtime(true);
		for ($i=0; $i < count($arToSearch); $i++) { 
			if($arToSearch[$i] == $findValue){
				$end = microtime(true);
				echo (printMicroTime($start,$end) . " µs\n");
				return $arToSearch[$i];
			}
		}
		$end = microtime(true);
		echo (printMicroTime($start,$end) . " µs\n");
		return false;
}

function dichotomicSearch(array $arToSearch, int $findValue){
	$start = microtime(true);
	$medianValue = intdiv(count($arToSearch),2);
	if(count($arToSearch))
	if($arToSearch[$medianValue] == $findValue){
		$end = microtime(true);
		echo $arToSearch[$medianValue];
		echo printMicroTime($start,$end)."µs\n";
		return;
	}else if(count($arToSearch) <= 1){
		$end = microtime(true);
		echo "Not Found";
		echo printMicroTime($start,$end)."µs\n";
		return;
	} else if($arToSearch[$medianValue] < $findValue){
		//$midArray = array_chunk($arToSearch, $arToSearch[ceil(count($arToSearch)/2)]);
		$midArray = array_splice($arToSearch,-1 * $medianValue);
	 	dichotomicSearch($midArray,$findValue);
	} else {
		$midArray = array_splice($arToSearch, $medianValue);
		dichotomicSearch($midArray,$findValue);
	}
}

$n = 10;
$arrayInt = randomArray($n+5);
$arrayMiss = array_slice($arrayInt, -5);
$arrayIn = array();
for ($i=0; $i < 5; $i++) { 
	array_pop($arrayInt);
}
for ($i=0; $i < 5 ; $i++) { 
	array_push($arrayIn, $arrayInt[array_rand($arrayInt)]);
}
sort($arrayInt);

echo "\nPour les valeurs dans le tableau : \n";
echo "Recherche natif PHP : \n";
for ($i=0; $i < count($arrayIn); $i++) { 
	phpSearch($arrayInt,$arrayIn[$i]);
}
echo "Recherche sequenciel : \n";
for ($i=0; $i < count($arrayIn); $i++) { 
	sequenceSearch($arrayInt,$arrayIn[$i]);
}
echo "Recherche dichotomique récursive : \n";
for ($i=0; $i < count($arrayIn); $i++) { 
	dichotomicSearch($arrayInt,$arrayIn[$i]);
}
echo "\nPour les valeurs non présentes dans le tableau : \n";
echo "Tri natif PHP : \n";
for ($i=0; $i < count($arrayMiss); $i++) { 
	phpSearch($arrayInt,$arrayMiss[$i]);
}
echo "Tri sequenciel : \n";
for ($i=0; $i < count($arrayMiss); $i++) { 
	sequenceSearch($arrayInt,$arrayMiss[$i]);
}
echo "Recherche dichotomique récursive : \n";
for ($i=0; $i < count($arrayIn); $i++) { 
	dichotomicSearch($arrayInt,$arrayMiss[$i]);
}



 ?>
