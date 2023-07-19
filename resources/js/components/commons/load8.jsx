import React, {Fragment} from "react";

const Load8 = (props) => {
    if (!props.isVisible) {
        return <Fragment></Fragment>;
    }

    return (
        <div id="load8">
            <div className="spinner-border" role="status">&nbsp;</div>
            <div className="spinner-text mt-1">
                <span className="grow-text">Cargando ...</span>
            </div>
        </div>
    )
}

export default Load8
