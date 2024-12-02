setup:
	@make docker-up-build
	@make composer-install
	@make set-permissions
	@make setup-env
	@make generate-key
	@make migrate-fresh-seed
	@make storage-link

docker-up-build:
	docker compose up -d --build

docker-up:
	docker compose up -d

docker-stop:
	docker compose stop

composer-install:
	docker exec url-shortener bash -c "composer install"

composer-update:
	docker exec url-shortener bash -c "composer update"

set-permissions:
	docker exec url-shortener bash -c "chmod -R 777 /var/www/storage"
	docker exec url-shortener bash -c "chmod -R 777 /var/www/bootstrap"

setup-env:
	docker exec url-shortener bash -c "cp .env-docker.example .env"

generate-key:
	docker exec url-shortener bash -c "php artisan key:generate"

migrate-fresh-seed:
	docker exec url-shortener bash -c "php artisan migrate:fresh --seed"

migrate:
	docker exec url-shortener bash -c "php artisan migrate"

storage-link:
	docker exec url-shortener bash -c "php artisan storage:link"
