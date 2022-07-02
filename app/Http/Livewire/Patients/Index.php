<?php

namespace App\Http\Livewire\Patients;

use App\Models\Entity;
use App\Models\Patient;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete' , 'render'];
    
    public function mount(Entity $current_entity)
    {
        $this->entity = $current_entity;
        $this->search = "";
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Patient $patient)
    {
        $patient->user->delete();
    }

    public function verify()
    {
        $patient_search = Patient::where('document', '=', $this->search)->first();

        if($patient_search)
        { 
            if($patient_search->entity_id == $this->entity->id)
            { $this->addError('patient.exist', 'Usuario ya registrado en esta Entidad'); }
        }
        else
        {

        }
    }

    public function render()
    {
        $patients = Patient::where('entity_id', '=', $this->entity->id)
                            ->where('document', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'desc')->paginate(3);

        return view('livewire.patients.index',compact('patients'));
    }
}