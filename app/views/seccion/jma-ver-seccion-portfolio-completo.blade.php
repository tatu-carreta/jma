<div class="colTextos bordeVerdeLateral paddingTextos">

    @if(($seccion->titulo != "") || (Auth::check()))<h3 class="floatLeft marginRight" id="{{$seccion->estado.$seccion->id}}">@if($seccion->titulo != ""){{ $seccion -> titulo }} @endif</h3>@endif
    @if(Auth::check())
        @if(Auth::user()->can("editar_seccion"))
            <a href="{{URL::to('admin/seccion/editar/'.$seccion->id)}}" data='{{ $seccion->id }}' class="btnSec nuevaSeccion"><i class="fa fa-pencil fa-lg"></i>Cambiar nombre</a>
        @endif
        @if(Auth::user()->can("borrar_seccion"))
            <a onclick="borrarData('../admin/seccion/borrar', '{{$seccion->id}}');" class="btnSec"><i class="fa fa-times fa-lg"></i>Eliminar sección</a>
        @endif
        @if(Auth::user()->can("agregar_item"))
            <a href="{{URL::to('admin/portfolio_completo/agregar/'.$seccion->id)}}" data='{{ $seccion->id }}' class="btn floatRight"><i class="fa fa-plus fa-lg"></i>Nuevo Portfolio Completo</a>
        @endif
    @endif
    <div class="clear"></div>

    @if(count($seccion->items) > 0)
    @if(Auth::check())
    {{ Form::open(array('url' => 'admin/item/ordenar-por-seccion')) }}
    @endif
    <ul class="listaNoticias @if(Auth::check()) sortable @endif">
            @foreach($seccion -> items as $i)
            <li>
                @if(Auth::check())
                <div class="iconos">
                    @if(!$i->destacado())
                        @if(Auth::user()->can("destacar_item"))
                            <i onclick="destacarItemSeccion('../admin/item/destacar', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-thumb-tack fa-lg"></i>
                        @endif
                    @else
                        @if(Auth::user()->can("quitar_destacado_item"))
                            <i onclick="destacarItemSeccion('../admin/item/quitar-destacado', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-thumb-tack prodDestacado fa-lg"></i>
                        @endif
                    @endif

                    <span class="floatRight">
                        @if(Auth::user()->can("editar_item"))
                        <a href="{{URL::to('admin/portfolio_completo/editar/'.$i->portfolio()->portfolio_completo()->id.'/seccion')}}" data='{{$seccion->id}}'><i class="fa fa-pencil fa-lg"></i></a>
                        @endif
                        @if(Auth::user()->can("borrar_item"))
                            <i onclick="borrarData('../admin/item/borrar', '{{$i->id}}');" class="fa fa-times fa-lg"></i>
                        @endif
                    </span>
                </div>
                @endif

                @if(!Auth::check())
                    <a href="{{URL::to('portfolio_completo/'.$i->url)}}">
                @endif
                <div class="divImgNoticia">
                    <img class="lazy" data-original="@if(!is_null($i->imagen_destacada())){{ URL::to($i->imagen_destacada()->carpeta.$i->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$i->titulo}}">
                    @if(!is_null($i->imagen_destacada()))
                    <p>{{$i->imagen_destacada()->epigrafe}}</p>
                    @endif
                    <h3>{{$i->titulo}}</h3>
                    <p class="bajada">{{$i->descripcion}}</p>
                    @if(count($i->imagenes) > 0)
                        @foreach($i->imagenes as $img)
                        <li>
                            <img src="{{ URL::to($img->carpeta.$img->nombre) }}" alt="{{$i->titulo}}" title="{{$img->epigrafe}}">
                        </li>
                        @endforeach
                    @endif
                </div>
                <div class="clear"></div>
                @if(!Auth::check())
                    </a>
                @endif
                
                @if(Auth::check())
                <input type="hidden" name="orden[]" value="{{$i->id}}">
                @endif            		
            </li>
            @endforeach
        
    </ul>
    
    </div>


<div class="clear"></div>

    @if(Auth::check())
    {{Form::hidden('seccion_id', $seccion->id)}}
    {{Form::close()}}
    @endif

    @else
    @if(!Auth::check())
    No hay portfolios cargados aún.
    @endif
    @endif
    <div class="clear"></div>
    @if(Auth::check())
    <div id="agregar-item{{ $seccion->id }}"></div>
    <div id="destacar-producto"></div>
    @endif
</div>