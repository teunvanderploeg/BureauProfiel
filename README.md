# Bureau Profiel

Bureau Profiel is a Dutch website for recruiting market research participants, with an admin dashboard for managing respondents and research assignments.

Visitors can browse the website and register through a questionnaire. Staff can edit questions and validation rules, review registrations, filter respondents by their answers, copy email lists, and manage clients and assignments.

![Bureau Profiel homepage](docs/images/homepage.png)

## Stack

- Laravel 13 with PHP 8.3 or newer.
- Filament 3 and Livewire 3 for the dashboard at `/dashboard`.
- Blade, Alpine.js, Tailwind CSS 3, and Laravel Mix 6 for the frontend.
- MySQL for the application database. Tests use SQLite in memory.

The Composer lockfile targets PHP 8.3. Install the PHP extensions required by Composer, including Intl, DOM, XML, Fileinfo, ZIP, and the PDO driver for your database. Development also needs Composer 2 and Node.js 22.12 or newer with npm.

## Local setup

```bash
git clone https://github.com/teunvanderploeg/BureauProfiel.git
cd BureauProfiel
cp .env.example .env
composer install
php artisan key:generate
```

Create an empty MySQL database and set its connection details in `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bureauprofiel
DB_USERNAME=root
DB_PASSWORD=
```

For a local SQLite setup, create `database/database.sqlite`, set `DB_CONNECTION=sqlite`, and set `DB_DATABASE` to the file's absolute path.

```bash
php artisan migrate
php artisan db:seed --class=QuestionSeeder
php artisan make:filament-user
php artisan storage:link
npm ci
php artisan serve
```

Open `http://127.0.0.1:8000` for the website, `/formulier` for registration, or `/dashboard` to sign in with the admin account you created. Only staff accounts belong in the `users` table; participant registrations use the separate `respondents` table.

`npm ci` builds production assets through the post-install script. Use `npm run watch` while editing frontend files or `npm run prod` to rebuild both the website and dashboard theme.

The default `DatabaseSeeder` also creates a legacy development account with a known password. Use the explicit question seeder and interactive admin command above for a new installation. Do not run the default seeder on production.

## Tests

```bash
php artisan test
composer validate --strict
npm run prod
```

Tests use an isolated SQLite database and require PDO SQLite. They cover public registration, question visibility, dashboard access and forms, respondent search, and API token expiry.

## Upgrading an existing installation

This project was upgraded from Laravel 9 and Filament 2. Update the server to PHP 8.3 or newer before deploying. The dashboard configuration is now in `app/Providers/Filament/AdminPanelProvider.php`; its default URL is still `/dashboard`. `FILAMENT_PATH` and `FILAMENT_DOMAIN` remain available, and the upload disk setting is now `FILAMENT_FILESYSTEM_DISK`.

Back up the database and uploaded files, install the locked dependencies, rebuild assets, and run migrations. The new migration adds a nullable token-expiry column required by Sanctum 4. Existing application tables and respondent data remain in place. Do not reseed an existing database.

```bash
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
npm ci
php artisan migrate --force
php artisan optimize:clear
php artisan config:cache
php artisan view:cache
```

Composer publishes Filament's assets automatically. Point the web server at `public/`, set `APP_ENV=production` and `APP_DEBUG=false`, and keep the existing `APP_KEY`. Ensure `storage/` and `bootstrap/cache/` are writable and the public storage link exists. Restart long-running PHP or queue processes after deployment.

The frontend still uses the existing Mix toolchain. Its npm audit findings need a separate dependency review; upgrading Laravel does not resolve them.

## Screenshot

The screenshot shows the public homepage running locally. It contains no respondent records or imported database data.
