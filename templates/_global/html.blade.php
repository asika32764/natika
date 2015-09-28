{{-- Part of Windwalker project. --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $uri['media.path'] }}images/favicon.ico" />
    <meta name="generator" content="Windwalker Framework" />
    @yield('meta')

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $uri['media.path'] }}css/main.css" />
    @yield('style')

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('script')
</head>
<body>
    @section('navbar')
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ $router->html('home') }}">Windwalker</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                     @section('nav')
                        <li class="active"><a href="{{ $router->html('home') }}">Home</a></li>
                     @show
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    {{-- <li class="pull-right"><a href="{{ $uri['base.path'] }}admin">Admin</a></li> --}}
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    @show

    @section('message')
        {!! \Windwalker\Core\Widget\WidgetHelper::render('windwalker.message.default', array('flashes' => $flashes)) !!}
    @show

    @yield('content', 'Content')

    @section('copyright')
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <hr />

                    <footer>
                        &copy; Windwalker {{ $datetime->format('Y') }}
                    </footer>
                </div>
            </div>
        </div>
    </div>
    @show
</body>
</html>
