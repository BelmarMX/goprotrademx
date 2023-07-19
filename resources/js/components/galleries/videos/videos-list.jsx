import React, {useEffect, useState} from "react";
import Filters      from "../../../helpers/Filters";
import NewButton    from "../../commons/new-button";
import Actions      from "../../commons/actions";
import Filtrado     from "../../commons/filtrado";

const VideosList = (props) => {
    /* --- --- --- --- ---
    | INITIAL CONFIGURATIONS
    --- --- --- --- --- --- --- --- --- --- */
    const Client = axios.create({
        'baseURL': '/cms/api/video-galleries'
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
        document.title = 'Videos - Dispersión CMS'
        const get_list = async () => {
            return await Client.get()
        }

        get_list().then(({data}) => {
            setRecordsList(data)
            setTimeout(() => props.setLoading(false), 500)
        })

    }, [hasActions])

    /* --- --- --- --- ---
    | RENDER
    --- --- --- --- --- --- --- --- --- --- */
    return (
        <section className="module mb-3">
            <div className="module__head">
                <h1 className="module__head--title">Videos</h1>
                <div className="module__head__actions">
                    <NewButton to="/cms/videos/create" />
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
                                <th>Título</th>
                                <th>Videos</th>
                                <th>Estatus</th>
                                <th>Agregado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                recordsList.length === 0
                                    ? (
                                        <tr>
                                            <td colSpan="5" className="text-center">
                                                <small>No se encontraron registros</small>
                                            </td>
                                        </tr>
                                    )
                                    : null
                            }
                            {
                                recordsList.map(record => {
                                    const is_active     = record.deleted_at === null
                                    return (
                                        <tr key={record.id}>
                                            <td>
                                                <strong>{record.title}</strong>
                                            </td>
                                            <td className="text-end">
                                                {record.elements.length}
                                            </td>
                                            <td className="estatus">
                                                {
                                                    is_active
                                                        ? <span className="pill-status pill-active">Activo</span>
                                                        : <span className="pill-status pill-inactive">Desactivado</span>
                                                }
                                            </td>
                                            <td className="date">{Filters.dateFormat(record.created_at)}</td>
                                            <td className="actions">
                                                <Actions
                                                    entryId={record.id}
                                                    currentSection="videos"
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

export default VideosList
