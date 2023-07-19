import React, {Component, Fragment} from "react";
import {Link} from "react-router-dom";

class BackButton extends Component
{
    constructor(props) {
        super(props);
    }

    render(){
        return (
            <Link className="btn btn-sm btn-outline-primary me-1"
                  to={this.props.to}
            >
                <i className="bi bi-x-circle"></i> Cancelar
            </Link>
        )
    }
}

export default BackButton
