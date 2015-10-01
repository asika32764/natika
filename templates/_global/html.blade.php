{{-- Part of Windwalker project. --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ \Phoenix\Html\Document::getPageTitle() }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $uri['media.path'] }}images/favicon.ico" />
    <meta name="generator" content="Windwalker Framework" />

    {!! \Phoenix\Html\Document::renderMetadata() !!}
    @yield('meta')

    {!! \Phoenix\Asset\Asset::renderStyles(true) !!}
    @yield('style')

    {!! \Phoenix\Html\Document::renderCustomTags() !!}
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
                <a class="navbar-brand" href="{{ $router->html('forum:home') }}">{{ \Phoenix\Html\Document::getSiteName() }}</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                     @section('nav')
                        <li>
                            <a href="{{ $router->html('forum:home') }}">
                                <span class="fa fa-home"></span>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/asika32764/natika" target="_blank">
                                <span class="fa fa-github"></span>
                                Source Code
                            </a>
                        </li>
                     @show
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if ($user->isGuest())
                    <li>
                        <a href="{{ $router->html('login', array('return' => base64_encode($uri['full']))) }}">
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
                        <a href="{{ $router->html('logout', array('return' => base64_encode($uri['full']))) }}">
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

    @section('banner')
    <div class="jumbotron banner-wrap">
        <div class="container">
            @section('banner_inner')
            <h1 class="text-center text-uppercase">
                {{ $app->get('banner.default', 'Welcome to ' . \Phoenix\Html\Document::getSiteName()) }}
            </h1>
            @show
        </div>
    </div>
    @show

    @section('message')
        <div class="container">
            {!! \Windwalker\Core\Widget\WidgetHelper::render('windwalker.message.default', array('flashes' => $flashes)) !!}
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
                        &copy; {{ \Phoenix\Html\Document::getSiteName() }} {{ $datetime->format('Y') }}
                    </footer>
                </div>
            </div>
        </div>
    </div>
    @show

    {!! \Phoenix\Asset\Asset::renderScripts(true) !!}
    @yield('script')
</body>
</html>
