<div>

  <div class="modal-header shadow-blue">
    <h1 class="modal-title w-100 text-center"> ACOMPAÑANTE </h1>
  </div>
  
  <div class="modal-body">
    
    <div class="row">
      <div class="col-md-5">
        <img src="{{asset('assets')}}/img/companion.jpg" height="75%">
      </div>

      <div class="col-md-7">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("")}}</label>
              @if ($bandera)
                <button wire:click="$toggle('bandera')" class="btn btn-success btn-round">
                  DESHABILITAR <i class="bi bi-pencil-square fa-lg"></i>
                </button>
              @else
                <button wire:click="$toggle('bandera')" class="btn btn-primary btn-round">
                  HABILITAR <i class="bi bi-pencil-square fa-lg"></i>
                </button>
              @endif
              
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("Parentezco")}}</label>
              <select class="form-control" wire:model="companion.relationship">
                <option value=""> Elige una opción </option>
                @foreach ($all_relationship as $current_relationship)
                  <option value="{{$current_relationship->id}}">{{$current_relationship->name}}</option>
                @endforeach
              </select>
              @error('companion.relationship') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("Nombres")}}</label>
              <input class="form-control" wire:model.lazy="companion.names">
              @error('companion.names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("Apellidos")}}</label>
              <input class="form-control" wire:model.lazy="companion.last_names">
              @error('companion.last_names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("Tipo de Documento")}}</label>
              <select class="form-control" wire:model="companion.document_type">
                <option value=""> Elige una opción </option>
                @foreach ($all_document_type as $current_document_type)
                  <option value="{{$current_document_type->id}}">{{$current_document_type->name}}</option>
                @endforeach
              </select>
              @error('companion.document_type') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("Documento")}}</label>
              <input class="form-control" wire:model.lazy="companion.document">
              @error('companion.document') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("Teléfono")}}</label>
              <input class="form-control" wire:model.lazy="companion.phone">
              @error('companion.phone') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("Teléfono (2)")}}</label>
              <input class="form-control" wire:model.lazy="companion.phone2">
              @error('companion.phone2') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>{{__("Dirección")}}</label>
          <input class="form-control" wire:model.lazy="companion.direction">
          @error('companion.direction') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
        </div>

        <div class="modal_botones">
          <button wire:click="save" class="btn btn-primary btn-round">
            CREAR <i class="bi bi-pencil-square fa-lg"></i>
          </button>
      
          <button wire:click="$emit('close-modal','#modal-patient-create5')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>

      </div>    
    </div>

  </div>

</div>