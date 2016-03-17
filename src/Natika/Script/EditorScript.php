<?php
/**
 * Part of natika project.
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Natika\Script;

use Phoenix\Script\AbstractScriptManager;

/**
 * The EditorScript class.
 *
 * @since  {DEPLOY_VERSION}
 */
class EditorScript extends AbstractScriptManager
{
	/**
	 * codeMirror
	 *
	 * @param string $name
	 * @param string $selector
	 *
	 * @return  void
	 */
	public static function codeMirror($name = 'editor', $selector)
	{
		$asset = static::getAsset();

		if (!static::inited(__METHOD__))
		{
			$asset->addScript('js/codemirror/lib/codemirror.js');
			$asset->addScript('js/codemirror/mode/markdown/markdown.js');
			$asset->addStyle('js/codemirror/lib/codemirror.css');
			$asset->addStyle('js/codemirror/theme/elegant.css');
		}

		if (!static::inited(__METHOD__, func_get_args()))
		{
			$js = <<<JS
jQuery(document).ready(function ($)
{
	CodeMirror.keyMap.default["Shift-Tab"] = "indentLess";

	window.codeMirror = window.codeMirror || [];
	window.codeMirror['$name'] = CodeMirror.fromTextArea($('$selector')[0], {
		mode: 'markdown',
		theme: 'elegant',
		lineWrapping: true,
		indentUnit: 4,
		tabSize: 4,
		indentWithTabs: false
	});
});
JS;

			$asset->internalScript($js);
		}
	}

	/**
	 * highlight
	 *
	 * @param string $selector
	 * @param array  $options
	 *
	 * @return  void
	 */
	public static function highlight($selector, $options = array())
	{
		$asset = static::getAsset();

		if (!static::inited(__METHOD__))
		{
			$asset->addScript('js/highlight/highlight.pack.js');

			$style = isset($options['style']) ? $options['style'] : 'github';

			$asset->addStyle('js/highlight/styles/' . $style . '.css');
		}

		if (!static::inited(__METHOD__, func_get_args()))
		{
			$js = <<<JS
jQuery(document).ready(function ($)
{
	$('$selector').each(function(e)
	{
		hljs.highlightBlock(this);
	});
});
JS;

			$asset->internalScript($js);
		}
	}
}
