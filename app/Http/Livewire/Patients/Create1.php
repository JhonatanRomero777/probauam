<?php

namespace App\Http\Livewire\Patients;

use App\Models\Option;
use App\Models\Patient;
use App\Models\User;

use Carbon\Carbon;
use Livewire\Component;

class Create1 extends Component
{
    public Patient $patient;
    public String $email;
    public Bool $bandera;

    public function mount()
    {
        $this->patient = new Patient;
        $this->all_sex = Option::where('parameter_id', 1)->get();
        $this->all_document_type = Option::where('parameter_id', 4)->get();
    }

    protected $rules = [
        'patient.names' => ['required','regex:/[a-zA-Z0-9\s]+/','max:30'],
        'patient.last_names' => ['required','regex:/[a-zA-Z0-9\s]+/','max:30'],
        'patient.document' => ['required','max:20'],
        'patient.phone' => ['required','max:20'],
        'patient.direction' => ['required','max:60'],
        'email' => ['required'],
        'patient.sex'=> ['required'],
        'patient.document_type'=> ['required'],
        /* ------------------------------------------ */
        'patient.id' => [],
        'patient.user_id' => [],
        'patient.birthday' => ['required'],
        'patient.civil_status'=> ['required'],
        'patient.education_level'=> ['required'],
        'patient.socioeconomic_stratum'=> ['required'],
        'patient.social_security_scheme'=> ['required'],
        'patient.height'=> ['required'],
        'patient.weight'=> ['required'],
        'patient.size'=> ['required']
    ];

    protected $messages = [
        'patient.names.required' => 'El campo es obligatorio',
        'patient.names.regex' => 'No se permite caracteres especiales',
        'patient.names.max' => 'Máximo 30 caracteres',
        'patient.last_names.required' => 'El campo es obligatorio',
        'patient.last_names.regex' => 'No se permite caracteres especiales',
        'patient.last_names.max' => 'Máximo 30 caracteres',
        'patient.document.required' => 'El campo es obligatorio',
        'patient.document.max' => 'Máximo 20 caracteres',
        'patient.phone.required' => 'El campo es obligatorio',
        'patient.phone.max' => 'Máximo 20 caracteres',
        'patient.direction.required' => 'El campo es obligatorio',
        'patient.direction.max' => 'Máximo 60 caracteres',
        'email.required' => 'El campo es obligatorio'
    ];

    protected $listeners = ['create','edit','editPatient'];

    public function updatedPatientDocument()
    {  $this->patient->document = trim($this->patient->document); }

    public function updatedEmail()
    { $this->email = trim($this->email); $this->resetValidation('email.repeat'); }

    public function updated($propertyName)
    { $this->validateOnly($propertyName); }

    public function create()
    {   
        $this->patient = new Patient;
        $this->email = "";

        $this->patient->sex = $this->all_sex->first()->id;
        $this->patient->document_type = $this->all_document_type->first()->id;

        $this->patient->civil_status = Option::where('parameter_id', 2)->first()->id;
        $this->patient->education_level = Option::where('parameter_id', 3)->first()->id;
        $this->patient->socioeconomic_stratum = Option::where('parameter_id', 5)->first()->id;
        $this->patient->social_security_scheme = Option::where('parameter_id', 6)->first()->id;
        $limit_date = Carbon::now()->toArray();
        $limit_date = ($limit_date['year'] - 61).'-12-31';
        $this->patient->birthday = $limit_date;
        $this->patient->height = 180;
        $this->patient->weight = 60;
        $this->patient->size = 50;

        $this->resetValidation();
        $this->emit('open-modal','#modal-create1');
    }

    public function edit(Patient $patient)
    {   
        $this->patient = $patient;
        $this->email   = $patient->user->email;

        $this->resetValidation();
        $this->emit('open-modal','#modal-create1');
    }

    public function editPatient($patient , $email)
    {   
        $this->email = $email;

        $this->patient->names = $patient["names"];
        $this->patient->last_names = $patient["last_names"];
        $this->patient->document = $patient["document"];
        $this->patient->phone = $patient["phone"];
        $this->patient->direction = $patient["direction"];
        $this->patient->sex = $patient["sex"];
        $this->patient->document_type = $patient["document_type"];

        $this->patient->id = $patient["id"];
        $this->patient->user_id = $patient["user_id"];
        $this->patient->civil_status = $patient["civil_status"];
        $this->patient->education_level = $patient["education_level"];
        $this->patient->socioeconomic_stratum = $patient["socioeconomic_stratum"];
        $this->patient->social_security_scheme = $patient["social_security_scheme"];
        $this->patient->birthday = $patient["birthday"];
        $this->patient->height = $patient["height"];
        $this->patient->weight = $patient["weight"];
        $this->patient->size = $patient["size"];
        
        $this->emit('open-modal','#modal-create1');
    }

    public function next()
    {
        $this->bandera = true;

        $this->validate();

        if($this->patient->id)
        {
            foreach(Patient::all()->except($this->patient->id) as $current_patient)
            {
                if ($current_patient->document == $this->patient->document)
                {
                    $this->addError('document.repeat', 'Documento ya existente');
                    $this->bandera = false;
                }
                if ($current_patient->user->email == $this->email)
                {
                    $this->addError('email.repeat', 'Email ya existente');
                    $this->bandera = false;
                }
            }
        }
        else
        {
            if (Patient::where('document','=',$this->patient->document)->get()->count())
            { 
                $this->addError('document.repeat', 'Documento ya existente');
                $this->bandera = false;
            }
            if(User::where('email','=',$this->email)->get()->count())
            {
                $this->addError('email.repeat', 'Email ya existente');
                $this->bandera = false;
            }
        }
        if($this->bandera)
        {
            $this->patient->names = trim($this->patient->names);
            $this->patient->last_names = trim($this->patient->last_names);
            $this->patient->phone = trim($this->patient->phone);
            $this->patient->direction = trim($this->patient->direction);
            $this->emit('close-modal','#modal-create1');
            $this->emitTo('patients.create2','editPatient',$this->patient,$this->email);
        }
    }

    public function render()
    {
        return view('livewire.patients.create1');
    }
}