@extends('layouts.app', [
    'namePage' => 'Usuarios',
    'class' => 'sidebar-mini',
    'activePage' => 'patients',
  ])

@section('content')

  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    @livewire('patients.index')
  </div>

@endsection