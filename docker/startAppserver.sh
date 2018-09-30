#!/usr/bin/env bash

printf "Killing any appservers already running.\n"
docker kill appserver

parentdir=$(dirname "$PWD")
echo $parentdir

printf "Building app server image.\n"
docker build --rm -t local/tsowebapp .
printf "Running app server image.\n"
docker run -d --rm --privileged -p 80:80 -p 443:443 -p 9000 --name appserver -v $parentdir:/var/www/html/app local/tsowebapp
printf "Loading database extract.\n"
printf "Running migrations with seeders.\n"
#docker exec appserver bash -c 'cd /var/www/html/app; exec composer update'
docker exec appserver bash -c 'cd /var/www/html/app; exec php artisan migrate'
#docker exec appserver bash -c 'cd /var/www/html/app; exec php artisan update:students'
#docker exec appserver bash -c 'cd /var/www/html/app; exec php artisan banner:people'
