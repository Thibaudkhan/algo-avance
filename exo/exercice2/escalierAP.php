<?php
function escalier (int $marches, $nbStep){
    $steps = 0;
    $possibleSteps = $nbStep;
    while( $steps != $marche){
        $stepsTodo = array();
        array_push($stepsTodo, array_shift($possibleSteps));
        foreach($nbStep as $key => $value){
            array_push($stepsTodo, $value);
            array_push( $possibleSteps, $stepsTodo);
            array_shift($possibleSteps);
        } 
        foreach($possibleSteps as $key => $value){
            foreach($value as $key2 => $value2){
                $steps += $value2;  
            }
            if($steps > $marches){
                array_splice($possibleSteps,$key,1);
            }
            else if($steps == $marches){
                foreach($value as $key2 => $value2){
                    print_r($value2);  
                }
            }
        }
    }
}

echo escalier (32, [8]);

?>
/*
​
function escalier($marches, $sauts){
  $solutions = [];
  foreach($sauts as $saut){
    if($marches % $saut == 0){
      return implode(",", array_fill(0, $marches/$saut, $saut));
    }
    $solutions[] = [$saut];
  }
  do {
    $sol = array_shift($solutions);
    foreach($sauts as $saut){
      $newsol = array_values($sol);
      $newsol[] = $saut;
      $total = array_sum($newsol);
      if($total == $marches){
        return implode(",", $newsol);
      } else if($total < $marches) {
        $solutions[] = $newsol;
      }
    }
  } while (!empty($solutions));
  return "Error";
}
​
function escalier2(int $nombreMarches, array $deplacements): ?array {
  // Etape 1 : cas simples
  // Vérifier si le nombre de marches est divisible par un déplacement
  foreach($deplacements as $deplacement){
    if($nombreMarches % $deplacement == 0){
      // Retourner [2, 2, 2, 2, 2]
      $reponse = [];
      $nombreDeplacements = $nombreMarches / $deplacement;
      for($i = 0; $i < $nombreDeplacements ; $i++){
        $reponse[] = $deplacement;
      }
      return $reponse;
    }
  }
  // Etape 2 : cas compliqués
  // On prépare le tableau de solutions potentielles
  $solutions = [];
  foreach($deplacements as $deplacement){
    $solutions[] = [ $deplacement ];
  }
  // $solutions = [[3], [4]];
  do {
    // On extrait le premier cas pour essayer de le résoudre
    $cas = array_shift($solutions);
​
    foreach($deplacements as $deplacement){
      // On copie le cas, pour conserver un original
      $copyCas = $cas;
      // On ajoute le deplacement et on vérifie
      $copyCas[] = $deplacement;
      $somme = array_sum($copyCas);
      //Si la somme des éléments de $copyCas :
      // - = $nombreMarches, on a trouvé une solution
      // - < $nombreMarches, on l'ajoute et on continue
      // - > $nombreMarches, on ne l'ajoute pas
      if($somme == $nombreMarches){
        return $copyCas;
      } else if($somme < $nombreMarches) {
        array_push($solutions, $copyCas);
      } else {
        // On rejete le cas, et on ne fait rien
      }
    }
    // Si $solutions est vide
    // On retourne une erreur
    if(empty($solutions)){
      return null;
    }
  } while(true);
}/*