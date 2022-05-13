<div>
    
  <div class="modal-header shadow-blue">
    <h1 class="modal-title w-100 text-center"> PROFESIONAL </h1>
  </div>
  
  <div class="modal-body">
    
    <div class="row">
      <div class="col-md-5">
        <img src="{{asset('assets')}}/img/doctors.jpg" height="75%">
      </div>

      <div class="col-md-7">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" wire:model="professional.names" placeholder="Nombres">
              @error('professional.names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" wire:model="professional.last_names" placeholder="Apellidos">
              @error('professional.last_names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <select class="form-control" wire:change="changeTypeDocument($event.target.value)">
                <option selected="selected" hidden>{{$document_type->name}}</option>
                @foreach ($documents as $current_document)
                  <option value="{{$current_document->id}}">{{$current_document->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" wire:model="professional.document" placeholder="Documento">
              @error('professional.document') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" wire:model="professional.professional_card" placeholder="Tarjeta Profesional">
              @error('professional.professional_card') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" wire:model="professional.phone" placeholder="Teléfono">
              @error('professional.phone') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
        </div>

        <div class="form-group">
          <input class="form-control" wire:model="user.email" placeholder="Email">
          @error('user.email') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
        </div>

        <div class="modal_botones">
          <button wire:click="save" class="btn btn-primary btn-round">
            ACTUALIZAR <i class="bi bi-pencil-square fa-lg"></i>
          </button>
      
          <button wire:click="$emit('close-modal','#modal-professional-update')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>

      </div>    
    </div>

  </div>

</div>