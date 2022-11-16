<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Receptionist;

class ShowReceptionists extends Component
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
        $sentence = Receptionist::where('state','1')->where(
            function ($query) { 
                $query->where('name_first','like','%'.$this->search.'%')->orWhere('email','like','%'.$this->search.'%')->orWhere('curp','like','%'.$this->search.'%'); 
            }
        );
        return view('livewire.show-receptionists', ['receptionists' => $sentence->paginate(10)]);
       
    }
}
