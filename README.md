<p align="center"><img height="188" width="198" src="https://botman.io/img/botman.png"></p>
<h1 align="center">BotMan Studio</h1>

## Botman 101 

A BotMan starter project to introduce BotMan.

## Basics

Once everything is setup (follow #setup below), you can access your botman studio installation at [localhost](http://127.0.0.1:8080)

All Botman routes are in `/routes/botman.php`, edit new routes there.

All conversations are in `app/Conversations`

Example BotMan controller is situated at `app/Http/Controllers/BotManController`

New BotMan controllers are situated at `app/Http/Controllers/Listen`

You can test your bot using the web driver at [tinker](http://127.0.0.1:8080/botman/tinker)

Note: Powerpoint is included in root file under `BotMan Intro - Liam Norman.key` for keypoint file and 
`BotMan Intro - Liam Norman ppt.pptx` for powerpoint file.

## Prerequisites

To install using docker, please ensure you have the relevant version of [Docker CE](https://docs.docker.com/install/) for your OS installed.

## Setup

To start using this project, there are a few setup steps that you need to take which include things like composer installation and setting up env files.

Here's the commands you need to run to get going:

```
# From the root of the project

# Copy the example env files
cp .env.example .env
cp .docker.env.example .docker.env

# Install composer dependencies
composer install

# Generate a key
php artisan key:generate

npm install && npm run dev

# Build the Docker images and run containers 

docker-compose up --build 

# Migrate the database in the container
docker-compose run --rm app /bin/bash

# Now inside the container
php artisan migrate
```

## Connecting to the Database

When you have the Docker environment running you can connect to a database via a GUI application or MySQL command line. Here's how you would connect from the console, for local development:

```
mysql -u root -proot -P13306 -h 127.0.0.1
```

The `docker-compose.yml` file contains the environment configuration for the MySQL database name, users, and root password for reference. The `mysql` service in the Docker Compose file maps port `13306` on the host machine to `3306` on the container so that it doesn't interrupt any local MySQL instances you might have running. I've just added a `1` in front of the `3306` as `13306` if you want an easy way to remember the port exposed for MySQL.

Here's what a Sequel Pro connection might look like:

![Sequel Pro Connection Details](resources/doc/images/sequel-pro-connection.png)

## Useful links

[Botman.io](https://botman.io/)

[Buildachatbot.io](https://buildachatbot.io/)

[Christoph Rumpel - build chatbots with PHP](https://christoph-rumpel.com/build-chatbots-with-php)

[Botman github](https://github.com/botman/botman)

[Botman 2.0 docs](https://botman.io/2.0/installation)

[Botman forum](https://botman.io/forum/)

## About BotMan Studio

While BotMan itself is framework agnostic, BotMan is also available as a bundle with the great [Laravel](https://laravel.com) PHP framework. This bundled version is called BotMan Studio and makes your chatbot development experience even better. By providing testing tools, an out of the box web driver implementation and additional tools like an enhanced CLI with driver installation, class generation and configuration support, it speeds up the development significantly.

## Documentation

You can find the BotMan and BotMan Studio documentation at [http://botman.io](http://botman.io).

## Support the development
**Do you like this project? Support it by donating**

- PayPal: [Donate](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=m%2epociot%40googlemail%2ecom&lc=CY&item_name=BotMan&no_note=0&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHostedGuest)
- Patreon: [Donate](https://www.patreon.com/botman)

## Security Vulnerabilities

If you discover a security vulnerability within BotMan or BotMan Studio, please send an e-mail to Marcel Pociot at m.pociot@gmail.com. All security vulnerabilities will be promptly addressed.

## License

BotMan is free software distributed under the terms of the MIT license.
