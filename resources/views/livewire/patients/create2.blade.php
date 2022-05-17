<div>

  <div class="modal-header shadow-blue">
    <h1 class="modal-title w-100 text-center"> ANTECEDENTES PERSONALES  </h1>
  </div>

  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">

        <div class="card">
          <div class="card-body">
    
            <h3 class="text-center"> Enfermedades </h3>

            <div class="input-group" style="padding-top: 10px">
              <input class="form-control" wire:model="search1" style="text-align:center;font-size:15px" placeholder="Buscar por Código o Nombre (CIE-10)">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="bi bi-search fa-lg" style="color:black"></i>
                </div>
              </div>
            </div>

            @if ($illnesses->count())
              
              <table class="table text-center table-striped table-bordered">
                <thead class = "text-primary">
                  <tr>
                    <th><b> Código </b></th>
                    <th><b> Nombre </b></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($illnesses as $current_illness)
                    <tr>
                      <td> {{$current_illness->code}} </td>
                      <td> {{$current_illness->name}} </td>
                      <td>
                        <button wire:click="choose({{$current_illness}})" rel="tooltip" class="btn btn-warning btn-round">
                          <i class="bi bi-pencil-square fa-lg"></i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

            @else
              <h6 style="text-align: center"><b>No existen enfermedades </b></h6>
            @endif

            @if ($illnesses->hasPages())
              {{$illnesses->links()}}
            @endif

          </div>
        </div>

      </div>

      <div class="col-md-6">
      
        <div class="card">
          <div class="card-body">
    
            <h3 class="text-center"> Antecedentes </h3>

            <div class="input-group" style="padding-top: 10px">
              <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Buscar por Código o Nombre (CIE-10)">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="bi bi-search fa-lg" style="color:black"></i>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>

    <div class="row">
      <div class="col-md-6" style="margin-left: 25%">

        <div class="modal_botones">
          <button class="btn btn-primary btn-round" disabled>
            <i class="bi bi-arrow-left-square fa-2x"></i>
          </button>
        
          <div style="text-align:center; margin-top:25px;">
            <span class="step"></span>
            <span class="step finish"></span>
            <span class="step"></span>
          </div>
        
          <button wire:click="next()" class="btn btn-primary btn-round">
            <i class="bi bi-arrow-right-square fa-2x"></i>
          </button>
        
          <button wire:click="$emit('close-modal','#modal-patient-create2')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>

      </div>
    </div>
  </div>

</div>