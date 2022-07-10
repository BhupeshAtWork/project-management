# Installation steps
1. Create .env file and copy contents from .env.example
2. Enter required database details (like database, user, password etc) in above file.
3. Run `composer install`
4. Run `php artisan key:generate`
5. Run `php artisan migrate:fresh --seed`
6. Run `npm run dev/build`
