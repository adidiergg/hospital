<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Patient;

class ShowPatients extends Component
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
        $sentence = Patient::where('state','1')->where(
            function ($query) { 
                $query->where('name_first','like','%'.$this->search.'%')->orWhere('email','like','%'.$this->search.'%')->orWhere('curp','like','%'.$this->search.'%'); 
            }
        );
        return view('livewire.show-patients', ['patients' => $sentence->paginate(10)]);
    }
}
