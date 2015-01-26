@extends($project_name.'-master')

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
    <!--<h2>Ingresar</h2>-->
        <!--<label for="nombre">Nombre</label>-->
        <input type="text" id="nombre" placeholder="nombre de usuario" name="nombre" autofocus><br>
        <!--<label for="clave">Clave</label>-->
        <input type="password" id="clave" placeholder="contraseña" name="clave"><br>
        <input type="submit" value="Ingresar" class="btn">

    </div>

    
    {{Form::hidden('url', $url)}}
    {{Form::close()}}

    <br>

</section>

@stop