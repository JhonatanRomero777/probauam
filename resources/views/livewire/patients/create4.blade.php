<div>

  <div class="modal-header shadow-blue">
    <h1 class="modal-title w-100 text-center"> ANTECEDENTES FARMACOLÓGICOS  </h1>
  </div>

  <div class="modal-body">
    <div class="row">
      
      <div div class="col-md-6">
        @livewire('patients.illnesses2')
      </div>

      <div div class="col-md-6">
        @livewire('patients.antecedents2')
      </div>

    </div>

    <div class="row">
      <div class="col-md-6" style="margin-left: 25%">

        <div class="modal_botones">
          <button wire:click="back()" class="btn btn-primary btn-round">
            <i class="bi bi-arrow-left-square fa-2x"></i>
          </button>
        
          <div style="text-align:center; margin-top:25px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step finish"></span>
            <span class="step"></span>
          </div>
        
          <button wire:click="$emitTo('patients.antecedents2','next')" class="btn btn-primary btn-round">
            <i class="bi bi-arrow-right-square fa-2x"></i>
          </button>
        
          <button wire:click="$emit('close-modal','#modal-patient-create4')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>

      </div>
    </div>
  </div>

</div>