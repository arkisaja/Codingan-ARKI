<?php
$Nama_Lengkap = "Arpeggio Fredly Zaki Abdurrazaq";
$NIM = "E41262717";
$PRODI = "Teknik Informatika";
$UMUR = 19;
$Ipk = 3.75;
$Status = true;

echo "Nama Lengkap : " . $Nama_Lengkap;
echo "<br>";
echo "NIM : " . $NIM;
echo "<br>";
echo "Program Studi : " . $PRODI;
echo "<br>";
echo "Umur : " . $UMUR . " Tahun";
echo "<br>";
echo "IPK : " . $Ipk;
echo "<br>";
echo "Status Aktif : " . ($Status ? "Aktif" : "Tidak Aktif");
echo "<br>";
echo "<br>";

echo "Simulasi Var_dump :";
echo "<br>";
var_dump($Nama_Lengkap);
echo "<br>";
var_dump($NIM);
echo "<br>";
var_dump($PRODI);
echo "<br>";
var_dump($UMUR);
echo "<br>";
var_dump($Ipk);
echo "<br>";
var_dump($Status);
?>
