#!/bin/bash

echo "******************************************************"
echo "-> Installing API"
echo "******************************************************"
echo ""
cd api/
docker-compose up -d --build
docker container exec -it api_service_vitaminaweb_1 cp .env.example .env
docker container exec -it api_service_vitaminaweb_1 php artisan key:generate
docker container exec -it api_service_vitaminaweb_1 composer install
docker container exec -it api_service_vitaminaweb_1 php artisan migrate:fresh --seed