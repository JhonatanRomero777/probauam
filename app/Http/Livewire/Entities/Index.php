<?php

namespace App\Http\Livewire\Entities;

use App\Models\Country;
use App\Models\City;
use App\Models\Entity;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete' , 'changeCity' , 'render'];

    public function mount()
    {
        $this->city = Country::first()->departments->first()->cities->first();
        $this->search = "";
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function changeCity(City $city)
    {
        $this->city = $city;
        $this->resetPage();
    }

    public function delete(Entity $entity)
    {
        $entity->delete();
    }

    public function render()
    {
        $entities = Entity::where('city_id','=',$this->city->id)
                            ->where('name', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'desc')->paginate(2);

        return view('livewire.entities.index',compact('entities'));
    }
}