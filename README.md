# Deprecated
This application was written for a job interview. It now has security vulnerabilities and I have no interest in keeping this updated. I'm archiving this repo so it can stay available for any future visitors. If you fork it, please update your fork to fix the known security flaws (at minimum update webpack).

# noteman
A simple note management application (code assignment)

Also my first go at building an SPA.

# install lumen based back end

1) clone repo
2) cd noteman-api
3) composer install
4) cp .env.example .env
5) php artisan key:generate
6) touch ./database/database.sqlite
7) set database variables in .env to reflect using sqlite and database location (please note DB_DATABASE MUST be full location path to sqlite file, please update accordingly)
```
DB_CONNECTION=sqlite
DB_DATABASE='path to directory containing this git repo/noteman/noteman-api/database/database.sqlite'
```
8) php artisan migrate
9) php artisan db:seed
10) php -S localhost:9000 -t public


# install Vue.js SPA
1) cd noteman-spa
2) yarn install
3) yarn run dev
4) open browser to the link given as the result of the last command

# test user details
email: test@test.com
password: $sh4rpspr1nG$
