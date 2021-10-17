# Hotelinking Technical Test

This project is made with Laravel, Mysql and Docker.

Down below, the are the steps to run the project.

# Project setup

In order to run the application you must follow this steps:

1- Clone the repository

```bash
  git clone https://github.com/DavidGVelez/hotelinking.git
```

2- Copy the .env.example into .env

```bash
  cp .env.example .env
```

3- Once the repo is cloned and .env created, you must run the following command to create the docker containers:

```bash
  docker-compose up -d
```

4- When the containers are up and ready. We need to enter the container ssh.

```bash
  docker exec -it hotelinking_web bash 
```

5- Install php dependencies 

```bash
  composer install
```

6- After that, we need to make the database scaffolding.

```bash
  php artisan migrate:fresh
```

This command creates the database and all the tables

# Testing

To run the tests, you only need to run the following command on the web container

```bash
  composer test
```