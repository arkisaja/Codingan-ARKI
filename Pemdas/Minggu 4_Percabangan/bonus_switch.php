<?php

// Membuat variabel nomor hari
$nomorHari = 3;

// Menentukan nama hari menggunakan switch
switch ($nomorHari) {
    case 1:
        $hari = "Senin";
        break;

    case 2:
        $hari = "Selasa";
        break;

    case 3:
        $hari = "Rabu";
        break;

    case 4:
        $hari = "Kamis";
        break;

    case 5:
        $hari = "Jumat";
        break;

    case 6:
        $hari = "Sabtu";
        break;

    case 7:
        $hari = "Minggu";
        break;

    default:
        $hari = "Nomor hari tidak valid";
}

// Menampilkan hasil
echo "Nomor hari : $nomorHari <br>";
echo "Nama hari : $hari";

?>
