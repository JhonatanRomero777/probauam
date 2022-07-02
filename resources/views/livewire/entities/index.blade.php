<div>

  <div class="card">

    <div class="card-body">
      
      <div class="row">
        <div class="col-md-6"> 
          <div class="input-group" style="padding-top: 10px">
            <input class="form-control" wire:model="search" style="text-align:center;font-size:15px" placeholder="Buscar por Nombre">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="bi bi-search fa-lg" style="color:black"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6" style="padding-top: 12px">
          @if ($entities->hasPages())
            {{$entities->links()}}
          @endif
        </div>
      </div>

    </div>

  </div>

  @if ($entities->count())

    <div class="row">
      @foreach ($entities as $current_entity)
            
        <div class="col-md-6">
          <div class="card-border">
        
            <div class="card-header text-center shadow-blue" style="height: 60px">
              <div style="height: 100%"> <h6>{{$current_entity->name}}</h6> </div>
            </div>

            <div class="card-body shadow-orange">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">

                    <p><b>NIT:</b></p>
                    <p> {{$current_entity->nit}} </p>
                    <hr style="background: white; height: 1px">

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    
                    <p><b>Teléfono:</b></p>
                    <p> {{$current_entity->phone}} </p>
                    <hr style="background: white; height: 1px">
                    
                  </div>
                </div>
              </div>

              <div class="form-group">
                <p><b>{{__("Dirección:")}}</b></p>
                <p> {{$current_entity->direction}} </p>
                
                <hr style="background: white; height: 1px">
              </div>
            </div>

            <div class="card-footer text-center shadow-blue">
              <a href="{{ route('patients.index',['entity_id'=>$current_entity]) }}" class="btn btn-info btn-round">
                <i class="fas fa-user fa-lg"></i>
              </a>

              <a href="{{ route('contracts.index',['entity_id'=>$current_entity]) }}" class="btn btn-success btn-round" disabled>
                <i class="fas fa-briefcase-medical fa-lg"></i>
              </a>

              <a href="" class="btn btn-primary btn-round">
                <i class="bi bi-graph-up-arrow fa-lg"></i>
              </a>

              <button wire:click="$emitTo('entities.update','update',{{$current_entity}})" class="btn btn-warning btn-round">
                <i class="bi bi-pencil-square fa-lg"></i>
              </button>

              <button wire:click="$emit('remove',['entities.index',{{$current_entity}}])" class="btn btn-danger btn-round">
                <i class="bi bi-trash fa-lg"></i>
              </button>
            </div>
            
          </div>
        </div>

      @endforeach
    </div>
    
  @else
    <h6 style="text-align: center"><b>No existen entidades en {{$this->city->name}} </b></h6>
  @endif
  
</div>