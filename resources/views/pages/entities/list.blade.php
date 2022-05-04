
@if ($entities->count())
  <div class="row">
    @foreach ($entities as $current_entity)
            
      <div class="col-md-4">
        <div class="card-border">
      
          <div style="height: 60px">
            <div class="card-header text-center shadow-blue" style="height: 100%">
              <h6>{{$current_entity->name}}</h6>
            </div>   
          </div>

          <div class="card-body shadow-orange">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><b>{{__("NIT:")}}</b></label>
                  <p> {{$current_entity->nit}} </p>
                  <hr style="background: white; height: 1px">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label><b>{{__("Teléfono:")}}</b></label>
                  <p> {{$current_entity->phone}} </p>
                  <hr style="background: white; height: 1px">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label><b>{{__("Dirección:")}}</b></label>

              <div style="height: 40px">
                <p> {{$current_entity->direction}} </p>
              </div>
              
              <hr style="background: white; height: 1px">
            </div>
          </div>

          <div class="card-footer text-center shadow-blue">
            <button wire:click="edit({{$current_entity}})" class="btn btn-warning btn-round">
              EDITAR <i class="bi bi-pencil-square fa-lg"></i>
            </button>

            <button wire:click="$emit('remove',['entities.index',{{$current_entity}}])" class="btn btn-danger btn-round">
              BORRAR <i class="bi bi-trash fa-lg"></i>
            </button>
          </div>
          
        </div>
      </div>

    @endforeach
  </div>
@else
  <h6 style="text-align: center"><b>No existen entidades en {{$this->city->name}} </b></h6>
@endif

@if ($entities->hasPages())
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="margin-top: 1%">
        <div class="card-body">
          {{$entities->links()}}
        </div>
      </div>
    </div>
  </div>
@endif