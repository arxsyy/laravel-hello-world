# LAPORAN PRAKTIKUM
## Pemrograman Web Lanjut

Marsyalia Fernanda  
244107020133  
TI-2F

## JOBSHEET 5


### 1. Topik: Instalasi dan Setup Filament PHP v4 pada Laravel 11

---

## E. Analisis & Diskusi

### 1. Apa kelebihan Filament dibanding membuat admin panel manual?

Filament menyediakan komponen UI yang sudah jadi seperti tabel, form, widget, dan navigasi sidebar sehingga developer tidak perlu membangun semuanya dari nol. Proses pembuatan admin panel yang biasanya memakan waktu berhari-hari bisa diselesaikan dalam hitungan menit. Selain itu tampilan yang dihasilkan sudah responsif dan konsisten tanpa perlu menulis CSS secara manual.

### 2. Mengapa Filament menggunakan Livewire?

Livewire memungkinkan halaman admin bersifat interaktif secara real-time, seperti pencarian langsung, filter tabel, dan pagination, tanpa harus menulis JavaScript. Semua komunikasi antara browser dan server ditangani otomatis oleh Livewire, sehingga developer cukup fokus menulis logika di sisi PHP saja.

### 3. Apa perbedaan SQLite dan MySQL dalam development?

SQLite tidak memerlukan instalasi server terpisah karena database disimpan dalam satu file `.sqlite`, sehingga cocok untuk pengembangan awal yang cepat. MySQL membutuhkan server database tersendiri seperti XAMPP, namun lebih handal untuk aplikasi production karena mendukung banyak koneksi secara bersamaan dan pengelolaan data yang lebih kompleks.

### 4. Apa fungsi Panel Builder?

Panel Builder adalah fitur Filament yang secara otomatis membuat kerangka admin panel lengkap hanya dengan satu perintah `php artisan filament:install --panels`. Fitur ini menghasilkan routing, layout, sistem autentikasi, dan navigasi sidebar secara otomatis sehingga admin panel langsung bisa digunakan tanpa konfigurasi tambahan.

---

## F. Tugas Praktikum

### Screenshot Halaman Login


> _![Laravel](ssf/login.png)_
---

### Screenshot Dashboard

> _![Laravel](ssf/aflogin.png)_

---

### Screenshot Data 2 User di Database

> _![Laravel](ssf/db.png)_

---

## Kendala dan Solusi

| No | Kendala | Solusi |
|---|---|---|
| 1 | Ekstensi `ext-intl` dan `ext-zip` belum aktif sehingga Filament gagal diinstall | Mengaktifkan kedua ekstensi tersebut di file `php.ini` XAMPP lalu restart Apache |
| 2 | Error `Unknown collation: utf8mb4_0900_ai_ci` saat membuka halaman admin | Menambahkan `DB_COLLATION=utf8mb4_unicode_ci` di file `.env` karena versi MySQL XAMPP tidak mendukung collation tersebut |
| 3 | Laravel yang terinstall versi 13 sehingga konflik dengan Filament v4 | Menggunakan perintah `composer create-project laravel/laravel:"^11.0"` untuk memaksa instalasi Laravel versi 11 |
