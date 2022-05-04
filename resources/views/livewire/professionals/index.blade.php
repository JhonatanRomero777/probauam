<div>
  
  {{-- SEARCH --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            
            <div class="input-group" style="padding-top: 15px">
              <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Búsqueda por Documento o Número de Tarjeta Profesional">
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
  {{--/ SEARCH /--}}

  {{-- INDEX --}}

    <div class="row">
      <div class="col-md-12">

        <div class="row">

          {{-- FORM --}}
          
            <div class="col-md-6">
              <div class="card">

                <div class="card-header text-center">
                  <h5 class="card-title" style="text-align: center;"><b> PROFESIONAL </b></h5>
                </div>

                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input class="form-control" wire:model="professional.names" placeholder="Nombres">
                        @error('professional.names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input class="form-control" wire:model="professional.last_names" placeholder="Apellidos">
                        @error('professional.last_names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select class="form-control" wire:change="changeTypeDocument($event.target.value)">
                          <option selected="selected" hidden>{{$document_type->name}}</option>
                          @foreach ($documents as $current_document)
                            <option value="{{$current_document->id}}">{{$current_document->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input class="form-control" wire:model="professional.document" placeholder="Documento">
                        @error('professional.document') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
                      </div>
                    </div>
                  </div>                  

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input class="form-control" wire:model="professional.professional_card" placeholder="Tarjeta Profesional">
                        @error('professional.professional_card') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input class="form-control" wire:model="professional.phone" placeholder="Teléfono">
                        @error('professional.phone') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <input class="form-control" wire:model="user.email" placeholder="Email">
                    @error('user.email') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
                  </div>

                </div>
                
                <div class="card-footer text-center">
                  @if($isCreate)
                    {{-- CREATE --}}
                      <button wire:click="save" class="btn btn-primary btn-round">
                        CREAR <i class="bi bi-plus-circle fa-lg"></i>
                      </button>
                    {{--/ CREATE /--}}
                  @else
                    {{-- UPDATE --}}
                      <button wire:click="save" class="btn btn-primary btn-round">
                        EDITAR <i class="bi bi-pencil-square fa-lg"></i>
                      </button>
                      <button wire:click="clean" class="btn btn-light btn-round">
                        CANCELAR
                      </button>
                    {{--/ UPDATE /--}}
                  @endif
                </div>

              </div>
            </div>
          {{--/ FORM /--}}

          @if ($professionals->count())

            @foreach ($professionals as $current_professional)
            
              <div class="col-md-6">
                <div class="card-border">
      
                  <div class="card-header text-center shadow-blue">
                    <h6>{{$current_professional->names}} {{$current_professional->last_names}}</h6>
                  </div>    

                  <div class="card-body shadow-orange">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><b>{{__("Tipo de Documento:")}}</b></label>
                          <p> {{App\Models\Option::find($current_professional->document_type)->name}} </p>
                          <hr style="background: white">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label><b>{{__("Documento:")}}</b></label>
                          <p> {{$current_professional->document}} </p>
                          <hr style="background: white">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><b>{{__("Tarjeta Profesional:")}}</b></label>
                          <p> {{$current_professional->professional_card}} </p>
                          <hr style="background: white">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label><b>{{__("Teléfono:")}}</b></label>
                          <p> {{$current_professional->phone}} </p>
                          <hr style="background: white">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><b>{{__("Email:")}}</b></label>
                      <p> {{$current_professional->user->email}} </p>
                    </div>

                  </div>

                  <div class="card-footer text-center shadow-blue">
                    <button wire:click="edit({{$current_professional}})" class="btn btn-warning btn-round">
                      EDITAR <i class="bi bi-pencil-square fa-lg"></i>
                    </button>
                    <button wire:click="$emit('remove',['professionals.index',{{$current_professional}}])" class="btn btn-danger btn-round">
                      BORRAR <i class="bi bi-trash fa-lg"></i>
                    </button>          
                  </div>
                </div>
              </div>

            @endforeach

          @else
            <div class="col-md-8">
              <h6 style="text-align: center"><b>No existen registros</b></h6>
            </div>
          @endif

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            {{$professionals->links()}}
          </div>
        </div>
      </div>
    </div>
  {{--/ INDEX /--}}

</div>