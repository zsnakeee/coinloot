<p align="center"><a href="https://coinloot.ziadt.dev" target="_blank"><img src="https://github.com/user-attachments/assets/0ce480c3-8c56-4b6f-a719-df0568b21b21" width="400"></a></p>

## About Coinloot

Coinloot is a CPA script that allows you to earn money by promoting offers. It is built with Laravel 8

## Features

- [x] User Authentication
- [x] Protection Against IP Change
- [x] Maximum Account Creation Limit
- [x] User Dashboard
- [x] Admin Dashboard

## Requirements

- PHP >= 8.0
- Composer
- MySQL

## Installation

1. Clone the repository

```bash 
git clone https://github.com/zsnakeee/coinloot.git
```

2. Install Composer Dependencies

```bash 
composer install 
```

3. Create a new database and copy the .env.example file to .env

```bash
cp .env.example .env
```

4. Generate a new application key and line storage

```bash
php artisan key:generate
php artisan storage:link
```

5. Update the .env file with your database credentials

```dotenv
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD
```

6. Run the migrations

```bash
php artisan migrate
```

7. If your want dummy data, run the seeder (optional)

```bash
php artisan db:seed
```

8. Start the development server

```bash
php artisan serve
```

## Overview
User Dashboard
![User Dashboard](https://github.com/user-attachments/assets/f1429cbf-f264-441e-9375-3979c1c1e1f1)
Admin Dashboard
![admin-dashboard](https://github.com/user-attachments/assets/b79482b8-d25f-4b6e-9e67-c5e4ffa53908)

## Video Overview

https://github.com/user-attachments/assets/310b90dd-4776-4382-a9b2-c160d4e3f129





