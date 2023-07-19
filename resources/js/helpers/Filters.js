class Filters
{
    dateFormat(date, longDescription = false, capitalize = false, def_return = null)
    {
        if( date === null && def_return !== null )
        {
            return def_return;
        }
        const dateToFormat = new Date(date)
        let options = longDescription
            ? { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }
            : { year: 'numeric', month: '2-digit', day: '2-digit'}

        return longDescription && capitalize
            ? this.capitalizeFirstLetter(dateToFormat.toLocaleDateString('es-MX', options))
            : dateToFormat.toLocaleDateString('es-MX', options)
    }

    /**
     * @param datetime
     * @param longDescription
     * @param capitalize
     * @returns {string}
     */
    datetimeFormat( datetime, longDescription = false, capitalize = false )
    {
        const datetimeToFormatt = new Date (datetime)
        let options = longDescription
            ? { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' }
            : { year: 'numeric', month: '2-digit', day: '2-digit', hour: 'numeric', minute: 'numeric', second: 'numeric'}

        return longDescription && capitalize
            ? this.capitalizeFirstLetter(datetimeToFormatt.toLocaleString('es-MX', options))
            : datetimeToFormatt.toLocaleString('es-MX', options)
    }

    dateToISO(date)
    {
        return new Date(date).toISOString().slice(0, 10)
    }

    /**
     * @param date_dmY
     * @param date_two
     * @param operation
     * @returns {*}
     */
    dateOperations(date_dmY, date_two, operation)
    {
        let results = 0
        switch (operation)
        {
            case 'sumar.diasxhoras':
                if( parseInt(date_two) > 0)
                {
                    let dt_slash = date_dmY.split('/')
                    let fecha_parse = new Date(dt_slash[2] +'/'+ dt_slash[1] +'/'+ dt_slash[0]  )
                    let dias = parseInt(date_two) / 24
                    results = fecha_parse.setDate(fecha_parse.getDate() + dias)
                }
                else
                {
                    results = date_dmY
                }
                break

            default:
                results = null
        }
        return results
    }

    /**
     * @param string
     * @returns {string}
     */
    capitalizeFirstLetter(string)
    {
        return string.charAt(0).toUpperCase() + string.slice(1)
    }

    /**
     * @param string
     * @returns {*}
     */
    decode_unicode(string)
    {
        const unicodeList = [
                { code: 'u00C1', replace: 'Ã'}
            ,   { code: 'u00E1', replace: 'Ã¡'}
            ,   { code: 'u00C9', replace: 'Ã‰'}
            ,   { code: 'u00E9', replace: 'Ã©'}
            ,   { code: 'u00CD', replace: 'Ã'}
            ,   { code: 'u00ED', replace: 'Ã­'}
            ,   { code: 'u00D3', replace: 'Ã“'}
            ,   { code: 'u00F3', replace: 'Ã³'}
            ,   { code: 'u00DA', replace: 'Ãš'}
            ,   { code: 'u00FA', replace: 'Ãº'}
            ,   { code: 'u00DC', replace: 'Ãœ'}
            ,   { code: 'u00FC', replace: 'Ã¼'}
            ,   { code: 'u00D1', replace: 'Ã‘'}
            ,   { code: 'u00F1', replace: 'Ã±'}
            ,   { code: 'u0022', replace: '&'}
            ,   { code: 'u003C', replace: '<'}
            ,   { code: 'u003E', replace: '>'}
            ,   { code: 'u00a1', replace: 'Â¡'}
            ,   { code: 'u201c', replace: '"'}
            ,   { code: 'u201d', replace: '"'}
        ]

        unicodeList.forEach(unicode => {
            if( string.includes(unicode.code) )
            {
                string = string.replaceAll(unicode.code, unicode.replace)
            }
            else if( string.includes(unicode.code.toLowerCase()) )
            {
                string = string.replaceAll(unicode.code.toLowerCase(), unicode.replace)
            }
        })

        return string
    }

    /**
     * @param text
     * @returns {*}
     */
    decode_phphtmlspecialchars(text)
    {
        let map = {
            '&amp;': '&',
            '&#038;': "&",
            '&lt;': '<',
            '&gt;': '>',
            '&quot;': '"',
            '&#039;': "'",
            '&#8217;': "â€™",
            '&#8216;': "â€˜",
            '&#8211;': "â€“",
            '&#8212;': "â€”",
            '&#8230;': "â€¦",
            '&#8221;': 'â€'
        }

        return text.replace(/\&[\w\d\#]{2,5}\;/g, function(m) { return map[m]; });
    }

    /**
     * @param text
     * @param options el objeto options puede contener: {regex: /expresion/, break_line: "<br>" o "\n", vignete: "*"}
     * @returns {string}
     */
    split_into_rows(text, options = {})
    {
        let result = "";
        let row_br = options.break_line
            ? options.break_line
            : "<br>"
        let vignete = options.vignete
            ? options.vignete + ' '
            : ''
        let matches = []

        if( options.regex )
        {
            matches = text.match(options.regex)
            text = text.split(options.regex)
        }
        else
        {
            text = text.split("\n")
        }
        text.forEach(function(row, i){
            if( row.trim() !== '' )
            {
                if( options.regex && matches[i])
                {
                    row = row + matches[i]
                }
                result += vignete + this.decode_unicode(row) + row_br
            }
        }.bind(this))
        return result
    }

    /**
     * Formatting a number with commas
     * @param string
     * @returns {string}
     */
    number_format( string )
    {
        if( string === null)
        { return 0 }
        return string.toString().replace(/[^\d.]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')
    }

    /**
     * Convert a number in string format to Float
     * @param string
     * @returns {number}
     */
    string_to_number( string )
    {
        return parseFloat(string.toString().replace(/[^\d.]/g, ''))
    }

    /**
     * Return text as a key
     * @param phrase
     * @returns {*}
     */
    return_as_key( phrase )
    {
        let search_replace  = {
                "Ã¡": "a"
            ,   "Ã ": "a"
            ,   "Ã¢": "a"
            ,   "Ã£": "a"
            ,   "Âª": "a"
            ,   "Ã©": "e"
            ,   "Ã¨": "e"
            ,   "Ãª": "e"
            ,   "Ã­": "i"
            ,   "Ã¬": "i"
            ,   "Ã®": "i"
            ,   "Ã³": "o"
            ,   "Ã²": "o"
            ,   "Ã´": "o"
            ,   "Ãµ": "o"
            ,   "Âº": "o"
            ,   "Ãº": "u"
            ,   "Ã¹": "u"
            ,   "Ã»": "u"
            ,   "Ã±": "n"
            ,   " ": "_"
            ,   "-": "_"
            ,   ":": ""
            ,   ";": ""
            ,   ",": ""
            ,   ".": ""
            ,   "Â¿": ""
            ,   "?": ""
            ,   "Â¡": ""
            ,   "!": ""
            ,   "=": ""
            ,   "'": ""
            ,   "\"": ""
            ,   "#": ""
            ,   "@": ""
            ,   "$": ""
            ,   "%": ""
            ,   "&": ""
            ,   "/": ""
            ,   "(": "_"
            ,   ")": ""
        }

        phrase = phrase.toLowerCase()
        for(let search in search_replace )
        {
            phrase = phrase.replaceAll(search, search_replace[search])
        }
        phrase = phrase.replaceAll('__', '_')
        phrase = phrase.replaceAll('_ano_', '_anyo_')

        return phrase
    }

    /**
     * Remove special chars for text as new line, tabs and returns
     * @param string
     * @returns {*}
     */
    clean_text_chars( string )
    {
        return string
            .replaceAll("\n", '')
            .replaceAll("\t", '')
            .replaceAll("\r", '')
    }

    truncate( string, length = 80, continue_text = '...' )
    {
        return string.length > length
            ? string.substring(0, length) + continue_text
            : string
    }
}

export default new Filters()
