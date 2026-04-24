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

## JOBSHEET 5.3
### Topik: Membuat Migration, Model, Relasi & Resource Category
 
---
 
### Hasil langkah 1
![prak](ssf/p3l1.png)

### Hasil langkah 2
![prak](ssf/p3l2.png)

### Hasil langkah 4
![prak](ssf/p3l4.png)

### Hasil langkah 5
![prak](ssf/p3l5.png)

### Membuat Resource Category
![prak](ssf/resource.png)

### Tampilan Create Category
![prak](ssf/createcat.png)

### Tampilan List Category
![prak](ssf/laraveltampil.png)

## J. Analisis & Diskusi
 
### 1. Mengapa kita perlu $fillable?
 
`$fillable` berfungsi untuk menentukan kolom mana saja yang boleh diisi secara mass assignment, yaitu ketika data dikirim sekaligus dalam bentuk array seperti yang dilakukan Filament saat menyimpan form. Tanpa `$fillable`, Laravel akan menolak penyimpanan data dan melempar `MassAssignmentException` sebagai perlindungan dari serangan injeksi data.
 
### 2. Apa fungsi $casts pada Laravel?
 
`$casts` digunakan untuk mengonversi tipe data kolom database secara otomatis saat dibaca maupun disimpan. Misalnya kolom `tags` bertipe JSON di database akan otomatis dikonversi menjadi array PHP, kolom `published` dikonversi menjadi `true`/`false`, dan kolom `published_at` dikonversi menjadi objek Carbon sehingga bisa diformat dan dimanipulasi tanpa perlu konversi manual.
 
### 3. Apa perbedaan integer biasa dengan foreign key?
 
Integer biasa hanya menyimpan angka tanpa hubungan apapun dengan tabel lain. Foreign key adalah integer yang secara eksplisit mereferensi kolom `id` di tabel lain, sehingga database bisa memvalidasi bahwa nilai yang dimasukkan benar-benar ada di tabel tujuan. Foreign key juga memungkinkan pengaturan perilaku saat data induk dihapus, seperti `cascade` atau `restrict`.
 
### 4. Bagaimana jika category dihapus tetapi masih ada post?
 
Jika tidak ada foreign key constraint, data post akan tetap ada dengan `category_id` yang sudah tidak valid (orphan record). Jika menggunakan foreign key dengan `onDelete('restrict')`, penghapusan category akan gagal selama masih ada post yang mereferensikannya. Jika menggunakan `onDelete('cascade')`, semua post yang berelasi akan ikut terhapus secara otomatis.
 
---
 
## K. Tugas Praktikum
 
### Screenshot Struktur Tabel di Database
 
![DB Categories](ssf/tabeldb.png)

 
### Screenshot Form Category (dengan validasi slug unik)
 
> _![Form Category](ssf/tp2.png)_
 
### Screenshot List Category (minimal 3 kategori)
 
> _![List Category](ssf/tp1.png)_
 
---
 
## Kendala dan Solusi
 
| No | Kendala | Solusi |
|---|---|---|
| 1 | Error `Target class [App\Models\Category] does not exist` saat menjalankan relasi | Memastikan namespace model sudah benar dan menjalankan `composer dump-autoload` |
| 2 | Validasi `->unique()` pada slug tetap lolos duplikat saat edit | Menambahkan parameter `ignoreRecord: true` agar validasi mengabaikan record yang sedang diedit |
| 3 | Foreign key gagal ditambahkan karena tabel `posts` sudah dibuat tanpa constraint | Membuat migration baru dengan `php artisan make:migration add_foreign_key_to_posts_table` dan menambahkan `$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')` |

## JOBSHEET 6.1
### Topik: Implementasi Form Elements & Resource Post di Filament
 
---
 
### Membuat Resource Post
![prak](ssf/6l1.png)
 
### Tampilan Form Create Post (semua elemen)
![prak](ssf/6l2.png)
 
### Tampilan Create Post
![prak](ssf/createpost.png)
 
### Select dari tabel category
![prak](ssf/select.png)

### Color Picker
![prak](ssf/color.png)
 
### Markdown
![prak](ssf/markdown.png)

### RichEditor
![prak](ssf/richeditor.png)
 
### File Upload
![prak](ssf/upload.png)
![prak](ssf/berhasil.png)

### Tags Input
![prak](ssf/tag.png)

### Checkbox
![prak](ssf/publish.png)
 
### Date Picker
![prak](ssf/date.png)

---
 
## I. Analisis & Diskusi
 
### 1. Mengapa kita perlu storage:link?
 
Laravel menyimpan file upload di folder `storage/app/public`, sedangkan web server hanya bisa mengakses folder `public`. Perintah `php artisan storage:link` membuat symbolic link dari `public/storage` ke `storage/app/public`, sehingga gambar yang diupload bisa diakses melalui URL browser tanpa perlu memindahkan file secara manual.
 
### 2. Apa fungsi $casts untuk field JSON?
 
Field bertipe JSON di database disimpan sebagai string teks. Dengan menambahkan `'tags' => 'array'` pada `$casts`, Laravel otomatis mengkonversi string JSON tersebut menjadi array PHP saat dibaca, dan mengkonversi array kembali menjadi JSON saat disimpan. Ini memungkinkan kita bekerja langsung dengan array di PHP tanpa perlu memanggil `json_decode()` atau `json_encode()` secara manual.
 
### 3. Mengapa kita menggunakan category.name bukan category_id?
 
`category_id` hanya menampilkan angka ID yang tidak bermakna bagi pengguna admin. Dengan menggunakan `category.name`, Filament mengakses relasi `belongsTo` yang sudah dibuat pada model Post dan menampilkan nama category yang sebenarnya. Ini memanfaatkan Eloquent eager loading sehingga data relasi diambil secara efisien sekaligus.
 
### 4. Apa perbedaan RichEditor dan MarkdownEditor?
 
RichEditor menampilkan toolbar dengan tombol format (bold, italic, list, tabel, gambar) dan hasilnya disimpan dalam format HTML, sehingga cocok untuk konten yang akan langsung dirender sebagai HTML. MarkdownEditor menggunakan sintaks Markdown dan hasilnya disimpan sebagai teks Markdown mentah, sehingga lebih ringan dan cocok jika konten perlu diproses atau diubah format di kemudian hari.
 
---
 
## J. Tugas Praktikum
 
### Screenshot Form Create Post
 
![Form Create Post](ssf/createpost.png)
 
### Screenshot Tabel Post
 
![Tabel Post](ssf/posttampil.png)
![Tabel Post](ssf/muncul.png)
![Tabel Post](ssf/tugas3.png)
 
### Screenshot Struktur Folder Storage
 
![Storage](ssf/storage.png)
 
---
 
## Kendala dan Solusi
 
| No | Kendala | Solusi |
|---|---|---|
| 1 | Gambar tidak muncul di tabel meskipun sudah diupload | Menjalankan `php artisan storage:link` dan memastikan nama field `image` di `PostForm.php` dan `PostsTable.php` sama persis |
| 2 | Select category tidak menampilkan data | Memastikan relasi `belongsTo(Category::class)` sudah ada di model Post dan menggunakan `->relationship('category', 'name')` bukan `->options()` |
| 3 | Error saat menyimpan field tags | Memastikan `'tags' => 'array'` sudah ada di `$casts` pada model Post karena field bertipe JSON |

## JOBSHEET 6.2
### Topik: Custom Layout Form dengan Section & Group di Filament
 
## I. Analisis & Diskusi
 
### 1. Mengapa layout form penting dalam aplikasi admin?
 
Layout form yang baik membantu admin membaca dan mengisi data lebih cepat karena field yang berhubungan dikelompokkan secara logis. Form yang tidak terstruktur dengan field berjejer panjang ke bawah memaksa pengguna untuk banyak scroll dan sulit menemukan field tertentu. Dengan Section dan Group, admin panel terlihat lebih profesional dan mengurangi kemungkinan kesalahan input.
 
### 2. Apa perbedaan Section dan Group?
 
Section menampilkan kotak visual dengan judul, deskripsi, dan icon yang terlihat oleh pengguna, sehingga cocok untuk mengelompokkan field yang memiliki kategori berbeda seperti "Post Details" dan "Meta Information". Group tidak memiliki tampilan visual apapun dan hanya berfungsi sebagai wadah pengatur layout, misalnya untuk mengatur beberapa Section agar tersusun dalam satu baris kolom.
 
### 3. Kapan kita menggunakan columnSpanFull()?
 
`columnSpanFull()` digunakan ketika sebuah field perlu mengambil seluruh lebar form terlepas dari berapa kolom yang sedang digunakan. Ini paling berguna untuk field seperti MarkdownEditor atau RichEditor yang membutuhkan ruang lebar agar nyaman digunakan, sementara field lain di sekitarnya tetap menggunakan layout multi-kolom.
 
### 4. Apa keuntungan sistem grid 12 kolom?
 
Sistem grid 12 kolom memungkinkan pembagian lebar yang sangat fleksibel karena angka 12 memiliki banyak faktor pembagi: 1, 2, 3, 4, 6, dan 12. Ini berarti kita bisa membuat layout 1/2, 1/3, 1/4, 2/3, dan kombinasinya tanpa angka desimal. Filament mengadopsi sistem ini dari Tailwind CSS sehingga layoutnya konsisten dengan standar web modern.
 
---
 
## J. Tugas Praktikum
 
### Screenshot Form sebelum layout
 
![Before Layout](ssf/upload.png)
 
### Screenshot Form sesudah layout (2/3 - 1/3)
 
![After Layout](ssf/layout.png)
![After Layout](ssf/layout2.png)
 
---
 
## Kendala dan Solusi
 
| No | Kendala | Solusi |
|---|---|---|
| 1 | Section tidak muncul setelah menambahkan `use` statement | Memastikan menggunakan `use Filament\Schemas\Components\Section` bukan `use Filament\Forms\Components\Section` karena Filament v4 memisahkan namespace-nya |
| 2 | Layout `columns(3)` tidak terbagi rata, Section masih memanjang ke bawah | Menambahkan `->columnSpan(2)` pada Group kiri dan `->columnSpan(1)` pada Group kanan sesuai proporsi yang diinginkan |
| 3 | Field MarkdownEditor mengacaukan layout grid | Menambahkan `->columnSpan(2)` pada MarkdownEditor agar lebarnya mengikuti lebar Section, bukan mengecil menjadi 1 kolom |
 
---