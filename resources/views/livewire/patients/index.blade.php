<div>
  
  @foreach ($modals as $modal)
    @livewire('components.modal',["id_modal"=>$modal["id"],"title"=>$modal["title"],"component"=>$modal["component"]],key($modal["id"]))
  @endforeach

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            
            <div class="col-md-9">
              <div class="input-group" style="padding-top: 10px">
                <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Buscar por Nombre o Documento">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="bi bi-search fa-lg" style="color:black"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <button class="btn btn-primary btn-round" wire:click="create()">
                CREAR <i class="bi bi-plus-circle fa-lg"></i>
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  @include('pages.patients.list')

</div>