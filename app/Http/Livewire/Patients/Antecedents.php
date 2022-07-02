<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;
use App\Models\PAntecedent;
use App\Models\Illness;

use Livewire\Component;
use Livewire\WithPagination;

class Antecedents extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete' , 'init' , 'choose', 'back', 'next'];

    public function mount()
    {
        $this->patient = new Patient;
        $this->pantecedent = new PAntecedent;
        $this->search = "";
    }

    public function init(Patient $patient)
    {
        $this->emitTo('patients.illnesses','mount');
        $this->search = "";
        $this->resetPage();
        $this->patient = $patient;
        $this->emit('open-modal','#modal-patient-create3');
    }

    public function choose(Illness $illness)
    {
        if($this->patient->p_antecedents()->where('illness_id', '=', $illness->id)->count())
        {
            $this->emit('warning', 'Enfermedad ya registrada');
        }
        else
        {
            $this->pantecedent = new PAntecedent;
            $this->pantecedent->patient_id = $this->patient->id;
            $this->pantecedent->illness_id = $illness->id;
            $this->pantecedent->save();
            $this->emit('success');
            $this->resetPage();
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(PAntecedent $pantecedent)
    {
        $pantecedent->delete();
        $this->emit('success');
        $this->pantecedent = new PAntecedent;
    }

    public function back()
    {
        $this->emit('close-modal','#modal-patient-create3');
        $this->emitTo('patients.update','init',$this->patient->entity_id,$this->patient->id);
        
    }

    public function next()
    {
        $this->emit('close-modal','#modal-patient-create3');
        $this->emitTo('patients.antecedents2','init',$this->patient->id);
        
    }

    public function render()
    {
        $antecedents = $this->patient->p_antecedents()->join("illnesses", "p_antecedents.illness_id", "=", "illnesses.id")
                                                    ->select('p_antecedents.id','illnesses.code','illnesses.name')
                                                    ->where('code', 'like', '%'.$this->search.'%')
                                                    ->orWhere('name', 'like', '%'.$this->search.'%')
                                                    ->orderBy('id', 'desc')->paginate(3);

        return view('livewire.patients.antecedents',compact('antecedents'));
    }
}