<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 3 - Perulangan dan Array</title>
</head>
<body>
    <h1>Latihan 3</h1>
    <?php
    // Contoh modul + 3 nama tambahan (Eka, Fajar, Gita)
    $mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"];

    echo "<h3>Daftar Mahasiswa</h3><ol>";
    foreach ($mahasiswa as $nama) {
        echo "<li>" . htmlspecialchars($nama) . "</li>";
    }
    echo "</ol>";
    ?>
</body>
</html>
