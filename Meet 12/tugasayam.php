<?php
                                                //-----------------------While-------------------------//
                                              
    $x = 10;
    echo"Anak(X) ayam turun $x <br>";
    while($x>=2){
        echo "Anak ayam turun $x, mati satu tinggal ". ($x - 1) ."<br>";
        $x--;
        if($x==1){
            echo "Anak ayam turun $x, mati satu tinggal induknya<br>";
        }
    }
                                                //----------------------Do While------------------------//
                                                echo"<br>";
    $y = 10;
    echo"Anak(Y) ayam turun $y <br>";
    do{
        echo "Anak ayam turun $y, mati satu tinggal ". ($y - 1) ."<br>";
        $y--;
        if($y==1){
            echo "Anak ayam turun $y, mati satu tinggal induknya<br>";
        }
    }while($y>=2);

                                                //-------------------Cara Bapak--------------------------//
                                                echo"<br>";
    $ayam = 10;
    echo "Anak ayam turun $ayam<br>";
    while($ayam >= 2){
        echo "Anak ayam turun $ayam, mati satu tinggal ".($ayam-1)."<br>";
        $ayam--;
    }
    echo "Anak ayam turun ".$ayam.", mati satu tinggal induknya";
?>