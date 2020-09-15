1. `composer install`
2. `cp .env.example .env`
3. Create database end edit `.env` for updated db connection
4. `php artisan key:generate`
5. `php artisan migrate --seed`
6. `php artisan module:seed'
7. Setup cron job to run schedule
    - `* * * * * cd /<PROJECT> && php artisan schedule:run >> /dev/null 2>&1`
8. php artisan vendor:publish --provider="=Modules\Image\Providers\ImageServiceProvider"
