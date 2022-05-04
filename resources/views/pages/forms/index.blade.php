@extends('layouts.app', [
  'namePage' => 'cuestionarios',
  'class' => 'sidebar-mini',
  'activePage' => 'patients',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    @livewire('forms.index',['current_sesion'=>$sesion_id])
  </div>
@endsection