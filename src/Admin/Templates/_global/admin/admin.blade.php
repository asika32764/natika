{{-- Part of Admin project. --}}

@extends('_global.admin.html')

@section('content')
<section class="jumbotron admin-header">
    <div class="container-fluid">
        <h1>{{ \Phoenix\Html\HtmlHeader::getTitle() }}</h1>
    </div>
</section>
<aside id="admin-toolbar" class="">
    <button data-toggle="collapse" class="btn btn-default toolbar-toggle-button" data-target=".admin-toolbar-buttons">
        <span class="glyphicon glyphicon-wrench"></span>
        @translate('phoenix.toolbar.toggle')
    </button>
    <div class="admin-toolbar-buttons">
        <hr />
        @yield('toolbar')
    </div>
</aside>

<section id="admin-area">
    <div class="container-fluid">
        <div class="row">
            @section('admin-area')
                <div class="col-md-2">
                    @include('_global.admin.submenu')
                </div>
                <div class="col-md-10">

                    @section('message')
                        {!! \Windwalker\Core\Widget\WidgetHelper::render('windwalker.message.default', array('flashes' => $flashes)) !!}
                    @show

                    @yield('admin-body', 'Body')
                </div>
            @show
        </div>
    </div>
</section>

<script>
    jQuery(function($)
    {

        var navTop;
        var isFixed = false;
        var toolbar = $('#admin-toolbar');

        processScrollInit();
        processScroll();

        $(window).on('resize', processScrollInit);
        $(window).on('scroll', processScroll);

        function processScrollInit()
        {
            if (toolbar.length) {
                navTop = toolbar.length && toolbar.offset().top - 30;

                // Only apply the scrollspy when the toolbar is not collapsed
                if (document.body.clientWidth > 480)
                {
                    $('.subhead-collapse').height(toolbar.height());
                    toolbar.scrollspy({offset: {top: toolbar.offset().top - $('nav.navbar').height()}});
                }
            }
        }

        function processScroll()
        {
            if (toolbar.length) {
                var scrollTop = $(window).scrollTop();
                if (scrollTop >= navTop && !isFixed) {
                    isFixed = true;
                    toolbar.addClass('admin-toolbar-fixed');
                } else if (scrollTop <= navTop && isFixed) {
                    isFixed = false;
                    toolbar.removeClass('admin-toolbar-fixed');
                }
            }
        }
    });
</script>
@stop
