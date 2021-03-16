setup:
	composer install
	cp -n .env.example .env || true
	php artisan key:gen --ansi
	touch database/database.sqlite
	php artisan migrate --seed
test:
	php artisan test
build:
	npm install
	npm run watch
start:
	php artisan serve --host localhost
