# 2025/2026
Systém na digitálny obsah prístupný pre ľudí so zdravotným znevýhodnením


## PHP + Laravel + Tailwind

### Prerequisites 
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js + npm](https://nodejs.org/)
- [PostgreSQL](https://www.postgresql.org/download/)


### Installation

```bash
composer install

composer create-project laravel/laravel web

cd web

php artisan key:generate

npm install

npm install tailwindcss @tailwindcss/vite

```

### Database setup in .env

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5433
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...
```
### Start

```bash
npm run dev
php artisan serve
```
