# Lab7Web_PHP — Praktikum 7: Pemrograman Server-Side dengan PHP

**Mata Kuliah:** Pemrograman Web
**Nama:** (isi nama)
**NIM:** (isi NIM)
**Kelas:** (isi kelas)

## Tujuan Praktikum
- Memahami perbedaan pemrosesan client-side dan server-side.
- Mengenali sintaks PHP dan menjalankannya melalui server lokal.
- Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.
- Memproses data form HTML dengan metode GET dan POST.
- Melakukan validasi dan sanitasi input dasar.
- Membangun aplikasi sederhana penerima dan penampil data pengguna.

## Perangkat
Laptop/PC, web browser, Visual Studio Code, PHP, dan XAMPP/Laragon (isi sesuai yang Anda pakai, lengkap dengan versinya).

## Cara Menjalankan Server Lokal
1. Instal dan jalankan XAMPP/Laragon, lalu start **Apache**.
2. Salin folder `Lab7Web_PHP` ke `C:\xampp\htdocs\` (XAMPP) atau `C:\laragon\www\` (Laragon).
3. Buka `http://localhost/Lab7Web_PHP/` di browser. Jangan membuka file PHP dengan klik ganda.

## Struktur File
```
Lab7Web_PHP/
├── index.php           # daftar menu
├── latihan1.php        # Menjalankan PHP
├── latihan2.php        # Variabel, operator, percabangan
├── latihan3.php        # Perulangan dan array
├── latihan4.php        # Function
├── latihan5.php        # Form GET
├── latihan6.php        # Form POST
├── latihan7.php        # Pengolahan data sederhana
├── mini_project.php    # Formulir Data Mahasiswa
├── eksperimen.php      # Eksperimen mandiri
├── screenshots/        # screenshot hasil
└── README.md
```

## Hasil Latihan

### Latihan 1 — Menjalankan PHP
Mengakses `http://localhost/Lab7Web_PHP/latihan1.php`. Kode PHP tidak tampil sebagai teks, yang tampil hanya hasil `echo` beserta waktu server.

![Latihan 1](screenshots/latihan1.png)

### Latihan 2 — Variabel, Operator, Percabangan
Nilai akhir = (85 × 0,30) + (78 × 0,30) + (90 × 0,40) = 84,90, sehingga predikat **B**.

Output yang diharapkan: `Nama: Siti`, `Nilai akhir: 84.90`, `Predikat: B`.

![Latihan 2](screenshots/latihan2.png)

### Latihan 3 — Perulangan dan Array
Daftar 7 mahasiswa (4 dari modul + 3 tambahan) ditampilkan dengan `foreach` dalam daftar bernomor.

![Latihan 3](screenshots/latihan3.png)

### Latihan 4 — Function
Output yang diharapkan:
- Harga setelah diskon: Rp135.000
- Luas persegi panjang (8 x 4): 32
- Nilai 75: Lulus
- Nilai 60: Tidak Lulus

![Latihan 4](screenshots/latihan4.png)

### Latihan 5 — Form GET
Setelah form dikirim, URL berubah menjadi `latihan5.php?kata=...`, sehingga data terlihat di address bar.

![Latihan 5](screenshots/latihan5.png)

### Latihan 6 — Form POST
Diuji dengan data lengkap, input kosong, serta karakter khusus seperti `"` dan `<b>tebal</b>`. Karena memakai `htmlspecialchars()`, tag tampil sebagai teks dan tidak dieksekusi.

![Latihan 6 - data lengkap](screenshots/latihan6_valid.png)
![Latihan 6 - karakter khusus](screenshots/latihan6_html.png)

### Latihan 7 — Pengolahan Data Sederhana
Contoh: barang `Pulpen`, harga `2500.50`, jumlah `3` → Subtotal Rp7.502 (hasil 7501,5 dibulatkan `number_format`).
Kasus tidak valid (jumlah 0, negatif, atau bukan angka) menampilkan pesan "Periksa kembali nama barang, harga, dan jumlah."

> Catatan: atribut `min`/`step` di HTML bisa mencegah submit di browser. Untuk menguji validasi PHP, matikan validasi browser sementara lewat DevTools (hapus atribut `min`/`required`) atau tambahkan `novalidate` pada `<form>`.

![Latihan 7 - valid](screenshots/latihan7_valid.png)
![Latihan 7 - tidak valid](screenshots/latihan7_invalid.png)

## Mini Project — Formulir Data Mahasiswa
Form berisi nama, NIM, program studi, semester, dan email, dikirim dengan POST. Validasi server-side:
- semua kolom wajib diisi,
- NIM hanya angka dengan panjang 8–12 digit,
- email divalidasi dengan `filter_var(..., FILTER_VALIDATE_EMAIL)`,
- semester bilangan bulat 1–14.

Pemrosesan data dipisah di bagian atas file, sedangkan tampilan HTML ada di bagian bawah. Data ditampilkan kembali dengan `htmlspecialchars()`.

### Dua kasus input valid
| Kasus | Input | Hasil |
|---|---|---|
| Valid 1 | Nama: Rina Putri, NIM: 2024010001, Prodi: Teknik Informatika, Semester: 3, Email: rina@mail.com | Ringkasan data ditampilkan |
| Valid 2 | Nama: Budi Santoso, NIM: 2023020055, Prodi: Sistem Informasi, Semester: 14, Email: budi.s@kampus.ac.id | Ringkasan data ditampilkan |

![Mini project valid](screenshots/mini_valid.png)

### Dua kasus input tidak valid
| Kasus | Input | Hasil |
|---|---|---|
| Tidak valid 1 | Semua kolom kosong | Pesan error untuk nama, NIM, prodi, email, dan semester |
| Tidak valid 2 | NIM: `12AB`, Semester: `20`, Email: `rina@` | Error NIM, email, dan semester |

![Mini project tidak valid](screenshots/mini_invalid.png)

## Eksperimen Mandiri (`eksperimen.php`)
1. Rata-rata tiga nilai (80, 75, 90) = 81,67.
2. Pencarian nama dari array memakai GET (`?cari=...`, tanpa membedakan huruf besar/kecil).
3. Function `formatRupiah()` → `Rp1.500.000`.
4. Validasi NIM: hanya angka dan tepat 10 digit.
5. Tombol reset: `type="reset"` hanya mengosongkan isian di browser, tanpa request ke server. Tombol submit mengirim data ke server dan halaman diproses ulang oleh PHP.

![Eksperimen](screenshots/eksperimen.png)

## Jawaban Pertanyaan Evaluasi
1. **Client-side vs server-side:** client-side dijalankan di browser pengguna (HTML, CSS, JavaScript), sedangkan server-side dijalankan di server (PHP), lalu hanya hasilnya yang dikirim ke browser.
2. **Mengapa PHP harus lewat web server:** browser tidak bisa menjalankan PHP. Web server (Apache/Nginx) meneruskan file `.php` ke interpreter PHP dan mengirim hasil HTML-nya ke browser. Jika dibuka dengan klik ganda, kodenya tidak dieksekusi.
3. **Fungsi tanda `$`:** penanda bahwa sebuah nama adalah variabel.
4. **GET vs POST:** GET mengirim data lewat URL (terlihat, terbatas panjangnya, cocok untuk pencarian), POST mengirim data lewat body request (tidak tampil di URL, cocok untuk form). POST bukan enkripsi, tetap gunakan HTTPS.
5. **Validasi sisi server:** validasi di browser mudah dilewati (DevTools, curl, dsb.), jadi server harus memeriksa ulang agar data tidak salah atau berbahaya.
6. **Fungsi `htmlspecialchars()`:** mengubah karakter khusus HTML (`<`, `>`, `&`, `"`, `'`) menjadi entitas sehingga input tampil sebagai teks biasa dan mencegah XSS.
7. **Manfaat function:** kode bisa dipakai ulang, lebih rapi, lebih mudah diuji dan dirawat, serta mengurangi duplikasi.

## Kesimpulan
(Tulis kesimpulan Anda sendiri, misalnya apa yang dipelajari dan kendala yang dihadapi.)
