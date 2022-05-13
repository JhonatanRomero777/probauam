<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Contract;
use App\Models\Entity;
use App\Models\Professional;

use Livewire\Component;

class Create extends Component
{
    protected $listeners = ['init'];

    public function mount()
    {
        $this->contract = new Contract;
        $this->professional = Professional::first();
        $this->entity = Entity::first();
    }

    public function init(Professional $professional , Entity $entity)
    {
        $this->professional = $professional;
        $this->entity = $entity;
        $this->contract = Contract::where('entity_id', '=', $entity->id)->where('professional_id', '=', $professional->id)->first();
        $this->emit('open-modal','#modal-contract-create');
    }

    public function hired()
    {
        $this->contract = new Contract;
        $this->contract->entity_id = $this->entity->id;
        $this->contract->professional_id = $this->professional->id;
        $this->contract->save();

        $this->finish();
    }

    public function fired()
    {
        $this->contract->delete();
        $this->finish();
    }

    public function finish()
    {
        $this->emitTo('contracts.index','render');
        $this->emit('close-modal','#modal-contract-create');
        $this->emit('success');
    }

    public function render()
    {
        return view('livewire.contracts.create');
    }
}