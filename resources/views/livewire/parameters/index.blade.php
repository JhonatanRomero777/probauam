<div>

  <div class="row"> 

    {{-- OPTIONS --}}

      <div class="col-md-8"> 
        <div class="card">

          <div class="card-header">
            <h5 class="card-title" style="text-align: center"><b> {{$parameter->name}} </b></h5>
          </div>
        
          <div class="card-body">
            <div class="row">

              <div class="col-md-7">
                <div class="form-group" style="padding-top:10px">
                  <input class="form-control" style="text-align:center; font-size:15px" wire:model="option.name" placeholder="Ingrese Nueva Opción">
                  @error('option.name') <small style="font-size:15px"><b>*{{$message}}</b></small> @enderror
                </div>
              </div>

              @if($isCreate)
                {{-- CREATE --}}
                  <div class="col-md-5">
                    <div class="form-group">
                      <button wire:click="save" class="btn btn-primary btn-round" style="font-size:15px">
                        CREAR <i class="bi bi-plus-circle fa-lg"></i>
                      </button>
                    </div>
                  </div>
                {{--/ CREATE /--}}
              @else
                {{-- UPDATE --}}
                  <div class="col-md-5">
                    <div class="form-group">
                      <button wire:click="save" class="btn btn-primary btn-round" style="font-size:15px">
                        EDITAR <i class="bi bi-pencil-square fa-lg"></i>
                      </button>
                      <button wire:click="clean" class="btn btn-light btn-round" style="font-size:15px">
                        CANCELAR <i class="bi bi-x-circle fa-lg"></i>
                      </button>
                    </div>
                  </div>
                {{--/ UPDATE /--}}
              @endif
            </div>

            {{-- INDEX --}}
              <table class="table text-center table-striped table-bordered">
                <thead class = "text-primary">
                  <tr>
                    <th><b> Nombre  </b></th>
                    <th><b> Editar  </b></th>
                    <th><b> Remover </b></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($parameter->options()->get() as $current_option)
                    <tr>
                      <td> {{$current_option->name}} </td>
                      <td>
                        <button wire:click="edit({{$current_option}})" rel="tooltip" class="btn btn-warning btn-round">
                          <i class="bi bi-pencil-square fa-lg"></i>
                        </button>
                      </td>
                      <td>
                        <button wire:click="$emit('remove',['parameters.index',{{$current_option}}])" class="btn btn-danger btn-round">
                          <i class="bi bi-x-circle fa-lg"></i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            {{--/ INDEX /--}}   
          </div>
        </div>
      </div>

    {{--/ OPTIONS /--}}

    {{-- PARAMETERS --}}

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
              
            @foreach ($parameters as $current_parameter)
              <div class="text-center">  
                <button class="btn btn-primary btn-lg" wire:click="changeParameter({{$current_parameter}})">
                  <i class="bi bi-list-ul"></i> {{$current_parameter->name}}
                </button>
              </div>  
            @endforeach

          </div>
        </div>
      </div>
      
    {{--/ PARAMETERS /--}}
  
  </div>

</div>