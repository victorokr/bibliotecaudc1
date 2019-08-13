<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>BibliotecaUDC</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!--para ajustar el proyecto a cualquier pantalla-->
    
    
    <!--icono de la biblioteca-->
    <link rel="shortcut icon" href="/images/icono.png">

    <!--iconos desde internet font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--fuente texto de google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script> {{-- se suprimio el defer, impedia el funcionamiento de select2 --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"><!--carga el archivo compilado-->


   {{--  plugin multiSelect --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" /> --}}
    

</head>

<body>

<div id="app">
 <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <a class="row tamañoimg navbar-brand" href="#">
        <img class="navbar-light" src="/images/logo.png">
    </a>


    <div class="container">
        <div class="row linkHome">
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-4 col-4">
                <ul class="fm-nav nav bg-inverse nav-pills border-0 rounded justify-content-start  "><!--star   alinea los link a la izquierda--> 
                    
                    
                    
                @if (auth()->guest())
                <li class="nav-item {{ activeMenuArea('home') }}">
                  <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
                </li>
                

                    
                <li class="nav-item {{ activeMenuArea('/mensajes/create') }}">
                  <a href="{{ route('mensajes.create') }}" class="nav-link"><i class="fas fa-marker"></i> Contacto</a>
                </li>
                @endif
              
                
                @if (auth()->check())
                @if (auth()->user()->hasRoles(['Estudiante']))
                <li class="nav-item {{ activeMenuArea('consultantes/area') }}">
                  <a href="{{ url('/consultantes/area') }}" class="nav-link"><i class="fas fa-home"></i> Inicio</a>
                </li>
                @endif


                @if (auth()->user()->hasRoles(['Administrador','Empleado']))
                <li class="nav-item {{ activeMenuArea('empleados/login') }}">
                  <a href="{{ url('/empleados/area') }}" class="nav-link"><i class="fas fa-home"></i> Inicio</a>
                </li>
                @endif


                @if (auth()->user()->hasRoles(['Empleado']))
                <li class="nav-item {{ activeMenuArea('mensajes') }}">
                  <a href="{{ route('mensajes.index') }}" class="nav-link"><i class="fas fa-envelope"></i>   Mensajes</a>
                </li>
                @endif
                @endif
            </ul>
        </div>
    </div>
</div>


    

    {{-- iniciar sesion --}}
    
    <div class="container">
      <div class="hoverDropdown-nav nav bg-inverse nav-pills border-0 rounded">                             
          
      </div>
    </div>
    

                
       


    {{-- Nombre-mi cuenta-logout --}}            
    <div class="container justify-content-end">
        <div class="row linkLogout">
            <div class="col-xl-12 col-lg-6 col-md-8 col-sm-4 col-4">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (auth()->guest())
                    <div class="hoverDropdown-nav nav bg-inverse nav-pills border-0 rounded">
                      <ul class="navbar-nav mr-auto">
                        <div class="row linkSesion">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> <!--controla los tamaños para diferentes pantallas de pc y dispositivos moviles-->
                            
                              <li class="nav-item dropdown">
                                <a class=" nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-key"></i> Iniciar Sesión</a>
                                  <div class="dropdown-menu">
                                      <a class="dropdown-item {{ activeMenuArea('consultantes/login') }}" href="/consultantes/login"><i class="fas fa-book-reader"></i> Consultantes</a>

                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item {{ activeMenuArea('/login') }}" href="/login"><i class="fas fa-users-cog"></i> Empleados</a>
                                  </div>
                              </li>
                          </div>
                        </div>
                      </ul>
                    </div>  
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="hoverDropdown-nav nav-pills border-0 rounded navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                        <!--<li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>-->

                        {{--  <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>  ruta para habilitar el registro de usuarios --}}

                        @else
                        <li class="nav-item dropdown">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           <i class="far fa-user"></i>  {{ Auth::user()->Nombre }} <span class="caret"></span></a>

                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                            <a class="dropdown-item" href="/lista/empleados/{{ auth()->id() }}/edit"><i class="fas fa-user-circle"></i> Mi cuenta</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar sesion') }}</a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                            </form>
                         </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>

 </nav>
</div>


     <header>    
        <?php function activeMenuArea($url){
        return request()->is($url)? 'active' : '';
        }?>

    <main class="py-4">
     </header>


         {{-- menu con jquery --}} 
        @if (auth()->check()) 
        <div class="contenedor-menu">
          <div class="row">
            <div class="col-lg-12">
               
               <a href="#" class="btn-menu">Menu<i class="icono fas fa-bars"></i></a> <!--enlace para dispositivos moviles, con icono fas fa-bars-->
               <ul class="menu">
                    @if (auth()->user()->hasRoles(['Administrador']))
                    <li><a href="#"><i class="icono izquierda fas fa-users-cog"></i> Empleados <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('lista/empleados/create') }}">Crear Empleado</a></li>
                            <li><a href="{{ url('lista/empleados') }}">Lista Empleados</a></li>    
                        </ul>
                    </li>

                    <li><a href="#"><i class="icono izquierda fas fa-file-contract"></i> Contratos <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('lista/contratos/create') }}">Crear Contrato</a>
                            <li><a href="{{ url('lista/contratos') }}">Lista de Contratos</a>
                        </ul>
                    </li>
                    @endif


                    @if (auth()->user()->hasRoles(['Empleado']))
                    <li><a href="#"><i class="icono izquierda fas fa-book-reader"></i> Consultantes <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('lista/consultantes/create') }}">Crear Consultante</a>
                            <li><a href="{{ url('lista/consultantes') }}">Lista Consultantes</a>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icono izquierda fas fa-book"></i> MaterialBiblioteca <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            {{-- <li><a href="{{ url('material/biblioteca/create') }}">Agregar Material</a></li> --}}
                            <li><a href="{{ url('material/biblioteca') }}">Lista del Material</a></li> 
                        </ul>
                    </li>

                    <li><a href="#"><i class="icono izquierda fas fa-diagnoses"></i> Autor <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('autor/create') }}">Agregar Autor</a>
                            <li><a href="{{ url('autor') }}">Lista de Autores</a>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icono izquierda fab fa-readme"></i> Editorial <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('editorial/create') }}">Agregar Editorial</a>
                            <li><a href="{{ url('editorial') }}">Lista de Editoriales</a>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icono izquierda fab fa-accusoft"></i> Prestamos <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('prestamos') }}">Lista de prestamos</a>
                            
                        </ul>
                    </li>


                    <li><a href="#"><i class="icono izquierda fas fa-laptop"></i> Servicios <i class="icono derecha fas fa-chevron-down"></i></a></li>
                    @endif


                    @if (auth()->user()->hasRoles(['Estudiante']))
                    <li><a href="#"><i class="icono izquierda fas fa-book-reader"></i> Prestamo <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('prestamo/consultante/create') }}">Solicitar prestamo</a>
                            
                        </ul>
                    </li>
                    @endif

                    

                    @if (auth()->user()->hasRoles(['jefeDeInventario']))
                    <li><a href="#"><i class="icono izquierda fas fa-box-open"></i>Inventario <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('biblioteca/inventario') }}">Inventario Material </a>
                                
                            {{-- <li><a href="{{ url('entradas') }}">Registrar Entradas</a>
                            <li><a href="{{ url('salidas') }}">Registrar Traslados</a> --}}    
                        </ul>

                    </li> 
                    @endif    
                </ul>   
            </div>
          </div>
        </div>
        @endif
        @yield('content')
    </main>
        




<!--trae el codigo jquery de la ruta public/js/main-->
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
<script src="{{ asset('js/jquery-3.4.1.min.js') }}" ></script>
<script src="{{ asset('js/main.js') }}" defer></script>

{{-- plugin multiSelect --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script> --}}
<link href="{{asset('css/select2.css')}}" rel="stylesheet" />
<script src="{{asset('js/select2.js')}}"></script>


</body>
</html>

