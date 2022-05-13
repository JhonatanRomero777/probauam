<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{
    public function mount($id_modal , $component)
    {
        $this->id_modal = $id_modal;
        $this->component = $component;
    }

    public function render()
    {
        return view('livewire.components.modal');
    }
}