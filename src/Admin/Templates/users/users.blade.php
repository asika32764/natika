{{-- Part of phoenix project. --}}

<?php
\Phoenix\Script\JQueryScript::highlight('.searchable', $state['input.search.content']);
?>

@extends($warderExtends)

@section('toolbar')
    @include('toolbar')
@stop

@section('admin-body')
    <style>
        .user-avatar {
            height: 48px;
            width: 48px;
            border-radius: 50%;
            min-width: 48px;
            margin-right: 10px;
        }
        .user-avatar-default {
            background-image: url('{{ \Windwalker\Warder\Helper\AvatarUploadHelper::getDefaultImage() }}');
            background-size: cover;
            display: inline-block;
            vertical-align: middle;
        }

        .grid-table table.table > tbody > tr > td {
            vertical-align: middle;
        }
    </style>
    <div id="phoenix-admin" class="users-container grid-container">
        <form name="admin-form" id="admin-form" action="{{ $router->html('users') }}" method="POST" enctype="multipart/form-data">

            {{-- FILTER BAR --}}
            <div class="filter-bar">
                {!! $filterBar->render(array('form' => $filterForm, 'show' => $showFilterBar)) !!}
            </div>

            {{-- RESPONSIVE TABLE DESC --}}
            <p class="visible-xs-block">
                @translate($warderPrefix . 'grid.responsive.table.desc')
            </p>

            <div class="grid-table table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        {{-- CHECKBOX --}}
                        <th>
                            {!! $grid->checkboxesToggle(array('duration' => 150)) !!}
                        </th>

                        {{-- NAME --}}
                        <th>
                            {!! $grid->sortTitle($warderPrefix . 'user.field.name', 'user.name') !!}
                        </th>

                        @if ($warder->getLoginName() != 'email')
                            {{-- USERNAME --}}
                            <th>
                                {!! $grid->sortTitle($warderPrefix . 'user.field.' . $warder->getLoginName(), 'user.' . $warder->getLoginName()) !!}
                            </th>
                        @endif

                        {{-- Email --}}
                        <th width="5%" class="nowrap">
                            {!! $grid->sortTitle($warderPrefix . 'user.field.email', 'user.email') !!}
                        </th>

                        {{-- ENABLED --}}
                        <th  width="3%">
                            {!! $grid->sortTitle($warderPrefix . 'user.field.enabled', 'user.blocked') !!}
                        </th>

                        {{-- Activation --}}
                        <th width="3%">
                            {!! $grid->sortTitle($warderPrefix . 'user.field.activation', 'user.activation') !!}
                        </th>

                        @section('users-custom-fields-head')

                            {{-- REGISTERED --}}
                            <th>
                                {!! $grid->sortTitle($warderPrefix . 'user.field.registered', 'user.registered') !!}
                            </th>

                        @show

                        {{-- Delete --}}
                        <th>
                            Delete
                        </th>

                        {{-- ID --}}
                        <th>
                            {!! $grid->sortTitle($warderPrefix . 'user.field.id', 'user.id') !!}
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

                            {{-- NAME --}}
                            <td class="searchable">
                                @if (property_exists($item, 'avatar'))
                                    @if ($item->avatar)
                                        <img class="user-avatar" src="{{ $item->avatar }}" alt="Avatar">
                                    @else
                                        <div class="user-avatar user-avatar-default"></div>
                                    @endif
                                @endif
                                <a href="{{ $router->html('user', array('id' => $item->id)) }}">
                                    {{ $item->name }}
                                </a>
                                @if (\Natika\User\UserHelper::isAdmin($item))
                                    &nbsp; <span class="glyphicon glyphicon-star"></span>
                                @endif
                                @if ($item->social_provider == 'github')
                                    &nbsp; <span class="glyphicon glyphicon-github"></span>
                                @endif
                            </td>

                            @if ($warder->getLoginName() != 'email')
                                {{-- USERNAME --}}
                                <td class="searchable">
                                    {{ $item->username }}
                                </td>
                            @endif

                            {{-- EMAIL --}}
                            <td class="searchable">
                                {{ $item->email }}
                            </td>

                            {{-- ENABLED --}}
                            <td>
                                {!!
                                $grid->createIconButton(!$item->blocked)
                                    ->addState(
                                        1,
                                        'block',
                                        'ok fa fa-check text-success',
                                        $warderPrefix . 'button.enabled.desc'
                                    )
                                    ->addState(
                                        0,
                                        'unblock',
                                        'remove fa fa-remove text-danger',
                                        $warderPrefix . 'button.disabled.desc'
                                    )
                                !!}
                            </td>

                            {{-- Activation --}}
                            <td>
                                @if ($item->activation)
                                    <button type="button" class="waves-effect btn btn-default btn-xs hasTooltip" onclick="Phoenix.Grid.updateRow({{ $i }}, null, {task: 'activate'});"
                                        title="@translate($warderPrefix . 'button.unactivated.desc')">
                                        <span class="glyphicon glyphicon-remove fa fa-remove text-danger"></span>
                                    </button>
                                @else
                                    <span class="glyphicon glyphicon-ok fa fa-check text-success hasTooltip" title="@translate($warderPrefix . 'button.activated.desc')"></span>
                                @endif
                            </td>

                            {{-- REGISTERED --}}
                            <td>
                                {{ Windwalker\Core\DateTime\DateTime::toLocalTime($item->registered) }}
                            </td>

                            {{-- Delete --}}
                            <td>
                                <button type="button" class="waves-effect btn btn-default btn-xs hasTooltip" onclick="Phoenix.Grid.deleteRow({{ $i }});"
                                    title="@translate('phoenix.toolbar.delete')">
                                    <span class="glyphicon glyphicon-trash fa fa-trash"></span>
                                </button>
                            </td>

                            {{-- ID --}}
                            <td class="searchable">
                                {{ $item->id }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        {{-- PAGINATION --}}
                        <td colspan="25">
                            {!! $pagination->render($package->getName() . '@users', 'windwalker.pagination.phoenix') !!}
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
