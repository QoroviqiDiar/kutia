# kutia

CMS Kutia 

## Installation
1. Unzip the file
2. Run `composer install`.
3. Run `npm install`.
4. Copy & setup `.env` file.
5. Create database & Change `DB_DATABASE` in `.env`.
6. Migrate the Database `php artisan migrate`.
7. Run `php artisan key:generate`
8. Run `php artisan db:seed` (This will generate super-admin & basic settings [required]).
9. Run `php artisan storage:link`
10. Visit URL in the browser

##### Default Login Credential for admin
| Username           | Password |
|--------------------|----------|
| admin@admin.com    | 123456   |

##### Default Login Credential for author
| Username           | Password |
|--------------------|----------|
| diar@diar.com      | 123456   |
