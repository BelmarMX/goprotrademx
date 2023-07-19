import React, {Component} from 'react'
import {Link} from "react-router-dom"

class NavbarLink extends Component
{
    constructor(props) {
        super(props)
    }

    render() {
        return (
            <li className="aside__link">
                <Link to={this.props.route}>
                    <i className={this.props.icon}/> {this.props.text}
                </Link>
            </li>
        )
    }
}

export default NavbarLink;
