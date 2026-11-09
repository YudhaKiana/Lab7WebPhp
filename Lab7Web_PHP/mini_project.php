<?php
// ===== BAGIAN PEMROSESAN =====
$data  = null;
$error = [];
$old   = ["nama" => "", "nim" => "", "prodi" => "", "semester" => "", "email" => ""];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama          = trim($_POST["nama"] ?? "");
    $nim           = trim($_POST["nim"] ?? "");
    $prodi         = trim($_POST["prodi"] ?? "");
    $semesterInput = trim($_POST["semester"] ?? "");
    $email         = trim($_POST["email"] ?? "");

    $old = ["nama" => $nama, "nim" => $nim, "prodi" => $prodi,
            "semester" => $semesterInput, "email" => $email];

    if ($nama === "")  $error[] = "Nama wajib diisi.";
    if ($nim === "")   $error[] = "NIM wajib diisi.";
    elseif (!ctype_digit($nim) || strlen($nim) < 8 || strlen($nim) > 12) {
        $error[] = "NIM harus berupa angka dengan panjang 8-12 digit.";
    }
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit($semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1-14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}

function e($teks) {
    return htmlspecialchars($teks, ENT_QUOTES, "UTF-8");
}
?>
<!-- ===== BAGIAN TAMPILAN ===== -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mini Project - Formulir Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 520px; margin: 30px auto; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 6px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 8px 16px; }
        .error { background: #fde8e8; border: 1px solid #e0a0a0; padding: 10px; margin-top: 15px; }
        .sukses { background: #e8f5e9; border: 1px solid #8bc48f; padding: 10px; margin-top: 15px; }
    </style>
</head>
<body>
    <h1>Formulir Data Mahasiswa</h1>

    <form method="POST" action="">
        <label for="nama">Nama</label>
        <input id="nama" name="nama" type="text" value="<?= e($old['nama']) ?>">

        <label for="nim">NIM</label>
        <input id="nim" name="nim" type="text" value="<?= e($old['nim']) ?>">

        <label for="prodi">Program Studi</label>
        <input id="prodi" name="prodi" type="text" value="<?= e($old['prodi']) ?>">

        <label for="semester">Semester</label>
        <input id="semester" name="semester" type="text" value="<?= e($old['semester']) ?>">

        <label for="email">Email</label>
        <input id="email" name="email" type="text" value="<?= e($old['email']) ?>">

        <button type="submit">Kirim</button>
    </form>

    <?php if ($error): ?>
        <div class="error">
            <strong>Terdapat kesalahan:</strong>
            <ul>
                <?php foreach ($error as $pesan): ?>
                    <li><?= e($pesan) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif ($data): ?>
        <div class="sukses">
            <h3>Data Mahasiswa Diterima</h3>
            <p>Nama: <?= e($data["nama"]) ?></p>
            <p>NIM: <?= e($data["nim"]) ?></p>
            <p>Program Studi: <?= e($data["prodi"]) ?></p>
            <p>Semester: <?= (int)$data["semester"] ?></p>
            <p>Email: <?= e($data["email"]) ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
