
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