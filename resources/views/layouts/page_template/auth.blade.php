
<div class="main-panel">

  @include('layouts.sidebar')

  {{-- Navbar --}}
  @livewire('users.navbar',['namePage'=>$namePage])
  {{--/ Navbar --}}
  
  @yield('content')
  
  {{-- @include('layouts.footer') --}}

</div>