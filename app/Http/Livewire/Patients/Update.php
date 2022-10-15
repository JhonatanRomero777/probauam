<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;

use Livewire\Component;

class Update extends Component
{
    public function mount(Patient $current_patient)
    {
        $this->patient = $current_patient;
        $this->component = "entity";
    }

    public function render()
    {
        return view('livewire.patients.update');
    }
}