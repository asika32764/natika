{{-- Part of natika project. --}}

@extends('_global.html')

@section('banner_inner')
    <h1 class="category-title">
        <span class="fa fa-edit"></span>
        {{ \Phoenix\Html\Document::getTitle() }} in {{ $category->title }}
    </h1>
    <button class="tool-button btn btn-default btn-lg pull-right" onclick="$('#admin-form').submit()">
        <span class="fa fa-save"></span>
        Save
    </button>
@stop

@section('content')

    <div class="container post-item">

        <form action="{{ $uri['full'] }}" method="post" id="admin-form">
            <div class="form-group">
                <label for="input-title" class="sr-only">Title</label>
                <input type="text" class="form-control input-lg" id="input-title" name="item[title]" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="input-body" class="sr-only">Body</label>
                <textarea class="form-control input-lg" id="input-body" name="item[body]" placeholder="Your content here..."></textarea>
            </div>

            <div class="hidden-inputs">
                {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
                <input type="hidden" name="category" value="{{ $category->id }}" />
            </div>
        </form>

    </div>

@stop

