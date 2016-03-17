{{-- Part of Front project. --}}
<?php
/**
 * Global variables
 * --------------------------------------------------------------
 * @var $app      \Windwalker\Web\Application                 Global Application
 * @var $package  \Lyrasoft\Luna\LunaPackage                  Package object.
 * @var $view     \Windwalker\Data\Data                       Some information of this view.
 * @var $uri      \Windwalker\Registry\Registry               Uri information, example: $uri['media.path']
 * @var $datetime \DateTime                                   PHP DateTime object of current time.
 * @var $helper   \Windwalker\Core\View\Helper\Set\HelperSet  The Windwalker HelperSet object.
 * @var $router   \Windwalker\Core\Router\PackageRouter       Router object.
 *
 * View variables
 * --------------------------------------------------------------
 * @var $item  \Windwalker\Data\Data
 * @var $state \Windwalker\Registry\Registry
 */
?>

@extends('_global.html')

@section('content')
    <style>
        .comment-user-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
        }
    </style>
    <div class="container article-item" style="margin-top: 70px; margin-bottom: 70px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="article-content">
                    {{ $item->body }}
                </div>
            </div>
        </div>
    </div>
@stop
