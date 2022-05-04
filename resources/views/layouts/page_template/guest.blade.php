
<div style="background-image:url('{{$backgroundImage}}')">
    
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand">LOGIN</a>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <i class="bi bi-person-circle fa-4x"></i>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <div class="full-page  section-image">
    @yield('content')
    @include('layouts.footer')
  </div>
  
</div>