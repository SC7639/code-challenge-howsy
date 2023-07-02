# Howsy Software Engineer Code Challenge

## Run in development
1. Install docker for [(windows|mac|linux)](https://docs.docker.com/get-docker/)
2. Run `docker compose up --build -d` then `docker compose exec php bash`
3. Run `composer install` inside the docker container
4. RUN `composer test` to run the tests

## Run in production
1. Install [docker](https://docs.docker.com/desktop/install/linux-install/) on your server
2. Run `docker compose -f docker-compose.prod.yml up --build -d` which will install composer dependencies and run tests. It will fail to build if any tests fail. 
3. Open browser to your domain or if running locally to test it open to [http://localhost](http://localhost)