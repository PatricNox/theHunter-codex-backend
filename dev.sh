#!/bin/bash

if [[ "$OSTYPE" == "linux-gnu"* ]]; then
  USER="1000"
elif [[ "$OSTYPE" == "darwin"* ]]; then
  USER="33"
else
  USER="33"
fi

composer() {
    docker-compose exec --user $USER app composer "$@"
}

artisan() {
    docker-compose exec --user $USER app php artisan "$@"
}

bash() {
  docker-compose exec --user $USER app bash
}

root() {
  docker-compose exec --user root app bash
}

phpcs() {
    docker-compose exec --user $USER app ./vendor/bin/phpcs
}

phpcbf() {
    docker-compose exec --user $USER app ./vendor/bin/phpcbf &&
    docker-compose exec --user $USER app ./vendor/bin/phpcs
}

resetdb() {
  docker-compose exec --user $USER app php artisan migrate:fresh --seed
}

"$@"
