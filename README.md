<p align="center">
    <h1 align="center">Aplikasi Mesin kasir menggunakan Laravel</h1>
</p>


## Instalasi

### Clone repository dari github.

    git clone https://github.com/mattrahendra/POSql.git [NamaDirektoriFile]


### Install dependencies

Laravel Menggunakan [Composer](https://getcomposer.org/) untuk mengelola dependensi. Jadi, sebelum menggunakan Laravel, pastikan Anda telah menginstal Composer.

    cd NamaDirektoriFile
    composer install

### Config

Ubah atau Salin file `.env.example` ke `.env` 
1.`php artisan key:generate` untuk generate:key
2.Set database yang dituju pada file `.env` 

### Database

1. Migrate tabel database `php artisan migrate` atau bisa menggunakan database yang telah disediakan.
1. `php artisan db:seed`, Ini akan menginisialisasi pengaturan dan membuat pengguna admin untuk Anda. [email: admin@gmail.com - password: admin123]

### Install Node Dependencies

1. `npm install` untuk menginstall dependensi node
1. `npm run dev` untuk development atau `npm run build` untuk production

### Buat storage link (Symbolic links)

`php artisan storage:link`

### Run Server

1. `php artisan serve`
1. buka `localhost` dibrowser. Email admin : `admin@gmail.com`, Password: `admin123`.
