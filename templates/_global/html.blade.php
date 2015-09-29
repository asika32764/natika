{{-- Part of Windwalker project. --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ \Phoenix\Html\Document::getPageTitle() }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $uri['media.path'] }}images/favicon.ico" />
    <meta name="generator" content="Windwalker Framework" />
    @yield('meta')

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $uri['media.path'] }}css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" />
    @yield('style')

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
                <a class="navbar-brand" href="{{ $router->html('forum:home') }}">Windwalker</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                     @section('nav')
                        <li class="active"><a href="{{ $router->html('forum:home') }}">Home</a></li>
                     @show
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if ($user->isGuest())
                    <li>
                        <a href="{{ $router->html('login') }}">
                            <span class="fa fa-github"></span>
                            Login
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ $user['html_url'] }}" target="_blank">
                            <span class="fa fa-fa fa-user"></span>
                            {{ $user['name'] }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ $router->html('logout') }}">
                            <span class="fa fa-sign-out"></span>
                            Logout
                        </a>
                    </li>
                    @endif
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

    @section('banner')
    <div class="jumbotron banner-wrap">
        <div class="container">
            @section('banner_inner')

            @show
        </div>
    </div>
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
