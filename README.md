# How to use

First, we need to get the sources:

```shell
$ git clone https://github.com/Babanskiy1994/Learn_PHP_Laravel.git
$ cd ./Learn_PHP_Laravel-master
```

After that - build image with our application and install composer dependencies:

```shell
$ make install
```

Make full application initialization:

```shell
$ make init
```

Start the application:

```shell
$ make up
```

Voila! You can open <http://127.0.0.1:8080> in your browser and source code in your favorite IDE.

> For watching all supported `make` commands execute `make` without parameters inside the project directory:
> ```
> $ make
> ```

## How to

### Open the shell in the application container?

Execute in your terminal:

```shell
$ make shell
```

In this shell, you can use `composer`, `php`, and any other tools, which are installed into a docker image.

### Watch logs?

```shell
$ docker-compose logs -f
```

All messages from all containers output will be listed here.

### Install composer dependency?

As it was told above - execute `make shell` and after that `composer require %needed/package%`.
