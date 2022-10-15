@extends('layouts.app', [
    'namePage' => 'Usuarios',
    'class' => 'sidebar-mini',
    'activePage' => 'patients',
  ])

@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">

    @livewire('components.modal',["id_modal"=>'modal-patient-create', "percentage"=>'98%', "component"=>'patients.create'])

    @livewire('components.modal',["id_modal"=>'modal-patient-update', "percentage"=>'98%', "component"=>'patients.edit'])

    @livewire('components.modal',["id_modal"=>'modal-patient-create2', "percentage"=>'98%', "component"=>'patients.create2'])

    @livewire('components.modal',["id_modal"=>'modal-patient-create3', "percentage"=>'98%', "component"=>'patients.create3'])

    @livewire('components.modal',["id_modal"=>'modal-patient-create4', "percentage"=>'98%', "component"=>'patients.create4'])

    @livewire('components.modal',["id_modal"=>'modal-patient-create5', "percentage"=>'60%', "component"=>'patients.create5'])

    <div class="row">
      <div class="col-md-12">

        @livewire('patients.index',['current_entity'=>$entity_id])

      </div>
    </div>

  </div>

@endsection