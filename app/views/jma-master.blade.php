<!Doctype html>
<html lang="es">
    <head>
        @section('head')
        <meta charset="UTF-8">
        <title>JMA - Perfiles de Acero Galvanizado</title>

        <!-- abre LINK -->

        <!--
            Ejemplo de código con las rutas blade
        
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/jma-styles.css')}}"> 
        
        -->
        <link href="{{URL::to('favicon.ico')}}" rel="shortcut icon">
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
        <meta name="description" content="">
        <meta name="Keywords" content="">
        <meta property="og:image" content="" />
        <meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1">
        
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/tatu-styles-admin.css')}}"> 
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui.css')}}"> 
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery.fancybox.min.css')}}">
        <link rel='stylesheet' href="{{URL::to('css/fullcalendar.min.css')}}">
        <!--<link rel="stylesheet" type="text/css" href="{{URL::to('css/tatu-styles.css')}}"> -->
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/'.$project_name.'-styles.css')}}"> 
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/'.$project_name.'-stylesmenu.css')}}">
        <link rel="stylesheet" href="{{URL::to('font-awesome-4.2.0/css/font-awesome.css')}}">
        
        <!-- abre SCRIPT -->
        <script src="{{URL::to('js/jquery-1.11.0.min.js')}}"></script>
         <script src="{{URL::to('js/'.$project_name.'-menu-dropdown.js')}}"></script>
        <script src="{{URL::to('js/jquery-ui.min.js')}}"></script>
        <script src="{{URL::to('js/funcs.js')}}"></script>
       
        <script src="{{URL::to('js/jquery.cross-slide.js')}}"></script>
        <script>
            $(function() {
                $( "#tabs" ).tabs();
            });
        </script>
        @show
    </head>
    <body>
        @section('header')
        @include('analyticstracking')
        <!-- abre H E A D E R -->
        @if(Auth::check())
        <div class="headerAdmin">
            @if((Auth::user()->hasRole('Superadmin')) || (Auth::user()->hasRole('Administrador')))
            <div class="divAdministrar">
                <a class="btnCalado" href="{{URL::to('admin/exportar-clientes')}}"><i class="fa fa-pencil fa-lg"></i>Exportar Clientes</a>
                @if(Auth::user()->can("ver_menu_admin"))
                    <a href="{{URL::to('admin/menu')}}" class="btnCalado"><i class="fa fa-pencil fa-lg"></i>Menú</a>
                @endif
                @if(Auth::user()->can("ver_item_admin"))
                    <a href="{{URL::to('admin/item')}}" class="btnCalado"><i class="fa fa-pencil fa-lg"></i>Items</a>
                @endif
                @if(Auth::user()->can("ver_seccion_admin"))
                    <a href="{{URL::to('admin/seccion')}}" class="btnCalado"><i class="fa fa-pencil fa-lg"></i>Secciones</a>
                @endif
            </div>
            @endif

            @if(true)
            <div class="divSalir">
                <span class="nameAdmin"><i class="fa fa-user fa-lg marginRight5"></i>{{Auth::user()->perfil()->name}}</span>
                <a href="{{URL::to('logout')}}" class="btnCalado"><i class="fa fa-share  fa-lg"></i>Salir</a>
            </div>
            @else
            <div class="divSalir">
                <a href="{{URL::to('login')}}" class="btnCalado"><i class="fa fa-share  fa-lg"></i>Ingresar</a>
            </div>
            @endif
        </div>
        @endif
        <!-- H E A D E R -->
	<header class="container">
            <a class="marca" href="{{URL::to('')}}"><span>JMA Perfiles de Acero Galvanizado</span></a><!-- <img src="{{URL::to('images/jma.png')}}" alt="Marca JMA Perfiles de Acero Galvanizado">-->
            
            @if(!Auth::check())
            <div class="suscribirse">
                <label for="suscribir">Suscripción a Newsletter</label>
                {{ Form::open(array('url' => 'registrar-newsletter')) }}
                    <input type="email" name="email" id="suscribir" placeholder="Ingrese su mail" required="">
                    <input class="flecha" type="submit" value="">
                {{ Form::close() }}
            </div>
            @endif
            <ul class="redesH">
                <li><a href="https://www.facebook.com/perfilesjmasa/" target="_blank" class="face"><span>Facebook</span></a></li>
                <li><a href="https://twitter.com/perfilesjma" target="_blank" class="twitter"><span>Twitter</span></a></li>
                <li><a href="https://ar.linkedin.com/in/perfiles-jma-1b244663" target="_blank" class="linkedin"><span>Linkedin</span></a></li>
                <li><a href="" target="_blank" class="youtube"><span>YouTube</span></a></li>
            </ul>
            <div class="clear"></div>
	</header>
        
        <!-- abre nuevo slide -->
        
        <!-- S L I D E -->
        <div class="contentSlide">
            <a data-fancybox data-src="#video" href="javascript:;" class="btnVideo">
                <img src="{{URL::to('images/ver-video.png')}}" alt="Ver video">
            </a>
            <div style="display: none;" id="video">
                <video controls="" loop="1" style="width: 100%; height: auto">
                    <source src="{{URL::to('images/jma-v720p.mp4')}}" type="video/mp4">
                </video>
            </div>


            <div class="slide">
                
            </div>
        </div>
        <div class="imgSlide">
            <img src="{{URL::to('images/slide.jpg')}}" alt="JMA">
        </div>
	<!-- N A V -->
	<nav>
		<div id="cssmenu" class="menu">
                    @include('menu.'.$project_name.'-desplegar-menu')
		</div>
		<div class="clear"></div>
	</nav>
            
        @show
        <!-- abre S E C T I O N -->

        @yield('contenido')

        @section('footer')
        <!-- abre F O O T E R -->
        <footer>
            <img class="hoja" src="{{URL::to('images/hoja.png')}}">
            <p>En <strong>JMA</strong> cuidamos cada uno de los procesos de manera responsable, minimizando el impacto ambiental. Sabemos que colaborando en el cuidado del medio ambiente beneficiamos no sólo a nuestras familias y a la sociedad actual, sino también a las generaciones por venir. El medio ambiente, una prioridad para nosotros.</p>
        </footer>
        
        <script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
        <script src="{{URL::to('ckeditor/adapters/jquery.js')}}"></script>
        <script src="{{URL::to('js/jquery.previewInputFileImage.js')}}"></script>
        <script src="{{URL::to('js/jquery.lazyload.js')}}"></script>
        <script src="{{URL::to('js/jquery-ui.min.js')}}"></script>
        <script src="{{URL::to('js/jquery.fancybox.min.js')}}"></script>
        <script type="text/javascript">
            $("[data-fancybox]").fancybox({
                // Options will go here
            });
        </script>

        <script>
            $(function () {
                $("img.lazy").lazyload({
                    effect: "fadeIn"
                });
            });
        </script>
        <script>
            $(function() {
                $('.slide').crossSlide({
                    speed: 50,
                    fade: 1
                  }, [
                        @if(!is_null($slide_index) && !is_null($slide_index->imagenes))
                            @foreach($slide_index->imagenes as $img)
                                { src: "{{ URL::to($img->carpeta.$img->nombre) }}", dir: 'up'   },
                            @endforeach
                        @else
                            { src: "{{URL::to('images/slide-1.jpg')}}", dir: 'up'   },
                            { src: "{{URL::to('images/slide-2.jpg')}}", dir: 'down' },
                            { src: "{{URL::to('images/slide-3.jpg')}}", dir: 'up'   },
                            { src: "{{URL::to('images/slide-4.jpg')}}", dir: 'down' },
                            { src: "{{URL::to('images/slide-5.jpg')}}", dir: 'up' }
                        @endif
                ]);
            });
        </script>
                

        @show
    </body>
</html>

