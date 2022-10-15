<div>

  <div class="card">

    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <h3> <b>ENTIDAD :</b> {{$this->entity->name}}</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">

          <div class="row">
            <div class="col-md-9">
              <div class="input-group" style="padding-top: 8px">
                <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Buscar por Documento">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="bi bi-search fa-lg" style="color:black"></i>
                  </div>
                </div>
              </div>
              @error('patient.exist') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>

            {{-- $emitTo('patients.create','init') --}}
            <div class="col-md-3">
              <button wire:click="verify()" class="btn btn-primary btn-round">
                CREAR <i class="bi bi-plus-circle fa-lg"></i>
              </button>
            </div>
          </div>

        </div>

        <div class="col-md-6" style="padding-top: 12px">
          @if ($patients->hasPages())
            {{$patients->links()}}
          @endif
        </div>
      </div>

    </div>

  </div>

  @if ($patients->count())
    <div class="row">
      @foreach ($patients as $current_patient)
              
        <div class="col-md-4">
          <div class="card-border">
        
            <div style="height: 60px">
              <div class="card-header text-center shadow-blue" style="height: 100%">
                <h6>{{$current_patient->names}} {{$current_patient->last_names}}</h6>
              </div>   
            </div> 

            <div class="card-body shadow-orange">

              <div class="row">

                  <div class="col-md-5">
                    @if ($current_patient->sex == 1)
                      <img class="rounded-circle" src="{{asset('assets')}}/img/abuelito.jpg" width="100%" height="100%">
                    @elseif ($current_patient->sex == 2)
                      <img class="rounded-circle" src="{{asset('assets')}}/img/abuelita.jpg" width="100%" height="100%">
                    @else
                      <img class="rounded-circle" src="{{asset('assets')}}/img/sinperfil.jpg" width="100%" height="100%">
                    @endif
                  </div>

                  <div class="col-md-7">

                    <div class="form-group">
                      <label><b>{{__("Tipo de Documento")}}</b></label>
                      <p> {{App\Models\Option::find($current_patient->document_type)->name}} </p>
                      <hr style="background: white; height: 1px">
                    </div>

                    <div class="form-group">
                      <label><b>{{App\Models\Option::find($current_patient->document_type)->name}}</b></label>
                      <p> {{$current_patient->document}} </p>
                      <hr style="background: white; height: 1px">
                    </div>

                  </div>

              </div>

            </div>

            <div class="card-footer text-center shadow-blue">
              <a href="{{ route('patients.update',['patient_id'=>$current_patient])}}" class="btn btn-warning btn-round">
                <i class="bi bi-pencil-square fa-2x"></i>
              </a>

              <a href="{{route('sesions.index',['patient_id'=>$current_patient])}}" class="btn btn-info btn-round">
                <i class="bi bi-clipboard-plus fa-2x"></i>
              </a>

              <a href="{{route('puzzles.index',['patient_id'=>$current_patient])}}" class="btn btn-success btn-round">
                <i class="bi bi-controller fa-2x"></i>
              </a>

              <button wire:click="$emit('remove',['patients.index',{{$current_patient}}])" class="btn btn-danger btn-round">
                <i class="bi bi-trash fa-2x"></i>
              </button>
            </div>
            
          </div>
        </div>

      @endforeach
    </div>
  @else
    <h6 style="text-align: center"><b>No existen pacientes </b></h6>
  @endif

</div>