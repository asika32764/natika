{{-- Part of natika project. --}}

@extends('_global.html')

@section('banner_inner')
    <h1 class="post-edit-title">
        <span class="fa fa-edit"></span>
        {{ \Phoenix\Html\HtmlHeader::getTitle() }} in {{ $topic->title }}
    </h1>
    <button class="tool-button btn btn-default btn-lg pull-right" onclick="$('#admin-form').submit()">
        <span class="fa fa-save"></span>
        Save
    </button>
@stop

@section('content')

    <div class="container post-item post-edit">

        <form action="{{ $router->html('post', array('id' => $item->id)) }}" method="post" id="admin-form">

            @include('_global.natika.editor', array('post' => $item, 'reply_button' => false, 'title_field' => false))

            <div class="hidden-inputs">
                {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
                <input name="_method" type="hidden" value="PATCH" />
                <input type="hidden" name="item[topic_id]" value="{{ $topic->id }}" />
                <input type="hidden" name="item[id]" value="{{ $item->id }}" />
            </div>
        </form>

    </div>

@stop
