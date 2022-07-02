<div>
    
  <h3 class="text-center"> {{"Enfermedades (Paciente)"}} </h3>

  <div class="input-group">
    <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Buscar por Código o Nombre">
    <div class="input-group-append">
      <div class="input-group-text">
        <i class="bi bi-search fa-lg" style="color:black"></i>
      </div>
    </div>
  </div>

  @error('antecedent.repeat') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror

  @if ($antecedents->count())
      
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
          @foreach ($antecedents as $current_antecedent)
            <tr>
              <td> {{$current_antecedent->code}} </td>
              <td> {{$current_antecedent->name}} </td>
              <td>
                <button wire:click="$emit('remove',['patients.antecedents',{{$current_antecedent->id}}])" rel="tooltip" class="btn btn-danger btn-round">
                  <i class="bi bi-trash fa-lg"></i>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  @else
    <h6 style="text-align: center"><b>No existen antecedentes </b></h6>
  @endif

  @if ($antecedents->hasPages())
    {{$antecedents->links()}}
  @endif
  
</div>