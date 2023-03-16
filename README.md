## Setup
- composer install
- npm install
- configure .env file (databse connection and app detail)
- php artisan migrate:fresh --seed
    ### optional:
        - php artisan migrate
        - php artisan db:seed
- to access uploaded files in the system :
    - php artisan storage:link
