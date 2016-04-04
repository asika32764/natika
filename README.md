# Natika Forum [![Analytics](https://ga-beacon.appspot.com/UA-48372917-1/natika/readme)](https://github.com/igrigorik/ga-beacon)


[![Join the chat at https://gitter.im/asika32764/natika](https://badges.gitter.im/asika32764/natika.svg)](https://gitter.im/asika32764/natika?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Latest Stable Version](https://poser.pugx.org/asika/natika/v/stable)](https://packagist.org/packages/asika/natika) [![Total Downloads](https://poser.pugx.org/asika/natika/downloads)](https://packagist.org/packages/asika/natika) [![Latest Unstable Version](https://poser.pugx.org/asika/natika/v/unstable)](https://packagist.org/packages/asika/natika) [![License](https://poser.pugx.org/asika/natika/license)](https://packagist.org/packages/asika/natika)

![p-2016-04-02-001](https://cloud.githubusercontent.com/assets/1639206/14224723/2be048b0-f8d9-11e5-8e14-0ebf5c3a03a4.jpg)

Simple PHP Forum system for developers.

- [Official Site](http://natika.windwalker.io/)
- [Support](http://natika.windwalker.io/category/natika)
- [Packagist](https://packagist.org/packages/asika/natika)

## Installation Via Composer

``` bash
composer create-project asika/natika natika *

cd natika/
```

After composer installed, Natika will help you set some basic settings to enable site and create admin user.

### Other Commands

If you want to test with fake data, you can add seeders by 

``` bash
php natika migration reset --seed
```

Create a new admin user

``` bash
php natika create-user
```

## Getting Started

Use your root user to login Natika. You can create category by click `New Category` button.

![p-2016-04-02-002](https://cloud.githubusercontent.com/assets/1639206/14224754/4758401a-f8da-11e5-87ad-6485b9d31a2e.jpg)

Fill category information, icon uses [Font Awesome](https://fortawesome.github.io/Font-Awesome/icons/) classes.

![p-2016-04-02-003](https://cloud.githubusercontent.com/assets/1639206/14224763/66200a32-f8da-11e5-952e-dcf60566cb86.jpg)

![p-2016-04-02-004](https://cloud.githubusercontent.com/assets/1639206/14224764/68c69a3a-f8da-11e5-9bfc-c9ff2b958e30.jpg)

> If you want to use image as category icon, you must go to admin. 

Create & edit topics.

![p-2016-04-02-012](https://cloud.githubusercontent.com/assets/1639206/14226411/0aaf950c-f914-11e5-88a3-d6594b828f05.jpg)

![p-2016-04-02-014](https://cloud.githubusercontent.com/assets/1639206/14226412/0ab1dc4a-f914-11e5-9eaf-506a1ec76793.jpg)

![p-2016-04-02-013](https://cloud.githubusercontent.com/assets/1639206/14226413/0ab58034-f914-11e5-9599-1338048865db.jpg)

## Admin

Go to `http://{your.site}/admin`, and login with admin account.

![p-2016-04-02-005](https://cloud.githubusercontent.com/assets/1639206/14224781/3ccae25a-f8db-11e5-851a-b195b8177ce0.jpg)

## Category Edit

![p-2016-04-02-007](https://cloud.githubusercontent.com/assets/1639206/14224782/3ef7e06e-f8db-11e5-84b2-4fd55c04cf09.jpg)

## Article Edit

![p-2016-04-02-009](https://cloud.githubusercontent.com/assets/1639206/14226340/3d810c60-f912-11e5-9956-308239980656.jpg)

Article will display on frontend top menu. If you fill the URL input, menu item will be an external link.

![p-2016-04-02-010](https://cloud.githubusercontent.com/assets/1639206/14226353/7cad4534-f912-11e5-99f6-eb1e794baaa4.jpg)

You can drag & drop images to upload.

![p-2016-04-02-008](https://cloud.githubusercontent.com/assets/1639206/14226395/b22dd0ec-f913-11e5-8591-34daafcbdecd.jpg)

## Config

Open `etc/secret.yml`, there are some basic settings which you can change.

### Site Metadata

``` yaml
natika:
    site_name: Natika
    metadata:
        description:
        'og:description':
        'og:image':
    banner:
        default: # Banner title
    theme: # Your custom theme
```

### Mail Settings

``` yaml
mail:
    from:
        email: norply@domain.com
        name: Natika Forum
    transport: smtp # smtp / sendmail or php
    
    # SMTP setting
    host: mailtrap.io
    username:
    password:
    security: tls
    port: 2525
```

### Cloud Image Storage

``` yaml
unidev:
    image:
        storage: s3 # s3 or imgur
        
        # Auto resize image
        resize:
            enabled: true
            width: 1200
            height: 1200
            crop: false
            quality: 85
            
    # API information
    amazon:
        key:
        secret:
        bucket:
        subfolder:
        endpoint: # Keep empty
        region: # Keep empty
    imgur:
        key:
        secret:
```

## Customize Theme

See [Customize Document](docs/customize.md)

## Social Login

See [Social Login Document](docs/social-login.md)

## Development

Natika based on these packages:

- [Windwalker Framework](http://windwalker.io/)
- [Phoenix RAD](http://phoenix.windwalker.io/)
- [Warder User Package](https://github.com/ventoviro/warder)
- [Luna CMF Package](https://github.com/lyrasoft/luna/)

Natika provides package and event system to help develops create their plugins, but we need more test to release this feature, so there are no documentation about plugins currently, please wait for future inforamtion.
