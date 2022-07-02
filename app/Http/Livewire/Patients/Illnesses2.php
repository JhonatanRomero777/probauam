<?php

namespace App\Http\Livewire\Patients;

use App\Models\Option;

use Livewire\Component;
use Livewire\WithPagination;

class Illnesses2 extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['mount'];

    public function mount()
    {
        $this->search = "";
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $illnesses = Option::where('parameter_id', 8)
                                ->Where('name', 'like', '%'.$this->search.'%')
                                ->orderBy('id', 'asc')->paginate(3);

        return view('livewire.patients.illnesses2',compact('illnesses'));
    }
}