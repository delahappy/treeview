#!/bin/bash

# start shibboleth
service shibd restart

# start apache
service apache2 restart
chown -R www-data /var/www/html

cd /var/www/html
# php artisan migrate --seed


# Need this here to keep the docker container running
/bin/bash
tail -f /dev/null