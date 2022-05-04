@extends('layouts.app', [
    'namePage' => 'Entidades',
    'class' => 'sidebar-mini',
    'activePage' => 'entities',
  ])

@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  
  <div class="content">
    @livewire('entities.index')
  </div>
  
@endsection