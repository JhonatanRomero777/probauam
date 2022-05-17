@extends('layouts.app', [
    'namePage' => 'Usuarios',
    'class' => 'sidebar-mini',
    'activePage' => 'patients',
  ])

@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">

    @livewire('components.modal',["id_modal"=>'modal-patient-create', "percentage"=>'95%', "component"=>'patients.create'])

    @livewire('components.modal',["id_modal"=>'modal-patient-update', "percentage"=>'95%', "component"=>'patients.update'])

    @livewire('components.modal',["id_modal"=>'modal-patient-create2', "percentage"=>'95%', "component"=>'patients.create2'])

    <div class="row">
      <div class="col-md-12">

        @livewire('patients.index')

      </div>
    </div>

  </div>

@endsection