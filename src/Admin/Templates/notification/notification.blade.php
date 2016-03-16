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

@extends('_global.admin.admin-edit')

@section('toolbar')
    @include('toolbar')
@stop

@section('admin-body')
<form name="admin-form" id="admin-form" action="{{ $router->html('notification') }}" method="POST" enctype="multipart/form-data">

    <div class="row">
        <div class="col-md-7">
            <fieldset class="form-horizontal">
                <legend>@translate('admin.notification.edit.fieldset.basic')</legend>

                {!! $form->renderFields('basic') !!}
            </fieldset>

            <fieldset class="form-horizontal">
                <legend>@translate('admin.notification.edit.fieldset.text')</legend>

                {!! $form->renderFields('text') !!}
            </fieldset>
        </div>
        <div class="col-md-5">
            <fieldset class="form-horizontal">
                <legend>@translate('admin.notification.edit.fieldset.created')</legend>

                {!! $form->renderFields('created') !!}
            </fieldset>
        </div>
    </div>

    <div class="hidden-inputs">
        {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
    </div>

</form>
@stop
