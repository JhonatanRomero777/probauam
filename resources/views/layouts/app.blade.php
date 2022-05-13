<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Extra details for Live View on GitHub Pages -->
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets') }}/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>

  @livewireStyles()

  <style>

    .shadow-blue{
      background: linear-gradient(to right, #0c2646 0%, #204065 60%, #2a5788 100%);
      color:white;
      border-radius: 30px;
    }

    .shadow-orange{
      background: linear-gradient(107deg, rgb(255, 67, 5) 11.1%, rgb(245, 135, 0) 95.3%);
      color:white;
    }

    .modal-header
    {
      border-radius: 25px 100px 0% 0%;
      font-family: 'Varela Round';
      font-size: 10px;
    }

    .modal-content
    {
      border-radius: 25px 100px;
    }

    .modal_botones{      
      width: 100%;    
      background: whitesmoke;
      border-top:whitesmoke 1px;
      padding-top: 10px;
      padding-bottom: 10px;
      display: flex;
      justify-content: space-evenly;
    }

    /* Make circles that indicate the steps of the form: */

    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;
      border-radius: 50%;
      display: inline-block;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #fc6434;
    }
</style>

</head>

<body class="{{ $class ?? '' }}">
  <div class="wrapper">

    @if (Auth::check())
        @include('layouts.page_template.auth')
    @else
        @include('layouts.page_template.guest')
    @endif
    
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets') }}/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets') }}/demo/demo.js"></script>
  
  @livewireScripts()

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // window.addEventListener('success',() =>{
    //   Swal.fire({
    //     icon: 'success',
    //     title: 'Acción Exitosa',
    //     showConfirmButton: false,
    //     timer: 1000,
    //   })
    // });

    // window.addEventListener('send', event => {
    //   Livewire.emitTo(event.detail.page,event.detail.function,event.detail.data);
    // });

    Livewire.on('success',() =>{
      Swal.fire({
        icon: 'success',
        title: 'Acción Exitosa',
        showConfirmButton: false,
        timer: 1000,
      })
    });

    Livewire.on('remove', data => {
      Swal.fire({
        title: '¿Estás Seguro de ELIMINAR este Registro?',
        text: "No se podrá revertir los cambios!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar!'
      }).then((result) => {
        if (result.isConfirmed)
        { Livewire.emitTo(data[0],'delete',data[1]); }
      })
    });

    Livewire.on('open-modal', name => {  
      $(name).modal({
        backdrop:'static',
        show:true,
      });
    });

    Livewire.on('close-modal', name => {  
      $(name).modal('hide');
    });

  </script>
  
  @stack('js')

</body>

</html>