<!Doctype html>
<html lang="ES">
    <head>
        @section('head')
        <meta charset="UTF-8">
        <title></title>

        <!-- abre LINK -->

        <!--
            Ejemplo de código con las rutas blade
        
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/jma-styles.css')}}"> 
        
        -->
        
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/tatu-styles-admin.css')}}"> 
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/'.$project_name.'-styles.css')}}"> 
        
        <!-- abre SCRIPT -->
        <script src="{{URL::to('js/jquery-1.11.0.min.js')}}"></script>
        <script src="{{URL::to('js/funcs.js')}}"></script>
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
            <header>
                <div class="container">
                    @include('menu.desplegar-menu')
                </div>            
            </header>	
            @yield('div_header')
        @show
        <!-- abre S E C T I O N -->

        @yield('contenido')

        @section('footer')
        <!-- abre F O O T E R -->
        <footer>
            <div class="container">
		
            </div>
        </footer>
        
        <script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
        <script src="{{URL::to('ckeditor/adapters/jquery.js')}}"></script>
        <script src="{{URL::to('js/jquery.previewInputFileImage.js')}}"></script>
        <script src="{{URL::to('js/jquery.lazyload.js')}}"></script>
        <script src="{{URL::to('js/jquery-ui.min.js')}}"></script>

        <script>
            $(function () {
                $("img.lazy").lazyload({
                    effect: "fadeIn"
                });
            });
        </script>
        <script src="{{URL::to('js/menu-funcs.js')}}"></script>

        @show
    </body>
</html>