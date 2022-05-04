<?php

namespace App\Http\Livewire\Patients;

use App\Models\Option;
use App\Models\Patient;
use App\Models\User;

use Carbon\Carbon;
use Livewire\Component;

class Create2 extends Component
{
    public String $age;
    public String $imc;
    public String $category;

    public Patient $patient;
    public User $user;

    public function mount()
    {
        $this->patient = new Patient;
        $this->email = "";

        $this->limit_date = Carbon::now()->toArray();
        $this->limit_date = ($this->limit_date['year'] - 61).'-12-31';

        $this->all_civil_status = Option::where('parameter_id', 2)->get();
        $this->all_education_level = Option::where('parameter_id', 3)->get();
        $this->all_socioeconomic_stratum = Option::where('parameter_id', 5)->get();
        $this->all_social_security_scheme = Option::where('parameter_id', 6)->get();

        $this->all_height = array(); for ($i=120; $i<=255; $i++){ array_push($this->all_height , $i); }
        $this->all_weight = array(); for ($i= 40; $i<=255; $i++){ array_push($this->all_weight , $i); }
        $this->all_size   = array(); for ($i= 50; $i<=150; $i++){ array_push($this->all_size   , $i); }
    }

    protected $rules = [
        'patient.birthday' => ['required'],
        'patient.civil_status'=> ['required'],
        'patient.education_level'=> ['required'],
        'patient.socioeconomic_stratum'=> ['required'],
        'patient.social_security_scheme'=> ['required'],
        'patient.height'=> ['required'],
        'patient.weight'=> ['required'],
        'patient.size'=> ['required'],
        /* ------------------------------------------ */
        'patient.id' => [],
        'patient.user_id' => [],
        'patient.names' => ['required'],
        'patient.last_names' => ['required'],
        'patient.document' => ['required'],
        'patient.phone' => ['required'],
        'patient.direction' => ['required'],
        'patient.sex'=> ['required'],
        'patient.document_type'=> ['required']
    ];

    protected $listeners = ['editPatient'];

    public function updatedPatientBirthday()
    { $this->age = Carbon::parse($this->patient->birthday)->age; $this->age = $this->age . " años"; }

    public function updatedPatientHeight()
    { $this->changeIMC(); }

    public function updatedPatientWeight()
    { $this->changeIMC(); }

    public function editPatient($patient , $email)
    {
        $this->patient = new Patient;
        $this->email = $email;

        $this->patient->civil_status = $patient["civil_status"];
        $this->patient->education_level = $patient["education_level"];
        $this->patient->socioeconomic_stratum = $patient["socioeconomic_stratum"];
        $this->patient->social_security_scheme = $patient["social_security_scheme"];
        $this->patient->birthday = $patient["birthday"];
        $this->patient->height = $patient["height"];
        $this->patient->weight = $patient["weight"];
        $this->patient->size = $patient["size"];

        $this->patient->id = $patient["id"];
        $this->patient->user_id = $patient["user_id"];
        $this->patient->names = $patient["names"];
        $this->patient->last_names = $patient["last_names"];
        $this->patient->document = $patient["document"];
        $this->patient->phone = $patient["phone"];
        $this->patient->direction = $patient["direction"];
        $this->patient->sex = $patient["sex"];
        $this->patient->document_type = $patient["document_type"];

        $this->updatedPatientBirthday();
        $this->changeIMC();
        
        $this->emit('open-modal','#modal-create2');
    }

    public function changeIMC()
    {
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

    public function back()
    { 
        $this->emit('close-modal','#modal-create2');
        $this->emitTo('patients.create1','editPatient',$this->patient,$this->email);
    }

    public function save()
    {
        if($this->patient->id)
        {
            $this->user = $this->patient->user;
            $this->user->email = $this->email;
            $this->user->save();

            $this->patient->exists = true;
            $this->patient->save();
        }
        else
        {
            $this->user = User::create([
              'email' => $this->email,
              'password' => hash('sha512','hola123')
            ])->assignRole('Patient');
        
            $this->patient->user_id = $this->user->id;
            $this->patient->save();
        }
        $this->emitTo('patients.index','render');
        $this->emit('close-modal','#modal-create2');
        $this->emit('success');
    }

    public function render()
    {
        return view('livewire.patients.create2');
    }
}