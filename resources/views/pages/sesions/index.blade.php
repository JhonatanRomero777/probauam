@extends('layouts.app', [
  'namePage' => 'sesiones',
  'class' => 'sidebar-mini',
  'activePage' => 'patients',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    @livewire('sesions.index',['current_patient'=>$patient_id])
  </div>
@endsection