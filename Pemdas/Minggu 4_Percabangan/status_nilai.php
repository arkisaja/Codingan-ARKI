<?php

// Membuat variabel nilai
$nilai = 85;

// Validasi nilai
if ($nilai < 0 || $nilai > 100) {
    echo "Nilai tidak valid. Nilai harus berada di antara 0 sampai 100.";
} else {
    
    // Menentukan grade
    if ($nilai >= 90) {
        $grade = "A";
    } elseif ($nilai >= 80) {
        $grade = "B";
    } elseif ($nilai >= 70) {
        $grade = "C";
    } elseif ($nilai >= 60) {
        $grade = "D";
    } else {
        $grade = "E";
    }

    // Menentukan status kelulusan
    if ($nilai >= 75) {
        $status = "Lulus";
    } else {
        $status = "Tidak Lulus";
    }

    // Menampilkan hasil
    echo "Nilai : $nilai <br>";
    echo "Grade : $grade <br>";
    echo "Status : $status";
}

?>
