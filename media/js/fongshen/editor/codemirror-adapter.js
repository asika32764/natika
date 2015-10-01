/**
 * Part of Fongshen project.
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

;(function($)
{
	"use strict";

	/**
	 * ACE Editor adapter.
	 *
	 * @param {Object|Editor} options
	 *
	 * @constructor
	 */
	var Class = window.CodemirrorAdapter = function(options)
	{
		if (options instanceof CodeMirror)
		{
			this.cm = options;
		}

		var defaultOptions = {
			theme: 'monokai',
			mode: 'markdown'
		};

		this.options = $.extend(defaultOptions, options);
	};

	/**
	 * Initialise.
	 *
	 * @param element
	 */
	Class.prototype.initialise = function(element)
	{
		this.element = element;

		this.cm = this.cm || CodeMirror.fromTextArea(element.get(0), this.options);
	};

	/**
	 * Insert text into editor.
	 *
	 * @param string
	 *
	 * @return {CodemirrorAdapter}
	 */
	Class.prototype.insert = function(string)
	{
		this.cm.replaceSelection(string);

		return this;
	};

	/**
	 * Get selection.
	 *
	 * @returns {*}
	 */
	Class.prototype.getSelection = function()
	{
		return this.cm.getSelection();
	};

	/**
	 * Get editor value.
	 *
	 * @returns {*}
	 */
	Class.prototype.getValue = function()
	{
		return this.cm.getValue();
	};

	/**
	 * Get selection range.
	 *
	 * @returns {*}
	 */
	Class.prototype.getSelectionRange = function()
	{
		return this.cm.getRange();
	};

	/**
	 * Move cursor by.
	 *
	 * @param line
	 * @param offset
	 *
	 * @returns {CodemirrorAdapter}
	 */
	Class.prototype.moveCursor = function(line, offset)
	{
		var pos = this.cm.getCursor();

		line = pos.line + line;
		var ch = pos.ch + offset;

		this.cm.setCursor(line, ch);

		return this;
	};

	/**
	 * Focus on editor.
	 */
	Class.prototype.focus = function()
	{
		this.cm.focus();
	};

	/**
	 * Resize editor.
	 */
	Class.prototype.resize = function()
	{
		this.cm.refresh();
	};

	/**
	 * Bind event.
	 *
	 * @param name
	 * @param callback
	 */
	Class.prototype.bind = function(name, callback)
	{
		name = name.split('.');

		this.cm.on(name[0], callback);

		return this;
	};

})(jQuery);
