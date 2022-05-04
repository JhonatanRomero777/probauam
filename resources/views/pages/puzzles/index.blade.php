@extends('layouts.app', [
  'namePage' => 'Rompecabezas',
  'class' => 'sidebar-mini',
  'activePage' => 'patients',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    @livewire('puzzles.index',['current_patient'=>$patient_id])
  </div>
@endsection