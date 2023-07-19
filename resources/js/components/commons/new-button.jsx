import React, {Component, Fragment} from "react";
import {Link} from "react-router-dom";

class NewButton extends Component
{
    constructor(props) {
        super(props);
    }

    render(){
        return (
            <Link className="btn btn-sm btn-primary"
                  to={this.props.to}
            >
                <i className="bi bi-file-earmark-plus-fill"></i> Nuevo
            </Link>
        )
    }
}

export default NewButton
