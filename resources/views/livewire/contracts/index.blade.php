<div>

   <div class="card">

      <div class="card-body">
        <div class="row">
          <div class="col-md-5"> 

            <div class="input-group" style="padding-top: 8px">
              <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Buscar por Documento o Tarjeta Profesional">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="bi bi-search fa-lg" style="color:black"></i>
                </div>
              </div>
            </div>

            @error('nofound') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror

          </div>

          <div class="col-md-1">

            <button wire:click="search()" class="btn btn-primary btn-round">
              BUSCAR
           </button>

          </div>
  
          <div class="col-md-6" style="padding-top: 12px">
            @if ($contracts->hasPages())
              {{$contracts->links()}}
            @endif
          </div>
        </div>
  
      </div>
  
    </div>
  
    @if (count($contracts))
  
      <div class="row">
        
        @foreach ($contracts as $current_contract)
              
          <div class="col-md-6">
            <div class="card-border">
      
               <div class="card-header text-center shadow-blue">
                 <h6>{{$current_contract->professional->names}} {{$current_contract->professional->last_names}}</h6>
               </div>    

               <div class="card-body shadow-orange">

                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label><b>{{__("Tipo de Documento:")}}</b></label>
                       <p> {{App\Models\Option::find($current_contract->professional->document_type)->name}} </p>
                       <hr style="background: white">
                     </div>
                   </div>

                   <div class="col-md-6">
                     <div class="form-group">
                       <label><b>{{__("Documento:")}}</b></label>
                       <p> {{$current_contract->professional->document}} </p>
                       <hr style="background: white">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label><b>{{__("Tarjeta Profesional:")}}</b></label>
                       <p> {{$current_contract->professional->professional_card}} </p>
                       <hr style="background: white">
                     </div>
                   </div>

                   <div class="col-md-6">
                     <div class="form-group">
                       <label><b>{{__("Teléfono:")}}</b></label>
                       <p> {{$current_contract->professional->phone}} </p>
                       <hr style="background: white">
                     </div>
                   </div>
                 </div>

                 <div class="form-group">
                   <label><b>{{__("Email:")}}</b></label>
                   <p> {{$current_contract->professional->user->email}} </p>
                 </div>

               </div>

               <div class="card-footer text-center shadow-blue">

                  {{-- @if ($contracts[$cont] == 'hired')
                     <button class="btn btn-success btn-round">
                        <i class="fas fa-handshake fa-3x"></i>
                     </button>

                     <button wire:click="dismiss({{$current_professional}})" class="btn btn-danger btn-round">
                        <i class="bi bi-trash fa-3x"></i>
                     </button>
                  @else
                     <button wire:click="contract({{$current_professional}})" class="btn btn-warning btn-round">
                        <i class="fas fa-handshake fa-3x"></i>
                     </button>
                  @endif --}}

               </div>

             </div>
          </div>
  
        @endforeach
      </div>
    @else
      <h6 style="text-align: center"><b> No existen contratos </b></h6>
    @endif

</div>