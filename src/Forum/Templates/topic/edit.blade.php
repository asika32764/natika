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

            @include('_global.natika.editor', array('post' => new \Windwalker\Data\Data, 'reply' => false))

            <div class="hidden-inputs">
                {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
                <input type="hidden" name="category" value="{{ $category->id }}" />
            </div>
        </form>

    </div>

@stop

