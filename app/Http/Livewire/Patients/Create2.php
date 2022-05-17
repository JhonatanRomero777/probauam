<?php

namespace App\Http\Livewire\Patients;

use App\Models\Illness;
use App\Models\Patient;

use Livewire\Component;
use Livewire\WithPagination;

class Create2 extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['create'];

    public function mount()
    {
        $this->patient = new Patient;
        $this->search1 = "";
        $this->resetPage();
    }

    public function updatingSearch1()
    {
        $this->resetPage();
    }

    public function create(Patient $patient)
    {
        $this->patient = $patient;

        $this->resetValidation();
        $this->emit('open-modal','#modal-patient-create2');
    }

    public function render()
    {
        $illnesses = Illness::where('code', 'like', '%'.$this->search1.'%')
                            ->orWhere('name', 'like', '%'.$this->search1.'%')
                            ->orderBy('id', 'asc')->paginate(3);

        return view('livewire.patients.create2',compact('illnesses'));
    }
}