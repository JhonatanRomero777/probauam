<div>

  <div class="row">
    <div class="col-md-4">

      @if($patient->sex == 1)
        <img src="{{asset('assets')}}/img/abuelito.jpg">
      @elseif ($patient->sex == 2)
        <img src="{{asset('assets')}}/img/abuelita.jpg">
      @else
        <img src="{{asset('assets')}}/img/sinperfil.jpg">
      @endif

    </div>

    <div class="col-md-8">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Fecha de Nacimiento")}}</label>
            <input type="date" class="form-control" wire:model="patient.birthday" max="{{$limit_date}}">
            @error('patient.birthday') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Edad")}}</label>
            <input class="form-control" placeholder="{{$age}}" readonly="readonly">
          </div>  
        </div>
      </div>
    
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>{{__("Estatura")}}</label>
            <select class="form-control" wire:model="patient.height">
              @foreach ($all_height as $current)
                <option value="{{$current}}">{{$current}} cm</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>{{__("Peso")}}</label>
            <select class="form-control" wire:model="patient.weight">
              @foreach ($all_weight as $current)
                <option value="{{$current}}">{{$current}} kg</option>
              @endforeach
            </select>
          </div>  
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>{{__("Perímetro de la cintura")}}</label>
            <select class="form-control" wire:model="patient.size">
              @foreach ($all_size as $current)
                <option value="{{$current}}">{{$current}} cm</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("IMC")}}</label>
            <input class="form-control" placeholder="{{$imc}}" readonly="readonly">
          </div>  
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Categoría")}}</label>  
            <input class="form-control" placeholder="{{$category}}" readonly="readonly">
          </div>  
        </div>
      </div>
    
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Estado Civil")}}</label>
            <select class="form-control" wire:model="patient.civil_status">
              @foreach ($all_civil_status as $current)
                <option value="{{$current->id}}">{{$current->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Nivel de educación")}}</label>
            <select class="form-control" wire:model="patient.education_level">
              @foreach ($all_education_level as $current)
                <option value="{{$current->id}}">{{$current->name}}</option>
              @endforeach
            </select>
          </div>  
        </div>
      </div>
    
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Estrato Socioeconómico")}}</label>
            <select class="form-control" wire:model="patient.socioeconomic_stratum">
              @foreach ($all_socioeconomic_stratum as $current)
                <option value="{{$current->id}}">{{$current->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Régimen de Seguridad Social")}}</label>
            <select class="form-control" wire:model="patient.social_security_scheme">
              @foreach ($all_social_security_scheme as $current)
                <option value="{{$current->id}}">{{$current->name}}</option>
              @endforeach
            </select>
          </div>  
        </div>
      </div>

      <div class="modal_botones">
        <button wire:click="back()" class="btn btn-primary btn-round">
          <i class="bi bi-arrow-left-square fa-2x"></i>
        </button>

        <div style="text-align:center; margin-top:25px;">
          <span class="step"></span>
          <span class="step finish"></span>
        </div>
    
        <button wire:click="save()" class="btn btn-primary btn-round">
          GUARDAR <i class="bi bi-save fa-lg"></i>
        </button>
    
        <button wire:click="$emit('close-modal','#modal-create2')" class="btn btn-light btn-round">
          CANCELAR <i class="bi bi-x-circle fa-lg"></i>
        </button>
      </div>
    </div>
  </div>

</div>