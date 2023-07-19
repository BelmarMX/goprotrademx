import Swal from "sweetalert2";

class Alerts
{
    success(message, title = 'Tarea completada con éxito')
    {
        Swal.fire({
                icon: 'success'
            ,   title: title
            ,   text: message
        })
    }

    warning(message, title = 'Es necesario verificar la información')
    {
        Swal.fire({
                icon: 'warning'
            ,   title: title
            ,   text: message
        })
    }

    error(message, title = 'Ocurrió un error inesperado')
    {
        Swal.fire({
                icon: 'error'
            ,   title: title
            ,   text: message
        })
    }

    info(message, title = 'Mensaje importante')
    {
        Swal.fire({
                icon: 'info'
            ,   title: title
            ,   text: message
        })
    }

    confirm(message, callback = () => {}, ask="¿Estás seguro de realizar esta acción?")
    {
        Swal.fire({
                icon: 'warning'
            ,   title: ask
            ,   html: message
            ,   showCancelButton: true
            ,   confirmButtonColor: '#10B981'
            ,   cancelButtonColor: '#F59E0B'
            ,   confirmButtonText: '¡Sí, continuar!'
            ,   cancelButtonText: 'Prefiero revisar'
            ,   reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed)
            {
                callback()
            }
        })
    }

    stopper(message, callback = () => {}, ask="Es necesario tomar acciones")
    {
        Swal.fire({
                icon: 'warning'
            ,   title: ask
            ,   html: message
            ,   showCancelButton: false
            ,   confirmButtonColor: '#10B981'
            ,   confirmButtonText: 'Entendido'
            ,   allowOutsideClick: false
            ,   allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed)
            {
                callback()
            }
        })
    }


    ligthbox( img_url )
    {
        Swal.fire({
                icon: 'info'
            ,   title: "Vista Previa"
            ,   html: '<img src="'+ img_url +'" class="img-fluid w-100" alt="vista previa">'
            ,   width: '80vw'
        })
    }

    flash(message, ms = 1150)
    {
        Swal.fire({
            position: 'center',
            icon: 'info',
            title: message,
            showConfirmButton: false,
            timer: ms
        })
    }

    html(message, title = '', wide = false)
    {
        let customClass = wide ? 'swal-wide' : ''
        Swal.fire({
            title: '<strong>'+title+'</strong>',
            html: message,
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            customClass: customClass
        })
    }

    toastSuccess(message, position = 'top-end', timer = 4000)
    {
        const Toast = Swal.mixin({
            toast: true,
            position: position,
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: message
        })
    }

    toastWarning(message, position = 'top-end', timer = 4000)
    {
        const Toast = Swal.mixin({
            toast: true,
            position: position,
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'warning',
            title: message
        })
    }

    toastDanger(message, position = 'top-end', timer = 4000)
    {
        const Toast = Swal.mixin({
            toast: true,
            position: position,
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: message
        })
    }

    toastInfo(message, position = 'bottom', timer = 4000)
    {
        const Toast = Swal.mixin({
            toast: true,
            position: position,
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            title: message
        })
    }
}

export default new Alerts()
