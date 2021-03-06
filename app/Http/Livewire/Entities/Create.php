<?php

namespace App\Http\Livewire\Entities;

use App\Models\Country;
use App\Models\City;
use App\Models\Entity;

use Livewire\Component;

class Create extends Component
{
    protected $rules =
    [
        'entity.name' => ['required','regex:/[a-zA-Z0-9\s]+/','max:60'],
        'entity.nit' => ['required','integer','digits_between:10,10'],
        'entity.phone' => ['required','max:20'],
        'entity.direction' => ['required','max:60'],
        'entity.city_id' => ['required']
    ];

    protected $messages = 
    [
        'entity.name.required' => 'El campo es obligatorio',
        'entity.name.regex' => 'No se permite caracteres especiales',
        'entity.name.max' => 'Máximo 60 caracteres',
        'entity.nit.required' => 'El campo es obligatorio',
        'entity.nit.integer' => 'El valor debe ser un número entero',
        'entity.nit.digits_between' => 'El valor debe tener 10 dígitos',
        'entity.phone.required' => 'El campo es obligatorio',
        'entity.phone.max' => 'Máximo 20 caracteres',
        'entity.direction.required' => 'El campo es obligatorio',
        'entity.direction.max' => 'Máximo 60 caracteres',
    ];

    protected $listeners = ['create'];

    public function mount()
    {
        $this->tag = false;
        $this->entity = new Entity;
        $this->entity->city_id = Country::first()->departments->first()->cities->first()->id;
    }

    public function updatedEntityName()
    {
        $this->resetValidation('entity.name');
        $this->entity->name = trim($this->entity->name);
        $this->validateOnly('entity.name');
    }

    public function updatedEntityNit()
    {
        $this->resetValidation('entity.nit');
        $this->entity->nit = trim($this->entity->nit);
        $this->validateOnly('entity.nit');

        if(Entity::where('nit','=',$this->entity->nit)->get()->count())
        { $this->addError('entity.nit', 'NIT ya registrado'); }
    }

    public function updatedEntityPhone()
    {
        $this->resetValidation('entity.phone');
        $this->entity->phone = trim($this->entity->phone);
        $this->validateOnly('entity.phone');
    }

    public function updatedEntityDirection()
    {
        $this->resetValidation('entity.direction');
        $this->entity->direction = trim($this->entity->direction);
        $this->validateOnly('entity.direction');
    }

    public function create(City $city)
    {
        $this->entity = new Entity;
        $this->entity->city_id = $city->id;
        $this->resetValidation();
        $this->emit('open-modal','#modal-entity-create');
    }

    public function save()
    {
        $this->validate();
        
        if(Entity::where('nit','=',$this->entity->nit)->get()->count())
        { $this->addError('entity.nit', 'NIT ya registrado'); return; }

        $this->entity->save();
        $this->emitTo('entities.index','changeCity',$this->entity->city_id);
        $this->emit('close-modal','#modal-entity-create');
        $this->emit('success');
    }

    public function render()
    {
        return view('livewire.entities.create');
    }
}