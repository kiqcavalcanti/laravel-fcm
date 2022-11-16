#!/bin/sh

cd .docker

docker compose down
docker compose up -d --build
docker compose run composer install

cd ..

if [ ! -f ".env" ]
  then
    cp .env.example .env && docker compose -f ../docker/docker-compose.yml run artisan key:generate
fi

echo "FIM"
