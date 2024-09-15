To install this project:
1) download zip and extract it
2) open that folder in code editor, for instance, VS Code
3) run XAMPP servers (MySQL Database and Apache Web Server)
4) in "http://localhost/phpmyadmin/" create database with name "socialpublishingplatform"
5) from terminal in project folder run commands "npm install" and "composer install"
6) then run commands "php artisan migrate" and "php artisan db:seed"
7) from one terminal run command "npm run dev"
8) from another terminal run command "php artisan serve"
9) open webpage, for instance, "http://127.0.0.1:8000/users/signin" (ports may be different)
10) You can sign in using one of emails from UserSeeder, for instance, "user1@example.com", and password "password" or you can create a new account.
11) When you are signed in, you can read your and other users' posts, create, edit and delete your own posts, write and delete your own comments. Also you can filter and search posts
