<?php

namespace App\Http\Livewire\Entities;

use App\Models\Country;
use App\Models\Department;
use App\Models\City;

use Livewire\Component;

class Search extends Component
{
    public function mount()
    {
        $this->country = Country::first();
        $this->department = $this->country->departments()->first();
        $this->city = $this->department->cities()->first();
    }

    public function changeCountry($value)
    {
        $this->country = Country::find($value);
        $this->department = $this->country->departments()->first();
        $this->city =$this->department->cities()->first();
        $this->emitTo('entities.index','changeCity' , $this->city);
    }

    public function changeDepartment($value)
    {
        $this->department = Department::find($value);
        $this->city = $this->department->cities()->first();
        $this->emitTo('entities.index','changeCity' , $this->city);
    }

    public function changeCity($value)
    {
        $this->city = City::find($value);
        $this->emitTo('entities.index','changeCity' , $this->city);
    }

    public function render()
    {
        return view('livewire.entities.search');
    }
}