# Installation steps to follow in project root
1. Duplicate `.env.example` as `.env`
2. Enter required database details (like database, user, password etc) in above file.
3. Run `composer install`
4. Run `npm install`
5. Run `php artisan key:generate`
6. Run `php artisan migrate:fresh --seed`
8. Make storage/ directory writable by php
9. Run `npm run build`
10. Run `php artisan serve`
