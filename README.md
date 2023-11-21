Laravel Framework - 10
php     - 8.1 
Mysql

after clone the project please add "composer update" command in terminal (for vendor folder install packages)

<!-- ============================================================= -->
step1 : 
    run php artisan migrate     ||  php artisan migrate:fresh
    then php artisan module:migrate Admin 
step2:
    a)run  php artisan db:seed       (for dummy data)
    b)run  php artisan module:seed Admin     (for dummy admin and books data)
step3:

    then run php artisan serve to run the project


<!-- ==================================================== -->

for admin panel hit url in browser 127.0.0.1:8000/admin/login

uname - admin@gmail.com
pass - 123456

(for login credentials)