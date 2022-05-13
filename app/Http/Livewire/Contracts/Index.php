<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Contract;
use App\Models\Entity;
use App\Models\Professional;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render'];

    public function mount(Entity $current_entity)
    {
        $this->professional = new Professional;
        $this->entity = $current_entity;
        $this->search = "";
        $this->resetPage();
    }

    public function search()
    {
        $this->professional = Professional::where('document', '=', $this->search)
                                            ->orwhere('professional_card', '=', $this->search)->first();

        if($this->professional)
        {
            $this->search = "";
            $this->resetValidation('nofound');
            $this->emitTo('contracts.create','init',$this->professional,$this->entity);
        }
        else
        {
            $this->addError('nofound', 'Profesional NO Registrado');
        }
    }

    public function render()
    {
        $contracts = Contract::where('entity_id', '=', $this->entity->id)
                                        ->orderBy('id', 'desc')->paginate(2);

        return view('livewire.contracts.index',compact('contracts'));
    }
}