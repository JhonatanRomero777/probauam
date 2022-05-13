<div>

  <div class="modal-header shadow-blue">
    <h1 class="modal-title w-100 text-center"> ENTIDAD </h1>
  </div>

  <div class="modal-body">
    <div class="row">
      <div class="col-md-5">
        <img src="{{asset('assets')}}/img/hospital.png" height="75%">
      </div>
  
      <div class="col-md-7">
        <div class="form-group">
          <label>{{__("Ciudad")}}</label>
          <input class="form-control" placeholder="{{$entity->city->name}}" disabled>
        </div>
      
        <div class="form-group">
          <label>{{__("Nombre")}}</label>
          <input class="form-control" wire:model.lazy="entity.name">
          @error('entity.name') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
        </div>
      
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("NIT")}}</label>
              <input class="form-control" wire:model.lazy="entity.nit">
              @error('entity.nit') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
      
          <div class="col-md-6">
            <div class="form-group">
              <label>{{__("Teléfono")}}</label>
              <input class="form-control" wire:model.lazy="entity.phone">
              @error('entity.phone') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            </div>
          </div>
        </div>
      
        <div class="form-group">
          <label>{{__("Dirección")}}</label>
          <input class="form-control" wire:model.lazy="entity.direction">
          @error('entity.direction') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
        </div>
      
        <div class="modal_botones">
          <button wire:click="save" class="btn btn-primary btn-round">
            ACTUALIZAR <i class="bi bi-pencil-square fa-lg"></i>
          </button>
      
          <button wire:click="$emit('close-modal','#modal-entity-update')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

</div>