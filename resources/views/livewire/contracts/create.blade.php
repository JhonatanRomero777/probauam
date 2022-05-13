<div>

  <div class="modal-header shadow-blue">
    <h1 class="modal-title w-100 text-center"> CONTRATO </h1>
  </div>

  <div class="modal-body">

    <div class="row">
      <div class="col-md-10">

        <div class="card-border" style="padding-left: 25%">
      
          <div class="card-header text-center shadow-blue">
            <h6>{{$professional->names}} {{$professional->last_names}}</h6>
          </div>    
    
          <div class="card-body shadow-orange">
    
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><b>{{__("Tipo de Documento:")}}</b></label>
                  <p> {{App\Models\Option::find($professional->document_type)->name}} </p>
                  <hr style="background: white">
                </div>
              </div>
    
              <div class="col-md-6">
                <div class="form-group">
                  <label><b>{{__("Documento:")}}</b></label>
                  <p> {{$professional->document}} </p>
                  <hr style="background: white">
                </div>
              </div>
            </div>
    
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><b>{{__("Tarjeta Profesional:")}}</b></label>
                  <p> {{$professional->professional_card}} </p>
                  <hr style="background: white">
                </div>
              </div>
    
              <div class="col-md-6">
                <div class="form-group">
                  <label><b>{{__("Teléfono:")}}</b></label>
                  <p> {{$professional->phone}} </p>
                  <hr style="background: white">
                </div>
              </div>
            </div>
    
            <div class="form-group">
              <label><b>{{__("Email:")}}</b></label>
              <p> {{$professional->user->email}} </p>
            </div>
    
          </div>
    
          <div class="card-footer text-center shadow-blue">
    
            @if ($contract)
              
              <button wire:click="fired()" class="btn btn-danger btn-round">
                DESPEDIR <i class="bi bi-trash fa-lg"></i>
              </button>

            @else
            
              <button wire:click="hired()" class="btn btn-warning btn-round">
                CONTRATAR <i class="fas fa-handshake fa-lg"></i>
              </button>
            
            @endif
    
            <button wire:click="$emit('close-modal','#modal-contract-create')" class="btn btn-light btn-round">
              CANCELAR <i class="bi bi-x-circle fa-lg"></i>
            </button>
    
          </div>
        </div>

      </div>
    </div>

  </div>

</div>