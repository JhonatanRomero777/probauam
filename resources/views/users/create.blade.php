@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => '',
    'activePage' => 'parameters_index',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm"></div>
  <div class="content">
    <div class="row">
        
      <div class="col-md-8">

        <div class="card">
          <div class="card-header">

            <h5 class="title">{{__("Crear Usuario")}}</h5>

              <div class="card-body">
                <div class="row">
                    <form action="{{route('parameters.store')}}" method="POST">
                        @csrf
                        
                        <div class="col-md-12">
                            <label>{{__("Nomres")}}</label>                            
                            <input style="font-weight: bold; text-align:center;" class="form-control" name="names" required> 
                        </div>

                        <div class="col-md-12">
                            <label>{{__("Apellidos")}}</label>
                            <input style="font-weight: bold; text-align:center;" class="form-control" name="last_names" required> 
                        </div>

                    </form>
                </div>
              </div>

          </div>
        </div> 
      </div>

      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{asset('assets')}}/img/mike.jpg" alt="...">
                <h5 class="title">Jhonatan</h5> <!-- { auth()->user()->name }} -->
              </a>
              <p class="description">
                  jhonatan@gmail.com
              </p> <!-- { auth()->user()->email }} -->
            </div>
          </div>
          
          <hr>

          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-square"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection