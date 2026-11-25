<?php

// Membuat variabel nilai
$nilai_tugas = 80;
$nilai_uts = 75;
$nilai_uas = 85;

// Menghitung nilai akhir
$nilai_akhir = ($nilai_tugas * 30 / 100) +
               ($nilai_uts * 30 / 100) +
               ($nilai_uas * 40 / 100);

// Menampilkan hasil
echo "Nilai Tugas : " . $nilai_tugas . "<br>";
echo "Nilai UTS   : " . $nilai_uts . "<br>";
echo "Nilai UAS   : " . $nilai_uas . "<br>";
echo "Nilai Akhir : " . $nilai_akhir . "<br>";

// Perbandingan nilai akhir dengan 75
$hasil = $nilai_akhir >= 75;

// Menampilkan hasil perbandingan
echo "Apakah nilai akhir >= 75? ";
var_dump($hasil);

?>
