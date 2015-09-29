{{-- Part of phoenix project. --}}

@extends('_global.html')

@section('page_title')
Topic
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>{{ $topic->title }}</h1>
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                <li>
                    <a href="{{ $breadcrumb->link }}">
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</div>

<div class="container topic-item">

    @foreach ($posts as $post)
        <article class="topic-post row clearfix">

            <img class="post-img circle-icon icon-large pull-left" src="{{ $post->user_avatar }}">

            <div class="col-md-11">
                <div class="panel {{ $post->primary ? 'panel-primary' : 'panel-default' }}">
                    <div class="panel-heading clearfix">
                        <div class="pull-left">
                            {{ $post->user_name }}
                        </div>
                        <div class="pull-right">
                            {{ $helper->date->since($post->created) }}
                        </div>
                    </div>
                    <div class="panel-body">
                        {{ $post->body }}
                    </div>
                </div>
            </div>

        </article>
    @endforeach

    {!! $pagination->render(function ($queries) use ($router, $topic)
    {
        $queries['path'] = $topic->category->path;
        $queries['id'] = $topic->id;

        return $router->html('topic', $queries);
    }, 'windwalker.pagination.phoenix') !!}

</div>
@stop
