<?php

namespace App\Http\Livewire\Entities;

use App\Models\City;
use App\Models\Entity;

use Livewire\Component;

class Create extends Component
{
    public function mount()
    {
        $this->entity = new Entity;
        $this->city = new City;
    }

    protected $rules = [
        'entity.name' => ['required','regex:/[a-zA-Z0-9\s]+/','max:60'],
        'entity.nit' => ['required','integer','digits_between:10,10'],
        'entity.phone' => ['required','max:20'],
        'entity.direction' => ['required','max:60'],
    ];

    protected $messages = [
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

    protected $listeners = ['createEntity','editEntity'];

    public function updated($propertyName)
    {
        $this->entity->nit = trim($this->entity->nit);
        $this->entity->phone = trim($this->entity->phone);
        $this->validateOnly($propertyName);
    }

    public function createEntity(City $city)
    {
        $this->entity = new Entity;
        $this->city = $city;
        $this->resetValidation();
        $this->emit('open-modal','#modal-entity');
    }

    public function editEntity(Entity $entity)
    {   
        $this->entity = $entity;
        $this->city = City::find($this->entity->city_id);
        $this->resetValidation();
        $this->emit('open-modal','#modal-entity');
    }

    public function verify()
    {
        $this->entity->name = trim($this->entity->name);
        $this->entity->direction = trim($this->entity->direction);
        $this->entity->city_id = $this->city->id;
        
        $this->validate();

        if($this->entity->id)
        { $this->save(); }
        else
        {
            if(Entity::where('nit','=',$this->entity->nit)->get()->count())
            { $this->emit('repeat' , 'ENTIDAD'); $this->clean();}
            else
            { $this->save(); }
        }
    }

    public function save()
    {
        $this->entity->save();
        $this->emitTo('entities.index','render');
        $this->emit('close-modal','#modal-entity');
        $this->emit('success');
    }

    public function clean()
    {
        $this->entity = new Entity;
    }

    public function render()
    {
        return view('livewire.entities.create');
    }
}