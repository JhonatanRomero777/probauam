<div>
  
  <div class="card">

    <div class="card-body">
      <div class="row">

        <div class="col-md-6">

          <div class="row">
            <div class="col-md-9">
              <div class="input-group" style="padding-top: 10px">
                <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Buscar por Documento o Tarjeta Profesional">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="bi bi-search fa-lg" style="color:black"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <button class="btn btn-primary btn-round" wire:click="$emitTo('professionals.create','create')">
                CREAR <i class="bi bi-plus-circle fa-lg"></i>
              </button>
            </div>
          </div>

        </div>

        <div class="col-md-6" style="padding-top: 12px">
          @if ($professionals->hasPages())
            {{$professionals->links()}}
          @endif
        </div>

      </div>

    </div>

  </div>

  @if ($professionals->count())

    <div class="row">
      @foreach ($professionals as $current_professional)

        <div class="col-md-6">
          <div class="card-border">

            <div class="card-header text-center shadow-blue" style="height: 60px">
              <div style="height: 100%"> <h6>{{$current_professional->names}} {{$current_professional->last_names}}</h6> </div>
            </div> 

            <div class="card-body shadow-orange">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><b>{{__("Tipo de Documento:")}}</b></label>
                    <p> {{App\Models\Option::find($current_professional->document_type)->name}} </p>
                    <hr style="background: white">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><b>{{__("Documento:")}}</b></label>
                    <p> {{$current_professional->document}} </p>
                    <hr style="background: white">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><b>{{__("Tarjeta Profesional:")}}</b></label>
                    <p> {{$current_professional->professional_card}} </p>
                    <hr style="background: white">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><b>{{__("Teléfono:")}}</b></label>
                    <p> {{$current_professional->phone}} </p>
                    <hr style="background: white">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label><b>{{__("Email:")}}</b></label>
                <p> {{$current_professional->user->email}} </p>
              </div>

            </div>

            <div class="card-footer text-center shadow-blue">
              <button wire:click="$emitTo('professionals.update','update',{{$current_professional}})" class="btn btn-warning btn-round">
                EDITAR <i class="bi bi-pencil-square fa-lg"></i>
              </button>
              <button wire:click="$emit('remove',['professionals.index',{{$current_professional}}])" class="btn btn-danger btn-round">
                BORRAR <i class="bi bi-trash fa-lg"></i>
              </button>          
            </div>
          </div>
        </div>
            
      @endforeach
    </div>

  @else
    <h6 style="text-align: center"><b>No existen profesionales </b></h6>
  @endif

</div>