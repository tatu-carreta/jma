@extends($project_name.'-master')

@section('div_header')
    <!-- abre nuevo slide -->
    <script>
        $(function() {
            $('.slide').crossSlide({
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
                        { src: "{{URL::to('images/slide-5.jpg')}}",  dir: 'down'   }
                    @endif
            ]);
        });
    </script>
    
    <!-- S L I D E -->
    <div class="slide"></div>
@stop

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