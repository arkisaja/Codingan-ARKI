<?php  

    $Nama = "Arpeggio Fredly Zaki Abdurrazaq";
    $Nilai = 82;

    if ($Nilai >= 85) {
        $Grade = "SANGAT BAIK";
    } elseif ($Nilai >= 70) {
        $Grade = "BAIK";
    } elseif ($Nilai >= 60) {
        $Grade = "CUKUP";
    } elseif ($Nilai >= 50) {
        $Grade = "KURANG";
    } else {
        $Grade = "SANGAT KURANG";
    }

    echo "Nama :" . $Nama . "<br>";
    echo "Nilai :" . $Nilai . "<br>";
    echo "Grade :" . $Grade . "<br>";
?>
