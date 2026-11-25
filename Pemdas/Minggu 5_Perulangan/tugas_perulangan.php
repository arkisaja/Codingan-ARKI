<?php
#Bagian A-Tabel Perkalian
echo "Tabel Perkalian (for)" . "<br>";
$Angka = 2;

for($i = 1; $i <= 10; $i++) {
    $Hasil = $Angka * $i;

    echo $Angka . " x " . $i . " = " . $Hasil . "<br>";
}



#Bagian B-Deret Angka
    echo "<br>" . "Deret Angka (while)" . "<br>";
$i = 1;
    while ($i <= 10) {
        if ($i % 2==0) {
            echo "$i = Genap" . "<br>";
        } else {
            echo "$i = Ganjil" . "<br>";
        }
        $i++;
    }

#do...while
    echo "<br>" . "do...while angka 1-10 :" . "<br>";
    $i = 10;
do {
    if ($i % 2==0) {
        echo "$i = Genap" . "<br>";
    } else {
        echo "$i = Ganjil" . "<br>";
    }
    $i--;
} while ($i >= 1);
