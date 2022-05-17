<?php

namespace App\Http\Livewire\Professionals;

use App\Models\Professional;

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

    public function delete(Professional $professional)
    {
        $professional->user->delete();
    }

    public function render()
    {
        $professionals = Professional::where('document', 'like', '%'.$this->search.'%')
                                ->orWhere('professional_card', 'like', '%'.$this->search.'%')
                                ->orderBy('id', 'desc')
                                ->paginate(2);

        return view('livewire.professionals.index',compact('professionals'));
    }
}