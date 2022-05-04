<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <img src="{{asset('assets')}}/img/logo.png" width="100%" height="100%">
  </div>

  <div class="sidebar-wrapper" id="sidebar-wrapper">

    <ul class="nav">
      <li class="@if ($activePage == 'dashboard') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      @can('parameters.index')
        <li class="@if ($activePage == 'parameters') active @endif">
          <a href="{{route('parameters.index')}}">
            <i class="bi bi-clipboard-data-fill"></i>
            <p> {{ __("Parametros") }} </p>
          </a>
        </li>
      @endcan

      @can('entities.index')
        <li class="@if ($activePage == 'entities') active @endif">
          <a href="{{route('entities.index')}}">
            <i class="fas fa-clinic-medical"></i>
            <p> {{ __("Entidades") }} </p>
          </a>
        </li>
      @endcan

      @can('professionals.index')
        <li class="@if ($activePage == 'professionals') active @endif">
          <a href="{{ route('professionals.index') }}">
            <i class="fas fa-briefcase-medical"></i>
            <p> {{ __("Profesionales") }} </p>
          </a>
        </li>
      @endcan

      {{-- <li>
        <a data-toggle="collapse" href="#entidades">
          <i class="fas fa-clinic-medical"></i>
          <p>
            {{ __("Entidades") }}
            <b class="caret"></b>
          </p>
        </a>
        
        <div class="@if ($activePage=='entities_index'||$activePage=='entities_create') collapse-show @else collapse @endif" id="entidades">
          <ul class="nav">
            <li class = "@if ($activePage == 'entities_index') active @endif">
              <a href="{{ route('entities.index') }}">
                <i class="bi bi-list-ul"></i>
                <p>{{ __('Listar') }}</p>
              </a>
            </li>
            <li class = "@if ($activePage == 'entities_create') active @endif">
              <a href="{{ route('entities.create',['entity_id'=>-1]) }}">
                <i class="bi bi-plus-circle"></i>
                <p>{{ __('Crear') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li> --}}

      <li class = "@if ($activePage == 'patients') active @endif">
        <a href="{{ route('patients.index') }}">
          <i class="now-ui-icons shopping_shop"></i>
          <p>{{ __('Usuarios') }}</p>
        </a>
      </li>

      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('pages.icons','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>

    </ul>
  </div>
</div>