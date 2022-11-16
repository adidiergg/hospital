@extends('layout')


@section('titulo','Administrador | Nuevo recepcionista')



@section('content')
     <!-- Page Content -->
     <section class="container mt-5 mb-5">
        <div class="row g-5 mt-5" style="background-color: #D6DBDF;">
            <!-- Segundo formulario -->
            <div class="col-md-5 col-lg-4 order-md-1">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Configuración de credenciales</span>
                <span class="badge bg-primary rounded-pill">2</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                        <h6 class="my-0">Email</h6>
                        <small class="text-muted">Dirección de correo electrónico.</small>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                        <h6 class="my-0">Contraseña</h6>
                        <small class="text-muted">Debe contener al menos 8 caracteres.</small>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Primer formulario -->
            <div class="col-md-7 col-lg-8 order-md-0">
                <h4 class="mb-3">Datos personales.</h4>
                <form class="needs-validation" novalidate name="altarecepcionista" method="post" action="{{ route('receptionists.store') }}">
                        @csrf
                        <div class="row g-3">
                        <!-- CURP -->
                        
                        <div class="col-md-4">
                            <label for="curp" class="form-label">CURP</label>
                            <input value="{{ old('curp') }}" type="text" style="text-transform: uppercase;" name="curp" minlenght="18" maxlength="18" class="form-control" id="curp" placeholder="" autocomplete="off" required>
                            <div id="curp" class="form-text">Clave única de registro de población.</div>
                            <div class="invalid-feedback">
                                    Tú CURP es requerida.
                            </div>
                        </div>
                        <!-- Sexo -->
                        <div class="col-md-4">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select class="form-select" id="sexo" name="gender" required>
                                <option value="" selected>-- Selecciona una opción --</option>
                                <option value="Masculino" @if( old('gender') =="Masculino") selected  @endif  >Masculino</option>
                                <option value="Femenino" @if( old('gender') =="Femenino") selected  @endif >Femenino</option>
                            </select>
                        </div>
                        <!-- Edad -->
                        <div class="col-md-4">
                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input value="{{ old('birth_date') }}" type="date" name="birth_date" id="fechaContratacion" class="form-control" required>
                        </div>
                        
                        <!-- First name -->
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nombre</label>
                            <input value="{{ old('name_first') }}" type="text" class="form-control" id="firstName" name="name_first" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Tú nombre es requerido.
                            </div>
                        </div>
                        <!-- Last name -->
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Apellidos</label>
                            <input value="{{ old('name_last') }}" type="text" class="form-control" id="lastName" name="name_last" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Tus apellidos son requeridos.
                            </div>
                        </div>
                        <!-- Dirección -->
                        <div class="col-12">
                            <label for="address" class="form-label">Dirección</label>
                            <input value="{{ old('address') }}" type="text" class="form-control" id="address" name="address" placeholder="" required>
                            <div class="invalid-feedback">
                                Tú dirección es requerida.
                            </div>
                        </div>
                        
                       
                        <!-- Email -->
                         <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                            </div>
                            <div class="invalid-feedback">
                                Tú correo electrónico es requerido.
                            </div>
                        </div>
                        <!-- Teléfono -->
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">Núm.</span>
                                <input value="{{ old('phone_number') }}" type="tel" class="form-control" id="telefono" name="phone_number" placeholder="" required>
                            </div>
                            <div class="invalid-feedback">
                                Tú número de teléfono es requerido.
                            </div>
                        </div>

                         <!-- Contraseña -->
                         <div class="col-12">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input value="{{ old('password') }}"  type="password" minlenght="8" maxlenght="35" class="form-control" name="password" id="contraseña" placeholder="" required autocomplete="off">
                            <div id="contraseña" class="form-text">Debe contener al menos 8 caracteres.</div>
                            <div class="invalid-feedback">
                                Tú contraseña es requerida.
                            </div>
                        </div>
                        
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Datos laborales.</h4>
                    <div class="row gy-3">
                        <!-- Fecha de contratación -->
                        <div class="col-md-6">
                            <label for="fechaContratacion" class="form-label">Fecha de contratación</label>
                            <input  value="{{ old('hire_date') }}" type="date" name="hire_date" id="fechaContratacion" class="form-control" required>
                        </div>
                    </div>
                    <hr class="my-4">

                    <div class="d-flex">
                        <button class="w-50 btn btn-success mb-4 me-1" type="submit">Agregar</button>
                        <button class="w-50 btn btn-danger mb-4" type="reset">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection



