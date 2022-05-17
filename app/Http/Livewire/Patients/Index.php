<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete' , 'render'];
    
    public function mount()
    {
        $this->search = "";
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Patient $patient)
    {
        $patient->user->delete();
    }

    public function render()
    {
        $patients = Patient::where('document', 'like', '%'.$this->search.'%')
                            ->orWhere('names', 'like', '%'.$this->search.'%')
                            ->orWhere('last_names', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'desc')->paginate(3);

        return view('livewire.patients.index',compact('patients'));
    }
}