{{-- Part of Admin project. --}}
<?php
/**
 * Global variables
 * --------------------------------------------------------------
 * @var $app      \Windwalker\Web\Application                 Global Application
 * @var $package  \Lyrasoft\Luna\LunaPackage                  Package object.
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

@extends($lunaExtends . '-edit')

@section('toolbar')
    @include('toolbar')
@stop

@section('admin-body')
    <form name="admin-form" id="admin-form" action="{{ $router->html('article', array('id' => $item->id)) }}" method="POST" enctype="multipart/form-data">

        @include('luna.form.title-bar')

        <div class="row">
            <div class="col-md-8">
                <fieldset class="form-horizontal">
                {!! $form->getField('body')->renderInput() !!}

                </fieldset>

                {{--<fieldset class="form-horizontal">--}}
                {{--<legend>@translate($lunaPrefix . 'article.edit.fieldset.text')</legend>--}}

                {{--{!! $form->getField('text')->renderInput() !!}--}}
                {{--</fieldset>--}}
            </div>
            <div class="col-md-4">
                <fieldset class="form-horizontal">
                    <legend>@translate($lunaPrefix . 'article.edit.fieldset.created')</legend>

                    {!! $form->renderFields('created') !!}
                </fieldset>
            </div>
        </div>

        <div class="row" style="margin-top: 40px">
            <div class="col-md-12">
                <fieldset class="form-horizontal">

                </fieldset>
            </div>
        </div>

        <div class="hidden-inputs">
            {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
        </div>

    </form>
@stop
