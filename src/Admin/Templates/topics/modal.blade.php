{{-- Part of phoenix project. --}}

@extends('_global.admin.pure')

@section('toolbar')
    @include('toolbar')
@stop

@section('body')
<div id="phoenix-admin" class="topics-container grid-container">
    <form name="admin-form" id="admin-form" action="{{ $uri['full'] }}" method="POST" enctype="multipart/form-data">

        {{-- FILTER BAR --}}
        <div class="filter-bar">
            {!! $filterBar->render(array('form' => $filterForm, 'show' => $showFilterBar)) !!}
        </div>

        {{-- RESPONSIVE TABLE DESC --}}
        <p class="visible-xs-block">
            @translate('phoenix.grid.responsive.table.desc')
        </p>

        <div class="grid-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    {{-- TITLE --}}
                    <th>
                        {!! $grid->sortTitle('admin.topic.field.title', 'topic.title') !!}
                    </th>

                    {{-- STATE --}}
                    <th>
                        {!! $grid->sortTitle('admin.topic.field.state', 'topic.state') !!}
                    </th>

                    {{-- AUTHOR --}}
                    <th>
                        {!! $grid->sortTitle('admin.topic.field,.author', 'topic.created_by') !!}
                    </th>

                    {{-- CREATED --}}
                    <th>
                        {!! $grid->sortTitle('admin.topic.field.created', 'topic.created') !!}
                    </th>

                    {{-- LANGUAGE --}}
                    <th>
                        {!! $grid->sortTitle('admin.topic.field.language', 'topic.language') !!}
                    </th>

                    {{-- ID --}}
                    <th>
                        {!! $grid->sortTitle('admin.topic.field.id', 'topic.id') !!}
                    </th>
                </tr>
                </thead>

                <tbody>
                @foreach ($items as $i => $item)
                    <?php
                    $grid->setItem($item, $i);
                    ?>
                    <tr>
                        {{-- CHECKBOX --}}
                        <td>
                            <a href="#" onclick="parent.{{ $function }}('{{ $selector }}', '{{ $item->id }}', '{{ $item->title }}');">
                                <span class="glyphicon glyphicon-menu-left fa fa-angle-right text-muted"></span> {{{ $item->title }}}
                            </a>
                        </td>

                        {{-- STATE --}}
                        <td class="text-center">
                            {!! $grid->state($item->state, array('only_icon' => true)) !!}
                        </td>

                        {{-- AUTHIR --}}
                        <td>
                            {{ $item->created_by }}
                        </td>

                        {{-- CREATED --}}
                        <td>
                            {{ \Windwalker\Core\DateTime\DateTime::toLocalTime($item->created) }}
                        </td>

                        {{-- LANGUAGE --}}
                        <td>
                            {{ $item->language }}
                        </td>

                        {{-- ID --}}
                        <td>
                            {{ $item->id }}
                        </td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    {{-- PAGINATION --}}
                    <td colspan="25">
                        {!! $pagination->render($package->getName() . ':topics', 'windwalker.pagination.phoenix') !!}
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="hidden-inputs">
            {{-- METHOD --}}
            <input type="hidden" name="_method" value="PUT" />

            {{-- TOKEN --}}
            {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
        </div>

        @include('batch')
    </form>
</div>
@stop
