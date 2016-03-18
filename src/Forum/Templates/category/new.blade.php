{{-- Part of natika project. --}}

<?php
\Phoenix\Script\JQueryScript::colorPicker('#input-color');

//$image = new \Lyrasoft\Luna\Field\Image\SingleImageDragField;
//$image->setName('image')
//    ->set('height', 200)
//    ->set('width', 300);
?>

    <!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ $uri['full'] }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="categoryModalLabel">Category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category-title" class="sr-only">Title</label>
                        <input type="text" name="item[title]" class="form-control input-lg" id="category-title" placeholder="Category Title">
                    </div>

                    <div class="form-group">
                        <label for="category-desc" class="sr-only">Description</label>
                        <textarea rows="6" name="item[description]" class="form-control input-lg" id="category-desc" placeholder="Description"></textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="sr-only" for="input-color">Color</label>
                            <input type="text" name="item[params][bg_color]" class="form-control minicolors" id="input-color" placeholder="Color">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="sr-only" for="input-icon">Password</label>
                            <input type="text" name="item[params][image_icon]" class="form-control" id="input-icon" placeholder="Icon Class">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>

                {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
                <input type="hidden" name="item[id]" id="input-id" value="" />
                <input type="hidden" name="item[parent_id]" id="input-parent" value="{{ $currentCategory->id }}" />
            </div>
        </form>
    </div>
</div>
