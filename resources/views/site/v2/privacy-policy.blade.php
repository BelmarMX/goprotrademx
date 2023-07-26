@extends('site.v2.master.app')

@section('title', 'Privacy Policy')
@section('description', '')
@section('image', asset('v1/img/nearshoring.png'))

@section('content')
    <div id="featured" class="d-flex justify-content-center align-items-center my-5">
        <div class="star">
            <p class="text-center">
                You can trust our People, Expertise and Services to Simplify your Customs and Logistics Processes.<br>
                <strong>Free your resources to focus in your core business</strong>
            </p>
        </div>
    </div>

    <section id="main" class="container mb-5">
        <h1 class="gradient">@yield('title')</h1>

        <div class="row align-items-center mb-5">
            <div class="col-12 mb-5 editor-content font-14">
                <small>Actualización: {{ env('AVP_DATE') }}</small>
                <p>
                    El aviso de privacidad forma parte del uso del sitio web en el que se esté accediendo.
                </p>
                <h2 class="text-start">Responsable</h2>
                <p class="text-justify">
                    Usted podrá contactar a <strong>{{ env('AVP_NAME') }}</strong> por medio del correo electrónico: {{ env('AVP_MAIL') }}. Una de las prioridades de <strong>{{ env('AVP_NAME') }}</strong> es respetar la privacidad de sus usuarios y mantener segura la información y los datos personales que recolecta. Así mismo, <strong>{{ env('AVP_NAME') }}</strong> informará al usuario qué tipo de datos recolecta, cómo los almacena, la finalidad del archivo,cómo los protege, el alcance de su compromiso de confidencialidad y los derechos que éste posee como titular de la información.
                </p>
                <h2 class="text-start">Datos personales</h2>
                <p class="text-justify">
                    En <strong>{{ env('AVP_NAME') }}</strong> recogemos información desde varias áreas de nuestros sitios web. Para cada uno de estos sitios, la información que se solicita es distinta y se almacena en bases de datos separadas. La información deberá ser veraz y completa. El usuario responderá en todo momento por los datos proporcionados y en ningún caso <strong>{{ env('AVP_NAME') }}</strong> será responsable de los mismos. Entre la información solicitada al usuario, se encuentra: Nombre, estado, ciudad, empresa, teléfono, correo electrónico, áreas de Interes, etc.
                </p>
                <h2 class="text-start">Qué son las cookies y como se utilizan</h2>
                <p class="text-justify">
                    Los cookies son pequeñas piezas de información que son enviadas por el sitio Web a su navegador y se almacenan en el disco duro de su equipo y se utilizan para determinar sus preferencias cuando se conecta a los servicios de nuestros sitios, así como para rastrear determinados comportamientos o actividades llevadas a cabo por usted dentro de nuestros sitios. En algunas secciones de nuestro sitio requerimos que el cliente tenga habilitados los cookies ya que algunas de las funcionalidades requieren de éstas para trabajar. Los cookies nos permiten: a) reconocerlo al momento de entrar a nuestros sitios y ofrecerle de una experiencia personalizada, b) conocer la configuración personal del sitio especificada por usted, por ejemplo, los cookies nos permiten detectar el ancho de banda que usted ha seleccionado al momento de ingresar al home page de nuestros sitios, de tal forma que sabemos qué tipo de información es aconsejable descargar, c) calcular el tamaño de nuestra audiencia y medir algunos parámetros de tráfico, pues cada navegador que obtiene acceso a nuestros sitios adquiere un cookie que se usa para determinar la frecuencia de uso y las secciones de los sitios visitadas, reflejando así sus hábitos y preferencias, información que nos es útil para mejorar el contenido, los titulares y las promociones para los usuarios. Los cookies también nos ayudan a rastrear algunas actividades, por ejemplo, en algunas de las encuestas que lanzamos en línea, podemos utilizar cookies para detectar si el usuario ya ha llenado la encuesta y evitar desplegarla nuevamente, en caso de que lo haya hecho. Sin embargo, las cookies le permitirán tomar ventaja de las características más benéficas que le ofrecemos, por lo que le recomendamos que las deje activadas. La utilización de cookies no será utilizada paraidentificar a los usuarios, con excepción de los casos en que se investiguen posibles actividades fraudulentas.
                </p>
                <h2 class="text-start">Uso de la información</h2>
                <p class="text-justify">
                    La información solicitada permite a <strong>{{ env('AVP_NAME') }}</strong> contactar a los usuarios y potenciales clientes, cuando sea necesario para completar los procedimientos de de compra, así como contactar a los usuarios. Así mismo <strong>{{ env('AVP_NAME') }}</strong> utilizará la información obtenida para: Procurar un servicio eficiente Informar sobre nuevos productos o servicios que estén relacionados con el contratado o adquirido por el cliente. Dar cumplimiento a obligacionescontraídas con nuestros clientes. Informar sobre cambios de nuestros productos o servicios. Proveer una mejor atención al usuario.
                </p>
                <h2 class="text-start">Limitación de uso y divulgación de la información</h2>
                <p class="text-justify">
                    En nuestro programa de notificación de promociones, ofertas y servicios a través de correo electrónico, sólo <strong>{{ env('AVP_NAME') }}</strong> tiene acceso a la información recabada. Este tipo de publicidad se realiza mediante avisos y mensajes promocionales de correo electrónico, los cuales sólo serán enviados a usted y a aquellos contactos registrados para tal propósito, esta indicación podrá usted modificarla en cualquier momento. En los correos electrónicos enviados, pueden incluirse ocasionalmente ofertas de terceras partes que sean nuestros socios comerciales. En el caso de empleo de cookies, el botón de "ayuda" que se encuentra en la barra de herramientas de la mayoría de los navegadores, le dirá cómo evitar aceptar nuevos cookies, cómo hacer que elnavegador le notifique cuando recibe un nuevo cookie o cómo deshabilitar todos los cookies.
                </p>
                <h2 class="text-start">Derechos Arco</h2>
                <p class="text-justify">
                    En este apartado se deberán especificar los medios que el responsable pone a disposición de los titulares para ejercer sus derechos ARCO. Los datos personales proporcionados por el usuario formarán parte de un archivo que contendrá su perfil. El usuario puede solicitar modificar su perfil en cualquier momento enviándonos un correo a: {{ env('AVP_MAIL') }}.
                    Asimismo podrá notificarnos la oposición al uso de sus datos personales o la cancelación del tratamiento de información y la cancelación de su expediente, por los mismos medios o comunicándose al teléfono {{ env('AVP_PHONE') }}, <strong>{{ env('AVP_NAME') }}</strong> aconseja al usuario que actualice sus datos cada vez que éstos sufran alguna modificación, ya que esto permitirá brindarle un servicio más personalizado.
                </p>
                <h2 class="text-start">Transferencia de información con terceros</h2>
                <p class="text-justify">
                    <strong>{{ env('AVP_NAME') }}</strong> únicamente realiza transferencias de información con las empresas de webhosting con las que mantiene una relación jurídica vigente para poder mantener, actualizar y administrar sus sitios web, a través de los que informa a sus clientes, contratantes y usuarios sobre actividades,promociones, eventos y estudios.
                </p>
                <p class="text-justify">
                    Se debe aclarar que ninguna transmisión por Internet puede garantizar su seguridad al 100%, por lo tanto, aunque nos esforcemos en proteger su información personal, no se puede asegurar ni garantizar la seguridad de la transmisión de ninguna información. Una vez recibidos los datos, haremos todo lo posible por salvaguardar la información en nuestro servidor.
                </p>
                <h2 class="text-start">Cambios en el aviso de privacidad</h2>
                <p class="text-justify">
                    Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, para la atención de novedades legislativas o jurisprudenciales, políticas internas, nuevos requerimientos para la prestación u ofrecimiento de nuestros servicios o productos y prácticas del mercado. Estas modificaciones estarán disponibles al público a través de los siguientes medios: en nuestra sitio de Internet {{ env('APP_URL')}} en la sección aviso de privacidad y/o se las haremos llegar al último correo electrónico que nos haya proporcionado.
                </p>
                <h2 class="text-start">Aceptación de los términos</h2>
                <p class="text-justify">
                    Esta declaración de Confidencialidad / Privacidad está sujeta a los términos y condiciones de del sitio web de <strong>{{ env('AVP_NAME') }}</strong> antes descritos, lo cual constituye un acuerdo legal entre el usuario y <strong>{{ env('AVP_NAME') }}</strong> Si el usuario utiliza los servicios de <strong>{{ env('AVP_NAME') }}</strong> o de alguno de sus asociados, significa que ha leído, entendido y acordado los términos antes expuestos. Si no está de acuerdo con ellos, el usuario no deberá proporcionar ninguna información personal, ni utilizar los servicios de los sitios de <strong>{{ env('AVP_NAME') }}</strong>.
                </p>
            </div>
        </div>
    </section>
@endsection
