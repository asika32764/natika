{{-- Part of Admin project. --}}
<?php
/**
 * Global variables
 * --------------------------------------------------------------
 * @var $app      \Windwalker\Web\Application            Global Application
 * @var $package  \Admin\AdminPackage            Package object.
 * @var $view     \Windwalker\Data\Data                  Some information of this view.
 * @var $uri      \Windwalker\Registry\Registry          Uri information, example: $uri['media.path']
 * @var $datetime \DateTime                              PHP DateTime object of current time.
 * @var $helper   \Admin\Helper\MenuHelper        The Windwalker HelperSet object.
 * @var $router   \Windwalker\Core\Router\PackageRouter  Router object.
 *
 * View variables
 * --------------------------------------------------------------
 * @var $filterBar     \Windwalker\Core\Widget\BladeWidget
 * @var $filterForm    \Windwalker\Form\Form
 * @var $batchForm     \Windwalker\Form\Form
 * @var $showFilterBar boolean
 * @var $grid          \Phoenix\View\Helper\GridHelper
 * @var $state         \Windwalker\Registry\Registry
 * @var $items         \Windwalker\Data\DataSet
 * @var $item          \Windwalker\Data\Data
 * @var $i             integer
 * @var $pagination    \Windwalker\Core\Pagination\Pagination
 */
?>

@extends('_global.admin.pure')

@section('body')
    <script>
        jQuery(document).ready(function($)
        {
            $('.fontawesome-icon-list a').on('click', function(event)
            {
                var $this = $(this);
                var value = 'fa fa-fw fa-' + $this.attr('data-icon');

                window.parent.{{ $function }}('{{ $selector }}', value, value);
            });
        });
    </script>
    <div id="icons" class="container">
        <section id="new">
            <h2 class="page-header">20 New Icons in 4.5</h2>


            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bluetooth"><i class="fa fa-bluetooth"></i> bluetooth</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bluetooth-b"><i class="fa fa-bluetooth-b"></i> bluetooth-b</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="codiepie"><i class="fa fa-codiepie"></i> codiepie</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="credit-card-alt"><i class="fa fa-credit-card-alt"></i> credit-card-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="edge"><i class="fa fa-edge"></i> edge</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fort-awesome"><i class="fa fa-fort-awesome"></i> fort-awesome</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hashtag"><i class="fa fa-hashtag"></i> hashtag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mixcloud"><i class="fa fa-mixcloud"></i> mixcloud</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="modx"><i class="fa fa-modx"></i> modx</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pause-circle"><i class="fa fa-pause-circle"></i> pause-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pause-circle-o"><i class="fa fa-pause-circle-o"></i> pause-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="percent"><i class="fa fa-percent"></i> percent</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="product-hunt"><i class="fa fa-product-hunt"></i> product-hunt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="reddit-alien"><i class="fa fa-reddit-alien"></i> reddit-alien</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="scribd"><i class="fa fa-scribd"></i> scribd</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="shopping-bag"><i class="fa fa-shopping-bag"></i> shopping-bag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="shopping-basket"><i class="fa fa-shopping-basket"></i> shopping-basket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stop-circle"><i class="fa fa-stop-circle"></i> stop-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stop-circle-o"><i class="fa fa-stop-circle-o"></i> stop-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="usb"><i class="fa fa-usb"></i> usb</a></div>

            </div>

        </section>

        <section id="web-application">
            <h2 class="page-header">Web Application Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="adjust"><i class="fa fa-adjust"></i> adjust</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="anchor"><i class="fa fa-anchor"></i> anchor</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="archive"><i class="fa fa-archive"></i> archive</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="area-chart"><i class="fa fa-area-chart"></i> area-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrows"><i class="fa fa-arrows"></i> arrows</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrows-h"><i class="fa fa-arrows-h"></i> arrows-h</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrows-v"><i class="fa fa-arrows-v"></i> arrows-v</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="asterisk"><i class="fa fa-asterisk"></i> asterisk</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="at"><i class="fa fa-at"></i> at</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="car"><i class="fa fa-automobile"></i> automobile <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="balance-scale"><i class="fa fa-balance-scale"></i> balance-scale</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ban"><i class="fa fa-ban"></i> ban</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="university"><i class="fa fa-bank"></i> bank <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bar-chart"><i class="fa fa-bar-chart"></i> bar-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bar-chart"><i class="fa fa-bar-chart-o"></i> bar-chart-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="barcode"><i class="fa fa-barcode"></i> barcode</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bars"><i class="fa fa-bars"></i> bars</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-empty"><i class="fa fa-battery-0"></i> battery-0 <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-quarter"><i class="fa fa-battery-1"></i> battery-1 <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-half"><i class="fa fa-battery-2"></i> battery-2 <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-three-quarters"><i class="fa fa-battery-3"></i> battery-3 <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-full"><i class="fa fa-battery-4"></i> battery-4 <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-empty"><i class="fa fa-battery-empty"></i> battery-empty</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-full"><i class="fa fa-battery-full"></i> battery-full</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-half"><i class="fa fa-battery-half"></i> battery-half</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-quarter"><i class="fa fa-battery-quarter"></i> battery-quarter</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="battery-three-quarters"><i class="fa fa-battery-three-quarters"></i> battery-three-quarters</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bed"><i class="fa fa-bed"></i> bed</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="beer"><i class="fa fa-beer"></i> beer</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bell"><i class="fa fa-bell"></i> bell</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bell-o"><i class="fa fa-bell-o"></i> bell-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bell-slash"><i class="fa fa-bell-slash"></i> bell-slash</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bell-slash-o"><i class="fa fa-bell-slash-o"></i> bell-slash-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bicycle"><i class="fa fa-bicycle"></i> bicycle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="binoculars"><i class="fa fa-binoculars"></i> binoculars</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="birthday-cake"><i class="fa fa-birthday-cake"></i> birthday-cake</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bluetooth"><i class="fa fa-bluetooth"></i> bluetooth</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bluetooth-b"><i class="fa fa-bluetooth-b"></i> bluetooth-b</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bolt"><i class="fa fa-bolt"></i> bolt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bomb"><i class="fa fa-bomb"></i> bomb</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="book"><i class="fa fa-book"></i> book</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bookmark"><i class="fa fa-bookmark"></i> bookmark</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bookmark-o"><i class="fa fa-bookmark-o"></i> bookmark-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="briefcase"><i class="fa fa-briefcase"></i> briefcase</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bug"><i class="fa fa-bug"></i> bug</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="building"><i class="fa fa-building"></i> building</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="building-o"><i class="fa fa-building-o"></i> building-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bullhorn"><i class="fa fa-bullhorn"></i> bullhorn</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bullseye"><i class="fa fa-bullseye"></i> bullseye</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bus"><i class="fa fa-bus"></i> bus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="taxi"><i class="fa fa-cab"></i> cab <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="calculator"><i class="fa fa-calculator"></i> calculator</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="calendar"><i class="fa fa-calendar"></i> calendar</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="calendar-check-o"><i class="fa fa-calendar-check-o"></i> calendar-check-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="calendar-minus-o"><i class="fa fa-calendar-minus-o"></i> calendar-minus-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="calendar-o"><i class="fa fa-calendar-o"></i> calendar-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="calendar-plus-o"><i class="fa fa-calendar-plus-o"></i> calendar-plus-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="calendar-times-o"><i class="fa fa-calendar-times-o"></i> calendar-times-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="camera"><i class="fa fa-camera"></i> camera</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="camera-retro"><i class="fa fa-camera-retro"></i> camera-retro</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="car"><i class="fa fa-car"></i> car</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-down"><i class="fa fa-caret-square-o-down"></i> caret-square-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-left"><i class="fa fa-caret-square-o-left"></i> caret-square-o-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-right"><i class="fa fa-caret-square-o-right"></i> caret-square-o-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-up"><i class="fa fa-caret-square-o-up"></i> caret-square-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cart-arrow-down"><i class="fa fa-cart-arrow-down"></i> cart-arrow-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cart-plus"><i class="fa fa-cart-plus"></i> cart-plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc"><i class="fa fa-cc"></i> cc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="certificate"><i class="fa fa-certificate"></i> certificate</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="check"><i class="fa fa-check"></i> check</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="check-circle"><i class="fa fa-check-circle"></i> check-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="check-circle-o"><i class="fa fa-check-circle-o"></i> check-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="check-square"><i class="fa fa-check-square"></i> check-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="check-square-o"><i class="fa fa-check-square-o"></i> check-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="child"><i class="fa fa-child"></i> child</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="circle"><i class="fa fa-circle"></i> circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="circle-o"><i class="fa fa-circle-o"></i> circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="circle-o-notch"><i class="fa fa-circle-o-notch"></i> circle-o-notch</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="circle-thin"><i class="fa fa-circle-thin"></i> circle-thin</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="clock-o"><i class="fa fa-clock-o"></i> clock-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="clone"><i class="fa fa-clone"></i> clone</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="times"><i class="fa fa-close"></i> close <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cloud"><i class="fa fa-cloud"></i> cloud</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cloud-download"><i class="fa fa-cloud-download"></i> cloud-download</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cloud-upload"><i class="fa fa-cloud-upload"></i> cloud-upload</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="code"><i class="fa fa-code"></i> code</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="code-fork"><i class="fa fa-code-fork"></i> code-fork</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="coffee"><i class="fa fa-coffee"></i> coffee</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cog"><i class="fa fa-cog"></i> cog</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cogs"><i class="fa fa-cogs"></i> cogs</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="comment"><i class="fa fa-comment"></i> comment</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="comment-o"><i class="fa fa-comment-o"></i> comment-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="commenting"><i class="fa fa-commenting"></i> commenting</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="commenting-o"><i class="fa fa-commenting-o"></i> commenting-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="comments"><i class="fa fa-comments"></i> comments</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="comments-o"><i class="fa fa-comments-o"></i> comments-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="compass"><i class="fa fa-compass"></i> compass</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="copyright"><i class="fa fa-copyright"></i> copyright</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="creative-commons"><i class="fa fa-creative-commons"></i> creative-commons</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="credit-card"><i class="fa fa-credit-card"></i> credit-card</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="credit-card-alt"><i class="fa fa-credit-card-alt"></i> credit-card-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="crop"><i class="fa fa-crop"></i> crop</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="crosshairs"><i class="fa fa-crosshairs"></i> crosshairs</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cube"><i class="fa fa-cube"></i> cube</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cubes"><i class="fa fa-cubes"></i> cubes</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cutlery"><i class="fa fa-cutlery"></i> cutlery</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tachometer"><i class="fa fa-dashboard"></i> dashboard <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="database"><i class="fa fa-database"></i> database</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="desktop"><i class="fa fa-desktop"></i> desktop</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="diamond"><i class="fa fa-diamond"></i> diamond</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="dot-circle-o"><i class="fa fa-dot-circle-o"></i> dot-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="download"><i class="fa fa-download"></i> download</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pencil-square-o"><i class="fa fa-edit"></i> edit <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ellipsis-h"><i class="fa fa-ellipsis-h"></i> ellipsis-h</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ellipsis-v"><i class="fa fa-ellipsis-v"></i> ellipsis-v</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="envelope"><i class="fa fa-envelope"></i> envelope</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="envelope-o"><i class="fa fa-envelope-o"></i> envelope-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="envelope-square"><i class="fa fa-envelope-square"></i> envelope-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="eraser"><i class="fa fa-eraser"></i> eraser</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="exchange"><i class="fa fa-exchange"></i> exchange</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="exclamation"><i class="fa fa-exclamation"></i> exclamation</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="exclamation-circle"><i class="fa fa-exclamation-circle"></i> exclamation-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="exclamation-triangle"><i class="fa fa-exclamation-triangle"></i> exclamation-triangle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="external-link"><i class="fa fa-external-link"></i> external-link</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="external-link-square"><i class="fa fa-external-link-square"></i> external-link-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="eye"><i class="fa fa-eye"></i> eye</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="eye-slash"><i class="fa fa-eye-slash"></i> eye-slash</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="eyedropper"><i class="fa fa-eyedropper"></i> eyedropper</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fax"><i class="fa fa-fax"></i> fax</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rss"><i class="fa fa-feed"></i> feed <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="female"><i class="fa fa-female"></i> female</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fighter-jet"><i class="fa fa-fighter-jet"></i> fighter-jet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-archive-o"><i class="fa fa-file-archive-o"></i> file-archive-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-audio-o"><i class="fa fa-file-audio-o"></i> file-audio-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-code-o"><i class="fa fa-file-code-o"></i> file-code-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-excel-o"><i class="fa fa-file-excel-o"></i> file-excel-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-image-o"><i class="fa fa-file-image-o"></i> file-image-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-video-o"><i class="fa fa-file-movie-o"></i> file-movie-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-pdf-o"><i class="fa fa-file-pdf-o"></i> file-pdf-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-image-o"><i class="fa fa-file-photo-o"></i> file-photo-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-image-o"><i class="fa fa-file-picture-o"></i> file-picture-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-powerpoint-o"><i class="fa fa-file-powerpoint-o"></i> file-powerpoint-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-audio-o"><i class="fa fa-file-sound-o"></i> file-sound-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-video-o"><i class="fa fa-file-video-o"></i> file-video-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-word-o"><i class="fa fa-file-word-o"></i> file-word-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-archive-o"><i class="fa fa-file-zip-o"></i> file-zip-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="film"><i class="fa fa-film"></i> film</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="filter"><i class="fa fa-filter"></i> filter</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fire"><i class="fa fa-fire"></i> fire</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fire-extinguisher"><i class="fa fa-fire-extinguisher"></i> fire-extinguisher</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="flag"><i class="fa fa-flag"></i> flag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="flag-checkered"><i class="fa fa-flag-checkered"></i> flag-checkered</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="flag-o"><i class="fa fa-flag-o"></i> flag-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bolt"><i class="fa fa-flash"></i> flash <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="flask"><i class="fa fa-flask"></i> flask</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="folder"><i class="fa fa-folder"></i> folder</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="folder-o"><i class="fa fa-folder-o"></i> folder-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="folder-open"><i class="fa fa-folder-open"></i> folder-open</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="folder-open-o"><i class="fa fa-folder-open-o"></i> folder-open-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="frown-o"><i class="fa fa-frown-o"></i> frown-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="futbol-o"><i class="fa fa-futbol-o"></i> futbol-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gamepad"><i class="fa fa-gamepad"></i> gamepad</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gavel"><i class="fa fa-gavel"></i> gavel</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cog"><i class="fa fa-gear"></i> gear <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cogs"><i class="fa fa-gears"></i> gears <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gift"><i class="fa fa-gift"></i> gift</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="glass"><i class="fa fa-glass"></i> glass</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="globe"><i class="fa fa-globe"></i> globe</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="graduation-cap"><i class="fa fa-graduation-cap"></i> graduation-cap</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="users"><i class="fa fa-group"></i> group <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-rock-o"><i class="fa fa-hand-grab-o"></i> hand-grab-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-lizard-o"><i class="fa fa-hand-lizard-o"></i> hand-lizard-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-paper-o"><i class="fa fa-hand-paper-o"></i> hand-paper-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-peace-o"><i class="fa fa-hand-peace-o"></i> hand-peace-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-pointer-o"><i class="fa fa-hand-pointer-o"></i> hand-pointer-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-rock-o"><i class="fa fa-hand-rock-o"></i> hand-rock-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-scissors-o"><i class="fa fa-hand-scissors-o"></i> hand-scissors-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-spock-o"><i class="fa fa-hand-spock-o"></i> hand-spock-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-paper-o"><i class="fa fa-hand-stop-o"></i> hand-stop-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hashtag"><i class="fa fa-hashtag"></i> hashtag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hdd-o"><i class="fa fa-hdd-o"></i> hdd-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="headphones"><i class="fa fa-headphones"></i> headphones</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="heart"><i class="fa fa-heart"></i> heart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="heart-o"><i class="fa fa-heart-o"></i> heart-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="heartbeat"><i class="fa fa-heartbeat"></i> heartbeat</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="history"><i class="fa fa-history"></i> history</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="home"><i class="fa fa-home"></i> home</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bed"><i class="fa fa-hotel"></i> hotel <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hourglass"><i class="fa fa-hourglass"></i> hourglass</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hourglass-start"><i class="fa fa-hourglass-1"></i> hourglass-1 <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hourglass-half"><i class="fa fa-hourglass-2"></i> hourglass-2 <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hourglass-end"><i class="fa fa-hourglass-3"></i> hourglass-3 <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hourglass-end"><i class="fa fa-hourglass-end"></i> hourglass-end</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hourglass-half"><i class="fa fa-hourglass-half"></i> hourglass-half</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hourglass-o"><i class="fa fa-hourglass-o"></i> hourglass-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hourglass-start"><i class="fa fa-hourglass-start"></i> hourglass-start</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="i-cursor"><i class="fa fa-i-cursor"></i> i-cursor</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="picture-o"><i class="fa fa-image"></i> image <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="inbox"><i class="fa fa-inbox"></i> inbox</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="industry"><i class="fa fa-industry"></i> industry</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="info"><i class="fa fa-info"></i> info</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="info-circle"><i class="fa fa-info-circle"></i> info-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="university"><i class="fa fa-institution"></i> institution <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="key"><i class="fa fa-key"></i> key</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="keyboard-o"><i class="fa fa-keyboard-o"></i> keyboard-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="language"><i class="fa fa-language"></i> language</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="laptop"><i class="fa fa-laptop"></i> laptop</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="leaf"><i class="fa fa-leaf"></i> leaf</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gavel"><i class="fa fa-legal"></i> legal <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="lemon-o"><i class="fa fa-lemon-o"></i> lemon-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="level-down"><i class="fa fa-level-down"></i> level-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="level-up"><i class="fa fa-level-up"></i> level-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="life-ring"><i class="fa fa-life-bouy"></i> life-bouy <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="life-ring"><i class="fa fa-life-buoy"></i> life-buoy <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="life-ring"><i class="fa fa-life-ring"></i> life-ring</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="life-ring"><i class="fa fa-life-saver"></i> life-saver <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="lightbulb-o"><i class="fa fa-lightbulb-o"></i> lightbulb-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="line-chart"><i class="fa fa-line-chart"></i> line-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="location-arrow"><i class="fa fa-location-arrow"></i> location-arrow</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="lock"><i class="fa fa-lock"></i> lock</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="magic"><i class="fa fa-magic"></i> magic</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="magnet"><i class="fa fa-magnet"></i> magnet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="share"><i class="fa fa-mail-forward"></i> mail-forward <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="reply"><i class="fa fa-mail-reply"></i> mail-reply <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="reply-all"><i class="fa fa-mail-reply-all"></i> mail-reply-all <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="male"><i class="fa fa-male"></i> male</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="map"><i class="fa fa-map"></i> map</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="map-marker"><i class="fa fa-map-marker"></i> map-marker</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="map-o"><i class="fa fa-map-o"></i> map-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="map-pin"><i class="fa fa-map-pin"></i> map-pin</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="map-signs"><i class="fa fa-map-signs"></i> map-signs</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="meh-o"><i class="fa fa-meh-o"></i> meh-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="microphone"><i class="fa fa-microphone"></i> microphone</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="microphone-slash"><i class="fa fa-microphone-slash"></i> microphone-slash</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="minus"><i class="fa fa-minus"></i> minus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="minus-circle"><i class="fa fa-minus-circle"></i> minus-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="minus-square"><i class="fa fa-minus-square"></i> minus-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="minus-square-o"><i class="fa fa-minus-square-o"></i> minus-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mobile"><i class="fa fa-mobile"></i> mobile</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mobile"><i class="fa fa-mobile-phone"></i> mobile-phone <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="money"><i class="fa fa-money"></i> money</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="moon-o"><i class="fa fa-moon-o"></i> moon-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="graduation-cap"><i class="fa fa-mortar-board"></i> mortar-board <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="motorcycle"><i class="fa fa-motorcycle"></i> motorcycle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mouse-pointer"><i class="fa fa-mouse-pointer"></i> mouse-pointer</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="music"><i class="fa fa-music"></i> music</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bars"><i class="fa fa-navicon"></i> navicon <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="newspaper-o"><i class="fa fa-newspaper-o"></i> newspaper-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="object-group"><i class="fa fa-object-group"></i> object-group</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="object-ungroup"><i class="fa fa-object-ungroup"></i> object-ungroup</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paint-brush"><i class="fa fa-paint-brush"></i> paint-brush</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paper-plane"><i class="fa fa-paper-plane"></i> paper-plane</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paper-plane-o"><i class="fa fa-paper-plane-o"></i> paper-plane-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paw"><i class="fa fa-paw"></i> paw</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pencil"><i class="fa fa-pencil"></i> pencil</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pencil-square"><i class="fa fa-pencil-square"></i> pencil-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pencil-square-o"><i class="fa fa-pencil-square-o"></i> pencil-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="percent"><i class="fa fa-percent"></i> percent</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="phone"><i class="fa fa-phone"></i> phone</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="phone-square"><i class="fa fa-phone-square"></i> phone-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="picture-o"><i class="fa fa-photo"></i> photo <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="picture-o"><i class="fa fa-picture-o"></i> picture-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pie-chart"><i class="fa fa-pie-chart"></i> pie-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plane"><i class="fa fa-plane"></i> plane</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plug"><i class="fa fa-plug"></i> plug</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plus"><i class="fa fa-plus"></i> plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plus-circle"><i class="fa fa-plus-circle"></i> plus-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plus-square"><i class="fa fa-plus-square"></i> plus-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plus-square-o"><i class="fa fa-plus-square-o"></i> plus-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="power-off"><i class="fa fa-power-off"></i> power-off</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="print"><i class="fa fa-print"></i> print</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="puzzle-piece"><i class="fa fa-puzzle-piece"></i> puzzle-piece</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="qrcode"><i class="fa fa-qrcode"></i> qrcode</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="question"><i class="fa fa-question"></i> question</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="question-circle"><i class="fa fa-question-circle"></i> question-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="quote-left"><i class="fa fa-quote-left"></i> quote-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="quote-right"><i class="fa fa-quote-right"></i> quote-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="random"><i class="fa fa-random"></i> random</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="recycle"><i class="fa fa-recycle"></i> recycle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="refresh"><i class="fa fa-refresh"></i> refresh</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="registered"><i class="fa fa-registered"></i> registered</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="times"><i class="fa fa-remove"></i> remove <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bars"><i class="fa fa-reorder"></i> reorder <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="reply"><i class="fa fa-reply"></i> reply</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="reply-all"><i class="fa fa-reply-all"></i> reply-all</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="retweet"><i class="fa fa-retweet"></i> retweet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="road"><i class="fa fa-road"></i> road</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rocket"><i class="fa fa-rocket"></i> rocket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rss"><i class="fa fa-rss"></i> rss</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rss-square"><i class="fa fa-rss-square"></i> rss-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="search"><i class="fa fa-search"></i> search</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="search-minus"><i class="fa fa-search-minus"></i> search-minus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="search-plus"><i class="fa fa-search-plus"></i> search-plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paper-plane"><i class="fa fa-send"></i> send <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paper-plane-o"><i class="fa fa-send-o"></i> send-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="server"><i class="fa fa-server"></i> server</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="share"><i class="fa fa-share"></i> share</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="share-alt"><i class="fa fa-share-alt"></i> share-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="share-alt-square"><i class="fa fa-share-alt-square"></i> share-alt-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="share-square"><i class="fa fa-share-square"></i> share-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="share-square-o"><i class="fa fa-share-square-o"></i> share-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="shield"><i class="fa fa-shield"></i> shield</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ship"><i class="fa fa-ship"></i> ship</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="shopping-bag"><i class="fa fa-shopping-bag"></i> shopping-bag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="shopping-basket"><i class="fa fa-shopping-basket"></i> shopping-basket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="shopping-cart"><i class="fa fa-shopping-cart"></i> shopping-cart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sign-in"><i class="fa fa-sign-in"></i> sign-in</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sign-out"><i class="fa fa-sign-out"></i> sign-out</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="signal"><i class="fa fa-signal"></i> signal</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sitemap"><i class="fa fa-sitemap"></i> sitemap</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sliders"><i class="fa fa-sliders"></i> sliders</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="smile-o"><i class="fa fa-smile-o"></i> smile-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="futbol-o"><i class="fa fa-soccer-ball-o"></i> soccer-ball-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort"><i class="fa fa-sort"></i> sort</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-alpha-asc"><i class="fa fa-sort-alpha-asc"></i> sort-alpha-asc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-alpha-desc"><i class="fa fa-sort-alpha-desc"></i> sort-alpha-desc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-amount-asc"><i class="fa fa-sort-amount-asc"></i> sort-amount-asc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-amount-desc"><i class="fa fa-sort-amount-desc"></i> sort-amount-desc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-asc"><i class="fa fa-sort-asc"></i> sort-asc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-desc"><i class="fa fa-sort-desc"></i> sort-desc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-desc"><i class="fa fa-sort-down"></i> sort-down <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-numeric-asc"><i class="fa fa-sort-numeric-asc"></i> sort-numeric-asc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-numeric-desc"><i class="fa fa-sort-numeric-desc"></i> sort-numeric-desc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort-asc"><i class="fa fa-sort-up"></i> sort-up <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="space-shuttle"><i class="fa fa-space-shuttle"></i> space-shuttle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="spinner"><i class="fa fa-spinner"></i> spinner</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="spoon"><i class="fa fa-spoon"></i> spoon</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="square"><i class="fa fa-square"></i> square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="square-o"><i class="fa fa-square-o"></i> square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="star"><i class="fa fa-star"></i> star</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="star-half"><i class="fa fa-star-half"></i> star-half</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="star-half-o"><i class="fa fa-star-half-empty"></i> star-half-empty <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="star-half-o"><i class="fa fa-star-half-full"></i> star-half-full <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="star-half-o"><i class="fa fa-star-half-o"></i> star-half-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="star-o"><i class="fa fa-star-o"></i> star-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sticky-note"><i class="fa fa-sticky-note"></i> sticky-note</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sticky-note-o"><i class="fa fa-sticky-note-o"></i> sticky-note-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="street-view"><i class="fa fa-street-view"></i> street-view</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="suitcase"><i class="fa fa-suitcase"></i> suitcase</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sun-o"><i class="fa fa-sun-o"></i> sun-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="life-ring"><i class="fa fa-support"></i> support <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tablet"><i class="fa fa-tablet"></i> tablet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tachometer"><i class="fa fa-tachometer"></i> tachometer</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tag"><i class="fa fa-tag"></i> tag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tags"><i class="fa fa-tags"></i> tags</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tasks"><i class="fa fa-tasks"></i> tasks</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="taxi"><i class="fa fa-taxi"></i> taxi</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="television"><i class="fa fa-television"></i> television</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="terminal"><i class="fa fa-terminal"></i> terminal</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumb-tack"><i class="fa fa-thumb-tack"></i> thumb-tack</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumbs-down"><i class="fa fa-thumbs-down"></i> thumbs-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumbs-o-down"><i class="fa fa-thumbs-o-down"></i> thumbs-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumbs-o-up"><i class="fa fa-thumbs-o-up"></i> thumbs-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumbs-up"><i class="fa fa-thumbs-up"></i> thumbs-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ticket"><i class="fa fa-ticket"></i> ticket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="times"><i class="fa fa-times"></i> times</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="times-circle"><i class="fa fa-times-circle"></i> times-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="times-circle-o"><i class="fa fa-times-circle-o"></i> times-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tint"><i class="fa fa-tint"></i> tint</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-down"><i class="fa fa-toggle-down"></i> toggle-down <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-left"><i class="fa fa-toggle-left"></i> toggle-left <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="toggle-off"><i class="fa fa-toggle-off"></i> toggle-off</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="toggle-on"><i class="fa fa-toggle-on"></i> toggle-on</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-right"><i class="fa fa-toggle-right"></i> toggle-right <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-up"><i class="fa fa-toggle-up"></i> toggle-up <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="trademark"><i class="fa fa-trademark"></i> trademark</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="trash"><i class="fa fa-trash"></i> trash</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="trash-o"><i class="fa fa-trash-o"></i> trash-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tree"><i class="fa fa-tree"></i> tree</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="trophy"><i class="fa fa-trophy"></i> trophy</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="truck"><i class="fa fa-truck"></i> truck</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tty"><i class="fa fa-tty"></i> tty</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="television"><i class="fa fa-tv"></i> tv <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="umbrella"><i class="fa fa-umbrella"></i> umbrella</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="university"><i class="fa fa-university"></i> university</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="unlock"><i class="fa fa-unlock"></i> unlock</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="unlock-alt"><i class="fa fa-unlock-alt"></i> unlock-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sort"><i class="fa fa-unsorted"></i> unsorted <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="upload"><i class="fa fa-upload"></i> upload</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="user"><i class="fa fa-user"></i> user</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="user-plus"><i class="fa fa-user-plus"></i> user-plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="user-secret"><i class="fa fa-user-secret"></i> user-secret</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="user-times"><i class="fa fa-user-times"></i> user-times</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="users"><i class="fa fa-users"></i> users</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="video-camera"><i class="fa fa-video-camera"></i> video-camera</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="volume-down"><i class="fa fa-volume-down"></i> volume-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="volume-off"><i class="fa fa-volume-off"></i> volume-off</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="volume-up"><i class="fa fa-volume-up"></i> volume-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="exclamation-triangle"><i class="fa fa-warning"></i> warning <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="wheelchair"><i class="fa fa-wheelchair"></i> wheelchair</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="wifi"><i class="fa fa-wifi"></i> wifi</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="wrench"><i class="fa fa-wrench"></i> wrench</a></div>

            </div>

        </section>

        <section id="hand">
            <h2 class="page-header">Hand Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-rock-o"><i class="fa fa-hand-grab-o"></i> hand-grab-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-lizard-o"><i class="fa fa-hand-lizard-o"></i> hand-lizard-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-o-down"><i class="fa fa-hand-o-down"></i> hand-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-o-left"><i class="fa fa-hand-o-left"></i> hand-o-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-o-right"><i class="fa fa-hand-o-right"></i> hand-o-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-o-up"><i class="fa fa-hand-o-up"></i> hand-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-paper-o"><i class="fa fa-hand-paper-o"></i> hand-paper-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-peace-o"><i class="fa fa-hand-peace-o"></i> hand-peace-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-pointer-o"><i class="fa fa-hand-pointer-o"></i> hand-pointer-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-rock-o"><i class="fa fa-hand-rock-o"></i> hand-rock-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-scissors-o"><i class="fa fa-hand-scissors-o"></i> hand-scissors-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-spock-o"><i class="fa fa-hand-spock-o"></i> hand-spock-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-paper-o"><i class="fa fa-hand-stop-o"></i> hand-stop-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumbs-down"><i class="fa fa-thumbs-down"></i> thumbs-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumbs-o-down"><i class="fa fa-thumbs-o-down"></i> thumbs-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumbs-o-up"><i class="fa fa-thumbs-o-up"></i> thumbs-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="thumbs-up"><i class="fa fa-thumbs-up"></i> thumbs-up</a></div>

            </div>

        </section>

        <section id="transportation">
            <h2 class="page-header">Transportation Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ambulance"><i class="fa fa-ambulance"></i> ambulance</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="car"><i class="fa fa-automobile"></i> automobile <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bicycle"><i class="fa fa-bicycle"></i> bicycle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bus"><i class="fa fa-bus"></i> bus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="taxi"><i class="fa fa-cab"></i> cab <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="car"><i class="fa fa-car"></i> car</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fighter-jet"><i class="fa fa-fighter-jet"></i> fighter-jet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="motorcycle"><i class="fa fa-motorcycle"></i> motorcycle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plane"><i class="fa fa-plane"></i> plane</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rocket"><i class="fa fa-rocket"></i> rocket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ship"><i class="fa fa-ship"></i> ship</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="space-shuttle"><i class="fa fa-space-shuttle"></i> space-shuttle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="subway"><i class="fa fa-subway"></i> subway</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="taxi"><i class="fa fa-taxi"></i> taxi</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="train"><i class="fa fa-train"></i> train</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="truck"><i class="fa fa-truck"></i> truck</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="wheelchair"><i class="fa fa-wheelchair"></i> wheelchair</a></div>

            </div>

        </section>

        <section id="gender">
            <h2 class="page-header">Gender Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="genderless"><i class="fa fa-genderless"></i> genderless</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="transgender"><i class="fa fa-intersex"></i> intersex <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mars"><i class="fa fa-mars"></i> mars</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mars-double"><i class="fa fa-mars-double"></i> mars-double</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mars-stroke"><i class="fa fa-mars-stroke"></i> mars-stroke</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mars-stroke-h"><i class="fa fa-mars-stroke-h"></i> mars-stroke-h</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mars-stroke-v"><i class="fa fa-mars-stroke-v"></i> mars-stroke-v</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mercury"><i class="fa fa-mercury"></i> mercury</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="neuter"><i class="fa fa-neuter"></i> neuter</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="transgender"><i class="fa fa-transgender"></i> transgender</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="transgender-alt"><i class="fa fa-transgender-alt"></i> transgender-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="venus"><i class="fa fa-venus"></i> venus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="venus-double"><i class="fa fa-venus-double"></i> venus-double</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="venus-mars"><i class="fa fa-venus-mars"></i> venus-mars</a></div>

            </div>

        </section>

        <section id="file-type">
            <h2 class="page-header">File Type Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file"><i class="fa fa-file"></i> file</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-archive-o"><i class="fa fa-file-archive-o"></i> file-archive-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-audio-o"><i class="fa fa-file-audio-o"></i> file-audio-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-code-o"><i class="fa fa-file-code-o"></i> file-code-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-excel-o"><i class="fa fa-file-excel-o"></i> file-excel-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-image-o"><i class="fa fa-file-image-o"></i> file-image-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-video-o"><i class="fa fa-file-movie-o"></i> file-movie-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-o"><i class="fa fa-file-o"></i> file-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-pdf-o"><i class="fa fa-file-pdf-o"></i> file-pdf-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-image-o"><i class="fa fa-file-photo-o"></i> file-photo-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-image-o"><i class="fa fa-file-picture-o"></i> file-picture-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-powerpoint-o"><i class="fa fa-file-powerpoint-o"></i> file-powerpoint-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-audio-o"><i class="fa fa-file-sound-o"></i> file-sound-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-text"><i class="fa fa-file-text"></i> file-text</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-text-o"><i class="fa fa-file-text-o"></i> file-text-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-video-o"><i class="fa fa-file-video-o"></i> file-video-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-word-o"><i class="fa fa-file-word-o"></i> file-word-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-archive-o"><i class="fa fa-file-zip-o"></i> file-zip-o <span class="text-muted">(alias)</span></a></div>

            </div>

        </section>

        <section id="spinner">
            <h2 class="page-header">Spinner Icons</h2>

            <div class="alert alert-success">
                <ul class="fa-ul">
                    <li>
                        <i class="fa fa-info-circle fa-lg fa-li"></i>
                        These icons work great with the <code>fa-spin</code> class. Check out the
                        <a href="../examples/#animated" class="alert-link">spinning icons example</a>.
                    </li>
                </ul>
            </div>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="circle-o-notch"><i class="fa fa-circle-o-notch"></i> circle-o-notch</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cog"><i class="fa fa-cog"></i> cog</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cog"><i class="fa fa-gear"></i> gear <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="refresh"><i class="fa fa-refresh"></i> refresh</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="spinner"><i class="fa fa-spinner"></i> spinner</a></div>

            </div>
        </section>

        <section id="form-control">
            <h2 class="page-header">Form Control Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="check-square"><i class="fa fa-check-square"></i> check-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="check-square-o"><i class="fa fa-check-square-o"></i> check-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="circle"><i class="fa fa-circle"></i> circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="circle-o"><i class="fa fa-circle-o"></i> circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="dot-circle-o"><i class="fa fa-dot-circle-o"></i> dot-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="minus-square"><i class="fa fa-minus-square"></i> minus-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="minus-square-o"><i class="fa fa-minus-square-o"></i> minus-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plus-square"><i class="fa fa-plus-square"></i> plus-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plus-square-o"><i class="fa fa-plus-square-o"></i> plus-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="square"><i class="fa fa-square"></i> square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="square-o"><i class="fa fa-square-o"></i> square-o</a></div>

            </div>
        </section>

        <section id="payment">
            <h2 class="page-header">Payment Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-amex"><i class="fa fa-cc-amex"></i> cc-amex</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-diners-club"><i class="fa fa-cc-diners-club"></i> cc-diners-club</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-discover"><i class="fa fa-cc-discover"></i> cc-discover</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-jcb"><i class="fa fa-cc-jcb"></i> cc-jcb</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-mastercard"><i class="fa fa-cc-mastercard"></i> cc-mastercard</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-paypal"><i class="fa fa-cc-paypal"></i> cc-paypal</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-stripe"><i class="fa fa-cc-stripe"></i> cc-stripe</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-visa"><i class="fa fa-cc-visa"></i> cc-visa</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="credit-card"><i class="fa fa-credit-card"></i> credit-card</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="credit-card-alt"><i class="fa fa-credit-card-alt"></i> credit-card-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="google-wallet"><i class="fa fa-google-wallet"></i> google-wallet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paypal"><i class="fa fa-paypal"></i> paypal</a></div>

            </div>

        </section>

        <section id="chart">
            <h2 class="page-header">Chart Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="area-chart"><i class="fa fa-area-chart"></i> area-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bar-chart"><i class="fa fa-bar-chart"></i> bar-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bar-chart"><i class="fa fa-bar-chart-o"></i> bar-chart-o <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="line-chart"><i class="fa fa-line-chart"></i> line-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pie-chart"><i class="fa fa-pie-chart"></i> pie-chart</a></div>

            </div>

        </section>

        <section id="currency">
            <h2 class="page-header">Currency Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="btc"><i class="fa fa-bitcoin"></i> bitcoin <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="btc"><i class="fa fa-btc"></i> btc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="jpy"><i class="fa fa-cny"></i> cny <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="usd"><i class="fa fa-dollar"></i> dollar <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="eur"><i class="fa fa-eur"></i> eur</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="eur"><i class="fa fa-euro"></i> euro <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gbp"><i class="fa fa-gbp"></i> gbp</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gg"><i class="fa fa-gg"></i> gg</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gg-circle"><i class="fa fa-gg-circle"></i> gg-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ils"><i class="fa fa-ils"></i> ils</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="inr"><i class="fa fa-inr"></i> inr</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="jpy"><i class="fa fa-jpy"></i> jpy</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="krw"><i class="fa fa-krw"></i> krw</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="money"><i class="fa fa-money"></i> money</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="jpy"><i class="fa fa-rmb"></i> rmb <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rub"><i class="fa fa-rouble"></i> rouble <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rub"><i class="fa fa-rub"></i> rub</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rub"><i class="fa fa-ruble"></i> ruble <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="inr"><i class="fa fa-rupee"></i> rupee <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ils"><i class="fa fa-shekel"></i> shekel <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ils"><i class="fa fa-sheqel"></i> sheqel <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="try"><i class="fa fa-try"></i> try</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="try"><i class="fa fa-turkish-lira"></i> turkish-lira <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="usd"><i class="fa fa-usd"></i> usd</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="krw"><i class="fa fa-won"></i> won <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="jpy"><i class="fa fa-yen"></i> yen <span class="text-muted">(alias)</span></a></div>

            </div>

        </section>

        <section id="text-editor">
            <h2 class="page-header">Text Editor Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="align-center"><i class="fa fa-align-center"></i> align-center</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="align-justify"><i class="fa fa-align-justify"></i> align-justify</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="align-left"><i class="fa fa-align-left"></i> align-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="align-right"><i class="fa fa-align-right"></i> align-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bold"><i class="fa fa-bold"></i> bold</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="link"><i class="fa fa-chain"></i> chain <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chain-broken"><i class="fa fa-chain-broken"></i> chain-broken</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="clipboard"><i class="fa fa-clipboard"></i> clipboard</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="columns"><i class="fa fa-columns"></i> columns</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="files-o"><i class="fa fa-copy"></i> copy <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="scissors"><i class="fa fa-cut"></i> cut <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="outdent"><i class="fa fa-dedent"></i> dedent <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="eraser"><i class="fa fa-eraser"></i> eraser</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file"><i class="fa fa-file"></i> file</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-o"><i class="fa fa-file-o"></i> file-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-text"><i class="fa fa-file-text"></i> file-text</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="file-text-o"><i class="fa fa-file-text-o"></i> file-text-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="files-o"><i class="fa fa-files-o"></i> files-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="floppy-o"><i class="fa fa-floppy-o"></i> floppy-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="font"><i class="fa fa-font"></i> font</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="header"><i class="fa fa-header"></i> header</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="indent"><i class="fa fa-indent"></i> indent</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="italic"><i class="fa fa-italic"></i> italic</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="link"><i class="fa fa-link"></i> link</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="list"><i class="fa fa-list"></i> list</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="list-alt"><i class="fa fa-list-alt"></i> list-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="list-ol"><i class="fa fa-list-ol"></i> list-ol</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="list-ul"><i class="fa fa-list-ul"></i> list-ul</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="outdent"><i class="fa fa-outdent"></i> outdent</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paperclip"><i class="fa fa-paperclip"></i> paperclip</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paragraph"><i class="fa fa-paragraph"></i> paragraph</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="clipboard"><i class="fa fa-paste"></i> paste <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="repeat"><i class="fa fa-repeat"></i> repeat</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="undo"><i class="fa fa-rotate-left"></i> rotate-left <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="repeat"><i class="fa fa-rotate-right"></i> rotate-right <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="floppy-o"><i class="fa fa-save"></i> save <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="scissors"><i class="fa fa-scissors"></i> scissors</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="strikethrough"><i class="fa fa-strikethrough"></i> strikethrough</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="subscript"><i class="fa fa-subscript"></i> subscript</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="superscript"><i class="fa fa-superscript"></i> superscript</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="table"><i class="fa fa-table"></i> table</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="text-height"><i class="fa fa-text-height"></i> text-height</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="text-width"><i class="fa fa-text-width"></i> text-width</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="th"><i class="fa fa-th"></i> th</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="th-large"><i class="fa fa-th-large"></i> th-large</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="th-list"><i class="fa fa-th-list"></i> th-list</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="underline"><i class="fa fa-underline"></i> underline</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="undo"><i class="fa fa-undo"></i> undo</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chain-broken"><i class="fa fa-unlink"></i> unlink <span class="text-muted">(alias)</span></a></div>

            </div>

        </section>

        <section id="directional">
            <h2 class="page-header">Directional Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angle-double-down"><i class="fa fa-angle-double-down"></i> angle-double-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angle-double-left"><i class="fa fa-angle-double-left"></i> angle-double-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angle-double-right"><i class="fa fa-angle-double-right"></i> angle-double-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angle-double-up"><i class="fa fa-angle-double-up"></i> angle-double-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angle-down"><i class="fa fa-angle-down"></i> angle-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angle-left"><i class="fa fa-angle-left"></i> angle-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angle-right"><i class="fa fa-angle-right"></i> angle-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angle-up"><i class="fa fa-angle-up"></i> angle-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-circle-down"><i class="fa fa-arrow-circle-down"></i> arrow-circle-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-circle-left"><i class="fa fa-arrow-circle-left"></i> arrow-circle-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-circle-o-down"><i class="fa fa-arrow-circle-o-down"></i> arrow-circle-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-circle-o-left"><i class="fa fa-arrow-circle-o-left"></i> arrow-circle-o-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-circle-o-right"><i class="fa fa-arrow-circle-o-right"></i> arrow-circle-o-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-circle-o-up"><i class="fa fa-arrow-circle-o-up"></i> arrow-circle-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-circle-right"><i class="fa fa-arrow-circle-right"></i> arrow-circle-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-circle-up"><i class="fa fa-arrow-circle-up"></i> arrow-circle-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-down"><i class="fa fa-arrow-down"></i> arrow-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-left"><i class="fa fa-arrow-left"></i> arrow-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-right"><i class="fa fa-arrow-right"></i> arrow-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrow-up"><i class="fa fa-arrow-up"></i> arrow-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrows"><i class="fa fa-arrows"></i> arrows</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrows-alt"><i class="fa fa-arrows-alt"></i> arrows-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrows-h"><i class="fa fa-arrows-h"></i> arrows-h</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrows-v"><i class="fa fa-arrows-v"></i> arrows-v</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-down"><i class="fa fa-caret-down"></i> caret-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-left"><i class="fa fa-caret-left"></i> caret-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-right"><i class="fa fa-caret-right"></i> caret-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-down"><i class="fa fa-caret-square-o-down"></i> caret-square-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-left"><i class="fa fa-caret-square-o-left"></i> caret-square-o-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-right"><i class="fa fa-caret-square-o-right"></i> caret-square-o-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-up"><i class="fa fa-caret-square-o-up"></i> caret-square-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-up"><i class="fa fa-caret-up"></i> caret-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chevron-circle-down"><i class="fa fa-chevron-circle-down"></i> chevron-circle-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chevron-circle-left"><i class="fa fa-chevron-circle-left"></i> chevron-circle-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chevron-circle-right"><i class="fa fa-chevron-circle-right"></i> chevron-circle-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chevron-circle-up"><i class="fa fa-chevron-circle-up"></i> chevron-circle-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chevron-down"><i class="fa fa-chevron-down"></i> chevron-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chevron-left"><i class="fa fa-chevron-left"></i> chevron-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chevron-right"><i class="fa fa-chevron-right"></i> chevron-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chevron-up"><i class="fa fa-chevron-up"></i> chevron-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="exchange"><i class="fa fa-exchange"></i> exchange</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-o-down"><i class="fa fa-hand-o-down"></i> hand-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-o-left"><i class="fa fa-hand-o-left"></i> hand-o-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-o-right"><i class="fa fa-hand-o-right"></i> hand-o-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hand-o-up"><i class="fa fa-hand-o-up"></i> hand-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="long-arrow-down"><i class="fa fa-long-arrow-down"></i> long-arrow-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="long-arrow-left"><i class="fa fa-long-arrow-left"></i> long-arrow-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="long-arrow-right"><i class="fa fa-long-arrow-right"></i> long-arrow-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="long-arrow-up"><i class="fa fa-long-arrow-up"></i> long-arrow-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-down"><i class="fa fa-toggle-down"></i> toggle-down <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-left"><i class="fa fa-toggle-left"></i> toggle-left <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-right"><i class="fa fa-toggle-right"></i> toggle-right <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="caret-square-o-up"><i class="fa fa-toggle-up"></i> toggle-up <span class="text-muted">(alias)</span></a></div>

            </div>

        </section>

        <section id="video-player">
            <h2 class="page-header">Video Player Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="arrows-alt"><i class="fa fa-arrows-alt"></i> arrows-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="backward"><i class="fa fa-backward"></i> backward</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="compress"><i class="fa fa-compress"></i> compress</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="eject"><i class="fa fa-eject"></i> eject</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="expand"><i class="fa fa-expand"></i> expand</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fast-backward"><i class="fa fa-fast-backward"></i> fast-backward</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fast-forward"><i class="fa fa-fast-forward"></i> fast-forward</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="forward"><i class="fa fa-forward"></i> forward</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pause"><i class="fa fa-pause"></i> pause</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pause-circle"><i class="fa fa-pause-circle"></i> pause-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pause-circle-o"><i class="fa fa-pause-circle-o"></i> pause-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="play"><i class="fa fa-play"></i> play</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="play-circle"><i class="fa fa-play-circle"></i> play-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="play-circle-o"><i class="fa fa-play-circle-o"></i> play-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="random"><i class="fa fa-random"></i> random</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="step-backward"><i class="fa fa-step-backward"></i> step-backward</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="step-forward"><i class="fa fa-step-forward"></i> step-forward</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stop"><i class="fa fa-stop"></i> stop</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stop-circle"><i class="fa fa-stop-circle"></i> stop-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stop-circle-o"><i class="fa fa-stop-circle-o"></i> stop-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="youtube-play"><i class="fa fa-youtube-play"></i> youtube-play</a></div>

            </div>

        </section>

        <section id="brand">
            <h2 class="page-header">Brand Icons</h2>

            <div class="alert alert-warning">
                <h4><i class="fa fa-warning"></i> Warning!</h4>
                Apparently, Adblock Plus can remove Font Awesome brand icons with their "Remove Social
                Media Buttons" setting. We will not use hacks to force them to display. Please
                <a href="https://adblockplus.org/en/bugs" class="alert-link">report an issue with Adblock Plus</a> if you believe this to be
                an error. To work around this, you'll need to modify the social icon class names.

            </div>

            <div class="row fontawesome-icon-list margin-bottom-lg">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="500px"><i class="fa fa-500px"></i> 500px</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="adn"><i class="fa fa-adn"></i> adn</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="amazon"><i class="fa fa-amazon"></i> amazon</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="android"><i class="fa fa-android"></i> android</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="angellist"><i class="fa fa-angellist"></i> angellist</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="apple"><i class="fa fa-apple"></i> apple</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="behance"><i class="fa fa-behance"></i> behance</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="behance-square"><i class="fa fa-behance-square"></i> behance-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bitbucket"><i class="fa fa-bitbucket"></i> bitbucket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bitbucket-square"><i class="fa fa-bitbucket-square"></i> bitbucket-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="btc"><i class="fa fa-bitcoin"></i> bitcoin <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="black-tie"><i class="fa fa-black-tie"></i> black-tie</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bluetooth"><i class="fa fa-bluetooth"></i> bluetooth</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="bluetooth-b"><i class="fa fa-bluetooth-b"></i> bluetooth-b</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="btc"><i class="fa fa-btc"></i> btc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="buysellads"><i class="fa fa-buysellads"></i> buysellads</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-amex"><i class="fa fa-cc-amex"></i> cc-amex</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-diners-club"><i class="fa fa-cc-diners-club"></i> cc-diners-club</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-discover"><i class="fa fa-cc-discover"></i> cc-discover</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-jcb"><i class="fa fa-cc-jcb"></i> cc-jcb</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-mastercard"><i class="fa fa-cc-mastercard"></i> cc-mastercard</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-paypal"><i class="fa fa-cc-paypal"></i> cc-paypal</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-stripe"><i class="fa fa-cc-stripe"></i> cc-stripe</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="cc-visa"><i class="fa fa-cc-visa"></i> cc-visa</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="chrome"><i class="fa fa-chrome"></i> chrome</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="codepen"><i class="fa fa-codepen"></i> codepen</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="codiepie"><i class="fa fa-codiepie"></i> codiepie</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="connectdevelop"><i class="fa fa-connectdevelop"></i> connectdevelop</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="contao"><i class="fa fa-contao"></i> contao</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="css3"><i class="fa fa-css3"></i> css3</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="dashcube"><i class="fa fa-dashcube"></i> dashcube</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="delicious"><i class="fa fa-delicious"></i> delicious</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="deviantart"><i class="fa fa-deviantart"></i> deviantart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="digg"><i class="fa fa-digg"></i> digg</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="dribbble"><i class="fa fa-dribbble"></i> dribbble</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="dropbox"><i class="fa fa-dropbox"></i> dropbox</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="drupal"><i class="fa fa-drupal"></i> drupal</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="edge"><i class="fa fa-edge"></i> edge</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="empire"><i class="fa fa-empire"></i> empire</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="expeditedssl"><i class="fa fa-expeditedssl"></i> expeditedssl</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="facebook"><i class="fa fa-facebook"></i> facebook</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="facebook"><i class="fa fa-facebook-f"></i> facebook-f <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="facebook-official"><i class="fa fa-facebook-official"></i> facebook-official</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="facebook-square"><i class="fa fa-facebook-square"></i> facebook-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="firefox"><i class="fa fa-firefox"></i> firefox</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="flickr"><i class="fa fa-flickr"></i> flickr</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fonticons"><i class="fa fa-fonticons"></i> fonticons</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="fort-awesome"><i class="fa fa-fort-awesome"></i> fort-awesome</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="forumbee"><i class="fa fa-forumbee"></i> forumbee</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="foursquare"><i class="fa fa-foursquare"></i> foursquare</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="empire"><i class="fa fa-ge"></i> ge <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="get-pocket"><i class="fa fa-get-pocket"></i> get-pocket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gg"><i class="fa fa-gg"></i> gg</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gg-circle"><i class="fa fa-gg-circle"></i> gg-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="git"><i class="fa fa-git"></i> git</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="git-square"><i class="fa fa-git-square"></i> git-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="github"><i class="fa fa-github"></i> github</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="github-alt"><i class="fa fa-github-alt"></i> github-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="github-square"><i class="fa fa-github-square"></i> github-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gratipay"><i class="fa fa-gittip"></i> gittip <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="google"><i class="fa fa-google"></i> google</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="google-plus"><i class="fa fa-google-plus"></i> google-plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="google-plus-square"><i class="fa fa-google-plus-square"></i> google-plus-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="google-wallet"><i class="fa fa-google-wallet"></i> google-wallet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="gratipay"><i class="fa fa-gratipay"></i> gratipay</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hacker-news"><i class="fa fa-hacker-news"></i> hacker-news</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="houzz"><i class="fa fa-houzz"></i> houzz</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="html5"><i class="fa fa-html5"></i> html5</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="instagram"><i class="fa fa-instagram"></i> instagram</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="internet-explorer"><i class="fa fa-internet-explorer"></i> internet-explorer</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ioxhost"><i class="fa fa-ioxhost"></i> ioxhost</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="joomla"><i class="fa fa-joomla"></i> joomla</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="jsfiddle"><i class="fa fa-jsfiddle"></i> jsfiddle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="lastfm"><i class="fa fa-lastfm"></i> lastfm</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="lastfm-square"><i class="fa fa-lastfm-square"></i> lastfm-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="leanpub"><i class="fa fa-leanpub"></i> leanpub</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="linkedin"><i class="fa fa-linkedin"></i> linkedin</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="linkedin-square"><i class="fa fa-linkedin-square"></i> linkedin-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="linux"><i class="fa fa-linux"></i> linux</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="maxcdn"><i class="fa fa-maxcdn"></i> maxcdn</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="meanpath"><i class="fa fa-meanpath"></i> meanpath</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="medium"><i class="fa fa-medium"></i> medium</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="mixcloud"><i class="fa fa-mixcloud"></i> mixcloud</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="modx"><i class="fa fa-modx"></i> modx</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="odnoklassniki"><i class="fa fa-odnoklassniki"></i> odnoklassniki</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="odnoklassniki-square"><i class="fa fa-odnoklassniki-square"></i> odnoklassniki-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="opencart"><i class="fa fa-opencart"></i> opencart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="openid"><i class="fa fa-openid"></i> openid</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="opera"><i class="fa fa-opera"></i> opera</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="optin-monster"><i class="fa fa-optin-monster"></i> optin-monster</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pagelines"><i class="fa fa-pagelines"></i> pagelines</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="paypal"><i class="fa fa-paypal"></i> paypal</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pied-piper"><i class="fa fa-pied-piper"></i> pied-piper</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pied-piper-alt"><i class="fa fa-pied-piper-alt"></i> pied-piper-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pinterest"><i class="fa fa-pinterest"></i> pinterest</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pinterest-p"><i class="fa fa-pinterest-p"></i> pinterest-p</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="pinterest-square"><i class="fa fa-pinterest-square"></i> pinterest-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="product-hunt"><i class="fa fa-product-hunt"></i> product-hunt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="qq"><i class="fa fa-qq"></i> qq</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rebel"><i class="fa fa-ra"></i> ra <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="rebel"><i class="fa fa-rebel"></i> rebel</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="reddit"><i class="fa fa-reddit"></i> reddit</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="reddit-alien"><i class="fa fa-reddit-alien"></i> reddit-alien</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="reddit-square"><i class="fa fa-reddit-square"></i> reddit-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="renren"><i class="fa fa-renren"></i> renren</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="safari"><i class="fa fa-safari"></i> safari</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="scribd"><i class="fa fa-scribd"></i> scribd</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="sellsy"><i class="fa fa-sellsy"></i> sellsy</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="share-alt"><i class="fa fa-share-alt"></i> share-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="share-alt-square"><i class="fa fa-share-alt-square"></i> share-alt-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="shirtsinbulk"><i class="fa fa-shirtsinbulk"></i> shirtsinbulk</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="simplybuilt"><i class="fa fa-simplybuilt"></i> simplybuilt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="skyatlas"><i class="fa fa-skyatlas"></i> skyatlas</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="skype"><i class="fa fa-skype"></i> skype</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="slack"><i class="fa fa-slack"></i> slack</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="slideshare"><i class="fa fa-slideshare"></i> slideshare</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="soundcloud"><i class="fa fa-soundcloud"></i> soundcloud</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="spotify"><i class="fa fa-spotify"></i> spotify</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stack-exchange"><i class="fa fa-stack-exchange"></i> stack-exchange</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stack-overflow"><i class="fa fa-stack-overflow"></i> stack-overflow</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="steam"><i class="fa fa-steam"></i> steam</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="steam-square"><i class="fa fa-steam-square"></i> steam-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stumbleupon"><i class="fa fa-stumbleupon"></i> stumbleupon</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stumbleupon-circle"><i class="fa fa-stumbleupon-circle"></i> stumbleupon-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tencent-weibo"><i class="fa fa-tencent-weibo"></i> tencent-weibo</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="trello"><i class="fa fa-trello"></i> trello</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tripadvisor"><i class="fa fa-tripadvisor"></i> tripadvisor</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tumblr"><i class="fa fa-tumblr"></i> tumblr</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="tumblr-square"><i class="fa fa-tumblr-square"></i> tumblr-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="twitch"><i class="fa fa-twitch"></i> twitch</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="twitter"><i class="fa fa-twitter"></i> twitter</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="twitter-square"><i class="fa fa-twitter-square"></i> twitter-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="usb"><i class="fa fa-usb"></i> usb</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="viacoin"><i class="fa fa-viacoin"></i> viacoin</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="vimeo"><i class="fa fa-vimeo"></i> vimeo</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="vimeo-square"><i class="fa fa-vimeo-square"></i> vimeo-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="vine"><i class="fa fa-vine"></i> vine</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="vk"><i class="fa fa-vk"></i> vk</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="weixin"><i class="fa fa-wechat"></i> wechat <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="weibo"><i class="fa fa-weibo"></i> weibo</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="weixin"><i class="fa fa-weixin"></i> weixin</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="whatsapp"><i class="fa fa-whatsapp"></i> whatsapp</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="wikipedia-w"><i class="fa fa-wikipedia-w"></i> wikipedia-w</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="windows"><i class="fa fa-windows"></i> windows</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="wordpress"><i class="fa fa-wordpress"></i> wordpress</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="xing"><i class="fa fa-xing"></i> xing</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="xing-square"><i class="fa fa-xing-square"></i> xing-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="y-combinator"><i class="fa fa-y-combinator"></i> y-combinator</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hacker-news"><i class="fa fa-y-combinator-square"></i> y-combinator-square <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="yahoo"><i class="fa fa-yahoo"></i> yahoo</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="y-combinator"><i class="fa fa-yc"></i> yc <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hacker-news"><i class="fa fa-yc-square"></i> yc-square <span class="text-muted">(alias)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="yelp"><i class="fa fa-yelp"></i> yelp</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="youtube"><i class="fa fa-youtube"></i> youtube</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="youtube-play"><i class="fa fa-youtube-play"></i> youtube-play</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="youtube-square"><i class="fa fa-youtube-square"></i> youtube-square</a></div>

            </div>

            <div class="alert alert-success">
                <ul class="margin-bottom-none padding-left-lg">
                    <li>All brand icons are trademarks of their respective owners.</li>
                    <li>The use of these trademarks does not indicate endorsement of the trademark holder by Font Awesome, nor vice versa.</li>
                    <li>Brand icons should only be used to represent the company or product to which they refer.</li>
                </ul>

            </div>
        </section>

        <section id="medical">
            <h2 class="page-header">Medical Icons</h2>

            <div class="row fontawesome-icon-list">



                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="ambulance"><i class="fa fa-ambulance"></i> ambulance</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="h-square"><i class="fa fa-h-square"></i> h-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="heart"><i class="fa fa-heart"></i> heart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="heart-o"><i class="fa fa-heart-o"></i> heart-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="heartbeat"><i class="fa fa-heartbeat"></i> heartbeat</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="hospital-o"><i class="fa fa-hospital-o"></i> hospital-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="medkit"><i class="fa fa-medkit"></i> medkit</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="plus-square"><i class="fa fa-plus-square"></i> plus-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="stethoscope"><i class="fa fa-stethoscope"></i> stethoscope</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="user-md"><i class="fa fa-user-md"></i> user-md</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="#" data-icon="wheelchair"><i class="fa fa-wheelchair"></i> wheelchair</a></div>

            </div>

        </section>

    </div>
@stop