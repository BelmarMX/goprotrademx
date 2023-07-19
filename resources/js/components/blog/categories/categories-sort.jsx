import React, {useEffect, useState}             from "react";
import {sortableContainer, sortableElement}     from "react-sortable-hoc";
import {arrayMoveImmutable}                     from "array-move";
import Alerts from "../../../helpers/Alerts";

const CategoriesSort = (props) => {
    /* --- --- --- --- ---
    | INITIAL CONFIGURATIONS
    --- --- --- --- --- --- --- --- --- --- */
    const Path      = '/storage/'+process.env.MIX_IMG_CATEGORIA_DIR+'/'
    const Client = axios.create({
        'baseURL': '/cms/api/categories'
    })

    /* --- --- --- --- ---
    | STATE
    --- --- --- --- --- --- --- --- --- --- */
    const [recordsList, setRecordsList] = useState([])

    /* --- --- --- --- ---
    | EFFECT
    --- --- --- --- --- --- --- --- --- --- */
    useEffect( () => {
        const get_list = async () => {
            return await Client.get()
        }

        get_list().then(({data}) => {
            setRecordsList(data)
        })

    }, [])

    /* --- --- --- --- ---
    | HANDLERS
    --- --- --- --- --- --- --- --- --- --- */
    const SortableItem      = sortableElement(({value}) => <li>{value}</li>)
    const SortableContainer = sortableContainer(({children}) => {
        return <ul className="sortableUl">{children}</ul>
    })
    const SortEnd           = ({oldIndex, newIndex}) => {
        setRecordsList( arrayMoveImmutable(recordsList, oldIndex, newIndex) )
    }


    const update = () => {
        const post = async () => {
            let prepare = []
            recordsList.map((record, index) => {
                prepare.push({
                        id: record.id
                    ,   order: index
                })
            })
            return await Client.post('sort', {prepare: prepare})
        }

        post()
            .then(() => {
                Alerts.toastSuccess(`Orden de categorías actualizado con éxito`)
            })
            .catch(error => {
                Alerts.toastDanger('No se pudo actualizar el orden de las categorías')
            })

        location.reload()
    }

    /* --- --- --- --- ---
    | RENDER
    --- --- --- --- --- --- --- --- --- --- */
    return (
        <div id="sortable">
            <div className="text-end">
                <button
                    className="btn btn-light"
                    onClick={props.closeModal}
                >
                    <i className="bi bi-x-lg" />
                </button>
            </div>
            <div className="module__head">
                <h2 className="module__head--title">Reordenar categorías</h2>
            </div>

            <div className="px-md-5">
                <SortableContainer onSortEnd={SortEnd}>
                    {recordsList.map((record, index) => {
                        let value = `${index}: ${record.title}`
                        return (
                            <SortableItem key={`item-${record.id}`} index={index} value={value}/>
                        )
                    })}
                </SortableContainer>

                <div className="text-end mt-2">
                    <button className="btn btn-sm btn-primary"
                            type="button"
                            onClick={update}
                    >
                        <i className="bi bi-save"/> Guardar y salir
                    </button>
                </div>
            </div>
        </div>
    )
}

export default CategoriesSort
