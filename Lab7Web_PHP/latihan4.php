<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 4 - Function</title>
</head>
<body>
    <h1>Latihan 4</h1>
    <?php
    function hitungDiskon($harga, $persen) {
        $potongan = $harga * ($persen / 100);
        return $harga - $potongan;
    }

    // Function tambahan 1: luas persegi panjang
    function hitungLuasPersegiPanjang($panjang, $lebar) {
        return $panjang * $lebar;
    }

    // Function tambahan 2: menentukan kelulusan
    function tentukanKelulusan($nilai) {
        return ($nilai >= 70) ? "Lulus" : "Tidak Lulus";
    }

    $hargaAkhir = hitungDiskon(150000, 10);
    echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "<br>";
    echo "Luas persegi panjang (8 x 4): " . hitungLuasPersegiPanjang(8, 4) . "<br>";
    echo "Nilai 75: " . tentukanKelulusan(75) . "<br>";
    echo "Nilai 60: " . tentukanKelulusan(60);
    ?>
</body>
</html>
