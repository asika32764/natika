/**
 * Part of Fongshen project.
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

var FongshenMarkdownButtons = {
	h1: {name:'Heading 1', key:"1", openWith:'# ', placeHolder:'Title'},
	h2: {name:'Heading 2', key:"2", openWith:'## ', placeHolder:'Title'},
	h3: {name:'Heading 3', key:"3", openWith:'### ', placeHolder:'Title' },
	h4: {name:'Heading 4', key:"4", openWith:'#### ', placeHolder:'Title' },
	h5: {name:'Heading 5', key:"5", openWith:'##### ', placeHolder:'Title' },
	h6: {name:'Heading 6', key:"6", openWith:'###### ', placeHolder:'Title' },
	sp1: {separator:'---------------' },
	bold: {name:'Bold', key:"B", openWith:'**', closeWith:'**'},
	italic: {name:'Italic', key:"I", openWith:'_', closeWith:'_'},
	sp2: {separator:'---------------' },
	ul: {name:'Bulleted List', openWith:'* ' , multiline: true},
	ol: {name:'Numeric List', openWith: function(fongshen) {
		return fongshen.line + '. ';
	}, multiline: true},
	sp3: {separator:'---------------' },
	img: {name:'Picture', key:"P", replaceWith: function(fongshen){return MarkdownCallback.pictureReplace(fongshen)}},
	link: {name:'Link', key:"L", openWith:'[', closeWith: function(fongshen){return MarkdownCallback.linkClose(fongshen)}, placeHolder:'Click here to link...' },
	sp4: {separator:'---------------'},
	quote: {name:'Quotes', openWith:'> ', multiline: true},
	codeblock: {name:'Code Block / Code', openWith: function(fongshen){return MarkdownCallback.codeBlockOpen(fongshen)}, closeWith:'\n```', afterInsert: function(fongshen) { return MarkdownCallback.afterCodeblock(fongshen) } },
	code: {name:'Code Inline', openWith:'`', closeWith:'`', multiline: true, className: "code-inline"},
	sp5: {separator:'---------------'},
	preview: {name:'Preview', call:'createPreview', className:"preview"}
};

var MarkdownCallback = {
	linkClose: function(fongshen)
	{
		return '](' + fongshen.ask('Url', 'http://') + ')';
	},

	pictureReplace: function(fongshen)
	{
		var value = '![' + fongshen.ask('Alternative text') + '](' + fongshen.ask('Url', 'http://');

		var title = fongshen.ask('Title');

		if (title !== '')
		{
			value += ' "' + title + '"';
		}

		value += ')';

		return value;
	},

	codeBlockOpen: function(fongshen)
	{
		return '``` ' + fongshen.ask('Language') + '\n';
	},

	afterCodeblock: function(fongshen)
	{
		fongshen.getEditor().moveCursor(-1, 0);
	}
};
