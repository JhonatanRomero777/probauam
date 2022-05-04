<div>

  <div class="row">

    <div class="col-md-5">
      <img src="{{asset('assets')}}/img/form.gif" height="75%">
    </div>

    <div class="col-md-7">

      <p> {{$question->name}} </p>

      <table class="table text-center table-striped table-bordered">
        <thead>
          <tr>
            <th><b>Normal</b></th>
            <th><b>Anormal</b></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($question->answers as $current_answer)
              <td>
                {{$current_answer->name}} <br>
                <input type="radio" name="{{$question->id}}" value="{{$current_answer->id}}" wire:change="saveOne($event.target.name , $event.target.value)">
              </td>
            @endforeach
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
      
        @if($idx == count($questions)-1)
          <button wire:click="finish()" class="btn btn-primary btn-round">
            GUARDAR <i class="bi bi-save fa-lg"></i>
          </button>
        @else
          <button wire:click="next()" class="btn btn-primary btn-round">
            <i class="bi bi-arrow-right-square fa-2x"></i>
          </button>
        @endif
      
        <button wire:click="$emit('close-modal','#modal-form{{$form->id}}')" class="btn btn-light btn-round">
          CANCELAR <i class="bi bi-x-circle fa-lg"></i>
        </button>
      </div>

    </div>
  </div>

</div>