# Aplikasi Spp Sekolah

## persyaratan 
- Aplikasi ini dibangun menggunakan laravel versi 10. 
- sehingga versi php diharuskan berada di versi 8.1 ke atas sesuai dengan dokumentasi resmi milik laravel   (disarankan versi 8.2)
- Aplikasi ini dibangun menggunakan laragon sebagai dbms dan mysql sebagai database nya

## menjalankan aplikasi
Buka terminal cmd atau sebagainya dan jalankan perintah berikut 

```
    php artisan optimize:clear
    php artisan optimize
```

pastikan seluruh package atau liblary pihak ketiga sudah terpasang. Jika belum maka jalankan perintah berikut (disarankan untuk dijalankan)
```
    composer install
```

lalu jalankan perintah
```
    php artisan serve
```
pada terminal anda untuk menjalankan server dari apache sehingga aplikasi bisa diakses di local yang sudah tertera di terminal

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.