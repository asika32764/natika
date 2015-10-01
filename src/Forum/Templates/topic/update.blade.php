{{-- Part of natika project. --}}

    <!-- Modal -->
<div class="modal fade" id="topicUpdateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ $router->html('topic_update')  }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="topicUpdateModalLabel">Update Title</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="topic-title" class="sr-only">Title</label>
                        <input type="text" name="item[title]" class="form-control input-lg" id="topic-title" placeholder="Topic Title" value="{{ $topic->title }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>

                {!! \Windwalker\Core\Security\CsrfProtection::input() !!}
                <input type="hidden" value="PATCH" />
                <input type="hidden" name="item[id]" id="input-id" value="{{ $topic->id }}" />
            </div>
        </form>
    </div>
</div>