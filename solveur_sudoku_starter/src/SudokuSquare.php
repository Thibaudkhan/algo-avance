<?php 

class SudokuSquare
{
    private $arraySquare;

    public function __construct (array $arraySquare){
        $this->arraySquare = $arraySquare;
    }
    
    public function getRowSquare(int $nbRow):array{
        $tempArray = $this->arraySquare[$nbRow];
        return $tempArray;
    }

    public function getColumnSquare(int $nbCol):array{
        $arraySquare = $this->arraySquare;
        $tempArray = array();
        for ($i=0; $i < 3; $i++) { 
            array_push($tempArray, $arraySquare[$i][$nbCol]);
        }
        return $tempArray;
    }

    public function getSquare():array{
        $arraySquare = $this->arraySquare;
        $tempArray = array();
        for ($i=0; $i < count($arraySquare); $i++) { 
            for ($j=0; $j < count($arraySquare[$i]); $j++) { 
                array_push($tempArray, $arraySquare[$i][$j]);
            }   
        }
        return $tempArray;
    }

    public function getCellSquare(int $rowCell, int $colCell): int{
        $arraySquare = $this->arraySquare;
        $nbInCell = $arraySquare[$rowCell][$colCell];
        return $nbInCell;
    }

    public function setCellSquare(int $rowCell, int $colCell, int $replacement){
        $this->arraySquare[$rowCell][$colCell] = $replacement;
    }

    public function verifySquare():bool{
        $arraySquare = $this->arraySquare;
        $tempSquare = $this->getSquare();
        for ($i=1; $i < 10; $i++) { 
            $nbOcurrence = 0;
            foreach ($tempSquare as $key => $value) {
                if ($value > 9 || $value < 1){
                    return false;
                }
                if ($i === $value){
                    $nbOcurrence++;
                }
            }
            if($nbOcurrence > 1){
                return false;
            }
        }
        return true;
    }
}

?>