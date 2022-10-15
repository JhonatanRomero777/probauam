<div>

  <div class="modal-header shadow-blue">
    <h2 class="modal-title w-100 text-center"> {{$entity->name}} </h2>
  </div>

  <div class="modal-body">

    <div class="row">
  
      {{-- PRIMERA PARTE --}}
        <div class="col-md-5">
    
          <div class="row">
            <div class="col-md-6">         
              <div class="form-group">
                <label>{{__("Nombres")}}</label>
                <input class="form-control" wire:model.lazy="patient.names">
                @error('patient.names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>{{__("Apellidos")}}</label>
                <input class="form-control" wire:model.lazy="patient.last_names">
                @error('patient.last_names') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>{{__("Tipo de Documento")}}</label>
                <select class="form-control" wire:model="patient.document_type">
                  <option value=""> Elige una opción </option>
                  @foreach ($all_document_type as $current_document_type)
                    <option value="{{$current_document_type->id}}">{{$current_document_type->name}}</option>
                  @endforeach
                </select>
                @error('patient.document_type') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label>{{__("Documento")}}</label>
                <input class="form-control" wire:model.lazy="patient.document">
                @error('patient.document') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>{{__("Sexo")}}</label>
                <select class="form-control" wire:model="patient.sex">
                  <option value=""> Elige una opción </option>
                  @foreach ($all_sex as $current_sex)
                    <option value="{{$current_sex->id}}">{{$current_sex->name}}</option>
                  @endforeach
                </select>
                @error('patient.sex') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>{{__("Teléfono")}}</label>
                <input class="form-control" wire:model.lazy="patient.phone">
                @error('patient.phone') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>{{__("Email")}}</label>
                <input class="form-control" wire:model.lazy='user.email'>
                @error('user.email') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>{{__("Dirección")}}</label>
                <input class="form-control" wire:model.lazy="patient.direction">
                @error('patient.direction') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>
          </div>

        </div>
      {{--/ PRIMERA PARTE /--}}

      <div class="col-md-2">
  
        @if($patient->sex == 1)
          <img src="{{asset('assets')}}/img/abuelito.jpg" height="50%">
        @elseif ($patient->sex == 2)
          <img src="{{asset('assets')}}/img/abuelita.jpg" height="50%">
        @else
          <img src="{{asset('assets')}}/img/sinperfil.jpg" height="50%">
        @endif
        
      </div>

      {{-- SEGUNDA PARTE --}}
        <div class="col-md-5">

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
                  <option value=""> Elige una opción </option>
                  @foreach ($all_height as $current_height)
                    <option value="{{$current_height}}">{{$current_height}} cm</option>
                  @endforeach
                </select>
                @error('patient.height') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>{{__("Peso")}}</label>
                <select class="form-control" wire:model="patient.weight">
                  <option value=""> Elige una opción </option>
                  @foreach ($all_weight as $current_weight)
                    <option value="{{$current_weight}}">{{$current_weight}} kg</option>
                  @endforeach
                </select>
                @error('patient.weight') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>{{__("Perímetro de la cintura")}}</label>
                <select class="form-control" wire:model="patient.size">
                  <option value=""> Elige una opción </option>
                  @foreach ($all_size as $current_size)
                    <option value="{{$current_size}}">{{$current_size}} cm</option>
                  @endforeach
                </select>
                @error('patient.size') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
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
                  <option value=""> Elige una opción </option>
                  @foreach ($all_civil_status as $current_civil_status)
                    <option value="{{$current_civil_status->id}}">{{$current_civil_status->name}}</option>
                  @endforeach
                </select>
                @error('patient.civil_status') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>{{__("Nivel de educación")}}</label>
                <select class="form-control" wire:model="patient.education_level">
                  <option value=""> Elige una opción </option>
                  @foreach ($all_education_level as $current_education_level)
                    <option value="{{$current_education_level->id}}">{{$current_education_level->name}}</option>
                  @endforeach
                </select>
                @error('patient.education_level') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>
          </div>
        
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>{{__("Estrato Socioeconómico")}}</label>
                <select class="form-control" wire:model="patient.socioeconomic_stratum">
                  <option value=""> Elige una opción </option>
                  @foreach ($all_socioeconomic_stratum as $current_socioeconomic_stratum)
                    <option value="{{$current_socioeconomic_stratum->id}}">{{$current_socioeconomic_stratum->name}}</option>
                  @endforeach
                </select>
                @error('patient.socioeconomic_stratum') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>{{__("Régimen de Seguridad Social")}}</label>
                <select class="form-control" wire:model="patient.social_security_scheme">
                  <option value=""> Elige una opción </option>
                  @foreach ($all_social_security_scheme as $current_social_security_scheme)
                    <option value="{{$current_social_security_scheme->id}}">{{$current_social_security_scheme->name}}</option>
                  @endforeach
                </select>
                @error('patient.social_security_scheme') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
              </div>  
            </div>
          </div>

        </div>
      {{--/ SEGUNDA PARTE /--}}

    </div>

    <div class="row">
      <div class="col-md-6" style="margin-left: 25%">

        <div class="modal_botones">
          <button wire:click="back()" class="btn btn-primary btn-round">
            <i class="bi bi-arrow-left-square fa-2x"></i>
          </button>
        
          <div style="text-align:center; margin-top:25px;">
            <span class="step"></span>
            <span class="step finish"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>
        
          <button wire:click="next()" class="btn btn-primary btn-round">
            <i class="bi bi-arrow-right-square fa-2x"></i>
          </button>
        
          <button wire:click="$emit('close-modal','#modal-patient-update')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>

      </div>
    </div>

  </div>
  
</div>