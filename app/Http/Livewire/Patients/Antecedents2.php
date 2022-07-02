<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;
use App\Models\FAntecedent;
use App\Models\Option;

use Livewire\Component;
use Livewire\WithPagination;

class Antecedents2 extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete' , 'init' , 'choose', 'back', 'next'];

    public function mount()
    {
        $this->patient = new Patient;
        $this->fantecedent = new FAntecedent;
        $this->search = "";
    }

    public function init(Patient $patient)
    {
        $this->emitTo('patients.illnesses2','mount');
        $this->search = "";
        $this->resetPage();
        $this->patient = $patient;
        $this->emit('open-modal','#modal-patient-create4');
    }

    public function choose(Option $option)
    {
        if($this->patient->f_antecedents()->where('pharmacological_id', '=', $option->id)->count())
        {
            $this->emit('warning', 'Enfermedad ya registrada');
        }
        else
        {
            $this->fantecedent = new FAntecedent;
            $this->fantecedent->patient_id = $this->patient->id;
            $this->fantecedent->pharmacological_id = $option->id;
            $this->fantecedent->save();
            $this->emit('success');
            $this->resetPage();
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(FAntecedent $fantecedent)
    {
        $fantecedent->delete();
        $this->emit('success');
        $this->fantecedent = new FAntecedent;
    }

    public function back()
    {
        $this->emit('close-modal','#modal-patient-create4');
        $this->emitTo('patients.antecedents','init',$this->patient->id);
    }

    public function next()
    {
        $this->emit('close-modal','#modal-patient-create4');
        $this->emitTo('patients.create5','init',$this->patient);
        
    }

    public function render()
    {
        $antecedents = $this->patient->f_antecedents()->join("options", "f_antecedents.pharmacological_id", "=", "options.id")
                                                    ->select('f_antecedents.id','options.name')
                                                    ->where('name', 'like', '%'.$this->search.'%')
                                                    ->orderBy('id', 'desc')->paginate(3);

        return view('livewire.patients.antecedents2',compact('antecedents'));
    }
}