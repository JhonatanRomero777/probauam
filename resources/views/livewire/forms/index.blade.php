<div>

  @foreach ($modals as $modal)
    @livewire('components.modal',["id_modal"=>$modal["id"],"title"=>$modal["title"],"component"=>$modal["component"]],key($modal["id"]))
  @endforeach

  <div class="card">

    <div class="card-header">
      <div class="row">
        <div class="col-md-6">
          <h3 class="text-center" style="padding-top: 10px"><b>{{$sesion->created_at}}</b></h3>
          {{-- {{$sesion->forms()}} --}}
        </div>

        <div class="col-md-6 text-center">
          <a href="{{route('sesions.index',['patient_id'=>$sesion->patient])}}" class="btn btn-primary btn-round">
            FINALIZAR <i class="bi bi-door-open fa-lg"></i>
          </a>
        </div>
      </div>      
    </div>

    <div class="card-body">

      <div class="row">
        @foreach ($forms as $current_form)
          <div class="col-md-6">
            <table class="table text-center table-striped table-bordered">
              <tbody>
                <tr>
                  <td width="75%"> {{$current_form["name"]}} </td>
                  <td width="25%">
                    
                    <button wire:click='create({{$current_form["id"]}})'
                    class="btn @if($current_form["state"]) btn-success @else btn-primary @endif btn-lg">
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

</div>