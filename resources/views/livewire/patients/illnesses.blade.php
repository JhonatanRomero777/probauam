<div>

  <h3 class="text-center"> {{"Enfermedades (CIE-10)"}} </h3>

  <div class="input-group">
    <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Buscar por Código o Nombre">
    <div class="input-group-append">
      <div class="input-group-text">
        <i class="bi bi-search fa-lg" style="color:black"></i>
      </div>
    </div>
  </div>

  @if ($illnesses->count())
    
    <div style="height: 275px">

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
                <button wire:click="$emitTo('patients.antecedents','choose',{{$current_illness}})" rel="tooltip" class="btn btn-success btn-round">
                  <i class="bi bi-arrow-right-square fa-lg"></i>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>

  @else
    <h6 style="text-align: center"><b>No existen enfermedades </b></h6>
  @endif

  @if ($illnesses->hasPages())
    {{$illnesses->links()}}
  @endif

</div>