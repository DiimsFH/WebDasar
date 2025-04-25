<?php
    echo("Hello World");
    //ini adalah Comment 1 line
    /*
    ini
    adalah
    Comment
    Many 
    Line
    */
    $nama = "HAYUU";
    $message = "<p>Halo $nama , Selamat Belajar PHPPPPPPP </p>";
    $message = "<p>Halo ".$nama. ", Selamat Belajar PHPPPPPPP </p>";
    echo $message;

    //Type Data (int, float, boolean, string, array)\

    $a = "wahyu"; //String
    $p = 45; //Integer
    $c = 3.69; //float
    $d = TRUE; // boolean
    $d = FALSE; // boolean
    $f = ["Andi", 2002, 3.6, TRUE]; //array
    
 //   echo $f[0];
    var_dump ($f);
?>
<!--Close Tag .php-->
