# Aplikasi Kuliah Kerja Nyata (KKN)

Aplikasi ini merupakan sistem manajemen untuk pendaftaran, penempatan, dan pengelolaan nilai mahasiswa dalam program Kuliah Kerja Nyata (KKN). Sistem ini dibangun menggunakan framework CodeIgniter 3 dan ditujukan khusus bagi lingkungan institusi PTKIN.

## Fitur Utama

- **Pendaftaran KKN**: Memudahkan mahasiswa untuk melakukan pendaftaran program KKN secara online.
- **Manajemen DPL (Dosen Pembimbing Lapangan)**: Pengelolaan dan penugasan DPL ke tiap kelompok mahasiswa.
- **Penempatan Kelompok**: Sistem memfasilitasi panitia dalam membagi dan menempatkan kelompok ke lokasi/desa KKN.
- **Pelaporan & Logbook**: Mahasiswa dapat mengunggah laporan harian/logbook kegiatan mereka di lokasi.
- **Penilaian**: DPL dapat memberikan penilaian kegiatan dan laporan akhir secara langsung lewat sistem.
- **Dashboard Terpusat**: Tampilan informatif bagi panitia, DPL, dan mahasiswa dengan tingkatan hak akses yang berbeda.

## Prasyarat Lingkungan (Environment)

Untuk menjalankan aplikasi ini secara maksimal di server atau lingkungan lokal, dibutuhkan prasyarat berikut:

- **PHP**: Versi 7.4 atau 8.1 (direkomendasikan)
- **Ekstensi PHP Wajib**: 
  - `mysqli` / `pdo_mysql`
  - `gd` (termasuk `freetype` dan `jpeg` untuk pemrosesan pas foto/avatar)
  - `zip`
- **Database Server**: MySQL atau MariaDB
- **Web Server**: Apache dengan modul `rewrite` (mod_rewrite) diaktifkan

## Instalasi dan Konfigurasi

1. **Unduh Repositori**
   Lakukan clone dari repositori ini ke dalam web server lokal Anda (misal `htdocs` untuk XAMPP atau `www/html`).
   ```bash
   git clone git@github.com:Forum-TIPD-PTKIN/kkn.git
   ```

2. **Konfigurasi Database**
   Buat database baru pada server MariaDB/MySQL Anda (misalnya `kkn`).
   Lalu muat/impor file SQL (database bawaan/dump file) ke dalam database tersebut.
   Ubah konfigurasi koneksi database pada file `application/config/database.php` dan sesuaikan `hostname`, `username`, `password`, dan `database`.

3. **Konfigurasi Base URL**
   Buka file `application/config/config.php` dan sesuaikan parameter `base_url` sesuai dengan URL tempat aplikasi ini dipasang (misalnya `http://localhost/kkn/`).

4. **Konfigurasi Helper & Header CORS (Jika diperlukan)**
   Jika Anda membutuhkan pengaturan *Cross-Origin Resource Sharing* (CORS) atau pengembangan klien terpisah, buka file `application/helpers/web_helper.php` dan sesuaikan daftar domain yang diperbolehkan pada variabel `$allow`.

## Struktur Hak Akses

Sistem membedakan akses pengguna menjadi beberapa peran (*roles*):
1. **Panitia / Admin Pusat** (`admin@thisapp.com`)
2. **Dosen Pembimbing Lapangan (DPL)**
3. **Mahasiswa**

Masing-masing role akan dihadapkan pada halaman dan fungsionalitas yang berbeda-beda saat login.

## Lisensi
Aplikasi dikembangkan menggunakan CodeIgniter versi 3.1.13. Ikuti lisensi resmi yang disertakan pada struktur direktori CodeIgniter.

---
*Dikembangkan oleh Forum TIPD PTKIN*
