<?php

namespace App\Http\Livewire\Patients;

use App\Models\Illness;

use Livewire\Component;
use Livewire\WithPagination;

class Illnesses extends Component
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
        $illnesses = Illness::where('code', 'like', '%'.$this->search.'%')
                            ->orWhere('name', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'asc')->paginate(3);

        return view('livewire.patients.illnesses',compact('illnesses'));
    }
}