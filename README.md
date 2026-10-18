
# Aplikasi CRUD Mahasiswa dengan PHP Native MVC

## Deskripsi
Aplikasi CRUD Mahasiswa merupakan aplikasi web sederhana yang dibangun menggunakan PHP Native, MySQL, PDO, dan pola arsitektur Model-View-Controller (MVC).

Aplikasi ini digunakan untuk mengelola data mahasiswa melalui fitur Create, Read, Update, dan Delete.

## Teknologi
- PHP Native
- MySQL
- PDO (PHP Data Objects)
- HTML dan CSS
- Git

## Persyaratan
- XAMPP atau web server sejenis
- PHP dengan ekstensi PDO MySQL
- MySQL atau MariaDB
- Git

## Instalasi
1. Simpan proyek pada folder web server, misalnya `C:\xampp\htdocs\mvc-native`.
2. Jalankan Apache dan MySQL melalui XAMPP.
3. Impor file `database/kampus.sql` melalui phpMyAdmin.
4. Sesuaikan konfigurasi koneksi database pada `config/database.php`.
5. Buka aplikasi melalui alamat berikut:

   `http://localhost/mvc-native/public/index.php`

## Struktur Proyek
- `app/models/`: pengolahan data dan query database.
- `app/controllers/`: pengaturan alur permintaan pengguna.
- `app/views/`: tampilan aplikasi.
- `config/`: konfigurasi koneksi database.
- `database/`: skema dan data awal database.
- `public/`: entry point dan routing aplikasi.

## Fitur
- Menampilkan daftar mahasiswa.
- Menambahkan data mahasiswa.
- Mengubah data mahasiswa.
- Menghapus data mahasiswa.

## Penggunaan Git
Untuk melihat riwayat pengembangan proyek, jalankan:

`git log --oneline --graph --decorate`

## Pengujian Sintaks
Pemeriksaan sintaks PHP dapat dilakukan menggunakan perintah:

`php -l app/models/Mahasiswa.php`

Ganti lokasi file sesuai komponen yang ingin diperiksa.
