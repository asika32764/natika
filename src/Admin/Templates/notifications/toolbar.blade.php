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

<a type="button" class="btn btn-success btn-sm" href="{{ $router->html('notification', array('new' => true)) }}">
    <span class="glyphicon glyphicon-plus fa fa-plus"></span>
    @translate('phoenix.toolbar.new')
</a>

<button type="button" class="btn btn-default btn-sm" onclick="Phoenix.Grid.hasChecked();Phoenix.post();">
    <span class="glyphicon glyphicon-duplicate fa fa-copy text-info"></span>
    @translate('phoenix.toolbar.duplicate')
</button>

<button type="button" class="btn btn-default btn-sm" onclick="Phoenix.Grid.hasChecked().batch('publish');">
    <span class="glyphicon glyphicon-ok fa fa-check text-success"></span>
    @translate('phoenix.toolbar.publish')
</button>

<button type="button" class="btn btn-default btn-sm" onclick="Phoenix.Grid.hasChecked().batch('unpublish');">
    <span class="glyphicon glyphicon-remove fa fa-remove text-danger"></span>
    @translate('phoenix.toolbar.unpublish')
</button>

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#batch-modal" onclick="Phoenix.Grid.hasChecked(null, event);">
    <span class="glyphicon glyphicon-modal-window fa fa-sliders"></span>
    @translate('phoenix.toolbar.batch')
</button>

<button type="button" class="btn btn-default btn-sm" onclick="Phoenix.Grid.hasChecked().deleteList();">
    <span class="glyphicon glyphicon-trash fa fa-trash"></span>
    @translate('phoenix.toolbar.delete')
</button>
