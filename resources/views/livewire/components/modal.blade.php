<div>

  <div class="modal fade" id={{$id_modal}}>
    <div class="modal-dialog" style="max-width:60%">
      
      <div class="modal-content">
    
        <div class="modal-header shadow-blue">
          <h1 class="modal-title w-100 text-center">{{$title}}</h1>
        </div>
    
        <div class="modal-body">
          @livewire($component)
        </div>
    
      </div>
    </div>
  </div>

</div>