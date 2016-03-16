{{-- Part of Admin project. --}}

@extends('_global.admin.admin')

@section('admin-area')
    <div class="col-md-12">

        @section('message')
            {!! \Windwalker\Core\Widget\WidgetHelper::render('windwalker.message.default', array('flashes' => $flashes)) !!}
        @show

        @yield('admin-body', 'Body')
    </div>
@stop
