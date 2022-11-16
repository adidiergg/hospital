@extends('layout')

@section('titulo','Iniciar sesión')


@section('message')
     

    @if ($errors->has('email'))
        <script>
              var message = {{ Js::from($errors->first('email')) }};

              const show = () =>{
              Swal.fire({
                title: 'Error de autentificación',
                text: message,
                icon: 'error',
                confirmButtonText: 'Ok'
              })
              }
              show();

        </script>
    @endif


@endsection




@section('content')



<section>
      <div class="row g-0">
        <!-- Carrusel -->
        <div class="col-lg-7 d-none d-lg-block">
          
        </div>
        <!-- Formulario -->
        <div class="col-lg-5 pt-5 bg-dark  d-flex flex-column align-items-end min-vh-100" style="opacity:0.75;">
          <!-- <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 mb-auto w-100">
            <img src="resource/img/favicon.png" width="100" height="32" />
          </div> -->
          <div class="align-self-center w-100 px-lg-5 py-lg-5 p-4">
            <h1 class="font-weight-bold mb-4 text-center">Iniciar sesión</h1>
            <form class="mb-5" action=" {{ route('auth')}}" method="POST">
              @csrf
              <input type="text" name="tipo_operacion" value="iniciar" hidden>
              <div class="mb-4">
                <label for="Username" class="form-label font-weight-bold">Nombre usuario</label>
                <input type="text" value="{{ old('email') }}" class="form-control  border-0" id="Username" name="email" placeholder="Ingresa tu usuario" aria-describedby="usuarioHelp" required>
              </div>
              <div class="mb-4">
                <label for="password" class="form-label font-weight-bold">Contraseña</label>
                <input type="password" class="form-control  border-0 mb-2" name="password" placeholder="Ingresa tu contraseña" id="password" required>
                
              </div>
              <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
            </form>
           <!--
            <p class="font-weight-bold text-center text-muted">O inicia sesión con</p>
            
            <div class="d-flex justify-content-around">
              <button type="button" class="btn btn-outline-light flex-grow-1 mr-2"><i class="fab fa-google lead mr-2"></i> Google</button>
              <button type="button" class="btn btn-outline-light flex-grow-1 ml-2"><i class="fab fa-facebook-f lead mr-2"></i> Facebook</button>
            </div>
          </div>
          <div class="text-center px-lg-5 pt-lg-1 pb-lg-4 p-4 mt-auto w-100">
            <p class="d-inline-block mb-0">¿Todavía no tienes una cuenta?</p> <a href="" class="text-light font-weight-bold text-decoration-none">Crea una ahora</a>
          </div>
          -->
        </div>
      </div>
    </section>


@endsection

