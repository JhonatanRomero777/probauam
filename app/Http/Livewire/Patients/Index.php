<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public String $search = "";

    public function mount()
    {
        $this->modals =
        [
            [ 'id'=>'modal-create1' , 'title'=>'USUARIO' , 'component'=>'patients.create1' ],
            [ 'id'=>'modal-create2' , 'title'=>'USUARIO' , 'component'=>'patients.create2' ]
        ];        
    }

    protected $listeners = ['delete' , 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->emitTo('patients.create1','create');
    }

    public function edit(Patient $patient)
    {
        $this->emitTo('patients.create1','edit',$patient);
    }

    public function delete(Patient $patient)
    {
        $patient->user->delete();
    }

    public function render()
    {
        $patients = Patient::where('document', 'like', '%'.$this->search.'%')
                            ->orWhere('names', 'like', '%'.$this->search.'%')
                            ->orWhere('last_names', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'desc')->paginate(3);

        return view('livewire.patients.index',compact('patients'));
    }
}