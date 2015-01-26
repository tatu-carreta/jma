@extends($project_name.'-master')

@section('div_header')
    <!-- abre nuevo slide -->
    <script>
        $(function() {
            $('.slides').crossSlide({
                speed: 60,
                fade: 1
              }, [
                    @if(!is_null($slide_index) && !is_null($slide_index->imagenes))
                        @foreach($slide_index->imagenes as $img)
                            { src: "{{ URL::to($img->carpeta.$img->nombre) }}", dir: 'up'   },
                        @endforeach
                    @else
                        { src: "{{URL::to('images/slide-1.jpg')}}", dir: 'up'   },
                        { src: "{{URL::to('images/slide-2.jpg')}}",   dir: 'down' },
                        { src: "{{URL::to('images/slide-3.jpg')}}",  dir: 'up'   },
                        { src: "{{URL::to('images/slide-4.jpg')}}",  dir: 'down'   },
                    @endif
            ]);
        });
    </script>
    <!-- cierra nuevo slide -->
    <div class="slider sliderHome">
        <div class="txtDestacado">
            <div class="container">
            </div>
        </div>
        <ul class="slides">
            
        </ul>
    </div>
@stop

@section('contenido')
<section>
    <div class="container">
    </div>
</section>
@stop