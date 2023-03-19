install:
	npm install
	npm run dev
	composer install --ignore-platform-reqs
	composer dump-autoload
	php artisan key:generate
	php artisan optimize:clear
	php artisan migrate 
	php artisan db:seed

start:
	php artisan serve

cc:
	php artisan optimize:clear
	php artisan cache:clear
	php artisan route:clear