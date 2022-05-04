<?php

namespace App\Http\Livewire\Professionals;

use App\Models\Option;
use App\Models\Professional;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->search = '';
        $this->documents = Option::where('parameter_id', 4)->get();
        $this->document_type = $this->documents->first();

        $this->user = new User;
        $this->professional = new Professional;
        $this->isCreate = true;
    }

    protected $rules = [
        'search' => [],

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

    protected $listeners = ['delete'];

    public function changeTypeDocument($value)
    {
        $this->document_type = Option::find($value);
    }

    public function updated($propertyName)
    {
        $this->professional->document = trim($this->professional->document);
        $this->professional->professional_card = trim($this->professional->professional_card);
        $this->professional->phone = trim($this->professional->phone);
        $this->user->email = trim($this->user->email);
        $this->validateOnly($propertyName);
    }

    public function delete(Professional $professional)
    {
        $professional->user->delete();
    }

    public function clean()
    {        
        $this->professional = new Professional;
        $this->user = new User;
        $this->document_type = $this->documents->first();
        $this->isCreate = true;
    }

    public function edit(Professional $professional)
    {
        $this->professional = $professional;
        $this->user = $this->professional->user;
        $this->document_type = Option::find($this->professional->document_type);
        $this->isCreate = false;
    }

    public function save()
    {
        $this->professional->names = trim($this->professional->names);
        $this->professional->last_names = trim($this->professional->last_names);
        $this->professional->document_type = $this->document_type->id;
        
        $this->validate();

        if($this->isCreate)
        {
            if(User::where('email','=',$this->user->email)->get()->count() ||
                Professional::where('document','=',$this->professional->document)
                            ->orWhere('professional_card','=',$this->professional->professional_card)
                            ->get()->count())
            { $this->dispatchBrowserEvent('repeat'); }
            else
            { 
                $this->isCreate = false;

                $this->user = User::create([
                    'email' => $this->user->email,
                    'password' => hash('sha512','hola123')
                ])->assignRole('Professional');

                $this->professional->user_id = $this->user->id;
            }
        }

        if(!$this->isCreate)
        {
            $this->professional->save();
            $this->clean();
            $this->dispatchBrowserEvent('success');
        }
    }

    public function render()
    {
        $professionals = Professional::where('document', 'like', '%'.$this->search.'%')
                                ->orWhere('professional_card', 'like', '%'.$this->search.'%')
                                ->orderBy('id', 'desc')
                                ->paginate(1);

        return view('livewire.professionals.index',compact('professionals'));
    }
}