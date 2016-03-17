{{-- Part of natika project. --}}

<div class="modal fade" id="help-modal" role="dialog" aria-labelledby="help-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="help-modal-label">Markdown Help</h4>
            </div>
            <div class="modal-body">
                <div class="editor-help-body markdown-body">
                        <h3>Headings</h3>
<pre class="hljs cpp"><code><span class="hljs-preprocessor"># Heading <span class="hljs-number">1</span></span>
<span class="hljs-preprocessor">## Heading <span class="hljs-number">2</span></span>
<span class="hljs-preprocessor">### Heading <span class="hljs-number">3</span></span>
<span class="hljs-preprocessor">#### Heading <span class="hljs-number">4</span></span>
<span class="hljs-preprocessor">##### Heading <span class="hljs-number">5</span></span>
<span class="hljs-preprocessor">###### Heading <span class="hljs-number">6</span></span></code></pre>
                        <h3>Text Emphasis</h3>
<pre class="hljs vim"><code>This **will** <span class="hljs-keyword">make</span> text bold.
And this should _make text_ italic.
Doing <span class="hljs-keyword">so</span> can ~~strikethrough~~ text. (GFM <span class="hljs-keyword">syntax</span>)</code></pre>
                        <h3>Links</h3>
                        <p>Normal Links</p>
<pre class="hljs markdown"><code>[<span class="hljs-link_label">Link Text</span>](<span class="hljs-link_url">http://example.com/</span>)
[<span class="hljs-link_label">Link Text</span>](<span class="hljs-link_url">http://example.com/ "Link Title (optional</span>)")</code></pre>
                        <p>Refrence-Style Links</p>
<pre class="hljs markdown"><code>[<span class="hljs-link_label">Link Text</span>][<span class="hljs-link_reference">1</span>]
And then define the reference anywhere in the document:
[<span class="hljs-link_reference">1</span>]:<span class="hljs-link_url"> http://example.com/ "Link Title (optional)"</span></code></pre>
                        <h3>Images</h3>
<pre class="hljs markdown"><code>![<span class="hljs-link_label">Alt Text</span>](<span class="hljs-link_url">/path/to/image.jpg</span>)
![<span class="hljs-link_label">Alt Text</span>](<span class="hljs-link_url">/path/to/image.jpg "Image Title (optional</span>)")
You can also apply reference-style syntax to image, like:
![<span class="hljs-link_label">Alt Text</span>][<span class="hljs-link_reference">2</span>]
[<span class="hljs-link_reference">2</span>]:<span class="hljs-link_url"> /path/to/image.jpg "Image Title (optional)"</span></code></pre>
                        <h3>Blockquote</h3>
                        <p>Basic Quotation</p>
<pre class="hljs markdown"><code><span class="hljs-blockquote">&gt; Quoted</span>
<span class="hljs-blockquote">&gt; Block</span>
<span class="hljs-blockquote">&gt; Text</span></code></pre>
                        <h3>Lists</h3>
                        <p>Ordered List</p>
<pre class="hljs cpp"><code><span class="hljs-number">1.</span> List Item <span class="hljs-preprocessor">#<span class="hljs-number">1</span></span>
<span class="hljs-number">2.</span> List Item <span class="hljs-preprocessor">#<span class="hljs-number">2</span></span>
<span class="hljs-number">3.</span> List Item <span class="hljs-preprocessor">#<span class="hljs-number">3</span></span></code></pre>
                        <p>Unordered List</p>
<pre class="hljs cpp"><code>* List Item <span class="hljs-preprocessor">#<span class="hljs-number">1</span></span>
* List Item <span class="hljs-preprocessor">#<span class="hljs-number">2</span></span>
* List Item <span class="hljs-preprocessor">#<span class="hljs-number">3</span></span></code></pre>
                        <h3>Codes</h3>
                        <p>Inline Code</p>
                        <pre class="hljs vim"><code>Press `Command-Z` <span class="hljs-keyword">to</span> <span class="hljs-keyword">undo</span>.</code></pre>
                        <p>GFM Code Block</p>
<pre class="hljs coffeescript"><code>`<span class="javascript"></span>``<span class="javascript">
<span class="hljs-built_in">console</span>.log(<span class="hljs-string">'Hello World!'</span>);
</span>``<span class="javascript"></span>`</code></pre>
                        <p>GFM Code Block with Language and Title</p>
<pre class="hljs ruby"><code><span class="hljs-string">``</span><span class="hljs-string">` html
print_r($foo);
`</span><span class="hljs-string">``</span></code></pre>
                        <h3>Table</h3>
<pre class="hljs ruby"><code>| <span class="hljs-constant">First</span> <span class="hljs-constant">Header</span> | <span class="hljs-constant">Second</span> <span class="hljs-constant">Header</span> | <span class="hljs-constant">Third</span> <span class="hljs-constant">Header</span> |
| ------------ | <span class="hljs-symbol">:-----------</span><span class="hljs-symbol">:</span> | -----------<span class="hljs-symbol">:</span> |
| <span class="hljs-constant">Content</span>      |  center-align |  right-align |
| <span class="hljs-constant">Content</span>      |   **<span class="hljs-constant">Cell</span>**    |         <span class="hljs-constant">Cell</span> |
| <span class="hljs-constant">New</span> section  |     <span class="hljs-constant">More</span>      |         <span class="hljs-constant">Data</span> |</code></pre>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" target="_blank" href="https://guides.github.com/features/mastering-markdown/">
                    <span class="fa fa-github"></span>
                    More about GFM
                </a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
