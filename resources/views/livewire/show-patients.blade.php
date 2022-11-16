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
                                                    
                                                    <th scope="col">CURP</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Correo electrónico</th>
                                                    <th scope="col">Acciones</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @forelse($patients as $patient)
                                                        <tr>
                                                            {{-- dd($patient) --}}
                                                            
                                                            <th scope="row">{{$patient->curp}}</th>
                                                            <td >{{$patient->name_first .' '. $patient->name_last}} </td>
                                                            <td>{{$patient->email}}</td>
                                                            
                                                                                                                       
                                                            <td class="align-baseline">
                                                                <form action=" {{ route('patients.destroy',$patient) }} " method="POST"  id="soylavergota" onsubmit="alertDelete(event);">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a class='btn btn-secondary' href=" {{ route('patients.show',$patient) }} "><i class='fa-solid fa-eye sizeSimbol'></i></a>
                                                                    
                                                                    <a class='btn btn-info' href=" {{ route('patients.edit',$patient) }} "><i class='fa-solid fa-pen-to-square sizeSimbol'></i></a>             
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
                    {{ $patients->links() }}   
                </div>
            </div>
                

            
             
    </div>

        



</section>
