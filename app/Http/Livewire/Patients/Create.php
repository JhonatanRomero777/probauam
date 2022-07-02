<?php

namespace App\Http\Livewire\Patients;

use App\Models\Country;
use App\Models\Department;
use App\Models\City;
use App\Models\Entity;
use App\Models\Patient;

use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['init'];

    public function mount()
    {
        $this->country = Country::first();
        $this->department = $this->country->departments()->first();
        $this->city = $this->department->cities()->first();

        $this->entity = new Entity;
        $this->patient = new Patient;

        $this->search = "";
        $this->resetPage();
    }

    public function init(Patient $patient = new Patient)
    {
        $this->mount();

        if($patient->id){ $this->patient = $patient; $this->entity = $this->patient->entity; }

        $this->emit('open-modal','#modal-patient-create');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

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

    public function changeEntity(Entity $entity)
    {
        $this->entity = $entity;
    }

    public function next()
    {
        $this->emit('close-modal','#modal-patient-create');
        $this->emitTo('patients.update','init',$this->entity,$this->patient->id);
    }

    public function render()
    {
        $entities = Entity::where('city_id','=',$this->city->id)
                            ->where('name', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'desc')->paginate(3);

        return view('livewire.patients.create',compact('entities'));
    }
}