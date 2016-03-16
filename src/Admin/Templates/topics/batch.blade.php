{{-- Part of Admin project. --}}
<?php
/**
 * @var $batchForm \Windwalker\Form\Form
 */
?>

<div class="modal fade" id="batch-modal" tabindex="-1" role="dialog" aria-labelledby="batch-modal-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="batch-modal-title">
                    <span class="glyphicon glyphicon-modal-window fa fa-sliders"></span> @translate('phoenix.batch.modal.title')
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    @translate('phoenix.batch.modal.desc')
                </p>
                <hr />
                <div class="form-horizontal">
                    {!! $batchForm->renderFields() !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove fa fa-remove"></span>
                    @translate('phoenix.core.close')
                </button>
                <button type="button" class="btn btn-info" onclick="Phoenix.Grid.hasChecked();Phoenix.patch()">
                    <span class="glyphicon glyphicon-ok fa fa-check"></span>
                    @translate('phoenix.core.update')
                </button>
                <button type="button" class="btn btn-primary" onclick="Phoenix.Grid.hasChecked();Phoenix.post()">
                    <span class="glyphicon glyphicon-duplicate fa fa-copy"></span>
                    @translate('phoenix.core.copy')
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
