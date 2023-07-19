
<div class="modal fade" id="contactModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Formulario de contacto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ponte en contacto con nosotros.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mail.contacto') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email">Correo electrónico</label>
                        <input name="email" class="form-control" type="email" aria-describedby="emailHelp" placeholder="correo@dominio.com" required>
                        <small id="emailHelp" class="form-text text-muted">No compartimos tu información con nadie más.</small>
                    </div>
                    <div class="form-group mb-2">
                        <label for="nombre">Nombre del contacto</label>
                        <input name="nombre" class="form-control" type="text" placeholder="Nombre(s) Apellido(s)" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="celular">Telefono celular (opcional)</label>
                        <input name="celular" class="form-control" type="text" placeholder="+52-555-123-4567">
                    </div>
                    <div class="form-group mb-2">
                        <label for="asunto">Asunto</label>
                        <input name="asunto" class="form-control" type="text" placeholder="¿Qué tema te interesa?" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="comentarios">Comentarios adicionales</label>
                        <textarea name="comentarios" class="form-control" placeholder="Escribe aquí tus dudas o comentarios" rows="4" required></textarea>
                    </div>
                    <div class="col-md-6 offset-md-2 mb-3">
                        <div class="g-recaptcha" data-sitekey="{{ env('APP_ENV') == 'local' ? env('SB_CAPTCHA_PUBLIC') : env('CAPTCHA_PUBLIC') }}"></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
