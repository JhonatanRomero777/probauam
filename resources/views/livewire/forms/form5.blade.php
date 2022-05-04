<div>

  <div class="row">

    <div class="col-md-5">
      <img src="{{asset('assets')}}/img/form.gif" height="75%">
    </div>

    <div class="col-md-7">

      @if($idx < count($questions))

        <div style="height: 50px">
          <p> {{$questions->get($idx)->name}} </p>
        </div>

        <table class="table text-center table-striped table-bordered">
  
          <tbody>

            @foreach ($questions->get($idx)->answers as $current_answer)

              <tr @if($current_answer->id == $answers[$idx]["answer"]) style="background: skyblue" @endif>
    
                <td width="85%">
                  {{$current_answer->name}}
                </td>

                @if($isCreate)

                  <td width="15%">
                    @if($current_answer->id != $answers[$idx]["answer"])
                      <input type="radio" name={{$questions->get($idx)->id}} value={{$current_answer->id}}
                      wire:change="saveOne($event.target.name , $event.target.value)">
                    @endif
                  </td>

                @endif

              </tr>

            @endforeach

          </tbody>
        </table>

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
          <h2> Puntaje = {{$score}} </h2>
        </div>

        <table class="table text-center table-striped table-bordered">

          <thead>
            <th><b>Puntos de Corte</b></th>
          </thead>
  
          <tbody height="175px">
            <tr>

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
