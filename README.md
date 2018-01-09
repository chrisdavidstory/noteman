# noteman
A simple note management application (code assignment)

Also my first go at building an SPA.

#install lumen based back end

1) clone repo
2) cd noteman-api
3) composer install
4) cp .env.example .env
5) php artisan key:generate
6) touch ./database/database.sqlite
7) php artisan migrate
8) php artisan db:seed
9) php -S localhost:9000 -t public


#install Vue.js SPA
1) cd noteman-spa
2) yarn install
3) yarn run dev
4) open browser to the link given as the result of the last command

#test user details
email: test@test.com
password: $sh4rpspr1nG$
