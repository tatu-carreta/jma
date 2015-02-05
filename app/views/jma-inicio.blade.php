@extends($project_name.'-master')

@section('contenido')
<section class="container">
    <div class="colTextoHome">
        <h1>Somos la Empresa Argentina Líder en fabricación y comercialización de Perfiles de Acero Galvanizado, desarrollando todas las variantes que demandan el mercado interno y externo:</h1>
    </div>
    <div class="colFotosHome">
        <h2>PERFILES DESMONTABLES</h2>
        <div class="bordeVerdeLateral">
            <img src="{{URL::to('images/perfiles-desmontables.jpg')}}" alt="Perfiles Desmontables">
            <p>Sistema de suspensión para cielorrasos desmontables</p>
        </div>
    </div>
    <div class="colFotosHome">
        <h2>DRYWALL</h2>
        <div class="bordeVerdeLateral">
            <img src="{{URL::to('images/drywall.jpg')}}" alt="Perfiles Desmontables">
            <p>Perfiles y accesorios para construcción en seco</p>
        </div>
    </div>
    <div class="colFotosHome">
        <h2>STEEL FRAMING</h2>
        <div class="bordeVerdeLateral">
            <img src="{{URL::to('images/steel-framing.jpg')}}" alt="Perfiles Desmontables">
            <p>Perfiles <br>estructurales</p>
        </div>
    </div>
    <div class="clear"></div>
</section>
@stop