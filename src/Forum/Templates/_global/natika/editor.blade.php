{{-- Part of natika project. --}}

<?php
\Natika\Script\EditorScript::codeMirror('editor', '#input-body');

\Phoenix\Script\JQueryScript::core();
\Phoenix\Asset\Asset::addScript('js/inline-uploader/inline-uploader.js');
\Phoenix\Asset\Asset::addScript('js/inline-uploader/adapter/codemirror-adapter.js');
\Phoenix\Asset\Asset::addScript('js/markdown/js-markdown-extra.min.js');

?>

<div id="editor" class="panel panel-default">
    <div class="panel-heading clearfix">
        <div class="pull-left">
            Editor
        </div>
        <div class="pull-right">

        </div>
    </div>
    <div class="panel-body">
        @if (!empty($title_field))
        <div class="form-group">
            <label for="input-title" class="sr-only">Title</label>
            <input type="text" class="form-control input-lg" id="input-title" name="item[title]" placeholder="Title" value="{{ $post->title }}">
        </div>
        @endif

            <div class="toolbar">
                <div class="btn-group">
                    <button id="button-h1" class="btn btn-default btn-sm">H1</button>
                    <button id="button-h2" class="btn btn-default btn-sm">H2</button>
                    <button id="button-h3" class="btn btn-default btn-sm">H3</button>
                    <button id="button-h4" class="btn btn-default btn-sm">H4</button>
                    <button id="button-h5" class="btn btn-default btn-sm">H5</button>
                </div>

                <div class="btn-group">
                    <button id="button-strong" class="btn btn-default btn-sm">
                        <span class="fa fa-bold"></span>
                    </button>
                    <button id="button-italic" class="btn btn-default btn-sm">
                        <span class="fa fa-italic"></span>
                    </button>
                </div>

                <div class="btn-group">
                    <button id="button-ul" class="btn btn-default btn-sm">
                        <span class="fa fa-list-ul"></span>
                    </button>
                    <button id="button-ol" class="btn btn-default btn-sm">
                        <span class="fa fa-list-ol"></span>
                    </button>
                </div>

                <div class="btn-group">
                    <button id="button-img" class="btn btn-default btn-sm">
                        <span class="fa fa-picture-o"></span>
                    </button>
                    <button id="button-link" class="btn btn-default btn-sm">
                        <span class="fa fa-link"></span>
                    </button>
                </div>

                <div class="btn-group">
                    <button id="button-quote" class="btn btn-default btn-sm">
                        <span class="fa fa-quote-right"></span>
                    </button>
                    <button id="button-codeblock" class="btn btn-default btn-sm">
                        <span class="fa fa-file-code-o"></span>
                    </button>
                    <button id="button-code" class="btn btn-default btn-sm">
                        <span class="fa fa-code"></span>
                    </button>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#preview-modal">
                        <span class="fa fa-eye"></span>
                    </button>
                </div>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#help-modal">
                        <span class="fa fa-question-circle"></span>
                    </button>
                </div>

                {{--<div class="btn-group">--}}
                    {{--<button id="button-preview" class="btn btn-success btn-sm">Preview</button>--}}
                {{--</div>--}}
            </div>

        <div class="form-group">
            <label for="input-body" class="sr-only">Body</label>
            <textarea class="form-control input-lg" id="input-body" name="item[body]" placeholder="Your content here...">{{ $post->body }}</textarea>
        </div>

        @if ($app->get('unidev.image.storage'))
            <p class="text-muted">
                <span class="fa fa-lightbulb-o"></span>
                Drag & drop images to upload.
            </p>
        @endif

        @if (!empty($reply_button))
        <div class="post-buttons">
            <button class="btn btn-success btn-lg pull-right">Reply</button>
        </div>
        @endif

        @include('_global.natika.preview-modal')
        @include('_global.natika.help-modal')
    </div>
</div>

@section('script')
@parent
<script src="{{ $uri['media.path'] }}js/fongshen/editor/codemirror-adapter.js"></script>
<script src="{{ $uri['media.path'] }}js/fongshen/fongshen.js"></script>
<script>
jQuery(document).ready(function($)
{
    var editor = $('#input-body');

    var options = {
        id: 'editor',
        namespace: 'natika'
        // previewAjaxPath: '',
        // previewContainer: '#preview-container'
        // buttons: FongshenMarkdownButtons
    };

    var Fongshen = editor.fongshen(new CodemirrorAdapter(window.codeMirror['editor']), options);

    // Buttons
    Fongshen.registerButton($('#button-h1'), {
        name:'Heading 1',
        key:"1",
        openWith:'# ',
        placeHolder:'Title'
    });

    Fongshen.registerButton($('#button-h2'), {
        name:'Heading 2',
        key:"2",
        openWith:'## ',
        placeHolder:'Title'
    });

    Fongshen.registerButton($('#button-h3'), {
        name:'Heading 3',
        key:"3",
        openWith:'### ',
        placeHolder:'Title'
    });

    Fongshen.registerButton($('#button-h4'), {
        name:'Heading 4',
        key:"4",
        openWith:'#### ',
        placeHolder:'Title'
    });

    Fongshen.registerButton($('#button-h5'), {
        name:'Heading 5',
        key:"5",
        openWith:'##### ',
        placeHolder:'Title'
    });

    Fongshen.registerButton($('#button-h6'), {
        name:'Heading 6',
        key:"6",
        openWith:'###### ',
        placeHolder:'Title'
    });

    Fongshen.registerButton($('#button-strong'), {
            name:'Bold',
            key:"B",
            openWith:'**',
            closeWith:'**'}
    );

    Fongshen.registerButton($('#button-italic'), {
        name:'Italic',
        key:"I",
        openWith:'_',
        closeWith:'_'
    });

    Fongshen.registerButton($('#button-ul'), {
        name:'Bulleted List',
        openWith:'- ' ,
        multiline: true
    });

    Fongshen.registerButton($('#button-ol'), {
        name:'Numeric List',
        openWith: function(fongshen)
        {
            return fongshen.line + '. ';
        },
        multiline: true
    });

    Fongshen.registerButton($('#button-img'), {
        name:'Picture',
        key:"P",
        replaceWith: function(fongshen)
        {
            var value = '![' + fongshen.ask('Alternative text') + '](' + fongshen.ask('Url', 'http://');

            var title = fongshen.ask('Title');

            if (title !== '')
            {
                value += ' "' + title + '"';
            }

            value += ')';

            return value;
        }
    });

    Fongshen.registerButton($('#button-link'), {
        name:'Link',
        key:"L",
        openWith:'[',
        closeWith: function(fongshen)
        {
            return '](' + fongshen.ask('Url', 'http://') + ')';
        },
        placeHolder:'Click here to link...'
    });

    Fongshen.registerButton($('#button-quote'), {
        name:'Quotes',
        openWith:'> ',
        multiline: true
    });

    Fongshen.registerButton($('#button-codeblock'), {
        name:'Code Block / Code',
        openWith: function(fongshen)
        {
            return '``` ' + fongshen.ask('Language') + '\n';
        },
        closeWith:'\n```',
        afterInsert: function(fongshen)
        {
            fongshen.getEditor().moveCursor(-1, 0);
        }
    });

    Fongshen.registerButton($('#button-code'), {
        name:'Code Inline',
        openWith:'`',
        closeWith:'`',
        multiline: true,
        className: "code-inline"
    });

    Fongshen.registerButton($('#button-preview'), {
        name:'Preview',
        call:'createPreview',
        className:"preview"
    });

    // Inline Uploader
    var inlineOptions = {
        url: '{{ $router->html('unidev@img_upload') }}',

        onFileUploaded: function(data, name) {
            this.onFileUploaded(data, name);

            setTimeout(function()
            {
                Fongshen.refreshPreview();
            }, 500);
        },

        dataProcessor: function(data) {

            var response = {};

            response.filename = data.data.url;
            response.name = data.data.url.replace(/^.*[\\\/]/, '');

            return response;
        }
    };

    InlineUploader.init(new InlineUploader.CodeMirrorAdapter(window.codeMirror['editor']), inlineOptions);

    // Preview
    $('#preview-modal').on('show.bs.modal', function (event) {
        $(this).find('.editor-preview-body').html(Markdown(window.codeMirror['editor'].getValue()));
    });
});
</script>

@stop
