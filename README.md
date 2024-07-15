# Docker for local web development: a basic LEMP stack (Linux, Nginx, MySQL, PHP)

## Content

This branch contains a basic LEMP stack running on Docker and orchestrated by Docker Compose, including:

- A container for Nginx;
- A container for PHP;
- A container for MySQL;
- A container for phpMyAdmin;

## Prerequisites

Make sure [Docker Desktop for Mac or PC](https://www.docker.com/products/docker-desktop) is installed and running, or head [over here](https://docs.docker.com/install/) if you are a Linux user. You will also need a terminal running [Git](https://git-scm.com/).

This setup also uses localhost's port 8000 for Nginx, so make sure it is available.

## Directions of use

Clone the repository and change the current directory for the project's root:

```
git clone https://github.com/opportunity-zh/opp-php-mysql.git

cd opp-php-mysql
```

Run the following command:

```
docker compose up
```

This may take a little bit of time, as some Docker images might need downloading.

## Explanation

The images used by the setup are listed and configured in [`docker compose.yml`](https://github.com/opportunity-zh/opp-php-mysql/docker compose.yml).

When building and starting the containers based on the images for the first time, a MySQL database named `library` is automatically created (you can pick a different name for the MYSQL_DATABASE in the MySQL service's description in `docker compose.yml`).

The database data is persisted in its own local directory through the volume `db_data`, which is mounted onto MySQL's container. A phpMyAdmin interface is available at [localhost:8080](http://localhost:8080) (the database credentials are webDev / opport2022).

## Cleaning up

To stop the containers:

```
docker compose stop
```

To destroy the containers:

```
docker compose down
```

To destroy the containers and the associated volumes:

```
docker compose down -v
```

To remove everything, including images and orphan containers:

```
docker compose down -v --rmi all --remove-orphans
```
