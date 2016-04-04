# Hide Source Files

If you want to hide source files, only access `index.php` from a `/public` directory, please follow these steps.

## Move These Files to `/public` folder

Create a `/public` folder, move these files into it.

- index.php
- dev.php
- .htaccess
- web.config
- robots.txt
- /media

![p-2016-04-04-014](https://cloud.githubusercontent.com/assets/1639206/14248284/50c2ee66-faa6-11e5-99ea-9212eb60af75.jpg)

## Change Include Path
 
Modify `index.php` (and `dev.php` if you want to develop) file. 

Change:

``` php
$autoload = __DIR__ . '/vendor/autoload.php';

// To

$autoload = __DIR__ . '/../vendor/autoload.php';
```

And

``` php
include_once __DIR__ . '/etc/define.php';

// To

include_once __DIR__ . '/../etc/define.php';
```

## Change Public Path

Open `etc/define.php` and modify:

``` php
define('WINDWALKER_PUBLIC',    WINDWALKER_ROOT);

// To

define('WINDWALKER_PUBLIC',    WINDWALKER_ROOT . '/public');
```

Now you can open Natika by `http://{your_site}/public` and create virtualhost to this folder, then all source files
will be hidden.

## Todo

Add `php natika create-public` to auto do this. See: [#13](https://github.com/asika32764/natika/issues/13)
