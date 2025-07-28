This Laravel application allows users to:

- Create, Read, Update, Delete (CRUD) contacts
- Bulk import contacts using an XML file


## Features

git clone https://github.com/alpeshkothari123/contact-crud.git

cd contact-crud

composer install

cp .env.example .env

B_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=contact_db
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate

php artisan migrate
php artisan serve
