<div>

  <div class="row">
    <div class="col-md-4">
      <img src="{{asset('assets')}}/img/sinperfil.png" height="75%">
    </div>

    <div class="col-md-8">

      <div class="modal_botones">
        <div class="row">
          <div class="col-md-2">
            <button wire:click="back()" class="btn btn-primary btn-round">
              <i class="bi bi-arrow-left-square fa-2x"></i>
            </button>
          </div>
      
          <div class="col-md-3">
            <div style="text-align:center; margin-top:25px; margin-left:20px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step finish"></span>
            </div>
          </div>
      
          <div class="col-md-2">
            <button wire:click="next()" class="btn btn-primary btn-round">
              <i class="bi bi-pencil-square fa-2x"></i>
            </button>
          </div>
      
          <div class="col-md-5">
            <div style="margin-left:30px;">
              <button wire:click="$emit('close-modal','#modal-create')" class="btn btn-light btn-round">
                CANCELAR <i class="bi bi-x-circle fa-lg"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

</div>