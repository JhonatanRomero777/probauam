<?php

namespace App\Http\Livewire\Patients;

use App\Models\Companion;
use App\Models\Option;
use App\Models\Patient;

use Livewire\Component;

class Create5 extends Component
{
    protected $rules = [
        'companion.names' => ['required','regex:/[a-zA-Z0-9\s]+/','max:30'],
        'companion.last_names' => ['required','regex:/[a-zA-Z0-9\s]+/','max:30'],
        'companion.document_type'=> ['required'],
        'companion.document' => ['required','max:20'],
        'companion.phone' => ['required','max:20'],
        'companion.phone2' => ['required','max:20'],
        'companion.direction' => ['required','max:60'],
        'companion.relationship'=> ['required'],
    ];

    protected $messages = [
        'companion.names.required' => 'El campo es obligatorio',
        'companion.names.regex' => 'No se permite caracteres especiales',
        'companion.names.max' => 'Máximo 30 caracteres',
        'companion.last_names.required' => 'El campo es obligatorio',
        'companion.last_names.regex' => 'No se permite caracteres especiales',
        'companion.last_names.max' => 'Máximo 30 caracteres',
        'companion.document.required' => 'El campo es obligatorio',
        'companion.document.max' => 'Máximo 20 caracteres',
        'companion.document_type.required' => 'El campo es obligatorio',
        'companion.phone.required' => 'El campo es obligatorio',
        'companion.phone.max' => 'Máximo 20 caracteres',
        'companion.phone2.required' => 'El campo es obligatorio',
        'companion.phone2.max' => 'Máximo 20 caracteres',
        'companion.direction.required' => 'El campo es obligatorio',
        'companion.direction.max' => 'Máximo 60 caracteres',
        'companion.relationship' => 'El campo es obligatorio',
    ];

    public function mount()
    {
        $this->patient = new Patient;
        $this->companion = new Companion;
        $this->bandera = true;

        $this->all_document_type = Option::where('parameter_id', 4)->get();
        $this->all_relationship = Option::where('parameter_id', 5)->get();
    }

    protected $listeners = ['init'];

    public function init(Patient $patient)
    {
        $this->patient = $patient;
        if($this->patient->companion)
        {
            $this->companion = $this->patient->companion;
            $this->bandera = true;
        }
        else
        {
            $this->companion = new Companion;
            $this->bandera = false;
        }
        $this->emit('open-modal','#modal-patient-create5');
    }

    public function save()
    {

    }

    public function render()
    {
        return view('livewire.patients.create5');
    }
}