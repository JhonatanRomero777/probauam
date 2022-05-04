<?php

namespace App\Http\Livewire\Entities;

use App\Models\Country;
use App\Models\Department;
use App\Models\City;
use App\Models\Entity;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->country = Country::first();
        $this->department = $this->country->departments()->first();
        $this->city = $this->department->cities()->first();
        $this->resetPage();
    }

    protected $listeners = ['delete' , 'render'];

    public function changeCountry($value)
    {
        $this->country = Country::find($value);
        $this->department = $this->country->departments()->first();
        $this->city =$this->department->cities()->first();
        $this->resetPage();
    }

    public function changeDepartment($value)
    {
        $this->department = Department::find($value);
        $this->city = $this->department->cities()->first();
        $this->resetPage();
    }

    public function changeCity($value)
    {
        $this->city = City::find($value);
        $this->resetPage();
    }

    public function create()
    {
        $this->emitTo('entities.create','createEntity',$this->city);
    }

    public function edit(Entity $entity)
    {
        $this->emitTo('entities.create','editEntity',$entity);
    }

    public function delete(Entity $entity)
    {
        $entity->delete();
    }

    public function render()
    {
        $entities = Entity::where('city_id','=',$this->city->id)->orderBy('id', 'desc')->paginate(3);

        return view('livewire.entities.index',compact('entities'));
    }
}