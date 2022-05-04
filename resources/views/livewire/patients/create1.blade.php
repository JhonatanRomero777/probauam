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
            <label>{{__("Nombres")}}</label>
            <input class="form-control" wire:model="patient.names">
            @error('patient.names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>  
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Apellidos")}}</label>
            <input class="form-control" wire:model="patient.last_names">
            @error('patient.last_names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>  
        </div>
      </div>
      
      <div class="row">
      
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Tipo de Documento")}}</label>
            <select class="form-control" wire:model="patient.document_type">
              @foreach ($all_document_type as $current)
                <option value="{{$current->id}}"> {{$current->name}} </option>
              @endforeach
            </select>
          </div>
        </div>
      
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Documento")}}</label>
            <input class="form-control" wire:model="patient.document">
            @error('patient.document') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            @error('document.repeat') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>  
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Sexo")}}</label>
            <select class="form-control" wire:model="patient.sex">
              @foreach ($all_sex as $current)
                <option value="{{$current->id}}">{{$current->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>{{__("Teléfono")}}</label>
            <input class="form-control" wire:model="patient.phone">
            @error('patient.phone') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>  
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>{{__("Email")}}</label>
            <input class="form-control" wire:model='email'>
            @error('email') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
            @error('email.repeat') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>  
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>{{__("Dirección")}}</label>
            <input class="form-control" wire:model="patient.direction">
            @error('patient.direction') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
          </div>  
        </div>
      </div>

      <div class="modal_botones">
        <button class="btn btn-primary btn-round" disabled>
          <i class="bi bi-arrow-left-square fa-2x"></i>
        </button>
      
        <div style="text-align:center; margin-top:25px;">
          <span class="step finish"></span>
          <span class="step"></span>
        </div>
      
        <button wire:click="next()" class="btn btn-primary btn-round">
          <i class="bi bi-arrow-right-square fa-2x"></i>
        </button>
      
        <button wire:click="$emit('close-modal','#modal-create1')" class="btn btn-light btn-round">
          CANCELAR <i class="bi bi-x-circle fa-lg"></i>
        </button>
      </div>
    </div>
  </div>
    
</div>