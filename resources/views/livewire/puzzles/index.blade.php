<div>

  <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col-md-8">
          <div class="form-group" style="padding-top:15px">
            <h5 style="text-align:center"><b>Paciente = </b>{{$patient->names." ".$patient->last_names}}</h5>
          </div>
        </div>

        <div class="col-md-3">
          <button class="btn btn-primary btn-round" disabled>
            SIGUIENTE <i class="bi bi-arrow-right-circle fa-lg"></i>
          </button>
        </div>
      </div>

    </div>
  </div>

  <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col-md-6">
    
          <div class="row">
            @for ($i=0; $i<30; $i++)
    
              <div class="col-md-2">
                <button wire:click="changeState({{$i}})" class="btn btn-round @if($this->tokens[$i]['state'] == "finalized") btn-success @else btn-primary @endif "
                @if($this->tokens[$i]['state'] == "locked") disabled @endif>

                  <i class="bi bi-award fa-lg"></i>

                </button>
              </div>
                
            @endfor
          </div>

        </div>
    
        <div class="col-md-6 text-center">
          <img src="{{asset('assets')}}/img/puzzle0/{{$cont}}.jpg" height="75%">
        </div>
    
      </div>

    </div>
  </div>

</div>