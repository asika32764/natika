{{-- Part of Windwalker project. --}}
<?php
use Phoenix\Asset\Asset;
use Phoenix\Script\BootstrapScript;

BootstrapScript::css();
BootstrapScript::script();
Asset::addStyle('css/main.css');
Asset::addStyle('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css');
Asset::addStyle('css/github-markdown-css.min.css');

if (is_file(WINDWALKER_PUBLIC . '/media/css/custom.css'))
{
    Asset::addStyle('css/custom.css');
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ \Phoenix\Html\Document::getPageTitle() }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $uri['media.path'] }}images/favicon.ico" />
    <meta name="generator" content="Windwalker Framework" />

    {!! \Phoenix\Html\HtmlHeader::renderMetadata() !!}
    @yield('meta')

    {!! \Phoenix\Asset\Asset::renderStyles(true) !!}
    @yield('style')

    {!! \Phoenix\Html\HtmlHeader::renderCustomTags() !!}
</head>
<body class="natika-body {{ $package->getName() }}-body view-{{ $view->name }} layout-{{ $view->layout }} category-{{ isset($currentCategory) ? $currentCategory->get('alias', 'root') : null }}">
    @section('navbar')
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ $router->html('forum@home') }}">{{ \Phoenix\Html\HtmlHeader::getSiteName() }}</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                     @section('nav')
                         <?php foreach ($articles as $article): ?>
                             <li>
                                 <a href="{{ $article->link }}">
                                     <span class="{{ $article->icon }}"></span>
                                     {{ $article->short_title ? : $article->title }}
                                 </a>
                             </li>
                         <?php endforeach; ?>
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
                        <a href="{{ $router->html('profile_edit') }}">
                            <img height="18px" style="border-radius: 50%;" src="{{ $user->avatar }}" alt="Avatar">
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
                @if (\Phoenix\Html\HtmlHeader::getTitle())
                    {{ \Phoenix\Html\HtmlHeader::getTitle() }}
                @else
                    {{ $app->get('natika.banner.default', 'Welcome to ' . \Phoenix\Html\HtmlHeader::getSiteName()) }}
                @endif
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
                        &copy; {{ \Phoenix\Html\HtmlHeader::getSiteName() }} {{ $datetime->format('Y') }}
                    </footer>
                </div>
            </div>
        </div>
    </div>
    @show

    {!! \Phoenix\Asset\Asset::renderScripts(true) !!}
    @yield('script')
{!! \Phoenix\Asset\Asset::getTemplate()->renderTemplates() !!}
</body>
</html>
