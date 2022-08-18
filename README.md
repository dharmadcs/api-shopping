<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## API Route

User :
- signup			-> POST	 ->http://127.0.0.1:8000/api/signup
- signin			-> POST	 ->http://127.0.0.1:8000/api/signin
- get profile		-> GET	 ->http://127.0.0.1:8000/api/profile
- get all user		-> GET	 ->http://127.0.0.1:8000/api/users
- signout			-> POST	 ->http://127.0.0.1:8000/api/signout


Shop :
- create data		-> POST	 ->http://127.0.0.1:8000/api/shopping 		->Body
- get all data		-> GET	 ->http://127.0.0.1:8000/api/shopping
- get data by id	-> GET	 ->http://127.0.0.1:8000/api/shopping/1
- update data		-> PUT	 ->http://127.0.0.1:8000/api/shopping/1		->Params
- delete data		-> DELETE ->http://127.0.0.1:8000/api/shopping/1

## Note
- File bisa dilihat di folder PANDUAN
- File sql saya sertakan (shoppingdb.sql) atau bisa migrate ulang dengan konfig di .env
- perintah 1 : composer install
- perintah 2 : php artisan migrate
- perintah 3 : php artisan serve
