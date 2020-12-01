# gym-laravel
Custom gym system for maxgym
1. run the following command to install needed 
<code>$ composer install</code>
2. /.env file to configure your preferred database 
<code>
DB_CONNECTION=my_datebase_type
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database_name
DB_USERNAME=my_database_username
DB_PASSWORD=my_database_password
</code>
3. to run the migrations with the seeds
<code>$ artisan migrate --seed</code>
4. to run server
<code>$ artisan serve </code>
