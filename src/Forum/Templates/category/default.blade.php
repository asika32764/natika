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
        <h1 class="category-page-title">
            <span class="{{ isset($currentCategory->params->image_icon) ? $currentCategory->params->image_icon : 'fa fa-folder-open' }}"></span>
            {{ \Phoenix\Html\HtmlHeader::getTitle() }}
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
        <a class="tool-button btn btn-default btn-lg pull-right create-topic-button" href="{{ $router->html('topic_new', array('category' => $currentCategory->id)) }}">
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
    {{-- TOOLBAR --}}
    <div class="container">
        <div class="panel panel-default category-toolbar">
            <div class="panel-body">
                {{-- NEW CATEGORY --}}
                <button type="button" class="btn btn-default new-category-button" data-toggle="modal" data-target="#categoryModal" onclick="NatikaCategory.create({{ $currentCategory->id }});">
                    <span class="fa fa-plus"></span>
                    New Category
                </button>

                {{-- EDIT --}}
                @if ($currentCategory->id > 1)
                <button type="button" class="btn btn-default edit-category-button" data-toggle="modal" data-target="#categoryModal" onclick="NatikaCategory.edit(category);">
                    <span class="fa fa-edit"></span>
                    Edit
                </button>

                <button class="btn btn-default delete-category-button" onclick="if (confirm('Are you sure?'))Phoenix.sendDelete(null, {cid: [{{ $currentCategory->id }}]});">
                    <span class="fa fa-trash"></span>
                    Delete This Category
                </button>

                    @if ($isWatch)
                        <a class="btn btn-default active pull-right hasTooltip watching-category-button"  title="You are watching this category. Click to stop watching."
                            href="{{ $router->html('notification', ['target_id' => $currentCategory->id, 'type' => 'category', '_method' => 'DELETE', 'return' => base64_encode($uri['full'])]) }}">
                            <span class="fa fa-eye"></span>
                        </a>
                    @else
                        <a class="btn btn-default pull-right hasTooltip unwatching-category-button" title="Click to watch this category"
                            href="{{ $router->html('notification', ['target_id' => $currentCategory->id, 'type' => 'category', '_method' => 'POST', 'return' => base64_encode($uri['full'])]) }}">
                            <span class="fa fa-eye-slash"></span>
                        </a>
                    @endif
                @endif
            </div>
        </div>

        @include('category.new')
    </div>
    @endif

    {{-- FORM --}}
    <form action="{{ $uri['full'] }}" method="post" id="admin-form">
        {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
        <input type="hidden" name="_method" value="" />
    </form>

    {{-- CATEGORIES --}}
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
                        {{-- TITLE & IMAGE --}}
                        <div class="col-md-7 category-intro">
                            {{-- IMAGE & ICON --}}
                            @if ($category->image)
                                <img class="circle-icon pull-left" src="{{ $category->image }}" alt="Image">
                            @else
                            <div class="circle-icon pull-left" style="background-color: {{ $category->params['bg_color'] }}; color: #fff;">
                                <i class="{{ $category->params['image_icon'] }}"></i>
                            </div>
                            @endif

                            {{-- TITLE --}}
                            <h2 class="category-title item-title">
                                <a href="{{ $router->html('category', ['path' => $category->path]) }}">
                                    {{ $category->title }}
                                </a>
                            </h2>

                            {{-- DESCRIPTION --}}
                            <span class="text-muted category-description item-description">
                                {{ $category->description }}
                            </span>
                        </div>

                        {{-- TOPIC --}}
                        <div class="col-md-1 hidden-sm hidden-xs text-center category-topic-count">
                            <span class="lead">
                                {{ $category->topics }}
                            </span>
                            <br />
                            <span class="text-muted">
                                TOPICS
                            </span>
                        </div>

                        {{-- POSTS --}}
                        <div class="col-md-1 hidden-sm hidden-xs text-center category-post-count">
                            <span class="lead">
                                {{ $category->posts }}
                            </span>
                            <br />
                            <span class="text-muted">
                                POSTS
                            </span>
                        </div>

                        {{-- LAST POST --}}
                        <div class="col-md-3 category-last-post">
                            @if ($category->last_post->user_name)
                                <a class="last-post-author" href="{{ $router->html('profile', ['id' => $category->last_post->user_id]) }}">
                                    <strong>{{ $category->last_post->user_name }}</strong>
                                </a>
                            @else
                                <span class="text-muted last-post-author">
                                    Unknown User
                                </span>
                            @endif
                            <span class="last-post-time">{{ $helper->date->since($category->last_post->created) }}</span>
                            <br />
                            <span class="last-post-title">
                                {{ $category->last_post->topic_title }}
                            </span>
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
                        <div class="col-md-7 topic-intro">
                            <img class="circle-icon pull-left topic-image" src="{{ $topic->user_avatar }}">
                            <h2 class="topic-title">
                                <a href="{{ $router->html('topic', ['path' => $currentCategory->path, 'id' => $topic->id]) }}">
                                    {{ $topic->title }}
                                </a>
                            </h2>
                            <span class="text-muted">
                                {{ $helper->date->since($topic->created) }}
                            </span>
                        </div>
                        <div class="col-md-1 hidden-sm hidden-xs text-center topic-post-count">
                            <span class="lead">
                                {{ $topic->replies }}
                            </span>
                            <br />
                            <span class="text-muted">
                                POSTS
                            </span>
                        </div>
                        <div class="col-md-1 hidden-sm hidden-xs text-center topic-view-count">
                            <span class="lead">
                                {{ $topic->hits }}
                            </span>
                            <br />
                            <span class="text-muted">
                                VIEWS
                            </span>
                        </div>
                        <div class="col-md-3 topic-last-post">
                            <span>Updated by:</span>
                            @if ($topic->last_user_name)
                                <a class="last-post-author" href="{{ $router->html('profile', ['id' => $topic->last_reply_user]) }}">
                                    <strong>{{ $topic->last_user_name }}</strong>
                                </a>
                            @else
                                <span class="text-muted last-post-author">
                                    Unknown User
                                </span>
                            @endif
                            <br />
                            <span class="text-muted last-post-time">{{ $helper->date->since($topic->last_reply_date) }}</span>
                            {{--<br />--}}
                            {{--{{ $topic->last_post_title }}--}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="category-topics-pagination">
            {!! $pagination->render(function ($queries) use ($router, $currentCategory)
			{
			    $queries['path'] = $currentCategory->path;

				return $router->html('category', $queries);
			}, 'windwalker.pagination.phoenix') !!}
        </div>
    </div>
    @endif
@stop
