<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
</head>
    <body>
    <style>
        *{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif
        }
    </style>
    <img width="720"
         height="300"
         style="width: 100%; height: auto;"
         src="{{ url('/images/layout/logo-moca-png.png') }}"
         alt="{{ config('app.name') }}"
    >

    <h1>Formulario de contacto.</h1>
    <b>Correo electrónico:</b> <span>{{ $data['email'] }}</span><br>
    <b>Nombre:</b> <span>{{ $data['nombre'] }}</span><br>
    <b>Celular:</b> <span>{{ $data['celular'] }}</span><br>
    <b>Asunto:</b> <span>{{ $data['asunto'] }}</span><br>
    <b>Comentarios:</b> <span>{{ $data['comentarios'] }}</span><br>
    <br>
    <p>
        Pronto nos comunicaremos contigo para atender tu petición.
    </p>
    <br>
    Gracias,<br>
    {{ config('app.name') }}
    </body>
</html>
