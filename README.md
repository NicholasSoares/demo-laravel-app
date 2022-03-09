<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this project

This project is a simple demo to showcase some nice Laravel tricks, patterns and packages.

Packages used:
- Fortfy, for fast authentication setup
- Laravel Ui, for fast basic Auth Ui setup
- Laravel-data for DTO, built by spatie

Patterns used:
- Actions, for better code reusability, and better responsibility isolation, and also opening doors for packages that take advantage from it, like laravel-queueable-action from spatie.
- DTO, that uses Laravel-data package for better handdling of external incoming data, including its validation and formatting, avoiding unwanted dependencies, and avoiding code pollution and future challenges during unit testing as an example.

Functionalities build in:
- User Account crud.
- User API interface with pagination included.
- API rest login and logout using sanctun, including an public auth api gateway for login.

## Running the project

This project have the following requirements:

- PHP 8.x
- Docker and Docker Compose (required if need to use the build in database configuration with Redis and MySQL)
- Composer


