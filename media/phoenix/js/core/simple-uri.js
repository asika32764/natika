/*!
 * The simple JS URI object.
 *
 * @license  GNU General Public License version 2 or later; see LICENSE
 *
 * @link  https://github.com/asika32764/simple-uri.js
 */

/**
 * The simple JS URI object.
 *
 * Usage
 * ```
 * var uri = new URI('http://yourhost.com');
 *
 * uri.path = 'some/dir';
 * uri.port = 8080;
 *
 * uri.setQuery({flower: 'sakura', tree: 'santa'});
 * uri.setVar('foo', 'bar');
 *
 * uri.toString();
 * ```
 *
 * No Conflict
 *
 * ```
 * var MyURI = URI.noConflict();
 * ```
 */
;(function()
{
    "use strict";

    var Class = "SimpleURI",
        bak = window.URI;

    /**
     * Class init.
     *
     * @param {string} uri URI string.
     *
     * @constructor
     */
    Class = window.URI = window[Class] = function(uri)
    {
        this.parse(uri);
    };

    /**
     * Parse uri string.
     *
     * @param {string} uri URI string.
     */
    Class.prototype.parse = function(uri)
    {
        var parser = document.createElement('a');

        parser.href = uri;

        this.scheme = parser.protocol || '';
        this.username = parser.username || '';
        this.password = parser.password || '';
        this.host = parser.hostname || '';
        this.port = parser.port || '';
        this.path = parser.pathname || '';
        this.query = parseQueryString(parser.search) || '';
        this.hash = parser.hash || '';
    };

    /**
     * Set Query.
     *
     * @param {Object} queries Query object.
     */
    Class.prototype.setQuery = function(queries)
    {
        this.query = queries;
    };

    /**
     * Set query value
     *
     * @param {string} key   Query key.
     * @param {string} value Query value.
     */
    Class.prototype.setVar = function(key, value)
    {
        this.query[key] = value;
    };

    /**
     * Get query value
     *
     * @param {string} key        Query key.
     * @param {string} defaultVal The default value if key not exists.
     *
     * @returns {*}
     */
    Class.prototype.getVar = function(key, defaultVal)
    {
        return this.query[key] || defaultVal;
    };

    /**
     * Http build query.
     *
     * @param {object} data      The data to build query, should be an object.
     * @param {string} separator query separator, default is '&'.
     *
     * @note  This function has many influences from: http://phpjs.org/functions/http_build_query/
     *
     * @returns {string}
     */
    Class.prototype.httpBuildQuery = function(data, separator)
    {
        var value,
            key,
            queries = [],
            query;

        separator = separator || '&';

        for (key in data)
        {
            value = data[key];

            query = buildQuery(key, value, separator);

            if (query !== '')
            {
                queries.push(query);
            }
        }

        return queries.join(separator);
    };

    /**
     * Make uri To string.
     *
     * @returns {string}
     */
    Class.prototype.toString = function(parts)
    {
        var uri = '';
        var query = this.httpBuildQuery(this.query);

        parts = parts || ['scheme', 'user', 'pass', 'host', 'port', 'path', 'query', 'fragment'];

        uri += parts.indexOf('scheme') != -1 ? (this.scheme ? this.scheme + '//' : '') : '';
        uri += parts.indexOf('user') != -1 ? this.username : '';
        uri += parts.indexOf('pass') != -1 ? (this.password ? ':' : '') + this.password + (this.username ? '@' : '') : '';
        uri += parts.indexOf('host') != -1 ? this.host : '';
        uri += parts.indexOf('port') != -1 ? (this.port ? ':' : '') + this.port : '';
        uri += parts.indexOf('path') != -1 ? '/' + this.path.replace(/^\/|\/$/g, '') : '';
        uri += parts.indexOf('query') != -1 ? (query ? '/?' + query : '') : '';
        uri += parts.indexOf('fragment') != -1 ? (this.hash ? '#' + this.hash : '') : '';

        return uri;
    };

    /**
     * Make this object on conflict to other library.
     *
     * @returns {string}
     */
    Class.noConflict = function()
    {
        if (window.URI === this)
        {
            window.URI = bak;
        }

        return Class;
    };

    /**
     * Parse http query.
     *
     * @param queryString {string}
     *
     * @note  This function has many influences from mootools.js
     *
     * @private
     * @returns {Object}
     */
    var parseQueryString = function(queryString)
    {
        var vars,
            object = {},
            key,
            val;

        if (!queryString)
        {
            return {};
        }

        // remove the leading question mark from the query string if it is present
        if (queryString.charAt(0) == '?')
        {
            queryString = queryString.substring(1);
        }

        vars = queryString.split(/[&;]/);

        if (!vars.length)
        {
            return object;
        }

        for (var k in vars)
        {
            val = vars[k];

            var index = val.indexOf('=') + 1;
            var value = index ? val.substr(index) : '';
            var keys  = index ? val.substr(0, index - 1).match(/([^\]\[]+|(\B)(?=\]))/g) : [val];
            var obj   = object;

            if (!keys)
            {
                return;
            }

            value = decodeURIComponent(value);

            for (var i in keys)
            {
                key = decodeURIComponent(keys[i]);

                var current = obj[key];

                if (i < keys.length - 1)
                {
                    obj = obj[key] = current || {};
                }
                else if (typeof current == 'object')
                {
                    current.push(value);
                }
                else
                {
                    obj[key] = current != null ? [current, value] : value;
                }
            }
        }

        return object;
    };

    /**
     * Build query helper.
     *
     * @param {string} key
     * @param {*}      val
     * @param {string} separator
     *
     * @private
     * @returns {string}
     */
    var buildQuery = function(key, val, separator)
    {
        var k, queries = [];

        if (val === true)
        {
            val = '1';
        }
        else if (val === false)
        {
            val = '0';
        }

        if (val != null)
        {
            if (typeof val === 'string' || typeof val === 'number')
            {
                return key + '=' + val;
            }
            else if (typeof val === 'object')
            {
                for (k in val)
                {
                    if (val[k] != null)
                    {
                        queries.push(buildQuery(key + '[' + k + ']', val[k], separator));
                    }
                }

                return queries.join(separator);
            }
            else
            {
                throw new Error('There was an error processing for buildQuery().');
            }
        } else
        {
            return '';
        }
    };
})();
