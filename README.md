##### Deploy Laravel and Vue App with Docker

###### Prerequisites:
- Docker
- Docker Compose


###### Steps:
* Clone the repository
```bash
git clone https://github.com/iHasanMasud/dockerized-laravel-vue.git
```

* Build the images and run the containers
```bash
docker-compose up -d --build
```
* Copy the .env.example file to .env
```bash
cp .env.example .env
```

* Install composer dependencies
```bash
docker-compose exec app composer install
```

* Generate a key for the application
```bash
docker-compose exec app php artisan key:generate
```

* Run the migrations
```bash
docker-compose exec app php artisan migrate
```

* Run the artisan serve command
```bash
docker-compose exec app php artisan serve
```

* Install npm dependencies
```bash
docker-compose exec node npm install
```

* Build the assets
```bash
docker-compose exec node npm run dev
```

* Visit `http://127.0.0.1:8080` in your browser