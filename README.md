# pprima-back

## Prestamos Prima technical test REST API backend

This is the backend part for the PDF Uploader application technical test. This backend is a REST API based on Laravel v5.4 and the [MongoDB database](https://www.mongodb.com/en/mongodb-3.4).

### Additional packages
- CORS (Cross-Origin Resource Sharing) headers support for Laravel
[(https://github.com/barryvdh/laravel-cors)](https://github.com/barryvdh/laravel-cors)
- Eloquent model and Query builder for Laravel (Moloquent)
[(https://github.com/jenssegers/laravel-mongodb)](https://github.com/jenssegers/laravel-mongodb)

## Build Setup

You will need some kind of local server to run the Laravel applications. For OSX, [Laravel Valet](https://laravel.com/docs/5.4/valet) is the simplest and fastest way. For Windows and Ubuntu, [Homestead](https://laravel.com/docs/5.4/homestead) is and excellent options, but will probably require some additional work.

Install, configure and start MongoDB. Create a database with the following settings:

- Database name: pprima
- Database user: pprima
- Database password: secret

Copy file .env.example and save it as .env and modify the following lines:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
To
```
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=pprima
# DB_USERNAME=pprima
# DB_PASSWORD=secret

DB_CONNECTION=mongodb
DB_HOST=localhost
DB_PORT=27017
DB_DATABASE=pprima
DB_USERNAME=pprima
DB_PASSWORD=secret
```

From the application root folder, execute the following commands:

```
composer install
npm install
npm run dev
```

To create the collection used by the API to save the documents, execute
```
php artisan migrate
```
After that, you can also feed the collection with some fake data executing
```
php artisan db:seed
```
Or both operations in one single step
```
php artisan migrate --seed
```
## Is the application working?
You can check it with an HTTP client, like [POSTMAN](https://www.getpostman.com/). The methods supported are:

- Get documents list

> GET http://pprima-back.dev/api/documents/

- Get single document

> GET http://pprima-back.dev/api/documents/{documentId}

- Delete document

> DELETE http://pprima-back.dev/api/documents/{documentId}

- Add new document

> POST http://pprima-back.dev/api/documents/

Request body:

```
{
  title: "Document title"
  description: "Document description"
  content: <PDF content base64 encoded>
}
```