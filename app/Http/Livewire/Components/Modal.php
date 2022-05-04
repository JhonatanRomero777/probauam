<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{
    public function mount($id_modal , $title , $component)
    {
        $this->id_modal = $id_modal;
        $this->title = $title;
        $this->component = $component;
    }

    public function render()
    {
        return view('livewire.components.modal');
    }
}