<?php

namespace App\Http\Livewire\Puzzles;

use App\Models\Patient;

use Livewire\Component;

class Index extends Component
{
    public function mount(Patient $current_patient)
    {
        $this->patient = $current_patient;

        $this->cont = 0;

        $this->tokens = array();

        array_push($this->tokens , ['state'=>"unlocked"]);

        for ($i=1; $i<30; $i++)
        {
            array_push($this->tokens , ['state'=>"locked"]);
        }
    }

    public function changeState($i)
    {
        if($this->tokens[$i]['state'] == "unlocked")
        {
            $this->tokens[$i]['state'] = "finalized";

            if($i < 30)
            {
                $this->cont++;
                $this->tokens[$i+1]['state'] = "unlocked";
            }
        }
    }

    public function render()
    {
        return view('livewire.puzzles.index');
    }
}
