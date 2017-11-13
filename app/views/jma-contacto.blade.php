@extends($project_name.'-master')

@section('contenido')
<section>
    <div class="container">
        <h2>Envíenos su consulta:</h2>
        <div class="colForm">
            {{Form::open(array('url' => 'consulta'))}}
                <!--<form class="formConsulta" action="envia.php" method="post">-->
                <label>Nombre y apellido<br>
                    <input name="nombre" type="text" required></label>
                <label>Teléfono<br>	
                    <input name="telefono" type="text" required></label>
                <label>E-mail<br>
                    <input name="email" type="email" required></label>
               	<label>Localidad<br>
                    <input name="localidad" type="text" required></label>
                <label>Provincia<br>
                    <input name="provincia" type="text" required></label>

                <label>Consulta<br>
                    <textarea name="consulta" id="consulta"></textarea></label>
                <input type="submit" value="consultar" class="enviar floatRight">
            {{Form::close()}}
            <div class="clear"></div>
            <p class="copy">Copyright © 2015 PERFILES JMA. | All rights reserved<br>
                            Diseño web: <a href="http://www.estudiodada.com.ar/" target="blank"> Estudio Dadá</a></p>
        </div>
            <div class="colContentMapas">
                <div class="colMapa1">
                    <p class="ind" style="margin-bottom:68px"><strong>Planta Productiva</strong><br>
                                                    Parque Industrial Plátanos  Av. Milazzo 3251 y 151
                                                    (CP 1885) Plátanos - Buenos Aires - Argentina </p>
                    
                    <iframe frameborder="0" scrolling="no" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es-419&amp;geocode=&amp;q=Av.+Milazzo+3251+platanos&amp;aq=&amp;sll=-38.020548,-57.589079&amp;sspn=0.420306,0.617294&amp;ie=UTF8&amp;hq=&amp;hnear=Av+Int.+Nicol%C3%A1s+Milazzo+3251,+Ranelagh,+Buenos+Aires&amp;t=m&amp;ll=-34.787673,-58.187392&amp;spn=0.005252,0.012231&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>
                </div>
                <div class="colMapa2">
                    <p class="dir"><strong>Centro de Distribución</strong><br>
                                                    San José 1065  (C1076AAU)<br>
                                                    C.A.B.A. - Buenos Aires - Argentina</p>
                    <p class="tel">(54 11) 4305-1788 Rotativas</p>
                    <p class="mail"><strong>info@perfilesjma.com.ar</strong></p>
                    <iframe frameborder="0" scrolling="no" src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es-419&amp;geocode=&amp;q=San+Jos%C3%A9+1065,+Buenos+Aires&amp;aq=0&amp;oq=+San+Jos%C3%A9+1065+&amp;sll=-34.789067,-58.186293&amp;sspn=0.006846,0.009645&amp;ie=UTF8&amp;hq=&amp;hnear=San+Jos%C3%A9+1065,+Constituci%C3%B3n,+Buenos+Aires&amp;t=m&amp;ll=-34.617105,-58.387613&amp;spn=0.021049,0.048923&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                    <a href="http://qr.afip.gob.ar/?qr=_Rkgp5qC5YRxliyCJoGQfw,," target="_blank"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" class="data-fiscal" alt="data fiscal"></a>
                </div>
                <div class="clear"></div>
                <div class="marcaContacto">
                    <img class="logoContacto" src="http://www.perfilesjma.com.ar/images/jma-contacto.png" alt="JMA Compromiso de Solidez">
                </div>

            </div>
            <div class="clear"></div>
    </div>
</section>
@stop