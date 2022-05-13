<?php

namespace App\Http\Livewire\Professionals;

use App\Models\Option;
use App\Models\Professional;
use App\Models\User;

use Livewire\Component;

class Create extends Component
{
    public function mount()
    {
        $this->user = new User;
        $this->professional = new Professional;
        
        $this->documents = Option::where('parameter_id', 4)->get();
        $this->document_type = $this->documents->first();
    }

    protected $rules = [
        'professional.names' => ['required','regex:/[a-zA-Z0-9\s]+/'],
        'professional.last_names' => ['required','regex:/[a-zA-Z0-9\s]+/'],
        'professional.document' => ['required','alpha_dash','max:20'],
        'professional.professional_card' => ['required','integer','digits_between:7,10'],
        'professional.phone' => ['required','max:20'],
        'user.email' => ['required','email']
    ];

    protected $messages = [
        'professional.names.required' => 'El campo es obligatorio',
        'professional.names.regex' => 'No se permite caracteres especiales',
        'professional.last_names.required' => 'El campo es obligatorio',
        'professional.last_names.regex' => 'No se permite caracteres especiales',
        'professional.document.required' => 'El campo es obligatorio',
        'professional.document.alpha_dash' => 'Sólo caracteres alfanuméricos',
        'professional.document.max' => 'Máximo 20 caracteres',
        'professional.professional_card.required' => 'El campo es obligatorio',
        'professional.professional_card.integer' => 'El valor debe ser un número entero',
        'professional.professional_card.digits_between' => 'El valor debe estar entre 7 y 10 dígitos',
        'professional.phone.required' => 'El campo es obligatorio',
        'professional.phone.max' => 'Máximo 20 caracteres',
        'user.email.required' => 'El campo es obligatorio',
        'user.email.email' => 'Extensión de correo no válida'
    ];

    public function render()
    {
        return view('livewire.professionals.create');
    }
}
