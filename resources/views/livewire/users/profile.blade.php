<div>

    <div class="card card-user">

        <div class="image">
          <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
        </div>

        <div class="card-body">
          <div class="author">
            <a href="#">
              <img class="avatar border-gray" src="{{asset('assets')}}/img/mike.jpg" alt="...">
              <h5 class="title">Jhonatan</h5> <!-- { auth()->user()->name }} -->
            </a>
            <p class="description">
                jhonatans.romeroc@autonoma.edu.co
            </p> <!-- { auth()->user()->email }} -->
          </div>
        </div>
        
        <hr>

        <div class="button-container">
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-facebook-square"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-twitter"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-google-plus-square"></i>
          </button>
        </div>

    </div>

</div>