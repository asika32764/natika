# Windwalker Starter

![logo](https://cloud.githubusercontent.com/assets/1639206/2870854/176b987a-d2e4-11e3-8be6-9f70304a8499.png)

This is [Windwlaker Framework](https://github.com/ventoviro/windwalker) starter package.

## Installation Via Composer

``` bash
$ php composer.phar create-project windwalker/starter windwalker ~2.0
```

## Getting Started

Open `http://{Your project root}/www`, you will see the sample page.

![acme_page](https://cloud.githubusercontent.com/assets/1639206/5560315/dd714ccc-8dba-11e4-8911-8a29e2a2b1f2.png)

Open `http://{Your project root}/www/dev.php`, you will enter the development mode.

## Use Database

Copy `etc/secret.dist.yml` to `etc/secret.yml` and fill database information.

## Using Console

Type this command in your terminal:

``` bash
php bin/console
```

You will see console usage:

```
Windwalker Console - version: 2.0
------------------------------------------------------------

[console Help]

The default application command

Usage:
  console <command> [option]


Options:

  -h | --help       Display this help message.
  -q | --quiet      Do not output any message.
  -v | --verbose    Increase the verbosity of messages.
  --ansi            Set 'off' to suppress ANSI colors on unsupported terminals.

Commands:

  migration    Database migration system.
  seed         The data seeder help you create fake data.
  build        Some useful tools for building system.

Welcome to Windwalker Console.
```

### Import Sample Schema

``` bash
php bin/console migration status
php bin/console migration migrate
```

## How To Use Windwalker

Please see README in every [Windwalker packages](https://github.com/ventoviro) first.
