import React, {useEffect, useState} from "react";
import NewButton    from "../../commons/new-button";
import Actions      from "../../commons/actions";
import Filtrado     from "../../commons/filtrado";
import Filters      from "../../../helpers/Filters";

const ArticlesList = (props) => {
    /* --- --- --- --- ---
    | INITIAL CONFIGURATIONS
    --- --- --- --- --- --- --- --- --- --- */
    const Path      = '/storage/'+process.env.MIX_IMG_ARTICULO_DIR+'/'
    const Client = axios.create({
        'baseURL': '/cms/api/articles'
    })

    /* --- --- --- --- ---
    | STATE
    --- --- --- --- --- --- --- --- --- --- */
    const [recordsList, setRecordsList] = useState([])
    const [hasActions, setHasActions]   = useState(0)

    /* --- --- --- --- ---
    | EFFECT
    --- --- --- --- --- --- --- --- --- --- */
    useEffect( () => {
        props.setLoading(true)
        document.title = 'Artículos - Dispersión CMS'
        const get_list = async () => {
            return await Client.get()
        }

        get_list().then(({data}) => {
            setRecordsList(data)
            setTimeout(() => props.setLoading(false), 500)
        })

    }, [hasActions])

    const compareDates = date =>{
        return new Date(date).getTime() > new Date().getTime()
    }

    /* --- --- --- --- ---
    | RENDER
    --- --- --- --- --- --- --- --- --- --- */
    return (
        <section className="module mb-3">
            <div className="module__head">
                <h1 className="module__head--title">Artículos</h1>
                <div className="module__head__actions">
                    <NewButton to="/cms/articulos/create"/>
                </div>
            </div>
            <div className="module__body">
                <Filtrado
                    recordsList={recordsList}
                    setRecordsList={setRecordsList}
                />
                <div className="table-responsive">
                    <table className="table table-hover w-100">
                        <thead>
                        <tr>
                            <th style={{minWidth: "240px"}}>Titulo</th>
                            <th style={{minWidth: "160px"}}>Categoría</th>
                            <th>Vistas</th>
                            <th>Estatus</th>
                            <th style={{minWidth: "126px"}}>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            {
                                recordsList.length === 0
                                    ? (
                                        <tr>
                                            <td colSpan="7" className="text-center">
                                                <small>No se encontraron registros</small>
                                            </td>
                                        </tr>
                                    )
                                    : null
                            }
                            {
                                recordsList.map(record => {
                                    console.log('record', record)
                                    const is_active     = record.deleted_at === null
                                    const is_pending    = compareDates(record.published_at)
                                    let pill = (<span className="pill-status pill-inactive">Desactivado</span>)
                                    if( is_active && is_pending )
                                    {
                                        pill = (<span className="pill-status pill-waiting">Pendiente</span>)
                                    }
                                    else if( is_active )
                                    {
                                        pill = <span className="pill-status pill-active">Activo</span>
                                    }
                                    return (
                                        <tr key={record.id}>
                                            <td>
                                                <div className="d-flex align-items-center justify-content-start">
                                                    {record.thumbnail !== null
                                                        ?
                                                        < img src={Path + record.thumbnail}
                                                        alt={record.name}
                                                        width="40"
                                                        height="40"
                                                        className="me-1 img-border-radius img-fluid"
                                                        />
                                                        : null
                                                    }
                                                    <strong>{record.is_featured ? <i className="bi bi-star-fill text-warning"/> : ''} {record.title}</strong>
                                                </div>
                                            </td>
                                            <td>
                                                <strong className="small">{record.category.title}</strong>
                                            </td>
                                            <td className="text-end">
                                                {record.visited}
                                            </td>
                                            <td className="estatus">
                                                { pill }
                                            </td>
                                            <td className="estatus">
                                                <small>{Filters.dateFormat(record.published_at)}</small><br/>
                                            </td>
                                            <td className="actions">
                                                <Actions
                                                    entryId={record.id}
                                                    currentSection="articulos"
                                                    editarButton={is_active}
                                                    activarButton={!is_active}
                                                    masOpcionesButton={false}
                                                    httpClient={Client}
                                                    hasActions={hasActions}
                                                    setHasActions={setHasActions}
                                                />
                                            </td>
                                        </tr>
                                    )
                                }).reverse()
                            }
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    )
}

export default ArticlesList
