import React, {Fragment, useEffect} from "react";

const Nomatch = (props) => {
    useEffect( () => {
        props.setLoading(false)
    }, [])

    return(
        <Fragment>
            <div className="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Ups!</strong> La ruta a la que has ingresado no fue encontrada.
            </div>
        </Fragment>
    )
}

export default Nomatch
