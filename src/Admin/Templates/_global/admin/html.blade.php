{{-- Part of Admin project. --}}
<!DOCTYPE html>
<html lang="{{ $app->get('language.locale') ? : $app->get('language.default', 'en-GB') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">

    <title>{{ \Phoenix\Html\HtmlHeader::getPageTitle() }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $uri['media.path'] }}images/favicon.ico" />
    <meta name="generator" content="Windwalker Framework" />
    {!! \Phoenix\Html\HtmlHeader::renderMetadata() !!}
    @yield('meta')

    {!! \Phoenix\Asset\Asset::renderStyles(true) !!}
    @yield('style')

    {!! \Phoenix\Asset\Asset::renderScripts(true) !!}
    @yield('script')
    {!! \Phoenix\Html\HtmlHeader::renderCustomTags() !!}
</head>
<body class="{{ $package->getName() }}-admin-body phoenix-admin view-{{ $view->name }} layout-{{ $view->layout }}">
@section ('superbody')
    @section('navbar')
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ $router->html('home') }}">Natika Forum</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        @section('nav')
                            {{--@include('_global.admin.mainmenu')--}}
                        @show
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a target="_blank" href="{{ $router->html('forum@home') }}">
                                <span class="fa fa-globe"></span>
                                Preview
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    @show

    @yield('content', 'Content')

    @section('copyright')
        <div id="copyright">
            <div class="container-fluid">
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
@show
{!! \Phoenix\Asset\Asset::getTemplate()->renderTemplates() !!}
</body>
</html>
