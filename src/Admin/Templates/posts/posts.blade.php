{{-- Part of phoenix project. --}}

@extends('_global.admin.admin')

@section('toolbar')
    @include('toolbar')
@stop

@section('admin-body')
<div id="phoenix-admin" class="posts-container grid-container">
    <form name="admin-form" id="admin-form" action="{{ $router->html('posts') }}" method="POST" enctype="multipart/form-data">

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
                    {{-- CHECKBOX --}}
                    <th>
                        {!! $grid->checkboxesToggle(array('duration' => 150)) !!}
                    </th>

                    {{-- STATE --}}
                    <th style="min-width: 90px;">
                        {!! $grid->sortTitle('admin.post.field.state', 'post.state') !!}
                    </th>

                    {{-- TITLE --}}
                    <th>
                        {!! $grid->sortTitle('admin.post.field.title', 'post.title') !!}
                    </th>

                    {{-- ORDERING --}}
                    <th width="5%" class="nowrap">
                        {!! $grid->sortTitle('admin.post.field,.ordering', 'post.ordering') !!} {!! $grid->saveorderButton() !!}
                    </th>

                    {{-- AUTHOR --}}
                    <th>
                        {!! $grid->sortTitle('admin.post.field,.author', 'post.created_by') !!}
                    </th>

                    {{-- CREATED --}}
                    <th>
                        {!! $grid->sortTitle('admin.post.field.created', 'post.created') !!}
                    </th>

                    {{-- LANGUAGE --}}
                    <th>
                        {!! $grid->sortTitle('admin.post.field.language', 'post.language') !!}
                    </th>

                    {{-- ID --}}
                    <th>
                        {!! $grid->sortTitle('admin.post.field.id', 'post.id') !!}
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
                            {!! $grid->checkbox() !!}
                        </td>

                        {{-- STATE --}}
                        <td>
                            <span class="btn-group">
                                {!! $grid->state($item->state) !!}
                                <button type="button" class="btn btn-default btn-xs hasTooltip" onclick="Phoenix.Grid.copyRow({{ $i }});"
                                    title="@translate('phoenix.toolbar.duplicate')">
                                    <span class="glyphicon glyphicon-duplicate fa fa-copy text-info"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-xs hasTooltip" onclick="Phoenix.Grid.deleteRow({{ $i }});"
                                    title="@translate('phoenix.toolbar.delete')">
                                    <span class="glyphicon glyphicon-trash fa fa-trash"></span>
                                </button>
                            </span>
                        </td>

                        {{-- TITLE --}}
                        <td>
                            <a href="{{{ $router->html('post', array('id' => $item->id)) }}}">
                                {{ $item->title }}
                            </a>
                        </td>

                        {{-- ORDERING --}}
                        <td>
                            {!! $grid->orderButton() !!}
                        </td>

                        {{-- AUTHOR --}}
                        <td>
                            {{ $item->created_by }}
                        </td>

                        {{-- CREATED --}}
                        <td>
                            {{ Windwalker\Core\DateTime\DateTime::toLocalTime($item->created) }}
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
                        {!! $pagination->render($package->getName() . ':posts', 'windwalker.pagination.phoenix') !!}
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
