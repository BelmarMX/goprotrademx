const bootstrap = require('bootstrap')

const tooltipTriggerList = []
    .slice
    .call( document.querySelectorAll('[data-bs-toggle="tooltip"]') )

const tooltipList   = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

// Fully website loaded
window.onload = event => {
}
