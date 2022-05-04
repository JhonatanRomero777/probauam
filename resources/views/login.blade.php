@extends('layouts.app', [
  'class' => 'sidebar-mini',
  'backgroundImage' => asset('assets') . "/img/cupula.jpg",
])

@section('content')

  <div class="container">    
    <div class="row">
      <div class="col-md-12">
        
        <div class="card card-chart">

          <div class="card-header">
            <h3 class="card-title" style="text-align:center">Proba UAM</h3>
          </div>
      
          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
                <img src="{{asset('assets')}}/img/logo.png" width="100%" height="100%">
              </div>
              <div class="col-md-6">
                @livewire('users.login')
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

@endsection