@extends($project_name.'-master')

@section('contenido')
@if(isset($page) && ($page != ""))
    @if(isset($ancla) && ($ancla != ""))
        <script src="{{URL::to('js/anclaFuncs.js')}}"></script>
        <a id="ancla" href="{{ $ancla }}" style="display: none;">Ancla</a>
    @endif
@endif

    @if(Auth::check())

        <script src="{{URL::to('js/popupFuncs.js')}}"></script>
        @if(Auth::user()->can("ordenar_item"))
        <script>
            $(function() {
                $('.sortable').sortable({
                    update: function(event, ui) {
                        $(this).parent().submit();
                    }
                });
            });
        </script>
        @endif
    @endif
    @if(Session::has('mensaje'))
    <script src="{{URL::to('js/divAlertaFuncs.js')}}"></script>
    @endif
    <section class="container">
        @if (Session::has('mensaje'))
            <div class="divAlerta ok alert-success">{{ Session::get('mensaje') }}<i onclick="" class="cerrarDivAlerta fa fa-times fa-lg"></i></div>
        @endif
	<div class="container">
	    <h2>{{ $menu->nombre }}</h2>
            @if(Auth::check())
                <div class="divNuevaSeccion">
                    <div class="floatRight">
                    @if(count($menu->secciones) >= 2)
                        @if(Auth::user()->can("convertir_subcategoria"))
                            <a  onclick="pasarSeccionesCategoria('../admin/menu/pasar-secciones-categoria', '{{$menu->id}}');" class="btnSec"><i class="icon-subcategoria"></i>Convertir en subcategorías</a>
                        @endif
                        @if(Auth::user()->can("ordenar_seccion_dinamica"))
                            <a href="{{URL::to('admin/seccion/ordenar-por-menu/'.$menu->id)}}" class="btnSec nuevaSeccion"><i class="fa fa-exchange fa-lg"></i>Ordenar secciones</a>
                        @endif
                    @endif
                    @if(Auth::user()->can("agregar_seccion"))
                        <a href="{{URL::to('admin/seccion/agregar/'.$menu->id)}}" class="btn nuevaSeccion"><i class="fa fa-plus fa-lg"></i>Nueva sección</a>
                    @endif
                    </div>
                    <div class="clear"></div>
                </div>
            @endif

            <div class="contenedorSecciones">
            @foreach($menu -> secciones as $seccion)
                @if((count($seccion->items) > 0) || Auth::check())

                    @if($menu->modulo()->nombre == 'producto')
                        @include('seccion.'.$project_name.'-ver-seccion-producto')
                    @elseif($menu->modulo()->nombre == 'noticia')
                        @include('seccion.'.$project_name.'-ver-seccion-noticia')
                    @elseif($menu->modulo()->nombre == 'evento')
                        @include('seccion.'.$project_name.'-ver-seccion-evento')
                    @elseif($menu->modulo()->nombre == 'portfolio_simple')
                        @include('seccion.'.$project_name.'-ver-seccion-portfolio-simple')
                    @elseif($menu->modulo()->nombre == 'portfolio_completo')
                        @include('seccion.'.$project_name.'-ver-seccion-portfolio-completo')
                    @else
                        @include('seccion.'.$project_name.'-ver-seccion')
                    @endif

                @elseif((count($seccion->items) == 0) && !Auth::check() && $menu->modulo()->nombre == 'evento')
                  <span class="txtCalendario">No hay cursos o capacitaciones cargados en este momento.</span>
                @endif
            @endforeach
            </div>
        </div>

        @if(Auth::check())
            <div id="agregar-seccion"></div>
        @endif
    </section>
@stop
