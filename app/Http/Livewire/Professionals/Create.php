<?php

namespace App\Http\Livewire\Professionals;

use App\Models\Option;
use App\Models\Professional;
use App\Models\User;

use Livewire\Component;

class Create extends Component
{
    protected $rules = [
        'professional.names' => ['required','regex:/[a-zA-Z0-9\s]+/'],
        'professional.last_names' => ['required','regex:/[a-zA-Z0-9\s]+/'],
        'professional.document' => ['required','alpha_dash','max:20'],
        'professional.document_type' => ['required'],
        'professional.professional_card' => ['required','alpha_dash','max:20'],
        'professional.phone' => ['required','max:20'],
        'user.email' => ['required','email']
    ];

    protected $messages = [
        'professional.names.required' => 'El campo es obligatorio',
        'professional.names.regex' => 'No se permite caracteres especiales',
        'professional.last_names.required' => 'El campo es obligatorio',
        'professional.last_names.regex' => 'No se permite caracteres especiales',
        'professional.document.required' => 'El campo es obligatorio',
        'professional.document_type.required' => 'El campo es obligatorio',
        'professional.document.alpha_dash' => 'Sólo caracteres alfanuméricos',
        'professional.document.max' => 'Máximo 20 caracteres',
        'professional.professional_card.required' => 'El campo es obligatorio',
        'professional.professional_card.alpha_dash' => 'Sólo caracteres alfanuméricos',
        'professional.professional_card.max' => 'Máximo 20 caracteres',
        'professional.phone.required' => 'El campo es obligatorio',
        'professional.phone.max' => 'Máximo 20 caracteres',
        'user.email.required' => 'El campo es obligatorio',
        'user.email.email' => 'Extensión de correo no válida'
    ];

    protected $listeners = ['create'];

    public function mount()
    {
        $this->user = new User;
        $this->professional = new Professional;

        $this->all_document_type = Option::where('parameter_id', 4)->get();

        $this->bandera = true;
    }

    public function updatedProfessionalNames()
    {
        $this->resetValidation('professional.names');
        $this->professional->names = trim($this->professional->names);
        $this->validateOnly('professional.names');
    }

    public function updatedProfessionalLastNames()
    {
        $this->resetValidation('professional.last_names');
        $this->professional->last_names = trim($this->professional->last_names);
        $this->validateOnly('professional.last_names');
    }

    public function updatedProfessionalDocument()
    {
        $this->resetValidation('professional.document');
        $this->professional->document = trim($this->professional->document);
        $this->validateOnly('professional.document');

        if(Professional::where('document','=',$this->professional->document)->get()->count())
        { $this->addError('professional.document', 'Documento ya registrado'); }
    }

    public function updatedProfessionalDocumentType()
    {
        $this->resetValidation('professional.document_type');
        $this->validateOnly('professional.document_type');
    }

    public function updatedProfessionalProfessionalCard()
    {
        $this->resetValidation('professional.professional_card');
        $this->professional->professional_card = trim($this->professional->professional_card);
        $this->validateOnly('professional.professional_card');

        if(Professional::where('professional_card','=',$this->professional->professional_card)->get()->count())
        { $this->addError('professional.professional_card', 'Tarjeta Profesional ya registrada'); }
    }

    public function updatedProfessionalPhone()
    {
        $this->resetValidation('professional.phone');
        $this->professional->phone = trim($this->professional->phone);
        $this->validateOnly('professional.phone');
    }

    public function updatedUserEmail()
    {
        $this->resetValidation('user.email');
        $this->user->email = trim($this->user->email);
        $this->validateOnly('user.email');

        if(User::where('email','=',$this->user->email)->get()->count())
        { $this->addError('user.email', 'Email ya registrado'); }
    }

    public function create()
    {
        $this->professional = new Professional;
        $this->user = new User;
        $this->resetValidation();
        $this->emit('open-modal','#modal-professional-create');
    }

    public function save()
    {
        $this->validate();

        $this->bandera = true;

        if(Professional::where('document','=',$this->professional->document)->get()->count())
        { $this->addError('professional.document', 'Documento ya registrado'); $this->bandera = false; }

        if(Professional::where('professional_card','=',$this->professional->professional_card)->get()->count())
        { $this->addError('professional.professional_card', 'Tarjeta Profesional ya registrada'); $this->bandera = false; }

        if(User::where('email','=',$this->user->email)->get()->count())
        { $this->addError('user.email', 'Email ya registrado'); $this->bandera = false; }

        if($this->bandera)
        {
            $this->user = User::create([
                'email' => $this->user->email,
                'password' => hash('sha512','hola123')
            ])->assignRole('Professional');
    
            $this->professional->user_id = $this->user->id;
            $this->professional->save();
            $this->emitTo('patients.index','render');
            $this->emit('close-modal','#modal-patient-create');
            $this->emit('success');
        }
    }

    public function render()
    {
        return view('livewire.professionals.create');
    }
}