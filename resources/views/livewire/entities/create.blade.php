<div>

  <div class="row">
    <div class="col-md-5">
      <img src="{{asset('assets')}}/img/hospital.png" height="75%">
    </div>

    <div class="col-md-7">
      <div class="form-group">
        <label>{{__("Ciudad")}}</label>
        <input class="form-control" placeholder="{{$city->name}}" disabled>
      </div>
    
      <div class="form-group">
        <label>{{__("Nombre")}}</label>
        <input class="form-control" wire:model="entity.name">
        @error('entity.name') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
      </div>
    
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("NIT")}}</label>
            <input class="form-control" wire:model="entity.nit">
            @error('entity.nit') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>
        </div>
    
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Teléfono")}}</label>
            <input class="form-control" wire:model="entity.phone">
            @error('entity.phone') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>
        </div>
      </div>
    
      <div class="form-group">
        <label>{{__("Dirección")}}</label>
        <input class="form-control" wire:model="entity.direction">
        @error('entity.direction') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
      </div>
    
      <div class="modal_botones">
        <button wire:click="verify" class="btn btn-primary btn-round">
          GUARDAR <i class="bi bi-pencil-square fa-lg"></i>
        </button>
    
        <button wire:click="$emit('close-modal','#modal-entity')" class="btn btn-light btn-round">
          CANCELAR <i class="bi bi-x-circle fa-lg"></i>
        </button>
      </div>
    </div>
  </div>

</div>