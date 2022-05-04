@extends('layouts.app', [
    'namePage' => 'profesionales',
    'class' => 'sidebar-mini',
    'activePage' => 'professionals',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    @livewire('professionals.index')
  </div>
@endsection