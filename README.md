<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## PHP Content Management System with Laravel

CRUD (create/read/update/delete) application.
This app is built with Laravel framework. 

## Project features
- Admin is able to login and logout;
- After login, admin can navigate through pages;
- Admin can manage projects table: add/delete/update project data;
- Admin can manage employees table: add/delete/update employee data and assign project to the employee;

## Installation & Configuration
1. Clone this git repository;
2. Run **composer install**;
3. Use AMPPS or other open-source platform;
4. Create new schema 'travel' in your database; 
5. Rename **.env example** file to **.env** and configure Database:<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br> 
DB_DATABASE=travel<br> 
DB_USERNAME=root<br>
DB_PASSWORD=mysql<br>
5. Run **php artisan migrate** to create tables.
6. To open project, run **php artisan serve** and follow the link.
7. To login add e-mail: **admin@gmail.com** password: **123456789**.
