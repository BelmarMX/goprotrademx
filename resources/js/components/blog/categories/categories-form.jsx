import React, {useEffect, useState} from "react";
import {useParams}          from "react-router-dom";
import BackButton           from "../../commons/back-button";
import CancelButton         from "../../commons/cancel-button";
import ErrorList            from "../../commons/error-list";
import Alerts               from "../../../helpers/Alerts";

const CategoriesForm = (props) => {
    /* --- --- --- --- ---
    | INITIAL CONFIGURATIONS
    --- --- --- --- --- --- --- --- --- --- */
    let params      = useParams()
    const mode      = props.do;
    const Path      = '/storage/'+process.env.MIX_IMG_CATEGORIA_DIR+'/'
    const Client    = axios.create({
        'baseURL': '/cms/api/categories'
    })

    /* --- --- --- --- ---
    | STATE
    --- --- --- --- --- --- --- --- --- --- */
    const [formFields, setFormFields] = useState({
        title: ''
    })
    const [formFile, setFormFile]   = useState(null)
    const [errorList, setErrorList] = useState([])
    const [isSending, setIsSending] = useState(false)

    /* --- --- --- --- ---
    | EFFECT
    --- --- --- --- --- --- --- --- --- --- */
    useEffect( () => {
        document.title = (mode === 'edit' ? 'Editar' : 'Nueva') + ' Categoría - Dispersión CMS'
        const get_record = async () => {
            return await Client.get(params.id+'/edit')
        }

        if( mode === 'edit')
        {
            get_record().then(({data}) => {
                setFormFields({
                    title: data.title
                })
                props.setLoading(false)
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
            const formData = new FormData()
            formData.append('title', formFields.title)
            return await Client.post('', formData)
        }

        post()
            .then(() => {
                setIsSending(false)
                Alerts.toastSuccess(`Registro guardado con éxito`)
                setFormFields({
                    title: ''
                })
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
            const formData = new FormData()
            formData.append('_method', 'PUT')
            formData.append('title', formFields.title)
            return await Client.post(params.id, formData)
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
                    { mode === 'edit' ? 'Editar' : 'Nueva' } Categoría
                </h1>
                <div className="module__head__actions">
                    <BackButton to="/cms/categorias"/>
                </div>
            </div>
            <div className="module__body">
                <form className="row g-2">
                    <ErrorList errorList={errorList} />

                    <div className="col-12">
                        <label htmlFor="title" className="form-label">Título</label>
                        <input id="title"
                               type="text"
                               className="form-control"
                               placeholder="Título de la categoría"
                               value={formFields.title}
                               onChange={e => { setFormFields({title: e.target.value}) }}
                        />
                    </div>

                    <div className="col-12 text-end form-actions">
                        <CancelButton to="/cms/categorias"/>
                        <button className="btn btn-sm btn-primary"
                                type="button"
                                onClick={ mode === 'edit' ? update : create }
                        >
                            <i className="bi bi-save"/> { mode === 'edit' ? 'Actualizar' : 'Guardar' }
                        </button>
                    </div>
                </form>
            </div>
        </section>
    )
}

export default CategoriesForm
