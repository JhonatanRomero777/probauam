<div>

  <div class="row">

    <div class="col-md-5">
      <img src="{{asset('assets')}}/img/form.gif" height="75%">
    </div>

    <div class="col-md-7">

      @if($idx < count($questions))

        <div style="height: 75px">
          <p> {{$questions->get($idx)->name}} </p>
        </div>

        <table class="table text-center table-striped table-bordered">

          @if($idx < count($questions)-1)
            <thead>
              <tr>
                <th><b>Normal</b></th>
                <th><b>Anormal</b></th>
              </tr>
            </thead>
          @endif
  
          <tbody>
            <tr>
  
              @if($isCreate)

                @foreach ($questions->get($idx)->answers as $current_answer)
  
                  <td width="50%" height="200px"
                  @if($current_answer->id == $answers[$idx]["answer"]) style="background: skyblue" @endif>
  
                    {{$current_answer->name}} <br>
  
                    @if($current_answer->id != $answers[$idx]["answer"])
                      <input type="radio" name={{$questions->get($idx)->id}} value={{$current_answer->id}}
                      wire:change="saveOne($event.target.name , $event.target.value)">
                    @endif
  
                  </td>
                @endforeach

              @else
  
                @foreach ($questions->get($idx)->answers as $current_answer)
                  <td width="50%" height="200px"
                  @if($current_answer->id == $this->sesion->choices()->where('question_id', '=', $questions->get($idx)->id)->first()->answer_id)
                  style="background: skyblue" @endif>
  
                    {{$current_answer->name}} <br>
  
                  </td>
                @endforeach
                
              @endif
              
            </tr>
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