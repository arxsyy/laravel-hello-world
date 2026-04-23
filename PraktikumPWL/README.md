# LAPORAN PRAKTIKUM
## Pemrograman Web Lanjut

Marsyalia Fernanda  
244107020133  
TI-2F

## JOBSHEET 5.1


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

## JOBSHEET 5.2
### Topik: Membuat CRUD Resource dengan Filament v4
 
---

### Membuat Resource User
![prak](ssf/langkah2.png)

### Menjalankan Aplikasi
![prak](ssf/user.png)

### Membuat Form User
![prak](ssf/form.png)

### Cek DB hasil create user
![prak](ssf/dbcreate.png)

### Menampilkan Data User
![prak](ssf/usertampil.png)

### Mengubah icon
![prak](ssf/icon.png)
 
## I. Analisis & Diskusi
 
### 1. Mengapa Filament dapat membuat CRUD tanpa banyak coding?
 
Filament menggunakan konsep Resource yang secara otomatis menghasilkan halaman List, Create, dan Edit hanya dari satu perintah `php artisan make:filament-resource`. Filament sudah menyediakan Form Builder dan Table Builder yang tinggal dikonfigurasi, sehingga developer tidak perlu menulis logika CRUD dari nol maupun membuat tampilan secara manual.
 
### 2. Apa perbedaan Form Schema dan Table Schema?
 
Form Schema digunakan untuk mendefinisikan field input pada halaman Create dan Edit, seperti TextInput untuk nama, email, dan password. Table Schema digunakan untuk mendefinisikan kolom yang ditampilkan pada halaman List, seperti kolom name, email, dan created_at beserta fitur searchable dan sortable-nya.
 
### 3. Bagaimana jika kita ingin menambahkan validasi email unik?
 
Cukup menambahkan method `->unique(ignoreRecord: true)` pada field email di `UserForm.php`. Parameter `ignoreRecord: true` diperlukan agar validasi tidak bentrok saat mengedit data yang sudah ada, karena email yang sama milik record itu sendiri tidak dianggap duplikat.
 
### 4. Mengapa password tidak perlu kita hash manual?
 
Karena model `User` di Laravel sudah memiliki casting `'password' => 'hashed'` secara bawaan. Artinya setiap kali field password diisi dan disimpan ke database, Laravel otomatis melakukan hashing menggunakan algoritma bcrypt tanpa perlu memanggil `Hash::make()` secara manual.
 
---
 
## J. Tugas Praktikum
 
### Screenshot Halaman List Users
 
![List Users](ssf/usertampil.png)
 
### Screenshot Halaman Create User
 
![Create User](ssf/form.png)
 
### Screenshot Data User di Database
 
![Database](ssf/dbcreate.png)
 
---
 
## Kendala dan Solusi
 
| No | Kendala | Solusi |
|---|---|---|
| 1 | Error `Cannot declare class UserForm` karena ada duplikat file | Menghapus folder `app\Filament\Resources` yang lama menggunakan perintah `Remove-Item -Recurse -Force app\Filament\Resources` lalu menjalankan `composer dump-autoload` |
| 2 | Halaman `/admin` menampilkan 404 Not Found | Memastikan perintah dijalankan di dalam folder `PraktikumPWL` bukan di folder `PWL`, lalu menjalankan ulang `php artisan serve` |