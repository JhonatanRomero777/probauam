<?php

namespace App\Http\Livewire\Parameters;

use App\Models\Option;
use App\Models\Parameter;

use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        $this->parameters = Parameter::orderBy('id','asc')->get();
        $this->parameter = $this->parameters->first();
        $this->option = new Option;
        $this->isCreate = true;
    }

    protected $rules = [
        'option.name' => ['required']
    ];

    protected $messages = [
        'option.name.required' => 'El campo es obligatorio'
    ];

    protected $listeners = ['delete'];

    public function clean()
    {        
        $this->option = new Option;
        $this->isCreate = true;
    }

    public function isRepeat()
    {
        foreach($this->parameter->options()->get() as $current_option)
        {
            if(strcasecmp($current_option->name , $this->option->name) === 0) return true;
        }
        return false;
    }

    public function save()
    {
        $this->validate();

        if($this->isRepeat())
        {
            $this->dispatchBrowserEvent('repeat');
        }
        else
        {
            $this->option->parameter_id = $this->parameter->id;
            $this->option->save();
        }

        $this->clean();
    }

    public function edit(Option $option)
    {
        $this->option = $option;
        $this->isCreate = false;
    }

    public function delete(Option $option)
    {
        $option->delete();
    }

    public function updated($propertyName)
    {
        $this->option->name = trim($this->option->name);
        $this->validateOnly($propertyName);
    }

    public function changeParameter(Parameter $parameter)
    {
        $this->parameter = $parameter;
    }

    public function render()
    {
        return view('livewire.parameters.index');
    }
}