import React, {Fragment, useEffect} from "react";

const Home = (props) => {
    useEffect(() => {
        setTimeout(() => props.setLoading(false), 1000)
    })

    return(
        <Fragment>
            <h1>¡Bienvenido!</h1>
            <p>
                Para comenzar selecciona una opción del menú lateral.
            </p>
        </Fragment>
    )
}

export default Home
