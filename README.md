# Laporan Praktikum 7 — Pemrograman Server-Side dengan PHP

| | |
|---|---|
| **Mata Kuliah** | Pemrograman Web |
| **Praktikum** | 7 — Pemrograman Server-Side dengan PHP |
| **Nama** | (Yudha Eka P) |
| **NIM** | (312210362) |
| **Kelas** | (I251C) |
| **Program Studi** | Teknik Informatika |

---

## 1. Tujuan Praktikum
1. Memahami perbedaan pemrosesan client-side dan server-side.
2. Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
3. Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.
4. Menerima dan memproses data form HTML dengan metode GET dan POST.
5. Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.
6. Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.

## 2. Perangkat yang Digunakan
| Perangkat | Keterangan |
|---|---|
| Sistem operasi | (isi, mis. Windows 11) |
| Web server | XAMPP / Laragon (isi versi) |
| PHP | (isi versi, cek dengan `php -v`) |
| Editor | Visual Studio Code |
| Browser | (isi, mis. Google Chrome) |

## 3. Cara Menjalankan Server Lokal
1. Instal XAMPP/Laragon, lalu jalankan layanan **Apache**.
2. Salin folder `Lab7Web_PHP` ke `htdocs` (XAMPP) atau `www` (Laragon).
3. Buka `http://localhost/Lab7Web_PHP/` di browser.
4. Jangan membuka file `.php` dengan klik ganda, karena kode PHP tidak akan dieksekusi.

## 4. Struktur File
```
Lab7Web_PHP/
├── index.php           # menu navigasi
├── latihan1.php        # Menjalankan PHP
├── latihan2.php        # Variabel, operator, percabangan
├── latihan3.php        # Perulangan dan array
├── latihan4.php        # Function
├── latihan5.php        # Form GET
├── latihan6.php        # Form POST
├── latihan7.php        # Pengolahan data sederhana
├── mini_project.php    # Formulir Data Mahasiswa
├── eksperimen.php      # Eksperimen mandiri
├── screenshots/        # bukti hasil di browser
└── README.md           # laporan ini
```

---

## 5. Hasil dan Pembahasan

### Latihan 1 — Menjalankan PHP
**File:** `latihan1.php`

**Penjelasan:** PHP disisipkan dalam HTML dengan tag `<?php ... ?>`. Fungsi `echo` menampilkan teks, dan `date()` mengambil waktu dari server.

**Hasil:** Browser hanya menampilkan teks "PHP berhasil dijalankan." dan waktu server. Kode PHP tidak terlihat karena sudah dieksekusi server, dan yang dikirim ke browser hanya hasil HTML-nya.

---

### Latihan 2 — Variabel, Operator, dan Percabangan
**File:** `latihan2.php`

**Penjelasan:** Nilai akhir dihitung dengan bobot tugas 30%, UTS 30%, dan UAS 40%, lalu predikat ditentukan dengan `if – elseif – else`.

```
(85 × 0,30) + (78 × 0,30) + (90 × 0,40) = 25,5 + 23,4 + 36 = 84,90
```

**Hasil:** Nilai akhir **84.90**, predikat **B** (karena ≥ 75 tetapi < 85).

**Pengujian kombinasi nilai lain:**

| Tugas | UTS | UAS | Nilai Akhir | Predikat |
|---|---|---|---|---|
| 85 | 78 | 90 | 84,90 | B |
| 90 | 90 | 90 | 90,00 | A |
| 60 | 60 | 60 | 60,00 | C |
| 40 | 50 | 50 | 47,00 | D |

---

### Latihan 3 — Perulangan dan Array
**File:** `latihan3.php`

**Penjelasan:** Array `$mahasiswa` berisi 7 nama (4 dari modul + Eka, Fajar, Gita). `foreach` menelusuri tiap elemen dan menampilkannya sebagai item `<li>` dalam daftar bernomor `<ol>`.

**Hasil:** Ketujuh nama tampil berurutan.

---

### Latihan 4 — Function
**File:** `latihan4.php`

**Penjelasan:** Function memungkinkan logika dipakai ulang. Selain `hitungDiskon()`, ditambahkan `hitungLuasPersegiPanjang()` dan `tentukanKelulusan()` (batas lulus 70).

**Hasil:**
- Harga setelah diskon 10% dari 150.000: **Rp135.000**
- Luas persegi panjang 8 × 4: **32**
- Nilai 75: **Lulus**, nilai 60: **Tidak Lulus**

---

### Latihan 5 — Form dengan GET
**File:** `latihan5.php`

**Penjelasan:** Form memakai `method="GET"`, sehingga data dikirim lewat URL dan dibaca dengan `$_GET["kata"]`. `isset()` memastikan data ada, `trim()` membuang spasi, dan `htmlspecialchars()` mengamankan tampilan.

**Hasil:** Setelah tombol Cari ditekan, URL berubah menjadi `latihan5.php?kata=...`. Ini membuktikan data GET terlihat di address bar, sehingga **tidak boleh** dipakai untuk kata sandi atau data sensitif.

---

### Latihan 6 — Form dengan POST
**File:** `latihan6.php`

**Penjelasan:** Data dikirim lewat body request dan dibaca dengan `$_POST`. Operator `??` memberi nilai default kosong jika data tidak ada. Pemrosesan hanya berjalan jika `$_SERVER["REQUEST_METHOD"] === "POST"`.

**Pengujian:**

| Input | Hasil |
|---|---|
| Nama: `Rina`, Prodi: `Teknik Informatika` | Data ditampilkan |
| Salah satu kolom kosong / hanya spasi | "Semua kolom wajib diisi." |
| Nama: `<b>Rina</b> "uji"` | Tag tampil sebagai teks biasa, tidak dieksekusi (berkat `htmlspecialchars`) |

---

### Latihan 7 — Pengolahan Data Sederhana
**File:** `latihan7.php`

**Penjelasan:** Form menerima nama barang, harga, dan jumlah. Server memvalidasi: nama tidak kosong, harga numerik dan ≥ 0 (`is_numeric`), jumlah bilangan bulat ≥ 1 (`ctype_digit`). Jika valid, subtotal = harga × jumlah.

**Pengujian:**

| Barang | Harga | Jumlah | Hasil |
|---|---|---|---|
| Pulpen | 2500.50 | 3 | Subtotal Rp7.502 (7.501,5 dibulatkan oleh `number_format`) |
| Buku | 15000 | 2 | Subtotal Rp30.000 |
| Buku | 15000 | 0 | Pesan error |
| Buku | 15000 | -2 | Pesan error |
| Buku | abc | 2 | Pesan error |

> Validasi HTML (`min`, `required`) bisa menghalangi pengiriman di browser. Untuk menguji validasi PHP, tambahkan atribut `novalidate` pada `<form>` secara sementara.

---

## 6. Mini Project — Aplikasi Formulir Data Mahasiswa
**File:** `mini_project.php`

**Fitur:**
- Form berisi nama, NIM, program studi, semester, dan email (metode POST).
- Validasi server-side:
  - semua kolom wajib diisi,
  - NIM hanya angka dengan panjang 8–12 digit,
  - email divalidasi dengan `filter_var(..., FILTER_VALIDATE_EMAIL)`,
  - semester bilangan bulat 1–14.
- Seluruh pesan error ditampilkan sekaligus dalam daftar.
- Isian form dipertahankan jika terjadi error.
- Data ditampilkan kembali dengan `htmlspecialchars()`.
- Bagian pemrosesan (atas file) dipisah dari bagian tampilan (bawah file).

### Dua kasus input valid
| No | Input | Hasil |
|---|---|---|
| 1 | Rina Putri, 2024010001, Teknik Informatika, semester 3, rina@mail.com | Ringkasan data ditampilkan |
| 2 | Budi Santoso, 2023020055, Sistem Informasi, semester 14, budi.s@kampus.ac.id | Ringkasan data ditampilkan |

### Dua kasus input tidak valid
| No | Input | Hasil |
|---|---|---|
| 1 | Semua kolom kosong | Error: nama, NIM, prodi, email, dan semester |
| 2 | NIM `12AB`, semester `20`, email `rina@` | Error: NIM, email, dan semester |
---

## 7. Eksperimen Mandiri
**File:** `eksperimen.php`

| No | Eksperimen | Hasil |
|---|---|---|
| 1 | Rata-rata tiga nilai (80, 75, 90) | 81,67 |
| 2 | Pencarian nama dari array dengan GET (`?cari=`), tidak membedakan huruf besar/kecil | Nama yang cocok ditampilkan, atau "Nama tidak ditemukan." |
| 3 | Function `formatRupiah()` | 1500000 menjadi `Rp1.500.000` |
| 4 | Validasi NIM: hanya angka dan tepat 10 digit | Pesan valid / tidak valid |
| 5 | Tombol reset | Lihat penjelasan di bawah |

**Perbedaan tombol reset dan pemrosesan ulang di server:** tombol `type="reset"` hanya mengosongkan isian form di browser tanpa mengirim request ke server dan tanpa menjalankan PHP. Tombol submit mengirim request ke server, PHP memproses ulang data, dan halaman dibuat ulang.

---

## 8. Jawaban Pertanyaan Evaluasi
1. **Perbedaan client-side dan server-side.** Client-side dijalankan di browser pengguna (HTML, CSS, JavaScript). Server-side dijalankan di server (PHP): menerima permintaan, memproses, lalu mengirim hasilnya ke browser.
2. **Mengapa file PHP harus dijalankan melalui web server?** Browser tidak mengerti PHP. Web server meneruskan file `.php` ke interpreter PHP, lalu mengirim hasil HTML-nya ke browser. Jika dibuka langsung dengan klik ganda, kode tidak dieksekusi.
3. **Fungsi tanda `$`.** Penanda bahwa sebuah nama adalah variabel.
4. **Perbedaan GET dan POST.** GET mengirim data lewat parameter URL (terlihat, panjang terbatas, cocok untuk pencarian). POST mengirim data lewat body request (tidak tampil di URL, lazim untuk form). POST bukan enkripsi, tetap gunakan HTTPS.
5. **Mengapa input divalidasi di sisi server?** Validasi di browser mudah dilewati (DevTools, curl, dan sebagainya). Server harus memeriksa ulang agar data yang salah atau berbahaya tidak diproses.
6. **Fungsi `htmlspecialchars()`.** Mengubah karakter khusus HTML (`<`, `>`, `&`, `"`, `'`) menjadi entitas, sehingga input tampil sebagai teks biasa dan risiko injeksi HTML/script (XSS) berkurang.
7. **Manfaat function.** Kode dapat dipakai ulang, lebih rapi, lebih mudah diuji dan dirawat, serta mengurangi duplikasi.

## 9. Kesimpulan
## 9. Kesimpulan

Dari Praktikum 7 ini saya memahami bahwa PHP adalah bahasa pemrograman server-side, yaitu kodenya dijalankan di server dan browser hanya menerima hasil akhirnya berupa HTML. Karena itu file PHP harus dijalankan lewat web server lokal seperti XAMPP atau Laragon, bukan dibuka langsung dengan klik ganda.

Pada latihan dasar, saya belajar menulis variabel dengan awalan `$`, menggunakan operator, percabangan `if-elseif-else`, perulangan `foreach` pada array, serta membuat function agar kode bisa dipakai ulang dan lebih rapi.

Pada pemrosesan form, saya mempelajari perbedaan metode GET dan POST. GET mengirim data lewat URL sehingga terlihat di address bar dan tidak cocok untuk data sensitif, sedangkan POST mengirim data lewat body request dan lazim dipakai untuk pengiriman form. Namun POST bukan enkripsi, sehingga tetap perlu HTTPS.

Hal terpenting yang saya pelajari adalah bahwa input pengguna tidak boleh langsung dipercaya. Validasi di browser (seperti atribut `required`) mudah dilewati, sehingga validasi di sisi server tetap wajib. Saya menerapkannya dengan `isset()` dan operator `??` untuk memeriksa keberadaan data, `trim()` untuk membuang spasi, `is_numeric()` dan `ctype_digit()` untuk memeriksa angka, serta `filter_var()` untuk memeriksa format email. Saat menampilkan kembali data pengguna, saya memakai `htmlspecialchars()` agar tag HTML atau script tampil sebagai teks biasa dan tidak dijalankan (mencegah XSS).

Melalui mini project Formulir Data Mahasiswa, saya berhasil menggabungkan semua konsep tersebut menjadi aplikasi sederhana yang menerima data, memvalidasinya, menampilkan seluruh pesan kesalahan, dan menampilkan ringkasan data jika input valid. Memisahkan bagian pemrosesan dari bagian tampilan membuat kode lebih mudah dibaca dan dikembangkan.

Kendala yang saya temui: (isi dengan pengalaman Anda sendiri, misalnya server Apache belum menyala, salah menaruh folder di htdocs, atau lupa tanda titik koma). Kendala tersebut saya atasi dengan (isi solusi Anda).

Ke depan, pengetahuan ini bisa menjadi dasar untuk mempelajari penyimpanan data ke database, session, dan pengembangan aplikasi web yang lebih lengkap.
