## Customer Invoice api
index, store, show, update method for cutomer
index, bulkStore(for store multi invoice to gether)

### Token
for create token use "http://127.0.0.1:8000/setup", this url give you three token with dfferent access :<br>
```bash
admin : ['create', 'update', 'dalete']
update : ['create', 'update']
basic : ['none']
```
## for example :<br>

```bash
admin  :  "7|qhVEb43T3wCnkSXRgMVDG06MAJUV5lcDTLtkKRAvda275abd"
update :  "8|cqDLhBFDmaeszzXqBCwS8vtCqawcSYZQ7PGq8lMp1b561e0a"
basic  :  "9|29Fv346slX3Nys6LHPrRQgBRmdZMg1ya6skAfp9b3f346a61"
```

### Introduction

you can add , delete , edit , update your database table value . <br>
use MVC architecture in this project and MYSQL sever for data base .

To run this Laravel app, you need to have the following software installed on your machine:
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)


### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/hosseinnzr/laravel_api.git
   ```
2. Change into the project directory:
    ```bash
    cd laravel_api
    ```

3. Install PHP dependencies:
    ```bash
    composer update
    composer install
    ```
4. Create a copy of the .env.example file and rename it to .env. Update the database and other configurations as needed.

6. Generate an application key:
    ```bash
    php artisan key:generate
    ```
7. Migrate the database:
    ```bash
    php artisan migrate
    ```
8. Serve the application:
    ```bash
    php artisan serve
    ```
10. Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser to view the app.




## command used
```bash
1. php artisan make:model Customer --all
2. php artisan make:model Invoice --all
3. php artisan migrate:refresh --seed
4. php artisan make:resource V1/CustomerResource
5. php artisan make:resource V1/CustomerCollection
6. php artisan make:resource V1/InvoiceResource 
7. php artisan make:resource V1/InvoiceCollection
8. composer require itsgoingd/clockwork
9. composer require laravel/sanctum
10. php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
