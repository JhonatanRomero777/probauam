@extends('layouts.app', [
    'namePage' => 'Contratos',
    'class' => 'sidebar-mini',
    'activePage' => 'entities',
  ])

@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  
  <div class="content">

    @livewire('components.modal',["id_modal"=>'modal-contract-create' , "component"=>'contracts.create'])

    <div class="row">
      <div class="col-md-12">

        @livewire('contracts.index',['current_entity'=>$entity_id])

      </div>
    </div>
    
  </div>
  
@endsection