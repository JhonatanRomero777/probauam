<div>

  @livewire('components.modal',["id_modal"=>'modal-entity',"title"=>'ENTIDAD',"component"=>'entities.create'])
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">

            @include('pages.entities.search')

            <div class="col-md-3" style="margin-top: 12px">
              <button class="btn btn-primary btn-round" wire:click="create()">
                CREAR <i class="bi bi-plus-circle fa-lg"></i>
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  @include('pages.entities.list')
  
</div>