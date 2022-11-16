@extends('layout')


@section('titulo','Administrador | Editar doctor')



@section('content')
<!-- Page Content -->
<section class="container mt-5 mb-5">
    <div class="row g-5 mt-5" style="background-color: #D6DBDF;">
        <!-- Segundo formulario -->
        <div class="col-md-5 col-lg-4 order-1">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Configuración de credenciales</span>
                <span class="badge bg-primary rounded-pill">2</span>
            </h4>
            <form class="needs-validation" novalidate name="altarecepcionista" method="post"
                action="{{ route('doctors.reset',$doctor)  }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- Contraseña -->
                    <div class="col-12">
                        <label for="contraseña" class="form-label">Nueva contraseña</label>
                        <input type="password" minlenght="8" maxlenght="35" class="form-control" name="password"
                            id="contraseña" placeholder="" required autocomplete="off">
                        <div id="contraseña" class="form-text">Debe contener al menos 8 caracteres.</div>
                        <div class="invalid-feedback">
                            Tú contraseña es requerida.
                        </div>
                    </div>
                </div>


                <hr class="my-4">

                <div class="d-flex">
                    <button class="w-50 btn btn-success mb-4 me-1">Actualizar</button>

                </div>
            </form>
        </div>
        <!-- Primer formulario -->
        <div class="col-md-7 col-lg-8 order-md-0">
            <h4 class="mb-3">Datos personales.</h4>
            <form class="needs-validation" novalidate name="altarecepcionista" method="post"
                action="{{ route('doctors.update',$doctor) }}">

                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- CURP -->

                    <div class="col-md-4">
                        <label for="curp" class="form-label">CURP</label>
                        <input value="{{ $doctor->curp }}" type="text" style="text-transform: uppercase;" name="curp"
                            minlenght="18" maxlength="18" class="form-control" id="curp" placeholder=""
                            autocomplete="off" required>
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
                            <option value="Masculino" @if( $doctor->gender=="Masculino") selected @endif >Masculino
                            </option>
                            <option value="Femenino" @if( $doctor->gender=="Femenino") selected @endif >Femenino
                            </option>
                        </select>
                    </div>
                    <!-- Edad -->
                    <div class="col-md-4">
                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input value="{{ $doctor->birth_date }}" type="date" name="birth_date" id="fechaContratacion"
                            class="form-control" required>
                    </div>

                    <!-- First name -->
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nombre</label>
                        <input value="{{ $doctor->name_first }}" type="text" class="form-control" id="firstName"
                            name="name_first" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Tú nombre es requerido.
                        </div>
                    </div>
                    <!-- Last name -->
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Apellidos</label>
                        <input value="{{  $doctor->name_last }}" type="text" class="form-control" id="lastName"
                            name="name_last" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Tus apellidos son requeridos.
                        </div>
                    </div>
                    <!-- Dirección -->
                    <div class="col-12">
                        <label for="address" class="form-label">Dirección</label>
                        <input value="{{  $doctor->address }}" type="text" class="form-control" id="address"
                            name="address" placeholder="" required>
                        <div class="invalid-feedback">
                            Tú dirección es requerida.
                        </div>
                    </div>


                    <!-- Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input value="{{ $doctor->email  }}" type="email" class="form-control" id="email"
                                name="email" placeholder="email@example.com" required>
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
                            <input value="{{ $doctor->phone_number }}" type="tel" class="form-control" id="telefono"
                                name="phone_number" placeholder="" required>
                        </div>
                        <div class="invalid-feedback">
                            Tú número de teléfono es requerido.
                        </div>
                    </div>



                </div>

                <hr class="my-4">

                <h4 class="mb-3">Datos laborales.</h4>
                <div class="row gy-3">
                    <!-- License -->
                    <div class="col-sm-6">
                        <label for="license" class="form-label">Licencia</label>
                        <input value="{{ $doctor->license }}" type="text" class="form-control" id="firstName"
                            name="license" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Tú licencia es requerido.
                        </div>
                    </div>
                    <!-- Speciality -->
                    <div class="col-sm-6">

                        <label for="speciality" class="form-label">Especialidad</label>
                        <select class="form-select" id="speciality" name="speciality" required>
                            <option value="" selected>-- Selecciona una opción --</option>
                            <option value="Anestesiología" @if( $doctor->speciality=="Anestesiología" ) selected @endif>
                                Anestesiología</option>
                            <option value="Anatomía Patológica" @if( $doctor->speciality=="Anatomía Patológica" ) selected
                                @endif>Anatomía Patológica</option>
                            <option value="Cardiología" @if( $doctor->speciality=="Cardiología" ) selected @endif>
                                Cardiología</option>
                            <option value="Dermatología" @if( $doctor->speciality=="Dermatología" ) selected @endif>
                                Dermatología</option>
                            <option value="Gastroenterología" @if( $doctor->speciality=="Gastroenterología" ) selected
                                @endif>Gastroenterología</option>
                            <option value="Ginegología" @if( $doctor->speciality=="Ginegología" ) selected @endif>
                                Ginegología</option>
                            <option value="Hematología" @if( $doctor->speciality=="Hematología" ) selected @endif>
                                Hematología</option>
                            <option value="Infectología" @if( $doctor->speciality=="Infectología" ) selected @endif>
                                Infectología</option>
                            <option value="Nefrología" @if( $doctor->speciality=="Nefrología" ) selected @endif>Nefrología
                            </option>
                            <option value="Neurología" @if( $doctor->speciality=="Neurología" ) selected @endif>Neurología
                            </option>
                            <option value="Neumología" @if( $doctor->speciality=="Neumología" ) selected @endif>Neumología
                            </option>
                            <option value="Oftalmología" @if( $doctor->speciality=="Oftalmología" ) selected @endif>
                                Oftalmología</option>
                            <option value="Ortopedia" @if( $doctor->speciality=="Ortopedia" ) selected @endif>Ortopedia
                            </option>
                            <option value="Otorrinolaringología" @if( $doctor->speciality=="Otorrinolaringología" )
                                selected @endif>Otorrinolaringología</option>
                            <option value="Pediátria" @if( $doctor->speciality=="Pediátria" ) selected @endif>Pediátria
                            </option>
                            <option value="Psiquiatría" @if( $doctor->speciality=="Psiquiatría" ) selected @endif>
                                Psiquiatría</option>
                            <option value="Urología" @if( $doctor->speciality=="Urología" ) selected @endif>Urología
                            </option>

                        </select>
                    </div>
                </div>



                <div class="row gy-3">
                    <!-- Fecha de contratación -->
                    <div class="col-md-6">
                        <label for="fechaContratacion" class="form-label">Fecha de contratación</label>
                        <input value="{{ $doctor->hire_date }}" type="date" name="hire_date" id="fechaContratacion"
                            class="form-control" required>
                    </div>
                </div>
                <hr class="my-4">

                <div class="d-flex">
                    <button class="w-50 btn btn-success mb-4 me-1">Actualizar</button>
                </div>
            </form>

            
        </div>
    </div>
</section>
@endsection