# Bureau Profiel
## Setup

#### First time Setup
```bash
# Clone the repository to your device.
git clone https://github.com/teunvanderploeg/BureauProfiel.git

# Install composer packages with
composer install

# Install the NPM packages with
npm install

# Build files with npm
npm run dev

# Copy the .env.example and change the copied file name to .env
cp .env.example .env

# Generate an app key (dont use on production or staging)
php artisan key:generate

# ! When you are done with setting up the environment in the .env file proceed

# Migrate and seed the tables and data to your database
php artisan migrate --seed
```
### Setup Environment

##### Database
Add the right database credentials in the ```.env``` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bureauprofiel
DB_USERNAME=root
DB_PASSWORD=
```

## Deployment
```bash
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

php artisan migrate --force
php artisan optimize:clear
php artisan db:seed

npm ci && npm run prod
```
