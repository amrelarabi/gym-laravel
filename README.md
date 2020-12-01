# gym-laravel
Custom gym system for maxgym<br>
1. run the following command to install needed <br>
<code>$ composer install</code><br>
2. /.env file to configure your preferred database 
<br>
<code>
DB_CONNECTION=my_datebase_type<br>
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database_name
DB_USERNAME=my_database_username
DB_PASSWORD=my_database_password
</code><br>
3. to run the migrations with the seeds<br>
<code>$ artisan migrate --seed</code><br>
4. to run server<br>
<code>$ artisan serve </code><br>
