# Customize Natika

## custom.css

Create `media/custom.css` file that you can add your own css styles.
 
``` css
/* media/custom.css */

/* Header */
.natika-body .navbar {
    background-color: #333;
    border-color: transparent;
    color: white;
}

.natika-body .navbar a,
.natika-body .navbar .navbar-nav > li > a {
    color: #e0e0e0;
    text-transform: uppercase;
}

/* Banner */
.natika-body .banner-wrap {
    padding-top: 125px;
    padding-bottom: 125px;
    background: url(https://unsplash.it/2000/600?image=872) no-repeat center center;
    background-size: cover;
    position: relative;
    overflow: hidden;
}

.natika-body .banner-wrap::before {
    width: 100%;
    height: 600px;
    content: "";
    background-color: rgba(0,0,0,.5);
    position: absolute;
    top: 0;
}

.natika-body .banner-wrap h1 {
    color: white;
}
```

![p-2016-04-02-016](https://cloud.githubusercontent.com/assets/1639206/14226624/6b2aa98a-f919-11e5-8b92-dd77009a8422.jpg)

## Custom Templates

Put your own theme files in `templates/theme`, for example, your can create a folder `templates/theme/flower`.
Then open `etc/secret.yml` and change settings.

``` yaml
# ...

natika:
    # ...
    theme: flower 
```

Now if you create a `templates/theme/flower/_global/html.blade.php` file, it will override `src/Forum/Templates/_global/html.blade.php` output.

Natika uses [Blade Template Engine](https://laravel.com/docs/master/blade)

Here we prepare an example theme files: [download](https://github.com/asika32764/natika/releases/download/0.2.2/natika-example-theme.zip)
