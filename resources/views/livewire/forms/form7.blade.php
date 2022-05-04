<div>

  <div class="row">

    <div class="col-md-5">
      <img src="{{asset('assets')}}/img/form.gif" height="75%">
    </div>

    <div class="col-md-7">

      @if($idx < count($questions))

        <p> {{$questions->get($idx)->name}} </p>

        <div class="form-group">
          <input class="form-control" wire:model="value0" placeholder="¿Cúanto obtuvo en el primer intento? (cms)"
          @if(!$isCreate) disabled @endif>
          @error('value0') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
        </div>

        <div class="form-group">
          <input class="form-control" wire:model="value1" placeholder="¿Cúanto obtuvo en el segundo intento? (cms)"
          @if(!$isCreate) disabled @endif>
          @error('value1') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
        </div>

        <div class="form-group">
          @error('answer.required') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror <br>
        </div>

        <div class="modal_botones">
          <button class="btn btn-primary btn-round" wire:click="back()" @if($idx == 0) disabled @endif>
            <i class="bi bi-arrow-left-square fa-2x"></i>
          </button>
  
          <button wire:click="next()" class="btn btn-primary btn-round">
            <i class="bi bi-arrow-right-square fa-2x"></i>
          </button>
        
          <button wire:click="$emit('close-modal','#modal-form{{$form->id}}')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>

      @else

        <div style="height: 75px">
          <h2> Puntaje = 
            @if ($value0 > $value1)
              {{$value0}}
            @else
              {{$value1}}
            @endif
          </h2>
        </div>

        <table class="table text-center table-striped table-bordered">

          <thead>
            <th>
              <b>Puntos de Corte</b>
            </th>
          </thead>
  
          <tbody height="175px">
            <tr>
              <td>
                <p>20 cm o menos: riesgo de caídas</p>
                <p>28 cm o menos: riesgo de deterioro de movilidad</p>
                <p>Más de 28 cm: no riesgo</p>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="modal_botones">
          <button class="btn btn-primary btn-round" wire:click="back()" @if($idx == 0) disabled @endif>
            <i class="bi bi-arrow-left-square fa-2x"></i>
          </button>

          @if($isCreate)
            <button wire:click="saveAll()" class="btn btn-primary btn-round">
              GUARDAR <i class="bi bi-save fa-lg"></i>
            </button>
          @endif
        
          <button wire:click="$emit('close-modal','#modal-form{{$form->id}}')" class="btn btn-light btn-round">
            CANCELAR <i class="bi bi-x-circle fa-lg"></i>
          </button>
        </div>

      @endif

    </div>
  </div>

</div>