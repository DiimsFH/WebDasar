<?php

// if atau else if atau else
$password = 1234;

if($password===1234)
    {echo"Password Anda Benar";}

echo"<br>";

$angka=5;
if($angka > 5) 
    {echo"Angka $angka Besar dari 5";} 
else 
    {echo"Angka $angka Kecil dari 5";}

echo"<br>";

if($angka == 5)
    {echo "Angka sama dengan 5";}
else if($angka > 5)
    {echo "Angka $angka Besar dari 5";}
else    
    {echo "Angka $angka Kecil dari 5";}

//operator Ternary
echo"<br>";
echo $password == 1234 ? "Password Benar" : "Password Salah";

// NILAI IF
echo"<br>";
$nilai = 6;
/*
Nilai besar dari 85 A
Nilai besar dari 75 B
Nilai besar dari 65 C
Nilai besar dari 55 D
Nilai kecil dari 55 E
0-100
*/
if($nilai >= 85 && 100)
    {$predikat = "A";}
else if($nilai >= 75)
    {$predikat = "B";}
else if($nilai >= 65)
    {$predikat = "C";}   
else if($nilai >= 55)
    {$predikat = "D";} 
else    
    {$predikat = "E";}

echo "Predikat $predikat";
//NILAI CASE
echo "<br>";
switch(true)
{
    case ($nilai >= 85 && $nilai <= 100):
        echo "Predikat untuk nilai $nilai adalah: A ";
        break;
        case ($nilai >= 70 && $nilai < 85):
            echo "Predikat untuk nilai $nilai adalah: B ";
            break;
            case ($nilai >= 55 && $nilai < 70):
                echo "Predikat untuk nilai $nilai adalah: C ";
                break;
                case ($nilai >= 40 && $nilai < 55):
                    echo "Predikat untuk nilai $nilai adalah: D ";
                    break;
                    case ($nilai >= 0 && $nilai < 40):
                        echo "Predikat untuk nilai $nilai adalah: E ";
                        break;
                        default:
                            echo "Nilai tidak valid!";
                            break;
}



// switch case
echo "<br>";
$angkaBulan = 7;

switch($angkaBulan)
{
    case 1 :
        $nama_bulan = "January";
        break;
        case 2 :
            $nama_bulan = "February";
            break;
            case 3 :
                $nama_bulan = "March";
                break;
                case 4 :
                    $nama_bulan = "April";
                    break;
                    case 5 :
                        $nama_bulan = "May";
                        break;
                        case 6 :
                            $nama_bulan = "June";
                            break;
                            case 7 :
                                $nama_bulan = "July";
                                break;
                                case 8 :
                                    $nama_bulan = "August";
                                    break;
                                    case 9 :
                                        $nama_bulan = "September";
                                        break;
                                        case 10 :
                                            $nama_bulan = "October";
                                            break;
                                            case 11 :
                                                $nama_bulan = "November";
                                                break;
                                                case 12 :
                                                    $nama_bulan = "December";
                                                    break;
                                                    default :
                                                        $nama_bulan = "NAME BULAN TAKDE";
                                                        break;
}

echo "Bulan ke $angkaBulan adalah $nama_bulan";

?>