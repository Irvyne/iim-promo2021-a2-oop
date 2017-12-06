# OOP

## Configure Project

Copy file `parameters.php.dist` to `parameters.php` and change value accordingly to your environment.

## Install dependencies

```bash
composer install
```

## Use Doctrine

* Linux / Mac

```bash
php vendor/bin/doctrine
```

* Windaube

```bash
vendor\bin\doctrine
```

## Create Database

```bash
mysql -uroot -p -e "CREATE DATABASE IF NOT EXISTS iim_promo2021_oop;"
```