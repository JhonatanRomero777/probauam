<?php

namespace App\Http\Livewire\Patients;

use App\Models\Entity;
use App\Models\Option;
use App\Models\Patient;
use App\Models\User;

use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    protected $rules = [
        'patient.names' => ['required','regex:/[a-zA-Z0-9\s]+/','max:30'],
        'patient.last_names' => ['required','regex:/[a-zA-Z0-9\s]+/','max:30'],
        'patient.document_type'=> ['required'],
        'patient.document' => ['required','max:20'],
        'patient.sex'=> ['required'],
        'patient.phone' => ['required','max:20'],
        'patient.direction' => ['required','max:60'],
        'user.email' => ['required','email'],
        /* ---------------------------------------------------------------------- */
        'patient.birthday' => ['required'],
        'patient.height'=> ['required'],
        'patient.weight'=> ['required'],
        'patient.size'=> ['required'],
        'patient.civil_status'=> ['required'],
        'patient.education_level'=> ['required'],
        'patient.socioeconomic_stratum'=> ['required'],
        'patient.social_security_scheme'=> ['required'],
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
        'patient.document_type.required' => 'El campo es obligatorio',
        'patient.sex.required' => 'El campo es obligatorio',
        'patient.phone.required' => 'El campo es obligatorio',
        'patient.phone.max' => 'Máximo 20 caracteres',
        'patient.direction.required' => 'El campo es obligatorio',
        'patient.direction.max' => 'Máximo 60 caracteres',
        'user.email.required' => 'El campo es obligatorio',
        'user.email.email' => 'Extensión de correo no válida',
        /* ---------------------------------------------------------------------- */
        'patient.birthday.required' => 'El campo es obligatorio',
        'patient.height.required' => 'El campo es obligatorio',
        'patient.weight.required' => 'El campo es obligatorio',
        'patient.size.required' => 'El campo es obligatorio',
        'patient.civil_status.required' => 'El campo es obligatorio',
        'patient.education_level.required' => 'El campo es obligatorio',
        'patient.socioeconomic_stratum.required' => 'El campo es obligatorio',
        'patient.social_security_scheme.required' => 'El campo es obligatorio',
    ];

    protected $listeners = ['init'];

    public String $age;
    public String $imc;
    public String $category;

    public function mount()
    {
        $this->patient = new Patient;
        $this->user = new User;
        $this->entity = new Entity;

        $this->all_document_type = Option::where('parameter_id', 4)->get();
        $this->all_sex = Option::where('parameter_id', 1)->get();

        /* ----------------------------------------------------------------------- */

        $this->limit_date = Carbon::now()->toArray();
        $this->limit_date = ($this->limit_date['year'] - 61).'-12-31';

        $this->all_civil_status = Option::where('parameter_id', 2)->get();
        $this->all_education_level = Option::where('parameter_id', 3)->get();
        $this->all_socioeconomic_stratum = Option::where('parameter_id', 6)->get();
        $this->all_social_security_scheme = Option::where('parameter_id', 7)->get();

        $this->all_height = array(); for ($i=120; $i<=255; $i++){ array_push($this->all_height , $i.""); }
        $this->all_weight = array(); for ($i= 40; $i<=255; $i++){ array_push($this->all_weight , $i.""); }
        $this->all_size   = array(); for ($i= 50; $i<=150; $i++){ array_push($this->all_size   , $i.""); }

        $this->current_email = "";
    }

    public function init(Entity $entity , Patient $patient)
    {
        $this->patient = $patient;
        $this->user   = $patient->user;
        $this->current_email = $this->user->email;
        $this->entity = $entity;

        $this->updatedPatientBirthday();
        $this->changeIMC();

        $this->resetValidation();
        $this->emit('open-modal','#modal-patient-update');
    }

    public function updatedPatientNames()
    {
        $this->resetValidation('patient.names');
        $this->patient->names = trim($this->patient->names);
        $this->validateOnly('patient.names');
    }

    public function updatedPatientLastNames()
    {
        $this->resetValidation('patient.last_names');
        $this->patient->last_names = trim($this->patient->last_names);
        $this->validateOnly('patient.last_names');
    }

    public function updatedPatientDocument()
    {
        $this->resetValidation('patient.document');
        $this->patient->document = trim($this->patient->document);
        $this->validateOnly('patient.document');

        if(Patient::where('document','=',$this->patient->document)->where('id','!=',$this->patient->id)->get()->count())
        { $this->addError('patient.document', 'Documento ya registrado'); }
    }

    public function updatedPatientDocumentType()
    {
        $this->resetValidation('patient.document_type');
        $this->validateOnly('patient.document_type');
    }

    public function updatedPatientSex()
    {
        $this->resetValidation('patient.sex');
        $this->validateOnly('patient.sex');
    }

    public function updatedPatientPhone()
    {
        $this->resetValidation('patient.phone');
        $this->patient->phone = trim($this->patient->phone);
        $this->validateOnly('patient.phone');
    }

    public function updatedPatientDirection()
    {
        $this->resetValidation('patient.direction');
        $this->patient->direction = trim($this->patient->direction);
        $this->validateOnly('patient.direction');
    }

    public function updatedUserEmail()
    {
        $this->resetValidation('user.email');
        $this->user->email = trim($this->user->email);
        $this->validateOnly('user.email');

        if(User::where('email','=',$this->user->email)->where('id','!=',$this->user->id)->get()->count())
        { $this->addError('user.email', 'Email ya registrado'); }
    }

    /* ------------------------------------------------------------------------------------ */

    public function updatedPatientBirthday()
    {
        $this->resetValidation('patient.birthday');
        $this->age = Carbon::parse($this->patient->birthday)->age; $this->age = $this->age . " años";
        $this->validateOnly('patient.birthday');
    }

    public function updatedPatientHeight()
    {
        $this->imc = "0.0";
        $this->category = "";
        $this->resetValidation('patient.height');
        $this->validateOnly('patient.height');
        $this->changeIMC();
    }

    public function updatedPatientWeight()
    {
        $this->imc = "0.0";
        $this->category = "";
        $this->resetValidation('patient.weight');
        $this->validateOnly('patient.weight');
        $this->changeIMC();
    }
    
    public function changeIMC()
    {
        $this->validateOnly('patient.weight');
        $this->validateOnly('patient.height');

        $this->imc = $this->patient->weight / (($this->patient->height/100)*($this->patient->height/100));
        $this->imc = round($this->imc,2);

        if($this->imc < 18.5) $this->category = "Peso Insuficiente";
        if($this->imc >= 18.5 && $this->imc <= 24.9) $this->category = "Peso Normal";
        if($this->imc >= 25.0 && $this->imc <= 26.9) $this->category = "Sobrepeso Grado I";
        if($this->imc >= 27.0 && $this->imc <= 29.9) $this->category = "Sobrepeso Grado II (Preobesidad)";
        if($this->imc >= 30.0 && $this->imc <= 34.9) $this->category = "Obesidad de tipo I";
        if($this->imc >= 35.0 && $this->imc <= 39.9) $this->category = "Obesidad de tipo II";
        if($this->imc >= 40.0 && $this->imc <= 49.9) $this->category = "Obesidad de tipo III (Mórbida)";
        if($this->imc >= 50.0) $this->category = "Obesidad de tipo IV (extrema)";
    }

    public function updatedPatientSize()
    {
        $this->resetValidation('patient.size');
        $this->validateOnly('patient.size');
    }

    public function updatedPatientCivilStatus()
    {
        $this->resetValidation('patient.civil_status');
        $this->validateOnly('patient.civil_status');
    }

    public function updatedPatientEducationLevel()
    {
        $this->resetValidation('patient.education_level');
        $this->validateOnly('patient.education_level');
    }

    public function updatedPatientSocioeconomicStratum()
    {
        $this->resetValidation('patient.socioeconomic_stratum');
        $this->validateOnly('patient.socioeconomic_stratum');
    }

    public function updatedPatientSocialSecurityScheme()
    {
        $this->resetValidation('patient.social_security_scheme');
        $this->validateOnly('patient.social_security_scheme');
    }

    public function save()
    {
        $this->validate();

        if(Patient::where('document','=',$this->patient->document)->where('id','!=',$this->patient->id)->get()->count())
        { $this->addError('patient.document', 'Documento ya registrado'); return false; }

        if(User::where('email','=',$this->user->email)->where('id','!=',$this->user->id)->get()->count())
        { $this->addError('user.email', 'Email ya registrado'); return false; }

        if($this->user->email != $this->current_email)
        {
            $this->user->save();
            //mandar correo cambio de contraseña
        }

        $this->patient->entity_id = $this->entity->id;
        $this->patient->save();
        $this->emitTo('patients.index','render');
        $this->emit('close-modal','#modal-patient-update');
        $this->emit('success');
        return true;
    }

    public function next()
    {
        if($this->save())
        {
            $this->emitTo('patients.antecedents','init',$this->patient->id);
        }
    }

    public function back()
    {
        if($this->save())
        {
            $this->emitTo('patients.create','init',$this->patient->id);
        }
    }

    public function render()
    {
        return view('livewire.patients.edit');
    }
}