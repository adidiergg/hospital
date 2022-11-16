<section>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container text-center  mb-5" style="margin-top:5em;">


            <div class="row  mb-3 justify-content-end">
                <div class="col col-md-4 p-2">
                    <input wire:model="search" class="form-control me-2" type="search" name="busqueda" placeholder="Buscar recepcionista" aria-label="Search" autocomplete="off" >    
                </div>
            </div>

            
           
            <div class="row justify-content-center">
                
                            <div class="mt-2 mb-2">

                                <div class="table-responsive">
                                        <table class="table table-sm table-striped table-hover table-light text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    
                                                    <th scope="col">Num. Cita</th>
                                                    <th scope="col">CURP</th>
                                                    <th scope="col">Paciente</th>
                                                    <th scope="col">Doctor</th>
                                                    <th scope="col">Especialidad</th>
                                                    <th scope="col">Acciones</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @forelse($appointments as $appointment)
                                                        <tr>
                                                            
                                                            
                                                            <th scope="row">{{$appointment->id}}</th>
                                                            <th scope="row">{{$appointment->patient->curp}}</th>
                                                            <td >{{$appointment->patient->name_first .' '. $appointment->patient->name_last}} </td>
                                                            <td >{{$appointment->doctor->name_first .' '. $appointment->doctor->name_last}} </td>
                                                            <td scope="row">{{$appointment->doctor->speciality}}</td>

                                                            
                                                                                                                       
                                                            <td class="align-baseline">
                                                                <form action=" {{ route('patients.destroy',$appointment) }} " method="POST"  id="soylavergota" onsubmit="alertDelete(event);">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a class='btn btn-secondary' href=" {{ route('patients.show',$appointment) }} "><i class='fa-solid fa-eye sizeSimbol'></i></a>
                                                                    
                                                                    <a class='btn btn-info' href=" {{ route('patients.edit',$appointment) }} "><i class='fa-solid fa-pen-to-square sizeSimbol'></i></a>             
                                                                    <button type="submit" class='btn btn-danger'><i class='fa-solid fa-delete-left sizeSimbol'></i></button>

                                                                </form>
                                                                
                                                            </td> 
                                                           
                                                        </tr>
                                                    @empty 
                                                    <tr>
                                                        <td colspan="4">No hay información registrada</td>
                                                    </tr>

                                                    @endforelse
                                            </tbody>
                                        </table>

                                         
                                </div>
                                

                            </div>
                
                            
                
                        
                             
            </div>

           
            <div class="d-flex mb-3">
                <div class="ms-auto p-2">
                    {{ $appointments->links() }}   
                </div>
            </div>
                

            
             
    </div>

        



</section>

