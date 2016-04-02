# Natika Forum

![p-2016-04-02-001](https://cloud.githubusercontent.com/assets/1639206/14224723/2be048b0-f8d9-11e5-8e14-0ebf5c3a03a4.jpg)

Simple PHP Forum system for developers.

## Installation Via Composer

``` bash
composer create-project askia/natika natika * -s

cd natika/
```

After composer installation, you must run these commands to continue Natika install.

Run migration.

``` bash
php natika migration migrate
```

> You can add seeders by `php natika migration migrate --seed`

Create admin user

``` bash
php natika create-user
```

## Getting Started

Use your root user to login Natika. You can create category by click `New Category` button.

![p-2016-04-02-002](https://cloud.githubusercontent.com/assets/1639206/14224754/4758401a-f8da-11e5-87ad-6485b9d31a2e.jpg)

Fill category information, icon use [Font Awesome](https://fortawesome.github.io/Font-Awesome/icons/) classes.

![p-2016-04-02-003](https://cloud.githubusercontent.com/assets/1639206/14224763/66200a32-f8da-11e5-952e-dcf60566cb86.jpg)

![p-2016-04-02-004](https://cloud.githubusercontent.com/assets/1639206/14224764/68c69a3a-f8da-11e5-9bfc-c9ff2b958e30.jpg)

> If you want to use image as category icon, you must go to admin. 

## Admin

Go to `http://{your.site}/admin`, and login with admin account.

![p-2016-04-02-005](https://cloud.githubusercontent.com/assets/1639206/14224781/3ccae25a-f8db-11e5-851a-b195b8177ce0.jpg)

Category Edit

![p-2016-04-02-007](https://cloud.githubusercontent.com/assets/1639206/14224782/3ef7e06e-f8db-11e5-84b2-4fd55c04cf09.jpg)

