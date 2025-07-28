This Laravel application allows users to:

- Create, Read, Update, Delete (CRUD) contacts
- Bulk import contacts using an XML file


## Features

- PHP 8.x
- Laravel 12.x
- MySQL
- Blade templating
- XML file upload

git clone https://github.com/alpeshkothari123/contact-crud.git
cd contact-crud
composer install
cp .env.example .env
php artisan key:generate


php artisan migrate
php artisan serve
