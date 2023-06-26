## Setup LaravelTaskv11 in local

- clone .env.example as .env `cp .env.example .env`
- set APP_URL
- Run `composer install`
- Run `php artisan key:generate`
- set DB_DATABASE
- run migration `php artisan m:fresh --seed`
- set mail configurations
- set QUEUE_CONNECTION=database
- run `php artisan queue:work --tries`

## API Routes
- `/api/website/store` (POST request with 'name', 'url')
- `/api/subscriber/store` (POST request with 'website_id', 'name', 'email')
- `/api/post/store` (POST request with 'website_id', 'title', 'description')
