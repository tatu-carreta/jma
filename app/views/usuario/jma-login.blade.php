@extends($project_name.'-master')

@section('header')@stop
@section('footer')@stop

@section('contenido')
    @if (Session::has('mensaje'))
    <script src="{{URL::to('js/divAlertaFuncs.js')}}"></script>
    @endif
<section class="container">
    

    {{ Form::open(array('url' => 'login')) }}
    @if (Session::has('mensaje'))
        <div class="divAlerta error alert-success">{{ Session::get('mensaje') }}<i onclick="" class="cerrarDivAlerta fa fa-times fa-lg"></i></div>
    @endif

    <div class="divLogin">

        <div class="loginMarca">
            <img src="{{URL::to('images/jma-admin.png')}}" alt="JMA. Perfiles de Acero Galvanizado">
        </div>
        <div class="registrarse">
            <!--<label for="nombre">Nombre</label>-->
            <input type="text" id="nombre" placeholder="nombre de usuario" name="nombre" autofocus><br>
            <!--<label for="clave">Clave</label>-->
            <input type="password" id="clave" placeholder="contraseña" name="clave"><br>
            <input type="submit" value="Ingresar" class="btn">
        </div>
    </div>

    
    {{Form::hidden('url', $url)}}
    {{Form::close()}}
</section>

@stop