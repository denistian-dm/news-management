## Installation

install dependency

```plaintext
composer install
```

---

set .env file with your local settings

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=news
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=redis
..
QUEUE_CONNECTION=redis
..
MEMCACHED_HOST=192.168.1.7

REDIS_HOST=192.168.1.7
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_CLIENT=predis
REDIS_CACHE=0
```

---

run migration

```plaintext
php artisan migrate --seed
```

This will generate admin user 

email: [admin@mail.com](mailto:admin@mail.com)

password: 12345678

---

install passport

```plaintext
php artisan passport:install
```

---

run server

```plaintext
php artisan serve
```

```plaintext
php artisan queue:work
```