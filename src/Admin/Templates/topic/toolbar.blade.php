{{-- Part of Admin project. --}}
<?php
/**
 * Global variables
 * --------------------------------------------------------------
 * @var $app      \Windwalker\Web\Application            Global Application
 * @var $package  \Admin\AdminPackage            Package object.
 * @var $view     \Windwalker\Data\Data                  Some information of this view.
 * @var $uri      \Windwalker\Registry\Registry          Uri information, example: $uri['media.path']
 * @var $datetime \DateTime                              PHP DateTime object of current time.
 * @var $helper   \Admin\Helper\MenuHelper        The Windwalker HelperSet object.
 * @var $router   \Windwalker\Core\Router\PackageRouter  Router object.
 */
?>

<button type="button" class="btn btn-success btn-sm" onclick="Phoenix.post();">
    <span class="glyphicon glyphicon-floppy-disk fa fa-save"></span>
    @translate('phoenix.toolbar.save')
</button>

<button type="button" class="btn btn-default btn-sm" onclick="Phoenix.post(null, {task: 'save2close'});">
    <span class="glyphicon glyphicon-ok fa fa-check text-success"></span>
    @translate('phoenix.toolbar.save2close')
</button>

<button type="button" class="btn btn-default btn-sm" onclick="Phoenix.post(null, {task: 'save2copy'});">
    <span class="glyphicon glyphicon-duplicate fa fa-copy text-info"></span>
    @translate('phoenix.toolbar.save2copy')
</button>

<button type="button" class="btn btn-default btn-sm" onclick="Phoenix.post(null, {task: 'save2new'});">
    <span class="glyphicon glyphicon-plus fa fa-plus text-primary"></span>
    @translate('phoenix.toolbar.save2new')
</button>

<a type="button" class="btn btn-default btn-sm" href="{{ $router->html('topics') }}">
    <span class="glyphicon glyphicon-remove fa fa-remove text-danger"></span>
    @translate('phoenix.toolbar.cancel')
</a>
