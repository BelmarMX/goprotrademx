import React, {Fragment} from "react";

export default (props) => {
    let list_of_errors = []

    for(let error in props.errorList)
    {
        props.errorList[error].map(err => {
            list_of_errors.push(err)
        })
    }

    if( list_of_errors.length > 0 )
    {
        return (
            <div className="alert alert-warning" role="alert">
                <h5 className="alert-heading m-0">Hay errores en el formulario</h5>
                <hr className="my-2" />
                {
                    list_of_errors.map((error, index) => (
                        <small className="d-block mb-0" key={index}>{error}</small>
                    ))
                }
            </div>
        )
    }
    else
    {
        return (<Fragment />)
    }
}
