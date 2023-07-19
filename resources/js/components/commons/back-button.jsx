import React, {Component, Fragment} from "react";
import {Link} from "react-router-dom";

class BackButton extends Component
{
    constructor(props) {
        super(props);
    }

    render(){
        return (
            <Link className="btn btn-sm btn-outline-primary"
                  to={this.props.to}
            >
                <i className="bi bi-arrow-return-left"></i> Regresar
            </Link>
        )
    }
}

export default BackButton
