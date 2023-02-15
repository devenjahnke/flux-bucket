# Flux Bucket Technical Project

## Instructions
The instructions provided for this technical project can be found in the `Instructions.pdf` file in the application's root directory.

## Application Setup

### Install Laravel Sail
Before beginning, ensure that you have Docker Desktop installed on your device. Then, install the applications dependencies by running the following command:

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Once this has completed, you can spin up the Sail container network by running:
```shell
./vendor/bin/sail up
```

It is recommended that you define a shell alias for interacting with Sail. You can do so with the following:
```shell
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

### Configure the Environment
Once the Sail containers are running, navigate to `http://localhost` in your browser. You should be presented with a `500 Server Error` as the application's environment has not yet been configured. 

First, create a `.env` file using the `.env.example` file located in the application's root directory:
```shell
cp .env.example .env
```

Then, generate a new application key:
```shell
sail artisan key:generate
```

Next, update the following environment variables:
```dotenv
APP_NAME="Flux Bucket"

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_USERNAME=sail
DB_PASSWORD=password

REDIS_HOST=redis

SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://meilisearch:7700
```

### Build the Application
Start by installing all NPM dependencies:
```shell
sail npm install
```

Next, run the NPM build script to build the application's frontend assets:
```shell
sail npm run build
```

### Set up the Database
Because the Sail container network was created before the application's environment was configured, the `flux_bucket` database table was not created. The easiest way to create this table is to delete the existing Sail container network volumes and recreate them. This can be accomplished by running the following commands:
```shell
sail down -v && sail up -d
```

Now that the `flux_bucket` table exists, we can run the database migrations and seeder.

```shell
sail artisan migrate --seed
```

### Set up Local Storage
Because the application relies on the `local` driver for storage, we must run the following command to create a symbolic link:
```shell
sail artisan storage:link
```

## Logging In
Now that the application is set up, it's time to log in and take it for a spin. The database has been seeded with two users. Their credentials are as follows:

- Josh Dockery
  - Email: `josh@fluxbucket.com`
  - Password: `password`
- Deven Jahnke
    - Email: `hello@devenjahnke.com`
    - Password: `password`
