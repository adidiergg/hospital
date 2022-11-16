@extends('layout')


@section('titulo','Recepcionista | Ver información del paciente')


@section('content')
<!-- Page Content -->
<section class="container mt-5 mb-5">
    <div class="row g-5 mt-5" style="background-color: #D6DBDF;">

        <!-- Primer formulario -->
        <div class="col-md-7 col-lg-8">


            <h4 class="mb-3">Datos personales.</h4>
            <form class="needs-validation" novalidate name="altarecepcionista" method="post"
                action="{{ route('patients.store') }}">
                @csrf

                <div class="row g-3">
                    <!-- CURP -->

                    <div class="col-md-4">
                        <label for="curp" class="form-label">CURP</label>
                        <input value="{{ $patient->curp }}" type="text" style="text-transform: uppercase;" name="curp"
                            minlenght="18" maxlength="18" class="form-control" id="curp" placeholder=""
                            autocomplete="off" disabled readonly>
                        <div id="curp" class="form-text">Clave única de registro de población.</div>
                        <div class="invalid-feedback">
                            Tú CURP es requerida.
                        </div>
                    </div>
                    <!-- Sexo -->
                    <div class="col-md-4">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select" id="sexo" name="gender" disabled readonly>
                            <option value="">-- Selecciona una opción --</option>
                            <option value="Masculino" @if($patient->gender=="Masculino") selected @endif >Masculino
                            </option>
                            <option value="Femenino" @if($patient->gender=="Femenino") selected @endif >Femenino
                            </option>
                        </select>
                    </div>
                    <!-- Edad -->
                    <div class="col-md-4">
                        <label for="fechaContratacion" class="form-label">Fecha de Nacimiento</label>
                        <input value="{{ $patient->birth_date }}" type="date" name="birth_date" id="fechaContratacion"
                            class="form-control" disabled readonly>
                    </div>

                    <!-- First name -->
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nombre</label>
                        <input value="{{ $patient->name_first }}" type="text" class="form-control" id="firstName"
                            name="name_first" placeholder="" value="" disabled readonly>
                        <div class="invalid-feedback">
                            Tú nombre es requerido.
                        </div>
                    </div>
                    <!-- Last name -->
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Apellidos</label>
                        <input value="{{ $patient->name_last }}" type="text" class="form-control" id="lastName"
                            name="name_last" placeholder="" value="" disabled readonly>
                        <div class="invalid-feedback">
                            Tus apellidos son requeridos.
                        </div>
                    </div>
                    <!-- Dirección -->
                    <div class="col-12">
                        <label for="address" class="form-label">Dirección</label>
                        <input value="{{ $patient->address }}" type="text" class="form-control" id="address"
                            name="address" placeholder="" disabled readonly>
                        <div class="invalid-feedback">
                            Tú dirección es requerida.
                        </div>
                    </div>


                    <!-- Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input value="{{ $patient->email }}" type="email" class="form-control" id="email"
                                name="email" placeholder="email@example.com" disabled readonly>
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
                            <input value="{{ $patient->phone_number }}" type="tel" class="form-control" id="telefono"
                                name="phone_number" placeholder="" disabled readonly>
                        </div>
                        <div class="invalid-feedback">
                            Tú número de teléfono es requerido.
                        </div>
                    </div>



                </div>

                <hr class="my-4">

                <div class="d-flex">
                    <a class="w-50 btn btn-success mb-4 me-1" href=" {{ route('patients.edit',$patient) }} ">Actualizar
                </a>
                
                </div>

            </form>

        </div>
    </div>
</section>




@endsection