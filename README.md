# WalletApp Installation Guide
This guide provides step-by-step instructions to set up the "WalletApp" Laravel application, using Laravel version 9.19 and PHP version 8.0.2.

Prerequisites
Before you begin, ensure you have the following:

Laravel version 9.19
PHP version 8.0.2
Composer (for package management)

#Installation Steps

Clone the project repository:
git clone https://github.com/ahimendradangi130392/WalletApp.git
cd WalletApp

# Install dependencies using Composer:
composer install

# Run migrations to create the database tables:
php artisan migrate

# Seed the database with fake user data:

php artisan db:seed --class=UsersTableSeeder

# Run the project 

php artisan serve

# API Testing
To test the API endpoints, you can use the provided Postman collection. Follow these steps:

Open Postman.

Import the collection using the following URL:

https://api.postman.com/collections/18064902-eac6ceee-0cf8-4880-9152-1e52565cfd8d?access_key=PMAT-01H81Z0DE4SXPKP4BPW6NPE3KE

Once imported, you'll have access to the available API requests for testing.

#Additional Assistance
If you encounter any issues during the installation or have further questions, please feel free to reach out for assistance

NOTE: - I Pushed the passport key
