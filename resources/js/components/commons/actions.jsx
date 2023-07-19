import React, {Fragment, useEffect, useState} from "react";
import ReactTooltip from 'react-tooltip';
import {Link} from "react-router-dom";

const Actions = (props) => {
    const id                                = props.entryId ?? 0
    const section                           = props.currentSection ?? 'undefined'
    const [editarButton, setEditarButton]   = useState(props.editarButton ?? true)
    const [hideEditar, setHideEditar]       = useState(props.hideEditar ?? false)
    const [activarButton, setActivarButton] = useState(props.activarButton ?? false)
    const [masOpcionesButton]               = useState(props.masOpcionesButton ?? true)

    const remove = async () => {
        return await props.httpClient.delete(props.entryId + '')
    }

    const restore = async () => {
        return await props.httpClient.get(props.entryId+'/restore')
    }

    const handleActivarDesactivarClick = () => {
        setActivarButton( !activarButton )
        if( !activarButton )
        {
            remove().then(() => {
                props.setHasActions( props.hasActions + 1 )
            })
        }
        else
        {
            restore().then(() => {
                props.setHasActions( props.hasActions + 1 )
                setEditarButton(true)
            })
        }
    }

    const editarElement = !hideEditar && (editarButton && !activarButton)
        ? (
            <Link className="btn btn-sm btn-outline-primary"
                  data-tip="Editar registro"
                  to={`/cms/${section}/${id}/update`}
            >
                <i className="bi bi-pencil-square"/>
            </Link>
        )
        : null

    const activarDesactivarElement = activarButton
        ? (
            <button className="btn btn-sm btn-outline-primary"
                    type="button"
                    data-tip="Activar registro"
                    onClick={handleActivarDesactivarClick}
            >
                <i className="bi bi-toggle-off"/> Activar
            </button>
        )
        : (
            <button className="btn btn-sm btn-outline-primary"
                    type="button"
                    data-tip="Desactivar registro"
                    onClick={handleActivarDesactivarClick}
            >
                <i className="bi bi-toggle-on"/> Desactivar
            </button>
        )

    const masOpcionesElement = masOpcionesButton
        ? (
            <div className="dropdown d-inline-block">
                <button className="btn btn-sm btn-outline-primary dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        title="Más opciones"
                        data-tip="Ver más opciones disponibles"
                >
                    <i className="bi bi-three-dots-vertical"/>
                </button>
                <ul className="dropdown-menu">
                    <li>
                        <a className="dropdown-item" href="#">
                            <i className="bi bi-back"/> Duplicar
                        </a>
                    </li>
                    <li>
                        <a className="dropdown-item" href="#">
                            <i className="bi bi-images"/> Agregar imágenes
                        </a>
                    </li>
                    <li>
                        <a className="dropdown-item" href="#">
                            <i className="bi bi-youtube"/> Agregar videos
                        </a>
                    </li>
                </ul>
            </div>
        )
        : null

    return (
        <Fragment>
            {editarElement}
            {props.hideActivation === true ? null : activarDesactivarElement}
            {masOpcionesElement}

            <ReactTooltip type="dark" />
        </Fragment>
    )
}

export default Actions
