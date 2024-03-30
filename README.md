##### Deploy Laravel and Vue App with Docker

###### Prerequisites:
- Docker
- Docker Compose


###### Steps:
1. Clone the repository
```bash
git clone https://github.com/iHasanMasud/dockerized-laravel-vue.git
```

2. Build the images and run the containers
```bash
docker-compose up -d --build
```

3. Install composer dependencies
```bash
docker-compose exec app composer install
```

4. Generate a key for the application
```bash
docker-compose exec app php artisan key:generate
```

5. Run the migrations
```bash
docker-compose exec app php artisan migrate
```

6. Run the artisan serve command
```bash
docker-compose exec app php artisan serve
```

7. Install npm dependencies
```bash
docker-compose exec node npm install
```

8. Build the assets
```bash
docker-compose exec node npm run dev
```

8. Visit `http://127.0.0.1:8080` in your browser