
@if ($message = Session::get('success'))

        <script>
              var message = {{ Js::from($message) }};

              const show = () =>{
              Swal.fire({
                title: message,
                icon: 'success',
                confirmButtonText: 'Ok'
              })
              }
              show();

        </script>
@endif

@if ($errors->any()) 

        <script>
              var message = {{ Js::from(implode('<br/>',$errors->all())) }};
              const show = (message) =>{
              Swal.fire({
                title: 'No se pudo registrar',
                html: message,
                icon: 'error',
                confirmButtonText: 'Ok'
              })
              }
              show(message);
              

        </script>

@endif

{{-- @foreach ($errors->all() as $error)

  var message = {{ Js::from(implode(' <br /> ',$errors->all())) }};
              show({{Js::from($error)}}); 
              @endforeach --}}
