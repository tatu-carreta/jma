@extends($project_name.'-master')

@section('contenido')
    @if(Session::has('mensaje'))
        <script src="{{URL::to('js/divAlertaFuncs.js')}}"></script>
    @endif
<section class="container">
    @if (Session::has('mensaje'))
        <div class="divAlerta ok alert-success">{{ Session::get('mensaje') }}<i onclick="" class="cerrarDivAlerta fa fa-times fa-lg"></i></div>
    @endif
    <h1>Somos la Empresa Argentina Líder en fabricación y comercialización de Perfiles de Acero Galvanizado, desarrollando todas las variantes que demandan el mercado interno y externo:</h1>
    <div class="colTextoHome">
        <img class="certificaciones" src="{{URL::to('images/certificaciones2.png')}}" alt="Certificación IRAM e IQNET">
        <img class="certificacionesA" src="{{URL::to('images/certificaciones.png')}}" alt="Certificación IRAM e IQNET">
    </div>
    <div class="colFotosHome">
        <a href="{{URL::to('menu/perfiles-desmontables')}}">
            <h2>PERFILES DESMONTABLES</h2>
            <div class="bordeVerdeLateral">
                <img class="ampliar" src="{{URL::to('images/perfiles-desmontables.jpg')}}" alt="Perfiles Desmontables">
                <p>Sistema de suspensión para cielorrasos desmontables</p>
            </div>
        </a>
    </div>
    <div class="colFotosHome">
        <a href="{{URL::to('menu/drywall')}}">
            <h2>DRYWALL</h2>
            <div class="bordeVerdeLateral">
                <img class="ampliar" src="{{URL::to('images/drywall.jpg')}}" alt="Perfiles Desmontables">
                <p>Perfiles y accesorios para construcción en seco</p>
            </div>
        </a>
    </div>
    <div class="colFotosHome">
        <a href="{{URL::to('menu/steel-framing')}}">
            <h2>STEEL FRAMING</h2>
            <div class="bordeVerdeLateral">
                <img class="ampliar" src="{{URL::to('images/steel-framing.jpg')}}" alt="Perfiles Desmontables">
                <p>Perfiles <br>estructurales</p>
            </div>
        </a>
    </div>
    <div class="colCertain">
        <a href="{{URL::to('menu/certainteed')}}">
            <h2>EXCLUSIVO EN JMA</h2>
            <div class="bordeCeleste">
                <img class="ampliar" src="{{URL::to('images/certain-home.jpg')}}" alt="CertainTeed">
            </div>
        </a>
    </div>
    <div class="clear"></div>
</section>
@stop