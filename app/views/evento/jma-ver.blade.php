@extends($project_name.'-master')

@section('contenido')
@if(Session::has('mensaje'))
<script src="{{URL::to('js/divAlertaFuncs.js')}}"></script>
@endif
<section>
    @if (Session::has('mensaje'))
        <div class="divAlerta ok alert-success">{{ Session::get('mensaje') }}<i onclick="" class="cerrarDivAlerta fa fa-times fa-lg"></i></div>
    @endif
    <div class="container">
        <h2><span class=""><a class="volveraSeccion" href="{{URL::to('menu/'.$item -> seccionItem() -> menuSeccion() -> url)}}">{{ $item -> seccionItem() -> menuSeccion() -> nombre }}</a></span></h2>

        @if(Auth::check())
            @if(Auth::user()->can("editar_item"))
            <a href="{{URL::to('admin/capacitacion/editar/'.$item->texto()->evento()->id)}}" data='{{$item -> seccionItem() -> id}}' style="display:none">Editar<i class="fa fa-pencil fa-lg"></i></a>
            @endif
        @endif

        <!--columna producto y descripcion -->
        <div class="contenedorSecciones">
            <!-- <div class="imgProd">
                        {{-- @if(count($item->imagen_destacada()) > 0)
                                <img src="{{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}" alt="{{$item->titulo}}">
                                <p>{{$item->imagen_destacada()->epigrafe}}</p>
                        @else
                            <li><img src="{{ URL::to('images/sinImg.gif') }}" alt="{{$item->titulo}}"></li>
                        @endif --}}
            </div> -->
            <div class="bordeVerdeLateral paddingTextos">
                <div class="detalleProd">
                    <h2>{{ $item -> titulo }}</h2>
                    <div class="editor">
                        <h4 style="display: inline-block; margin: 0 0 10px">Desde: </h4>
                        {{ date('d/m/Y', strtotime($item->texto()->evento()->fecha_desde)) }}
                    </div>
                    @if(isset($item->texto()->evento()->fecha_hasta))
                    <div class="editor">
                        <h4 style="display: inline-block; margin: 0">Hasta: </h4>
                        {{ date('d/m/Y', strtotime($item->texto()->evento()->fecha_hasta)) }}
                    </div>
                    @endif
                    <div class="editor">
                        <h4>Descripción:</h4>
                        <p class="bajada">{{ $item->descripcion }}</p>
                    </div>
                    <div class="editor">
                        <h4>Más información:</h4>
                        {{ $item->texto()->cuerpo }}
                    </div>
                </div>

            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</section>
@stop
