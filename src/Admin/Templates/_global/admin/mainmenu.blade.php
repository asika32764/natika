
@section('nav')
    <li class="{{ $helper->menu->active('dashboard') }}">
        <a href="#">
            @translate('phoenix.title.dashboard')
        </a>
    </li>
@stop
