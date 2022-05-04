
<div class="card">
  <div class="card-body">
    <div class="row">

      @foreach ($forms as $current_form)
        <div class="col-md-6">
          <table class="table text-center table-striped table-bordered">
            <tbody>
              <tr>
                <td width="75%"> {{$current_form->name}} </td>
                <td width="25%">
                  <button class="btn btn-primary btn-lg" wire:click="changeForm({{$current_form}})">
                    <i class="bi bi-list-ul fa-lg"></i>
                  </button>
                </td>
              </tr> 
            </tbody>
          </table>
        </div>
      @endforeach

    </div>
  </div>
</div>