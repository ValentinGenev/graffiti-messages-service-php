#!/bin/sh
cd app/

# provision the database
php bin/console doctrine:database:create
php bin/console --no-interaction doctrine:migrations:migrate

# start the web server
php -S 0.0.0.0:8000 /app/public/index.php