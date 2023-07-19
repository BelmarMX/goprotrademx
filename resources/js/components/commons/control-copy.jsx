import React, {Fragment, useState} from "react";
import {CopyToClipboard} from "react-copy-to-clipboard/src";
import ReactTooltip from "react-tooltip";

const ControlCopy = props => {
    const [copied, setCopied]   = useState(false)

    return (
        <Fragment>
            <strong className="small like-code">{props.toCopy}</strong>
            <CopyToClipboard
                text={props.toCopy}
                onCopy={() => setCopied(true)}
            >
                <button className="btn btn-sm btn-outline-primary ms-1"
                        type="button"
                        data-tip="Copiar enlace al portapapeles"
                >
                    <i className="bi bi-clipboard2-heart"></i>
                </button>
            </CopyToClipboard>

            {copied? <small className="d-block text-success">Texto copiado</small> : null}
            <ReactTooltip type="dark" />
        </Fragment>
    )
}

export default ControlCopy
