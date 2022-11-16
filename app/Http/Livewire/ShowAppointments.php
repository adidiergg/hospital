<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Appointment;

class ShowAppointments extends Component
{

    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $sentence = Appointment::where('state','1')->where(
            function ($query) { 
                $query->where('patients.name_first','like','%'.$this->search.'%')->orWhere('patients.email','like','%'.$this->search.'%')->orWhere('patients.curp','like','%'.$this->search.'%'); 
            }
        );
        /*
        $sentence = Patient::where('state','1')->where(
            function ($query) { 
                $query->where('name_first','like','%'.$this->search.'%')->orWhere('email','like','%'.$this->search.'%')->orWhere('curp','like','%'.$this->search.'%'); 
            }
        );
        */
        return view('livewire.show-appointments', ['appointments' => $sentence->paginate(10)]);
        
    }
}
