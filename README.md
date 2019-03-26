# Report Management System
It is a system that makes it easy to organize reports for searching and fast retrieval

## Features

###### Report Management:
You can categorize your reports under a specific tag and place them under a particular group. 
You can also  link your report to a set of images or audios files.

###### User Management:
You can give each user permission to (write, edit, delete, view, manage) and insert each user under any groups where the user has the authority to view only reports of the group he belongs to.

###### Supports Arabic and English.

## Setting up
1. Clone this repo.
```
git clone git@github.com:Njodsa/Report-Management-System.git
 ```
2. At the command prompt, cd into the Report-Management-System folder.
3. Install Composer:
```
composer install
 ```
4. Create a copy of your .env file.
```
cp .env.example .env
 ```
5. Generate an app encryption key.
  ```
 php artisan key:generate
  ```
6. In the .env file, add database information to allow the application to connect to the database.

7. Migrate and seed the database.
```
php artisan migrate --seed
 ```

8. Visit http://localhost:8080/Report-Management-System  in your browser. (you will see this page) 
<img width="1591" alt="Screen Shot 1440-07-19 at 11 16 23 AM" src="https://user-images.githubusercontent.com/31994505/55016606-299eb600-5000-11e9-8ad7-6260d2aa3216.png">

9. Enter email name and password : 
```
Email : report-system@admin.com 
Password : 123456
```
10. After login update your email and password.

-Made with love :heartpulse:
