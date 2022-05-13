@extends('layouts.app', [
    'namePage' => 'Entidades',
    'class' => 'sidebar-mini',
    'activePage' => 'entities',
  ])

@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  
  <div class="content">

    @livewire('components.modal',["id_modal"=>'modal-entity-create' , "component"=>'entities.create'])

    @livewire('components.modal',["id_modal"=>'modal-entity-update' , "component"=>'entities.update'])

    <div class="row">
      <div class="col-md-12">
        @livewire('entities.search')

        @livewire('entities.index')
      </div>
    </div>
    
  </div>
  
@endsection