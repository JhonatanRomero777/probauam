@extends('layouts.app', [
    'namePage' => 'parametros',
    'class' => 'sidebar-mini',
    'activePage' => 'parameters',
  ])

@section('content')

  <div class="panel-header panel-header-sm"></div>

  <div class="content">
    @livewire('parameters.index')
  </div>

@endsection