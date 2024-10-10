# Laravel-Composer-Template

## Startup
1. Docker Composeの起動
~~~sh
$ docker compose up -d
~~~

2. composerのインストール
~~~sh
$ docker compose exec web /usr/bin/composer install
~~~

3. laravelのセットアップ
~~~sh
$ docker compose exec web cp -rip .env.example .env
$ docker compose exec web php artisan key:generate
~~~



# Todo List Vite版

API（PHP）
http://localhost/login

Front（Vite）
http://localhost:5173

* Model
~~~sh
$ docker compose exec web php artisan make:model User --migration
$ docker compose exec web php artisan make:model Todo --migration
~~~

* View
~~~sh
$ docker compose exec web php artisan make:view login
$ docker compose exec web php artisan make:view top
~~~

* Controller
~~~sh
$ docker compose exec web php artisan make:controller LoginController
$ docker compose exec web php artisan make:controller TopController
$ docker compose exec web php artisan make:controller ToDoController --api
~~~

* Table
~~~sh
$ docker compose exec web php artisan make:migration create_users

$ docker compose exec web php artisan migrate
$ docker compose exec web php artisan migrate:status
$ docker compose exec web php artisan migrate:rollback
~~~

* Seeder
~~~sh
$ docker compose exec web php artisan make:seed UserSeeder
$ docker compose exec web php artisan db:seed --class UserSeeder
~~~

* Migration
~~~sh
$ docker compose exec web php artisan migrate
$ docker compose exec web php artisan migrate:status
$ docker compose exec web php artisan migrate:rollback
~~~

* Request
~~~sh
$ docker compose exec web php artisan make:request リクエストクラス名
~~~

* Policy
~~~sh
$ docker compose exec web php artisan make:policy TodoPolicy
~~~