<div>

  <label>jhonatan@hotmail.com</label>
  <br>
  <label>karen@hotmail.com</label>
  <br>

  <form wire:submit.prevent="login">
    <div class="form-group">
      <label>{{__(" Correo")}}</label>
      <input type="text" wire:model="user.email" class="form-control">
      @error('user.email') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
    </div>

    <div class="form-group">
      <label>{{__(" Contraseña")}}</label>
      <input type="password" wire:model="user.a_password" class="form-control" style="font-weight: bold;">
      @error('user.a_password') <small class="text-primary"> <b>*{{$message}}</b></small> @enderror
    </div>

    <div class="text-right">
      <button type="submit" class="btn btn-primary btn-round"> Login </button>
    </div>
  </form>

  @push('js')
        
    <script>
      window.addEventListener('welcome' , () =>{
        Swal.fire({
          icon: 'success',
          title: 'Bienvenido',
          showConfirmButton: false,
          timer: 1000,
          timerProgressBar: true,
        }).then((result) => {
          Livewire.emitTo('users.login','goHome');
        })
      });
    </script>

  @endpush

</div>