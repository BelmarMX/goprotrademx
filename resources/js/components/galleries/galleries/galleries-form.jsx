import React, {useEffect, useState} from "react";
import {useParams}          from "react-router-dom";
import BackButton           from "../../commons/back-button";
import CancelButton         from "../../commons/cancel-button";
import ErrorList            from "../../commons/error-list";
import Alerts               from "../../../helpers/Alerts";
import GalleryElements      from "./gallery-elements";

const GalleriesForm = (props) => {
    /* --- --- --- --- ---
    | INITIAL CONFIGURATIONS
    --- --- --- --- --- --- --- --- --- --- */
    let params      = useParams()
    const mode      = props.do;
    const Client    = axios.create({
        'baseURL': '/cms/api/galleries'
    })

    /* --- --- --- --- ---
    | STATE
    --- --- --- --- --- --- --- --- --- --- */
    const [formFields, setFormFields] = useState({
            title: ''
        ,   summary: ''
    })

    const [errorList, setErrorList]         = useState([])
    const [isSending, setIsSending]         = useState(false)
    const [galleryId, setGalleryId]         = useState(0)

    /* --- --- --- --- ---
    | EFFECT
    --- --- --- --- --- --- --- --- --- --- */
    useEffect( () => {
        console.log(params)
        let navbar_title = params.id === '1' ? 'Banner' : 'Galería'
        document.title = (mode === 'edit' ? 'Editar' : 'Nueva') + ' ' + navbar_title + ' - Dispersión CMS'
        const get_record = async () => {
            return await Client.get(params.id+'/edit')
        }

        if( mode === 'edit')
        {
            get_record().then(({data}) => {
                setFormFields({
                        title: data.title
                    ,   summary: data.summary
                })
                setGalleryId(data.id)
                props.setLoading(true)
            })
        }
    }, [])

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
            return await Client.post('', {
                    title: formFields.title
                ,   summary: formFields.summary
            })
        }

        post()
            .then(({data}) => {
                setIsSending(false)
                Alerts.toastSuccess(`Registro guardado con éxito`)
                setFormFields({
                        title: data.title
                    ,   summary: data.summary
                })
                setGalleryId(data.id)
            })
            .catch(error => {
                setIsSending(false)
                let validate_errors = error.response.data.errors
                Alerts.toastDanger('No se pudo guardar el registro')
                setErrorList(validate_errors)
            })
    }

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

    /* --- --- --- --- ---
    | HANDLERS
    --- --- --- --- --- --- --- --- --- --- */

    /* --- --- --- --- ---
    | RENDER
    --- --- --- --- --- --- --- --- --- --- */
    return (
        <section className="module">
            <div className="module__head">
                <h1 className="module__head--title">
                    { mode === 'edit' ? 'Editar' : 'Nueva' } { params.id === '1' ? 'Banner' : 'Galería' }
                </h1>
                <div className="module__head__actions">
                    <BackButton to="/cms/galerias" />
                </div>
            </div>
            <div className="module__body">
                <form className="row g-2">
                    <ErrorList errorList={errorList} />

                    <div className="col-12">
                        <label htmlFor="titulo" className="form-label">Título de la galería</label>
                        <input id="titulo"
                               type="text"
                               className="form-control"
                               placeholder="Título de la galería"
                               value={formFields.title}
                               onChange={e => { setFormFields({...formFields, title: e.target.value}) }}
                               disabled={galleryId !== 0 && mode !== 'edit'}
                        />
                    </div>

                    <div className="col-12">
                        <label htmlFor="summary" className="form-label">Descripción resumida</label>
                        <textarea id="summary"
                                  className="form-control"
                                  rows="3"
                                  placeholder="Descripción"
                                  value={formFields.summary}
                                  onChange={e => { setFormFields({...formFields, summary: e.target.value}) }}
                                  disabled={galleryId !== 0 && mode !== 'edit'}
                        />
                    </div>

                    <div className={`col-12 text-end form-actions ${galleryId !== 0 && mode !== 'edit' ? 'd-none' : ''}`}>
                        <CancelButton to="/cms/galerias" />
                        <button className="btn btn-sm btn-primary"
                                type="button"
                                onClick={ mode === 'edit' ? update : create }
                        >
                            <i className="bi bi-save"/> { mode === 'edit' ? 'Actualizar' : 'Guardar' }
                        </button>
                    </div>
                </form>

                {
                    galleryId !== 0
                        ? <GalleryElements
                            gallery_id={galleryId}
                            setLoading={props.setLoading}
                        />
                        : null
                }

            </div>
        </section>
    )
}

export default GalleriesForm
