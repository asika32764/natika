
# Natika Social Login Manual

## Introduction

Natika uses [HibridAuth](http://hybridauth.sourceforge.net/) to implement OAuth methods. You can find
some documentation from [HibridAuth Docs](http://hybridauth.sourceforge.net/userguide.html).

Currently we only support facebook, twitter, google, yahoo and github 5 services.

When you enabled social login, the button will display on login page:
 
![p-2016-04-02-015](https://cloud.githubusercontent.com/assets/1639206/14226511/1ac60040-f917-11e5-8a3e-10c215bac234.jpg)

## Facebook

Settings:

``` yaml
social_login:
    facebook:
        enabled: true
        id: YOUR_APP_ID
        secret: YOUR_APP_SECRET
        scope: email
```

Callback URL: `http://{SITE}/social-auth?hauth.done=Facebook`

Keys Registration: https://developers.facebook.com/apps

![img](http://hybridauth.sourceforge.net/userguide/img/setup/facebook/3.png)

[Details on HibridAuth](http://hybridauth.sourceforge.net/userguide/IDProvider_info_Facebook.html)

## Twitter

Settings:

``` yaml
social_login:
    twitter:
        enabled: false
        key: YOUR_AP_KEY
        secret: YOUR_APP_SECRET
        scope:
```

Callback URL: `http://{SITE}/social-auth?hauth.done=Twitter`

Keys Registration: https://dev.twitter.com/apps

![img](http://hybridauth.sourceforge.net/userguide/img/setup/twitter/3.png)

[Details on HibridAuth](http://hybridauth.sourceforge.net/userguide/IDProvider_info_Twitter.html)

## Google

Settings:

``` yaml
social_login:
    google:
        enabled: true
        id: YOUR_APP_ID
        secret: YOUR_APP_SECRET
        scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email'
```

Callback URL: `http://{SITE}/social-auth?hauth.done=Google`

Keys Registration: https://console.developers.google.com/apis/credentials

[Details on HibridAuth](http://hybridauth.sourceforge.net/userguide/IDProvider_info_Google.html)

## Yahoo

Settings:

``` yaml
social_login:
    yahoo:
        enabled: true
        key: YOUR_AP_KEY
        secret: YOUR_APP_SECRET
        scope:
```

Callback URL: `http://{SITE}/social-auth?hauth.done=Yahoo`

Keys Registration: https://developer.yahoo.com/apps/create/

[Details on HibridAuth](http://hybridauth.sourceforge.net/userguide/IDProvider_info_Yahoo.html)

## GitHub

Settings:

``` yaml
social_login:
    github:
        enabled: true
        id: YOUR_APP_ID
        secret: YOUR_APP_SECRET
        scope:
```

Callback URL: `http://{SITE}/social-auth?hauth.done=Github`

Keys Registration: https://github.com/settings/applications/new

[Details on HibridAuth](http://hybridauth.sourceforge.net/userguide/IDProvider_info_Github.html)

