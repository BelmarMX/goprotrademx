import { EditorState, convertToRaw, ContentState }  from 'draft-js';
import React, {useEffect, useState}     from "react";
import {useParams}          from "react-router-dom";
import BackButton           from "../../commons/back-button";
import CancelButton         from "../../commons/cancel-button";
import ErrorList            from "../../commons/error-list";
import Alerts               from "../../../helpers/Alerts";
import Filters              from "../../../helpers/Filters";
import Select               from "react-select";
import { Editor }           from 'react-draft-wysiwyg'
import draftToHtml          from 'draftjs-to-html';
import htmlToDraft          from 'html-to-draftjs';
import ControlCopy          from "../../commons/control-copy";

const ArticlesForm = (props) => {
    /* --- --- --- --- ---
    | INITIAL CONFIGURATIONS
    --- --- --- --- --- --- --- --- --- --- */
    let params      = useParams()
    const mode      = props.do;
    const Path      = '/storage/'+process.env.MIX_IMG_ARTICULO_DIR+'/'
    const Client    = axios.create({
        'baseURL': '/cms/api/articles'
    })
    const Category      = axios.create({
        'baseURL': '/cms/api/categories'
    })
    const Gallery       = axios.create({
        'baseURL': '/cms/api/galleries'
    })
    const Images        = axios.create({
        'baseURL': '/cms/api/gallery-elements/get/images'
    })

    /* --- --- --- --- ---
    | STATE
    --- --- --- --- --- --- --- --- --- --- */
    const [formFields, setFormFields]               = useState({
            category_id: null
        ,   title: ''
        ,   summary: ''
        ,   best_text: ''
        ,   content: ''
        ,   is_featured: false
        ,   published_at: ''
    })
    const [formFile, setFormFile]                   = useState(null)
    const [isSending, setIsSending]                 = useState(false)
    const [errorList, setErrorList]                 = useState([])
    const [categoriesList, setCategoriesList]       = useState([])
    const [galleryList, setGalleryList]             = useState([])
    const [imageList, setImageList]                 = useState([])
    const [urlGallery, setUrlGallery]               = useState(null)
    const [urlImage, setUrlImage]                   = useState(null)
    const [thumbnail, setThumbnail]                 = useState(null)
    const [editor, setEditor]                       = useState(EditorState.createEmpty())

    /* --- --- --- --- ---
    | EFFECT
    --- --- --- --- --- --- --- --- --- --- */
    useEffect( () => {
        document.title = (mode === 'edit' ? 'Editar' : 'Nuevo') + ' Artículo - Dispersión CMS'
        const get_record    = async () => await Client.get(params.id+'/edit')
        const get_query     = async Client => await Client.get()

        get_query(Category)
            .then(({data}) => {
                if( data.length === 0 )
                {
                    Alerts.stopper('Primero debes crear una categoría', () => {
                        location.href = '/cms/categorias/create'
                    })
                }
                setCategoriesList( data
                    .filter(record => record.deleted_at === null)
                    .map(record => {
                        return {id: record.id, label: record.title}
                    })
                )
            })

        get_query(Gallery)
            .then(({data}) => {
                setGalleryList( data
                    .filter(record => record.deleted_at === null)
                    .map(record => {
                        return {id: record.id, label: record.title}
                    })
                )
            })

        get_query(Images)
            .then(({data}) => {
                setImageList( data
                    .filter(record => record.deleted_at === null)
                    .map(record => {
                        return {id: record.id, label: record.title}
                    })
                )
            })

        if( mode === 'edit')
        {
            get_record().then(({data}) => {
                setFormFields({
                        category_id: data.category_id
                    ,   title: data.title
                    ,   summary: data.summary
                    ,   best_text: data.best_text
                    ,   content: data.content
                    ,   is_featured: data.is_featured
                    ,   published_at: Filters.dateToISO(data.published_at)
                })
                setThumbnail(data.thumbnail)

                // Agregamos el estado del editor
                const contentBlock = htmlToDraft( data.content )
                setEditor( EditorState.createWithContent( ContentState.createFromBlockArray(contentBlock.contentBlocks) ) )

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
            formData.append('category_id', formFields.category_id)
            formData.append('title', formFields.title)
            formData.append('image', formFile, formFile.name)
            formData.append('summary', formFields.summary)
            formData.append('best_text', formFields.best_text)
            formData.append('content', formFields.content)
            formData.append('is_featured', formFields.is_featured === true ? 1 : 0)
            formData.append('published_at', formFields.published_at)
            return await Client.post('', formData)
        }

        post()
            .then(() => {
                setIsSending(false)
                Alerts.toastSuccess(`Registro guardado con éxito`)
                setFormFields({
                        category_id: null
                    ,   title: ''
                    ,   file: ''
                    ,   summary: ''
                    ,   best_text: ''
                    ,   content: ''
                    ,   is_featured: false
                    ,   published_at: ''
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
            formData.append('category_id', formFields.category_id)
            formData.append('title', formFields.title)
            formData.append('summary', formFields.summary)
            formData.append('best_text', formFields.best_text)
            formData.append('content', formFields.content)
            formData.append('is_featured', formFields.is_featured === true || formFields.is_featured === 1 ? 1 : 0)
            formData.append('published_at', formFields.published_at)
            if( formFile !== null )
            {
                formData.append('image', formFile, formFile.name)
            }
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
    const handleChangeCategory = e => {
        setFormFields({
                ...formFields
            ,   category_id: e.id
        })
    }

    const handeChangeUrlGallery = id => {
        const get_record = async () => await Images.get('url_gallery/'+id)
        get_record().then(({data}) => setUrlGallery(data.url) )
    }

    const handeChangeUrlImage = id => {
        const get_record = async () => await Images.get('url_image/'+id)
        get_record().then(({data}) => setUrlImage(data.url) )
    }

    const handleChangeEditor = editor => {
        setEditor(editor)
        setFormFields({
                ...formFields
            ,   content: draftToHtml(convertToRaw(editor.getCurrentContent()))
        })
    }

    /* --- --- --- --- ---
    | RENDER
    --- --- --- --- --- --- --- --- --- --- */
    return (
        <section className="module">
            <div className="module__head">
                <h1 className="module__head--title">
                    { mode === 'edit' ? 'Editar' : 'Nuevo' } Artículo
                </h1>
                <div className="module__head__actions">
                    <BackButton to="/cms/articulos"/>
                </div>
            </div>
            <div className="module__body">
                <form className="row g-2">
                    <ErrorList errorList={errorList} />

                    <div className="col-12 mb-1">
                        <div className="row">
                            <div className="col-md-3 text-center">
                                <div className="form-image-preview">
                                    {
                                        thumbnail
                                            ? <img src={Path + thumbnail}
                                                   alt="Vista previa"
                                                   className="me-1 img-border-radius mwh-200 img-fluid"
                                            />
                                            : <i className="bi bi-image-alt"/>
                                    }
                                </div>
                            </div>
                            <div className="col-md-9 align-self-end">
                                <label htmlFor="image" className="form-label">Cargar imagen</label>
                                <input id="image"
                                       className="form-control"
                                       type="file"
                                       onChange={e => {setFormFile(e.target.files[0])}}
                                />
                                <small className="hint">Archivos: .jpg, .png de {process.env.MIX_IMG_ARTICULO_MW}px x {process.env.MIX_IMG_ARTICULO_MH}px</small>
                            </div>
                        </div>
                    </div>

                    <div className="row">
                        <div className="col-md-9">
                            <div className="row g-2">
                                <div className="col-12">
                                    <label htmlFor="title" className="form-label">Título del artículo</label>
                                    <input id="title"
                                           type="text"
                                           className="form-control"
                                           placeholder="Título del artículo"
                                           value={formFields.title}
                                           onChange={e => { setFormFields({...formFields, title: e.target.value}) }}
                                    />
                                </div>
                                <div className="col-md-6">
                                    <label htmlFor="category" className="form-label">Categoría</label>
                                    <Select id="category"
                                            options={categoriesList}
                                            placeholder="Selecciona una categoría"
                                            noOptionsMessage={() => 'Sin resultados'}
                                            onChange={ e => handleChangeCategory(e) }
                                            value={categoriesList.filter(category => { return category.id === formFields.category_id })}
                                    />
                                </div>
                                <div className="col-md-6">
                                    <label htmlFor="publish" className="form-label">Publicar el</label>
                                    <input id="publish"
                                           type="date"
                                           className="form-control"
                                           placeholder="Fecha de publicación"
                                           value={formFields.published_at}
                                           onChange={e => { setFormFields({...formFields, published_at: e.target.value}) }}
                                    />
                                </div>
                                <div className="col-12">
                                    <label htmlFor="summary" className="form-label">Resumen</label>
                                    <textarea id="summary"
                                              className="form-control"
                                              rows="3"
                                              value={formFields.summary}
                                              onChange={e => { setFormFields({...formFields, summary: e.target.value}) }}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="col-12">
                        <div className="row g-2">
                            <div className="col-md-6">
                                <label htmlFor="galeries" className="form-label">Obtener URL de galería</label>
                                <Select id="galeries"
                                        className="mb-2"
                                        options={galleryList}
                                        placeholder="Selecciona una galería"
                                        noOptionsMessage={() => 'Sin resultados'}
                                        onChange={e => handeChangeUrlGallery(e.id)}
                                />
                                {
                                    urlGallery !== null
                                        ? <ControlCopy data-tip="Copiar al portapapeles"
                                                       toCopy={urlGallery}/>
                                        : null
                                }
                            </div>
                            <div className="col-md-6">
                                <label htmlFor="images" className="form-label">Obtener URL de una imagen</label>
                                <Select id="images"
                                        className="mb-2"
                                        options={imageList}
                                        placeholder="Selecciona una imagen"
                                        noOptionsMessage={() => 'Sin resultados'}
                                        onChange={e => handeChangeUrlImage(e.id)}
                                />
                                {
                                    urlImage !== null
                                        ? <ControlCopy data-tip="Copiar al portapapeles"
                                                       toCopy={urlImage}/>
                                        : null
                                }
                            </div>

                            <div className="col-md-12">
                                <label htmlFor="content" className="form-label">Contenido</label>
                                <Editor id="content"
                                        editorState={editor}
                                        onEditorStateChange={handleChangeEditor}
                                />
                            </div>
                        </div>
                    </div>

                    <div className="col-12 text-end form-actions">
                        <CancelButton to="/cms/articulos"/>
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

export default ArticlesForm
