import React, {useEffect, useState} from "react";
import NewButton        from "../../commons/new-button";
import Actions          from "../../commons/actions";
import Filters          from "../../../helpers/Filters";
import Filtrado         from "../../commons/filtrado";
import Modal            from "react-modal";
import CategoriesSort   from "./categories-sort";

const CategoriesList = (props) => {
    /* --- --- --- --- ---
    | INITIAL CONFIGURATIONS
    --- --- --- --- --- --- --- --- --- --- */
    Modal.setAppElement('#main')
    const Path      = '/storage/'+process.env.MIX_IMG_CATEGORIA_DIR+'/'
    const Client = axios.create({
        'baseURL': '/cms/api/categories'
    })

    /* --- --- --- --- ---
    | STATE
    --- --- --- --- --- --- --- --- --- --- */
    const [recordsList, setRecordsList]     = useState([])
    const [hasActions, setHasActions]       = useState(0)
    const [modalIsOpen, setModalIsOpen]     = useState(false)

    /* --- --- --- --- ---
    | EFFECT
    --- --- --- --- --- --- --- --- --- --- */
    useEffect( () => {
        props.setLoading(true)
        document.title = 'Categorías - Dispersión CMS'
        const get_list = async () => {
            return await Client.get()
        }

        get_list().then(({data}) => {
            setRecordsList(data)
            setTimeout(() => props.setLoading(false), 500)
        })

    }, [hasActions])

    /* --- --- --- --- ---
    | HANDLERS
    --- --- --- --- --- --- --- --- --- --- */
    const openModal = () => {
        setModalIsOpen(true)
    }

    const closeModal = () => {
        setModalIsOpen(false)
    }

    /* --- --- --- --- ---
    | RENDER
    --- --- --- --- --- --- --- --- --- --- */
    return (
        <section className="module mb-3">
            <div className="module__head">
                <h1 className="module__head--title">Categorías</h1>
                <div className="module__head__actions">
                    <NewButton to="/cms/categorias/create" />
                </div>
            </div>
            <div className="module__body">
                <Filtrado
                    recordsList={recordsList}
                    setRecordsList={setRecordsList}
                />
                <div className="text-end mb-1">
                    <button
                        className="btn btn-primary"
                        onClick={openModal}
                    >
                        <i className="bi bi-sort-numeric-down"/> Ordenar categorías
                    </button>
                </div>
                <div className="table-responsive">
                    <table className="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Título</th>
                                <th>Estatus</th>
                                <th>Creado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                recordsList.length === 0
                                    ? (
                                        <tr>
                                            <td colSpan="4" className="text-center">
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
                                            <td className="text-end">
                                                {record.order}
                                            </td>
                                            <td>
                                                <strong className="d-inline-block">{record.title}</strong>
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
                                                    currentSection="categorias"
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
                                })
                            }
                        </tbody>
                    </table>
                </div>
            </div>

            <Modal
                isOpen={modalIsOpen}
                onRequestClose={closeModal}
                contentLabel="Reordenar categorías"
            >
                <CategoriesSort
                    closeModal={closeModal}
                />
            </Modal>
        </section>
    )
}

export default CategoriesList
