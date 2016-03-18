{{-- Part of Admin project. --}}
<?php
/**
 * Global variables
 * --------------------------------------------------------------
 * @var $app      \Windwalker\Web\Application                 Global Application
 * @var $package  \Admin\AdminPackage                 Package object.
 * @var $view     \Windwalker\Data\Data                       Some information of this view.
 * @var $uri      \Windwalker\Registry\Registry               Uri information, example: $uri['media.path']
 * @var $datetime \DateTime                                   PHP DateTime object of current time.
 * @var $helper   \Windwalker\Core\View\Helper\Set\HelperSet  The Windwalker HelperSet object.
 * @var $router   \Windwalker\Core\Router\PackageRouter       Router object.
 *
 * View variables
 * --------------------------------------------------------------
 * @var $item  \Windwalker\Data\Data
 * @var $state \Windwalker\Registry\Registry
 * @var $form  \Windwalker\Form\Form
 */
?>

@extends('_global.admin.admin')

@section('admin-body')
    <style>
        #admin-toolbar {
            display: none;
        }
    </style>
    <div id="natika-dashboard" class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Last Posts</h2>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Title
                        </th>
                        <th>
                            Detail
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($topics as $topic)
                        <tr>
                            <td>
                                <a href="{{ $router->html('forum@topic', ['id' => $topic->id, 'path' => $topic->category_path]) }}" target="_blank">
                                    {{ $topic->title }}
                                </a>
                            </td>
                            <td>
                                @if ($topic->last_user_name)
                                    <a href="{{ $router->html('user', ['id' => $topic->last_user_id]) }}" target="_blank">
                                        {{ $topic->last_user_name }}
                                    </a>
                                @else
                                    <span class="text-muted">
                                    Unknown User
                                </span>
                                @endif
                                <br />
                                <span class="text-muted">{{ $helper->date->since($topic->last_reply_date) }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h2>New Users</h2>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Email
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
