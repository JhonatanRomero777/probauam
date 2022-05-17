@extends('layouts.app', [
    'namePage' => 'profesionales',
    'class' => 'sidebar-mini',
    'activePage' => 'professionals',
  ])

@section('content')

  <div class="panel-header panel-header-sm">
  </div>

  <div class="content">

    @livewire('components.modal',["id_modal"=>'modal-professional-create' , "percentage"=>'60%', "component"=>'professionals.create'])

    @livewire('components.modal',["id_modal"=>'modal-professional-update' , "percentage"=>'60%', "component"=>'professionals.update'])

    <div class="row">
      <div class="col-md-12">

        @livewire('professionals.index')

      </div>
    </div>

  </div>

@endsection