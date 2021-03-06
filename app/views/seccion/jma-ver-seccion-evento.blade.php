<div class="colNoticias bordeVerdeLateral paddingTextos">

    @if(($seccion->titulo != "") || (Auth::check()))<h3 class="floatLeft marginRight" id="{{$seccion->estado.$seccion->id}}">@if($seccion->titulo != ""){{ $seccion -> titulo }} @endif</h3>@endif
    @if(Auth::check())
        @if(Auth::user()->can("editar_seccion"))
            <a href="{{URL::to('admin/seccion/editar/'.$seccion->id)}}" data='{{ $seccion->id }}' class="btnSec nuevaSeccion"><i class="fa fa-pencil fa-lg"></i>Cambiar nombre</a>
        @endif
        @if(Auth::user()->can("borrar_seccion"))
            <a onclick="borrarData('../admin/seccion/borrar', '{{$seccion->id}}');" class="btnSec"><i class="fa fa-times fa-lg"></i>Eliminar sección</a>
        @endif
        @if(Auth::user()->can("agregar_item"))
            <a href="{{URL::to('admin/capacitacion/agregar/'.$seccion->id)}}" data='{{ $seccion->id }}' class="btn floatRight"><i class="fa fa-plus fa-lg"></i>Nuevo Evento</a>
        @endif
    @endif
    <div class="clear"></div>

    @if(count($seccion->items) > 0)
    @if(Auth::check())
    {{ Form::open(array('url' => 'admin/item/ordenar-por-seccion')) }}
    @endif
    @if(Auth::check())
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
                        <a href="{{URL::to('admin/capacitacion/editar/'.$i->texto()->evento()->id.'/seccion')}}" data='{{$seccion->id}}'><i class="fa fa-pencil fa-lg"></i></a>
                        @endif
                        @if(Auth::user()->can("borrar_item"))
                            <i onclick="borrarData('../admin/item/borrar', '{{$i->id}}');" class="fa fa-times fa-lg"></i>
                        @endif
                    </span>
                </div>
                @endif

                @if(!Auth::check())
                    <a href="{{URL::to('capacitacion/'.$i->url)}}">
                @endif
                {{--
                <!-- <div class="divImgNoticia">
                    <img class="lazy" data-original="@if(!is_null($i->imagen_destacada())){{ URL::to($i->imagen_destacada()->carpeta.$i->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$i->titulo}}">
                </div> -->
                --}}
                <div class="divInfoNoticia">
                        <p class="fecha">{{$i->texto()->evento()->fecha_desde}} @if(isset($i->texto()->evento()->fecha_hasta) && $i->texto()->evento()->fecha_hasta != '0000-00-00') al {{$i->texto()->evento()->fecha_hasta}} @endif</p>
                        <h3>{{$i->titulo}}</h3>
                        <p class="bajada">{{$i->descripcion}}</p>
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
    @else
      @section('footer')
        @parent

        <script src="{{URL::to('js/moment.min.js')}}"></script>
        <script src="{{URL::to('js/es.js')}}"></script>
        <script src="{{URL::to('js/fullcalendar.min.js')}}"></script>
      @stop

      <?php
        foreach ($seccion->items as $key => $value) {
          $seccion->items[$key]['fecha_desde'] = $value->texto()->evento()->fecha_desde;
          $seccion->items[$key]['fecha_hasta'] = $value->texto()->evento()->fecha_hasta;
        }
      ?>

      <div id="calendar"></div>
      <script>
      $(document).ready(function() {
        var today = new Date();
        var items = <?php echo $seccion->items ?>;
        var events = [];

        $.each(items, function(key, element) {

          var data = {
            title: element.titulo,
            start: element.fecha_desde,
            end: element.fecha_hasta,
            url: "{{URL::to('capacitacion/"+ element.url +"')}}"
          };
          events.push(data);

        });

          $('#calendar').fullCalendar({
            locale: 'es',
            defaultDate: today,
            buttonText: {
              today: 'Hoy'
            },
            // editable: true,
            // eventLimit: true, // allow "more" link when too many events
            events: events
          });
      });

      </script>
    @endif

    </div>


<div class="clear"></div>

    @if(Auth::check())
    {{Form::hidden('seccion_id', $seccion->id)}}
    {{Form::close()}}
    @endif

    @else
    @if(!Auth::check())
    No hay eventos cargados aún.
    @endif
    @endif
    <div class="clear"></div>
    @if(Auth::check())
    <div id="agregar-item{{ $seccion->id }}"></div>
    <div id="destacar-producto"></div>
    @endif
</div>
