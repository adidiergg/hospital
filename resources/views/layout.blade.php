<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!-- Sweetalert2 -->
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <!-- AOS CSS -->
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    
    

    @if (auth()->guard('admin')->check() or auth()->guard('receptionist')->check() or auth()->guard('doctor')->check())
      
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans:wght@300;400&display=swap" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <link href="{{ asset('bootstrap-5.2.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
      
      
      {{-- 
      <!-- Fuentes de tipografia -->
      
      <!-- Custom styles for this template -->
      <link href="css/carousel.css" rel="stylesheet">
      <link rel="stylesheet" href="css/styleMenu.css">

      --}}


      <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        .cover {
            height: 100%;
            width: 100%;
            color: white;
            background-image: url(./img/menuInicialFondo.jpg);
            background-size: cover;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.5);
            background-blend-mode: darken;
        }
        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
    </style>

      
    @else
      <!-- Fuentes de tipografia -->
      <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans:wght@300;400&display=swap" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <link href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
      
    @endif
    
    
    
   @livewireStyles
   
   
  
  </head>
  <body>
    {{-- cargar header --}}

    @include('header')
    
    @include('message')

    {{-- mensajes --}}
    @yield('message')


    {{-- contenido de la page --}}
    @yield('content')


    {{-- cargar footer --}}
    @include('footer')


    


    <!-- Fontawesome -->
    <script src="{{ asset('js/fontawesome.all.min.js') }}"></script>   
    <script src="{{ asset('js/alerts.js') }}"></script>

    @if (auth()->guard('admin')->check() or auth()->guard('receptionist')->check() or auth()->guard('doctor')->check())
     
      
    <!-- Bootstrap JS JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap-5.2.2-dist/js/bootstrap.min.js') }}" ></script>
    <!-- Validate -->
    <script src="{{ asset('js/form-validation.js') }}"></script>
    @else
    <!-- Bootstrap JS JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.min.js') }}" ></script>
    

    @endif

    

    

    
    

    


   
    

  
  @livewireScripts
  </body>
</html>