
<h3 class="visible-xs-block">
    @translate('phoenix.title.submenu')
</h3>

<ul class="nav nav-stacked nav-pills">

    <li class="{{ $helper->menu->active('categories') }}">
        <a href="{{ $router->html('categories') }}">
            @translate('admin.categories.title')
        </a>
    </li>

	<li class="{{ $helper->menu->active('topics') }}">
		<a href="{{ $router->html('topics') }}">
			@translate('admin.topics.title')
		</a>
	</li>

	<li class="{{ $helper->menu->active('posts') }}">
		<a href="{{ $router->html('posts') }}">
			@translate('admin.posts.title')
		</a>
	</li>

	<li class="{{ $helper->menu->active('articles') }}">
		<a href="{{ $router->html('articles') }}">
			@translate('admin.articles.title')
		</a>
	</li>

	<li class="{{ $helper->menu->active('notifications') }}">
		<a href="{{ $router->html('notifications') }}">
			@translate('admin.notifications.title')
		</a>
	</li>

	<li class="{{ $helper->menu->active('users') }}">
		<a href="{{ $router->html('users') }}">
			@translate('admin.users.title')
		</a>
	</li>

    {{-- @muse-placeholder  submenu  Do not remove this line --}}
</ul>
