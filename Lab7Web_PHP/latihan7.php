<?php
$error = null;
$subtotal = null;
$barang = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang      = trim($_POST["barang"] ?? "");
    $hargaInput  = $_POST["harga"] ?? "";
    $jumlahInput = $_POST["jumlah"] ?? "";

    if ($barang === "" || !is_numeric($hargaInput) ||
        !ctype_digit((string)$jumlahInput) ||
        (float)$hargaInput < 0 || (int)$jumlahInput < 1) {
        $error = "Periksa kembali nama barang, harga, dan jumlah.";
    } else {
        $harga    = (float)$hargaInput;
        $jumlah   = (int)$jumlahInput;
        $subtotal = $harga * $jumlah;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 7 - Pengolahan Data Sederhana</title>
</head>
<body>
    <h1>Latihan 7 - Hitung Subtotal</h1>
    <form method="POST">
        <label>Nama barang <input name="barang" required></label><br>
        <label>Harga <input name="harga" type="number" min="0" step="0.01" required></label><br>
        <label>Jumlah <input name="jumlah" type="number" min="1" step="1" required></label><br>
        <button type="submit">Hitung</button>
    </form>
    <?php
    if ($error !== null) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    } elseif ($subtotal !== null) {
        echo "<p>Barang: " . htmlspecialchars($barang) . "</p>";
        echo "<p>Subtotal: Rp" . number_format($subtotal, 0, ",", ".") . "</p>";
    }
    ?>
</body>
</html>
