<div>

  <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col-md-8">
          <div class="form-group" style="padding-top:15px">
            <h5 style="text-align:center"><b>Paciente = </b>{{$patient->names." ".$patient->last_names}}</h5>
          </div>
        </div>

        <div class="col-md-3">
          <button wire:click="create" class="btn btn-primary btn-round">
            CREAR <i class="bi bi-plus-circle fa-lg"></i>
          </button>
        </div>
      </div>

    </div>
  </div>

  <div class="row">
    @foreach ($patient->sesions()->orderBy('created_at', 'desc')->get() as $current_sesion)

      <div class="col-md-3">
        <div class="card">
          <div class="card-header"> <b>Fecha: </b> {{$current_sesion->created_at}} </div>
          <div class="card-body">
            <a href="{{route('forms.index' , ['sesion_id'=>$current_sesion])}}" class="btn btn-success btn-round">
              VER <i class="bi bi-eye fa-lg"></i>
            </a>
          </div>
        </div>
      </div>

    @endforeach
  </div>
  
</div>