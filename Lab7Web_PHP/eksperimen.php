<?php
// 1. Rata-rata tiga komponen nilai
function hitungRataRata($a, $b, $c) {
    return ($a + $b + $c) / 3;
}

// 3. Function format Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// 2. Data sederhana untuk pencarian dengan GET
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"];
$hasilCari  = [];
$cari       = null;
if (isset($_GET["cari"])) {
    $cari = trim($_GET["cari"]);
    if ($cari !== "") {
        foreach ($daftarNama as $n) {
            if (stripos($n, $cari) !== false) {
                $hasilCari[] = $n;
            }
        }
    }
}

// 4 & 5. Validasi NIM dengan POST
$pesanNim = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nim = trim($_POST["nim"] ?? "");
    if (!ctype_digit($nim) || strlen($nim) !== 10) {
        $pesanNim = "NIM tidak valid: harus 10 digit angka.";
    } else {
        $pesanNim = "NIM valid: " . $nim;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen Mandiri</title>
</head>
<body>
    <h1>Eksperimen Mandiri</h1>

    <h2>1. Rata-rata nilai</h2>
    <p>Nilai 80, 75, 90 &rarr; rata-rata: <?= number_format(hitungRataRata(80, 75, 90), 2) ?></p>

    <h2>2. Cari nama (GET)</h2>
    <form method="GET" action="">
        <input type="text" name="cari" value="<?= htmlspecialchars($cari ?? "", ENT_QUOTES, "UTF-8") ?>">
        <button type="submit">Cari</button>
    </form>
    <?php
    if ($cari !== null) {
        if ($hasilCari) {
            echo "<p>Hasil: " . htmlspecialchars(implode(", ", $hasilCari)) . "</p>";
        } else {
            echo "<p>Nama tidak ditemukan.</p>";
        }
    }
    ?>

    <h2>3. Format Rupiah</h2>
    <p><?= formatRupiah(1500000) ?></p>

    <h2>4 &amp; 5. Validasi NIM + tombol reset</h2>
    <form method="POST" action="">
        <label>NIM (10 digit): <input type="text" name="nim"></label>
        <button type="submit">Kirim</button>
        <button type="reset">Reset</button>
    </form>
    <?php
    if ($pesanNim !== null) {
        echo "<p>" . htmlspecialchars($pesanNim) . "</p>";
    }
    ?>
</body>
</html>
