<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <div style="max-width: 600px; font-family: sans-serif; font-size:16px; line-height:20px; padding:30px; color: #0E4B70">

            <img src="{{URL::to('images/casi-mail.png')}}" style="width:100%">

            <!-- remitente -->
            <p style="font-weight:bold; font-size: 18px">CONSULTA:</p>
            <p>
                <strong>Nombre: </strong>{{ $data['nombre'] }}<BR>
                @if(isset($data['telefono']))
                <strong>Teléfono: </strong>{{ $data['telefono'] }}<BR>
                @endif
                <strong>Email: </strong>{{ $data['email'] }}<BR>
                @if(isset($data['mensaje']))
                <strong>Mensaje: </strong>{{ $data['mensaje'] }}
                @endif
            </p>
            <!-- datos empresa -->
            <div style="border-top:1px solid #ccc;">
                <p style="font-weight:bold; font-size: 18px">CONTÁCTENOS:</p>
                <p style="">
                    <strong>Teléfonos: </strong>Tel: (011) 5197-0808 / Fax:(011) 5197-0880<br>
                    <strong>Nextel: </strong>699*1143 / 699*5995<br>
                    <strong>Email: </strong>info@coarse.com.ar<br>
                    <strong>Sitio web: </strong><a href="http://coarse.com.ar/">www.coarse.com.ar</a>
                </p>
            </div>
        </div>
    </body>
</html>