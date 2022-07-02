<div>

  <div class="modal-header shadow-blue">
    <h1 class="modal-title w-100 text-center"> ENTIDADES </h1>
  </div>

  <div class="modal-body">

    <div class="row">
      <div class="col-md-2" style="margin-top: 12px">
        <div class="form-group">
          <select class="form-control" wire:change="changeCountry($event.target.value)">
            <option selected="selected" hidden>{{$country->name}}</option>
            @foreach (App\Models\Country::all() as $current_country)
              <option value="{{$current_country->id}}">{{$current_country->name}}</option>
            @endforeach
          </select>  
        </div>
      </div>
                
      <div class="col-md-2">          
        <div class="form-group" style="margin-top: 12px">
          <select class="form-control" wire:change="changeDepartment($event.target.value)">
            <option selected="selected" hidden>{{$department->name}}</option>
            @foreach ($country->departments()->getResults() as $current_department)
              <option value="{{$current_department->id}}">{{$current_department->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
                
      <div class="col-md-2">
        <div class="form-group" style="margin-top: 12px">
          <select class="form-control" wire:change="changeCity($event.target.value)">
            <option selected="selected" hidden>{{$city->name}}</option>
            @foreach ($department->cities()->getResults() as $current_city)
              <option value="{{$current_city->id}}">{{$current_city->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
  
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
    </div>

    <div class="row">

      <div class="col-md-6">

        @if ($entity->id)
          <div style="height: 375px">
            
            <div class="card-border">
        
              <div class="card-header text-center shadow-blue" style="height: 60px">
                <div style="height: 100%"> <h6>{{$entity->name}}</h6> </div>
              </div>
  
              <div class="card-body shadow-orange">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
  
                      <p><b>NIT:</b></p>
                      <p> {{$entity->nit}} </p>
                      <hr style="background: white; height: 1px">
  
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group">
                      
                      <p><b>Teléfono:</b></p>
                      <p> {{$entity->phone}} </p>
                      <hr style="background: white; height: 1px">
                      
                    </div>
                  </div>
                </div>
  
                <div class="form-group">
                  <p><b>{{__("Dirección:")}}</b></p>
                  <p> {{$entity->direction}} </p>
                  
                  <hr style="background: white; height: 1px">
                </div>
              </div>
  
              <div class="card-footer text-center shadow-blue">
                <div class="card-header text-center shadow-blue" style="height: 30px">
                  <div style="height: 100%">  </div>
                </div>
              </div>
              
            </div>
            
          </div>
        @else
          <div style="height: 375px">
            <h6 style="text-align: center; padding-top: 20px"><b> SELECCIONE ENTIDAD </b></h6>
          </div>
        @endif

      </div>

      <div class="col-md-6" style="padding-top: 12px">

        @if ($entities->hasPages())
          {{$entities->links()}}
        @endif

        @if ($entities->count())

          <table class="table text-center table-striped table-bordered">
            <thead class = "text-primary">
              <tr>
                <th><b> NIT </b></th>
                <th><b> Nombre </b></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($entities as $current_entity)
                <tr>
                  <td style="width: 20%"> {{$current_entity->nit}} </td>
                  <td style="width: 70%"> {{$current_entity->name}} </td>
                  <td style="width: 10%">
                    <button wire:click="changeEntity({{$current_entity}})" class="btn btn-warning btn-round">
                    <i class="bi bi-pencil-square fa-lg"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
            
        @else
          <h6 style="text-align: center; padding-top: 12px"><b>No existen entidades en {{$this->city->name}} </b></h6>
        @endif

      </div>

    </div>

    <div class="row">
      <div class="col-md-6" style="margin-left: 25%">

        <div class="modal_botones">
          <button class="btn btn-primary btn-round" disabled>
            <i class="bi bi-arrow-left-square fa-2x"></i>
          </button>
        
          <div style="text-align:center; margin-top:25px;">
            <span class="step finish"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>
        
          @if ($patient->id)
            <button wire:click="next()" class="btn btn-primary btn-round" @if(!$entity->id) disabled @endif>
              <i class="bi bi-arrow-right-square fa-2x"></i>
            </button>
          @else
            <button wire:click="$emitTo('patients.create2','init',{{$entity->id}})" class="btn btn-primary btn-round" @if(!$entity->id) disabled @endif>
              <i class="bi bi-arrow-right-square fa-2x"></i>
            </button>
          @endif
        
          <button wire:click="$emit('close-modal','#modal-patient-create')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>

      </div>
    </div>

  </div>

</div>