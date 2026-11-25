# Udah Termasuk Bonus

<?php

$mahasiswa = [
    [
        "nama" => "Arpeggio",
        "nim" => "E41262980",
        "tugas" => 93,
        "uts" => 90,
        "uas" => 95
    ],
    [
        "nama" => "Joko",
        "nim" => "E41261123",
        "tugas" => 90,
        "uts" => 88,
        "uas" => 92
    ],
    [
        "nama" => "Bambang",
        "nim" => "E41261456",
        "tugas" => 87,
        "uts" => 85,
        "uas" => 90
    ],
    [
        "nama" => "Asep",
        "nim" => "E41261789",
        "tugas" => 85,
        "uts" => 86,
        "uas" => 90
    ],
    [
        "nama" => "Kairi",
        "nim" => "E41261098",
        "tugas" => 86,
        "uts" => 89,
        "uas" => 88
    ]
];

echo "<h2>Data Nilai Mahasiswa</h2>";

echo "<table border='1' cellpadding='8'>";

echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
      </tr>";

$no = 1;
$tertinggi = 0;
$nama_tertinggi = "";

foreach ($mahasiswa as $mhs) {

    $nilai_akhir = ($mhs["tugas"] * 30 / 100) +
                   ($mhs["uts"] * 30 / 100) +
                   ($mhs["uas"] * 40 / 100);

    echo "<tr>
            <td>$no</td>
            <td>{$mhs['nama']}</td>
            <td>{$mhs['nim']}</td>
            <td>{$mhs['tugas']}</td>
            <td>{$mhs['uts']}</td>
            <td>{$mhs['uas']}</td>
            <td>$nilai_akhir</td>
          </tr>";

    if ($nilai_akhir > $tertinggi) {
        $tertinggi = $nilai_akhir;
        $nama_tertinggi = $mhs["nama"];
    }

    $no++;
}

echo "</table>";

echo "<h3>Mahasiswa dengan Nilai Akhir Tertinggi</h3>";
echo "Nama: $nama_tertinggi<br>";
echo "Nilai Akhir: $tertinggi";

?>
