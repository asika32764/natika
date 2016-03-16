/**
 * Part of Phoenix project.
 *
 * @copyright  Copyright (C) 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

var Phoenix;

/**
 * Phoenix.Translator
 */
(function(Phoenix)
{
    "use strict";

   Phoenix.Translator = {
        keys: {},

        /**
         * Translate a string.
         *
         * @param {string} text
         * @returns {string}
         */
        translate: function(text)
        {
            if (this.keys[text])
            {
                return this.keys[text];
            }

            return text;
        },

        sprintf: function(text)
        {
            var args = [], i;

            for (i in arguments)
            {
                args.push(arguments[i]);
            }

            args[0] = this.translate(text);

            return underscore.string.sprintf.apply(underscore.string, args);
        },

        /**
         * Add language key.
         *
         * @param {string} key
         * @param {string} value
         *
         * @return {Phoenix.Translator}
         */
        addKey: function(key, value)
        {
            this.keys[key] = value;

            return this;
        }
    };
})(Phoenix || (Phoenix = {}));
