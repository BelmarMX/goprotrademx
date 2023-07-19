import React, {Fragment, useEffect, useState} from "react";
import ReactTooltip from 'react-tooltip';
import {Link} from "react-router-dom";

const Filtrado = (props) => {
    /* --- --- --- --- ---
    | STATE
    --- --- --- --- --- --- --- --- --- --- */
    const [originalRecords, setOriginalRecords] = useState([])
    const [field, setField]                     = useState(props.field ?? 'title')

    /* --- --- --- --- ---
    | EFFECT
    --- --- --- --- --- --- --- --- --- --- */
    useEffect( () => {
        if( originalRecords.length === 0 )
        {
            setOriginalRecords(props.recordsList)
        }
    }, [props.recordsList])

    const handleKeyUp = e => {
        let search = e.target.value.toLowerCase().trim()

        let result = props.recordsList.filter(record => {
            let texto = record[field].toLowerCase().trim()
            return texto.indexOf(search) >= 0 && search !== ''
        })

        if( search.length <= 1 )
        {
            props.setRecordsList(originalRecords)
        }
        else
        {
            props.setRecordsList(result)
        }
    }

    const handleKeyPress = e => {
        if(event.which === 13 || event.which === 8)
        {
            props.setRecordsList(originalRecords)
        }
    }

    return (
        <div className="text-end mb-2 row">
            <form className="col-md-6 offset-md-6" onSubmit={e => { e.preventDefault() }}>
                <input className="form-control"
                       type="search"
                       placeholder="Filtrar listado"
                       onKeyUp={e => handleKeyUp(e)}
                       onKeyDown={e => handleKeyPress(e)}
                />
            </form>
        </div>
    )
}

export default Filtrado
