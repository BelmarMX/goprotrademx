import React, {Fragment, useEffect, useState} from "react";
import Alerts       from "../../../helpers/Alerts";
import Filters      from "../../../helpers/Filters";
import ErrorList    from "../../commons/error-list";
import Actions      from "../../commons/actions";
import BackButton   from "../../commons/back-button";

const VideosElements = (props) => {
    /* --- --- --- --- ---
    | INITIAL CONFIGURATIONS
    --- --- --- --- --- --- --- --- --- --- */
    const Path      = '/storage/'+process.env.MIX_IMG_FOTOGALERIA_DIR+'/'
    const Client    = axios.create({
        'baseURL': '/cms/api/video-gallery-elements'
    })

    /* --- --- --- --- ---
    | STATE
    --- --- --- --- --- --- --- --- --- --- */
    const [formFields, setFormFields]   = useState({
            title: ''
        ,   summary: ''
        ,   url: ''
    })
    const [formFile, setFormFile]       = useState(null)
    const [errorList, setErrorList]     = useState([])
    const [isSending, setIsSending]     = useState(false)
    const [active, setActive]           = useState('videos')
    const [recordsList, setRecordsList] = useState([])
    const [hasActions, setHasActions]   = useState(0)
    const [isEditing, setIsEditing]     = useState(false)

    /* --- --- --- --- ---
    | EFFECT
    --- --- --- --- --- --- --- --- --- --- */
    useEffect( () => {
        const get_record = async () => {
            return await Client.get('gallery/'+props.gallery_id)
        }

        get_record().then(({data}) => {
            setRecordsList(data)
            props.setLoading(false)
        })
    }, [hasActions])

    useEffect(() => {
        if( isSending )
        {
            setErrorList([])
            props.setLoading(true)
        }
        else
        {
            setTimeout(() => props.setLoading(false), 500)
        }
    }, [isSending])

    /* --- --- --- --- ---
    | AXIOS POST
    --- --- --- --- --- --- --- --- --- --- */
    const create = () => {
        setIsSending(true)
        const post = async () => {
            let formData = {
                    video_gallery_id: props.gallery_id
                ,   type: 'video'
                ,   title: formFields.title
                ,   description: formFields.summary
                ,   url: formFields.url
            }
            if( active === 'images')
            {
                formData = new FormData()
                formData.append('video_gallery_id', props.gallery_id)
                formData.append('type', 'image')
                formData.append('title', formFields.title)
                formData.append('description', formFields.summary)
                formData.append('image', formFile, formFile.name)
            }
            return await Client.post('', formData)
        }

        post()
            .then((data) => {
                setIsSending(false)
                Alerts.toastSuccess(`Registro guardado con éxito`)
                setFormFields({
                        title: ''
                    ,   summary: ''
                    ,   url: ''
                })
                setFormFile(null)

                setRecordsList([
                        ...recordsList
                    ,   {...data.data, type: active === 'images' ? 'image' : 'video', deleted_at: null}
                ])
            })
            .catch(error => {
                setIsSending(false)
                let validate_errors = error.response.data.errors
                Alerts.toastDanger('No se pudo guardar el registro')
                setErrorList(validate_errors)
            })
    }

    /* disabled function for elements */
    const update = () => {
        setIsSending(true)
        const post = async () => {
            return await Client.put(params.id, {
                    title: formFields.title
                ,   summary: formFields.summary
            })
        }

        post()
            .then(() => {
                setIsSending(false)
                Alerts.toastSuccess(`Registro actualizado con éxito`)
            })
            .catch(error => {
                setIsSending(false)
                let validate_errors = error.response.data.errors
                Alerts.toastDanger('No se pudo actualizar el registro')
                setErrorList(validate_errors)
            })
    }
    /* disabled function for elements */

    /* --- --- --- --- ---
    | HANDLERS
    --- --- --- --- --- --- --- --- --- --- */
    const handleActiveClick     = tabname => {
        setActive(tabname)
    }

    /* --- --- --- --- ---
    | RENDER
    --- --- --- --- --- --- --- --- --- --- */
    return (
        <Fragment>
            <hr className="mt-3 mb-4"/>

            <form className="row g-2">
                <ErrorList errorList={errorList} />

                <ul className="nav nav-tabs">
                    {/*
                    <li className="nav-item">
                        <a className={`nav-link ${active === 'images' ? ' active' : ''}`}
                           onClick={() => handleActiveClick('images')}
                        ><i className="bi bi-file-earmark-plus"/> Imágenes</a>
                    </li>
                    */}
                    <li className="nav-item">
                        <a className={`nav-link ${active === 'videos' ? ' active' : ''}`}
                           onClick={() => handleActiveClick('videos')}
                        ><i className="bi bi-file-earmark-plus"/> Videos</a>
                    </li>
                </ul>

                <div className={`col-12 mb-1 ${active === 'videos' ? 'd-none' : ''}`}>
                    <div className="row">
                        <div className="col-6">
                            <label htmlFor="tituloImg" className="form-label">Título de la imagen</label>
                            <input id="tituloImg"
                                   type="text"
                                   className="form-control"
                                   placeholder="Título de la imagen"
                                   value={formFields.title}
                                   onChange={e => { setFormFields({...formFields, title: e.target.value}) }}
                            />
                        </div>
                        <div className="col-md-6 align-self-end">
                            <label htmlFor="image" className="form-label">Agregar imágenes</label>
                            <input id="image"
                                   className="form-control"
                                   type="file"
                                   onChange={e => {setFormFile(e.target.files[0])}}
                            />
                            <small className="hint">Archivos: .jpg, .png de {process.env.MIX_IMG_FOTOGALERIA_MW}px x {process.env.MIX_IMG_FOTOGALERIA_MH}px</small>
                        </div>
                        <div className="col-6">
                            <label htmlFor="descripcionImagen" className="form-label">Descripción</label>
                            <textarea id="descripcionImagen"
                                      className="form-control"
                                      rows="3"
                                      value={formFields.summary}
                                      onChange={e => { setFormFields({...formFields, summary: e.target.value}) }}
                            />
                        </div>
                    </div>
                </div>

                <div className={`col-12 mb-1 ${active === 'images' ? 'd-none' : ''}`}>
                    <div className="row">
                        <div className="col-6">
                            <label htmlFor="tituloVideo" className="form-label">Título del video</label>
                            <input id="tituloVideo"
                                   type="text"
                                   className="form-control"
                                   placeholder="Título del video"
                                   value={formFields.title}
                                   onChange={e => { setFormFields({...formFields, title: e.target.value}) }}
                            />
                        </div>
                        <div className="col-6">
                            <label htmlFor="urlVideo" className="form-label">URL del video</label>
                            <input id="urlVideo"
                                   type="text"
                                   className="form-control"
                                   placeholder="https://www.youtube.com/"
                                   value={formFields.url}
                                   onChange={e => { setFormFields({...formFields, url: e.target.value}) }}
                            />
                        </div>
                        <div className="col-6">
                            <label htmlFor="descripcionVideo" className="form-label">Descripción</label>
                            <textarea id="descripcionVideo"
                                      className="form-control"
                                      rows="3"
                                      value={formFields.summary}
                                      onChange={e => { setFormFields({...formFields, summary: e.target.value}) }}
                            />
                        </div>
                    </div>
                </div>

                <div className="col-md-12 mt-3 text-center">
                    <button type="button"
                            className="btn btn-sm btn-primary"
                            onClick={ isEditing ? update : create }
                    >
                        <i className="bi bi-file-plus-fill" /> { isEditing ? 'Actualizar' : 'Agregar' } elemento
                    </button>
                </div>

                <div className="col-12 mt-4">
                    <div className="table-responsive">
                        <table className="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>Vista previa</th>
                                    <th>Título</th>
                                    <th>Tipo</th>
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
                                                <td colSpan="6" className="text-center">
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
                                                <td className="text-center">
                                                    <img width="65"
                                                         height="65"
                                                         src={
                                                            record.type === 'image'
                                                                ? Path + record.thumbnail
                                                                : record.thumbnail
                                                        }
                                                         alt={record.title}
                                                         className="img-border-radius"
                                                    />
                                                </td>
                                                <td>
                                                    <strong>{record.title}</strong>
                                                </td>
                                                <td>
                                                    {record.type}
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
                                                        currentSection="galerias"
                                                        editarButton={false}
                                                        hideEditar={true}
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
                <div className="col-12 text-end form-actions">
                    <BackButton to="/cms/videos" />
                </div>
            </form>
        </Fragment>
    )
}

export default VideosElements
