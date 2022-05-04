<?php

namespace App\Http\Livewire\Sesions;

use App\Models\Patient;
use App\Models\Sesion;

use Livewire\Component;

class Index extends Component
{
    public function mount(Patient $current_patient)
    {
        $this->patient = $current_patient;
    }

    public function create()
    {
        if(count($this->patient->sesions))
        {
            if($this->patient->sesions()->orderBy('created_at', 'desc')->first()->finish){ $this->sendNew(); }
            else { return redirect()->route('forms.index' , ['sesion_id'=>$this->patient->sesions()->orderBy('created_at', 'desc')->first()]); }
        }
        else { $this->sendNew(); }
    }

    public function sendNew()
    {
        $sesion = new Sesion();
        $sesion->patient_id = $this->patient->id;
        $sesion->finish = false;
        $sesion->save();

        return redirect()->route('forms.index' , ['sesion_id'=>$sesion]);
    }

    public function render()
    {
        return view('livewire.sesions.index');
    }
}