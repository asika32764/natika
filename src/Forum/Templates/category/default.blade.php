{{-- Part of phoenix project. --}}

<?php
use Phoenix\Asset\Asset;
use Phoenix\Script\PhoenixScript;

PhoenixScript::core();
Asset::addScript('js/category.js');
?>

@extends('_global.html')

@if ($currentCategory->id != 1)
    @section('banner_inner')
        <h1 class="category-title">
            <span class="{{ isset($currentCategory->params->image_icon) ? $currentCategory->params->image_icon : 'fa fa-folder-open' }}"></span>
            {{ \Phoenix\Html\Document::getTitle() }}
        </h1>

        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                <li>
                    <a href="{{ $breadcrumb->link }}">
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @endforeach
        </ol>

        @if (\Natika\User\UserHelper::isLogin())
        <a class="tool-button btn btn-default btn-lg pull-right" href="{{ $router->html('topic_new', array('category' => $currentCategory->id)) }}">
            <span class="fa fa-comment"></span>
            Create Topic
        </a>
        @endif
    @stop
@endif

@section('content')

    @if (\Natika\User\UserHelper::isAdmin())
    <script>
        var category = {!! json_encode($currentCategory->dump()) !!};
    </script>
    <div class="container">
        <div class="panel panel-default category-toolbar">
            <div class="panel-body">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#categoryModal" onclick="NatikaCategory.create({{ $currentCategory->id }});">
                    <span class="fa fa-plus"></span>
                    New Category
                </button>

                @if ($currentCategory->id > 1)
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#categoryModal" onclick="NatikaCategory.edit(category);">
                    <span class="fa fa-edit"></span>
                    Edit
                </button>

                <button class="btn btn-default" onclick="if (confirm('Are you sure?'))Phoenix.sendDelete(null, {cid: [{{ $currentCategory->id }}]});">
                    <span class="fa fa-trash"></span>
                    Delete This Category
                </button>
                @endif
            </div>
        </div>

        @include('category.new')
    </div>
    @endif

    <form action="{{ $uri['full'] }}" method="post" id="admin-form">
        {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
        <input type="hidden" name="_method" value="" />
    </form>

    @if ($categories->notNull())
    <div class="container category-list item-list">
        <div class="panel panel-default list-panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">
                    Categories
                </h3>
            </div>

            <ul class="list-group">
                @foreach ($categories as $k => $category)
                    <li class="list-group-item row clearfix">
                        <div class="col-md-7">
                            <div class="circle-icon pull-left" style="background-color: {{ $category->params['bg_color'] }}; color: #fff;">
                                <i class="{{ $category->params['image_icon'] }}"></i>
                            </div>
                            <h2 class="category-title">
                                <a href="{{ $router->html('category', ['path' => $category->path]) }}">
                                    {{ $category->title }}
                                </a>
                            </h2>
                            <span class="text-muted">
                                {{ $category->description }}
                            </span>
                        </div>
                        <div class="col-md-1 hidden-sm hidden-xs text-center">
                            <span class="lead">
                                {{ $category->topics }}
                            </span>
                            <br />
                            <span class="text-muted">
                                TOPICS
                            </span>
                        </div>
                        <div class="col-md-1 hidden-sm hidden-xs text-center">
                            <span class="lead">
                                {{ $category->posts }}
                            </span>
                            <br />
                            <span class="text-muted">
                                POSTS
                            </span>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ $category->last_post->user_params->get('raw_data.html_url', 'javascript:void(0)') }}" target="_blank">
                                <strong>{{ $category->last_post->user_name }}</strong>
                            </a>
                            <span>{{ $helper->date->since($category->last_post->created) }}</span>
                            <br />
                            {{ $category->last_post->topic_title }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    @if ($topics->notNull())
    <div class="container topic-list item-list">
        <div class="panel panel-default list-panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">
                    Topic
                </h3>
            </div>

            <ul class="list-group">
                @foreach ($topics as $k => $topic)
                    <li class="list-group-item row clearfix">
                        <div class="col-md-7">
                            <img class="circle-icon pull-left" src="{{ $topic->user_avatar }}">
                            <h2 class="category-title">
                                <a href="{{ $router->html('topic', ['path' => $currentCategory->path, 'id' => $topic->id]) }}">
                                    {{ $topic->title }}
                                </a>
                            </h2>
                            <span class="text-muted">
                                {{ $helper->date->since($topic->created) }}
                            </span>
                        </div>
                        <div class="col-md-1 hidden-sm hidden-xs text-center">
                            <span class="lead">
                                {{ $topic->replies }}
                            </span>
                            <br />
                            <span class="text-muted">
                                POSTS
                            </span>
                        </div>
                        <div class="col-md-1 hidden-sm hidden-xs text-center">
                            <span class="lead">
                                {{ $topic->hits }}
                            </span>
                            <br />
                            <span class="text-muted">
                                VIEWS
                            </span>
                        </div>
                        <div class="col-md-3">
                            <span">Updated by:</span>
                            <a href="{{ $topic->last_user_params->get('raw_data.html_url', 'javascript:void(0)') }}" target="_blank">
                                <strong>{{ $topic->last_user_name }}</strong>
                            </a>
                            <br />
                            <span class="text-muted">{{ $helper->date->since($topic->last_reply_date) }}</span>
                            {{--<br />--}}
                            {{--{{ $topic->last_post_title }}--}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        {!! $pagination->render(function ($queries) use ($router, $currentCategory)
			{
			    $queries['path'] = $currentCategory->path;

				return $router->html('category', $queries);
			}, 'windwalker.pagination.phoenix') !!}
    </div>
    @endif
@stop
